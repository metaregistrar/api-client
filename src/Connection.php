<?php

namespace Metaregistrar\Api\Client;

use Exception;
use GuzzleHttp\Client as Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Metaregistrar\Api\Client\Request\RequestInterface;
use Metaregistrar\Api\Client\Response\ResponseInterface;
use Monolog\Logger;

/**
 *
 */
class Connection
{
    /**
     * @var string
     */
    private $hostname;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var boolean
     */
    private static $loggingEnabled = false;

    /**
     * @var mixed
     */
    private static $loggingService = null;

    /**
     * @var boolean
     */
    private static $debugMode = false;

    /**
     * @var string
     */
    private $basepath = '/';
    /**
     * @var string
     */
    private string $token;
    /**
     * @var string
     */
    private string $serverAddress;
    /**
     * @var Translator
     */
    private Translator $translator;

    /**
     * @param string      $hostname
     * @param string      $token
     * @param Client|null $client
     */
    public function __construct(string $hostname, string $token, ?Client $client = null)
    {
        $this->hostname = $hostname;
        $this->token = $token;
        if (is_null($client)) {
            $config = [];
            $client = new Client($config);
        }
        $this->client = $client;
        $this->serverAddress = 'https://' . $this->hostname;
        $this->translator = new Translator();
    }

    /**
     * @return void
     */
    public static function enableDebugMode()
    {
        self::$debugMode = true;
    }

    /**
     * @param mixed $loggingService
     * @return void
     */
    public static function setLoggingService($loggingService)
    {
        self::$loggingService = $loggingService;
    }

    /**
     * @param boolean $loggingEnabled
     * @return void
     */
    public static function setLoggingEnabled($loggingEnabled)
    {
        self::$loggingEnabled = $loggingEnabled;
    }

    /**
     * @param string      $type
     * @param string      $url
     * @param array       $headers
     * @param null|string $body
     * @param array       $options
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    private function makeRawRequest($type, $url, array $headers = [], $body = null, array $options = [])
    {
        $headers['content-type'] = "application/json";
        $headers['token'] = $this->token;
        $options['headers'] = $headers;
        if (is_string($body)) {
            $options['body'] = $body;
        } else {
            $options['form_params'] = $body;
        }
        $response = $this->client->request($type, $this->serverAddress . $url, $options);
        return $response;
    }

    /**
     * @param string $input
     * @return void
     */
    public function debugOutput($input)
    {
        if (!self::$debugMode) {
            return;
        }
        echo "\nConnection debug" . $input . "\n";
    }

    /**
     * @param Response|null $response
     * @return void
     */
    public function debugOutputResponse(?Response $response)
    {
        if (!self::$debugMode) {
            return;
        }
        if (is_null($response)) {
            echo "Connection debug Response: NULL";
            return;
        }
        echo "\nConnection debug Response:" . $response->getStatusCode() . '::' . $response->getBody() . "\n";
    }

    /**
     * @param RequestInterface $command
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendCommand(RequestInterface $command)
    {
        $command->setSerializer($this->translator);
        $method = $command->getMethod();
        $url = $this->basepath . $command->getUrl();
        $postDoc = $command->getPostDocument();
        $hash = md5(uniqid(true));
        $this->logRequest($hash, $method, $url, $postDoc);
        $beforeRequest = microtime(true);
        $this->debugOutput($url);
        if (!is_string($postDoc)) {
            $this->debugOutput(json_encode($postDoc));
        } else {
            $this->debugOutput($postDoc);
        }

        try {
            $response = $this->makeRawRequest(
                $method,
                $url,
                $command->getHeaders(),
                $postDoc,
                $command->getOptions()
            );
            $this->debugOutputResponse($response);
            $afterRequest = microtime(true);
            $this->logNormalResponse($method, $url, $afterRequest - $beforeRequest, $response, $hash);
        } catch (RequestException $exception) {
            $afterRequest = microtime(true);
            $response = $exception->getResponse();
            $this->debugOutputResponse($response);
            $this->logExceptionRequest($method, $url, $afterRequest - $beforeRequest, $exception, $response, $hash);
            if (is_null($response)) {
                $response = new Response(418, [], 'RequestException');
            }
            return $command->parseExceptionRequest($response);
        }
        return $command->parseResponse($response);
    }

    /**
     * @param string $hash
     * @param string $method
     * @param string $url
     * @param string $postDoc
     * @return void
     */
    public function logRequest($hash, $method, $url, $postDoc)
    {

        $logMessage = 'Hosting Request: ' . $hash . ' Body: ' . print_r($postDoc, true);
        $context = [
            'method' => $method,
            'url' => $url,
        ];
        $this->log($logMessage, Logger::INFO, $context);
    }

    /**
     * @param string   $method
     * @param string   $url
     * @param float    $time
     * @param Response $response
     * @param string   $hash
     * @return void
     */
    public function logNormalResponse($method, $url, $time, Response $response, $hash)
    {
        $time = ceil($time * 1000);
        $context = [
            'method' => $method,
            'url' => $url,
        ];
        $context['responseCode'] = $response->getStatusCode();
        $logMessage = 'Hosting Response: ' . $hash . ' ResponseCode: ' . $context['responseCode'] .
            ' ResponseTime: ' . $time . ' Body: ' . (string)$response->getBody();
        $this->log($logMessage, Logger::INFO, $context);
    }

    /**
     * @param string        $method
     * @param string        $url
     * @param float         $time
     * @param Exception     $exception
     * @param Response|null $response
     * @param string        $hash
     * @return void
     */
    public function logExceptionRequest($method, $url, $time, Exception $exception, ?Response $response, $hash)
    {
        $time = ceil($time * 1000);
        $context = [
            'method' => $method,
            'url' => $url,
        ];
        $context['exception'] = true;
        $responseCode = 0;
        $body = '';
        if (!is_null($response)) {
            $body = (string)$response->getBody();
            $responseCode = $response->getStatusCode();
        }
        $context['exceptionCode'] = $exception->getCode();
        $context['exceptionMessage'] = $exception->getMessage();
        $context['exceptionFile'] = $exception->getFile();
        $context['exceptionLine'] = $exception->getLine();
        $context['responseCode'] = $responseCode;
        $logMessage = 'Hosting Response: ' . $hash . ' ResponseCode: ' .
            $context['responseCode'] . ' ResponseTime: ' . $time . ' Body: ' . $body;
        $this->log($logMessage, Logger::INFO, $context);
    }

    /**
     * @param string $message
     * @param mixed  $type
     * @param array  $context
     * @return void
     */
    private function log($message, $type, array $context = [])
    {
        if (!self::$loggingEnabled) {
            return;
        }
        if (is_null(self::$loggingService)) {
            echo date("Y-m-d H:i:s") . "\tM:$type\t" . $message . "\t" . json_encode($context) . ".\n";
        }

        if (!is_null(self::$loggingService) && is_callable([self::$loggingService, 'log'])) {
            self::$loggingService->log($message, $type, $context);
        }
    }
}
