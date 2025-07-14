<?php

namespace Metaregistrar\Api\Client\Request;

use GuzzleHttp\Psr7\Response;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Exception\RuntimeException;
use Metaregistrar\Api\Client\Response\ErrorResponse;
use Metaregistrar\Api\Client\Response\ResponseInterface;
use Metaregistrar\Api\Client\Translator;

/**
 * Class AbstractRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class AbstractRequest implements RequestInterface
{
    /**
     * @var Translator
     */
    protected $serializer;

    /**
     * @var string
     */
    protected $url = 'domainListing';

    /**
     * @var string
     */
    protected $expectedResponse = ErrorResponse::class;

    /**
     * @var string
     */
    protected $expectedErrorResponse = ErrorResponse::class;

    /**
     * @var array
     */
    protected $queryParts = [];

    /**
     * @var string
     */
    protected $method = self::METHOD_GET;

    /**
     * @var array
     */
    protected $urlParams = [];

    /**
     * @var array
     */
    protected $acceptableArgs = [
    ];
    /**
     * @var string[]
     */
    protected $acceptableQueryArgs = [
    ];
    /**
     * @var string[]
     */
    protected $acceptableQueryDefaultArgs = [
    ];
    /**
     * @var string[]
     */
    protected $acceptableDefaultArgs = [
    ];
    /**
     * @var string
     */
    private string $username;
    /**
     * @var string
     */
    private string $key;


    /**
     * @return array
     */
    public function getUrlParams()
    {
        return $this->urlParams;
    }

    /**
     * @param array $urlParams
     * @return AbstractRequest
     */
    public function setUrlParams(array $urlParams): AbstractRequest
    {
        $this->urlParams = $urlParams;
        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setUrlParam($key, $value)
    {
        $this->urlParams[$key] = $value;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        $url = $this->url;
        foreach ($this->urlParams as $param => $value) {
            $url = str_replace('{' . $param . '}', $value, $url);
        }
        return $url . (count($this->queryParts) > 0 ? '?' . implode("&", $this->queryParts) : '');
    }

    /**
     * @return string
     */
    public function getPostDocument()
    {
        if (in_array($this->method, [self::METHOD_POST, self::METHOD_PUT, self::METHOD_PATCH])) {
            return $this->serializer->serialize($this);
        }
        return null;
    }

    /**
     * @param array $queryArgs
     * @return void
     */
    public function mapQueryArgs(array $queryArgs): void
    {
        $args = array_merge($this->acceptableQueryArgs, $this->acceptableQueryDefaultArgs);
        foreach ($args as $k => $v) {
            if (!isset($queryArgs[$k])) {
                continue;
            }
            if (is_null($queryArgs[$k])) {
                continue;
            }
            if ($v == 'boolean') {
                $queryArgs[$k] = ($queryArgs[$k]=='true');
            }
            if ($v == 'integer') {
                $queryArgs[$k] = intval($queryArgs[$k]);
            }
            if ($v == 'float') {
                $queryArgs[$k] = floatval($queryArgs[$k]);
            }
            if (gettype($queryArgs[$k]) == $v) {
                $this->$k = $queryArgs[$k];
            }
        }
    }

    /**
     * @param array $args
     * @return void
     */
    public function mapArgs(array $args): void
    {
        $acceptableArgs = array_merge($this->acceptableArgs, $this->acceptableDefaultArgs);
        $urlParams = [];
        foreach ($acceptableArgs as $k => $v) {
            if (!isset($args[$k])) {
                continue;
            }
            if (is_null($args[$k])) {
                continue;
            }
            if ($v == 'integer') {
                $args[$k] = intval($args[$k]);
            }
            if ($v == 'float') {
                $args[$k] = floatval($args[$k]);
            }
            if (gettype($args[$k]) == $v) {
                $this->$k = $args[$k];
                $urlParams[$k] = $args[$k];
            }
        }
        $this->urlParams = $urlParams;
    }

    /**
     * @return string|null
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array|null
     */
    public function getHeaders()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [];
    }

    /**
     * @param Response $response
     * @return ResponseInterface
     */
    public function parseExceptionRequest(?Response $response)
    {
        $statusCode = $response->getStatusCode();
        $body = (string)$response->getBody();
        if (substr($body, 0, 1) == '[') {
            $body = '{"records":' . $body . "}";
        }
        if ($body == '') {
            $body = '{}';
        }
        try {
            $responseMessage = $this->parseJsonToResponseObject($this->expectedErrorResponse, $body);
        } catch (RuntimeException $exception) {
            //ignore the data
            $responseMessage = new ErrorResponse("unknown", "unknown error");
        }
        $responseMessage->setStatusCode($statusCode);
        $responseMessage->setRawBody($body);
        return $responseMessage;
    }

    /**
     * @param Response $response
     * @return ResponseInterface
     */
    public function parseResponse(Response $response)
    {
        $statusCode = $response->getStatusCode();
        $body = (string)$response->getBody();
        if (substr($body, 0, 1) == '[') {
            $body = '{"records":' . $body . "}";
        }
        if ($body == '') {
            $body = '{}';
        }
        $response = $this->parseJsonToResponseObject($this->expectedResponse, $body);
        $response->setStatusCode($statusCode);
        $response->setRawBody($body);
        return $response;
    }

    /**
     * @param string $class
     * @param string $body
     * @return ResponseInterface
     */
    private function parseJsonToResponseObject($class, $body)
    {
        if (!strstr($class, "\\")) {
            $class = 'Metaregistrar\Api\Client\Response\\' . $class;
        }

        $outObj = $this->serializer->deserialize($body, $class);
        return $outObj;
    }

    /**
     * @param Translator $serializer
     * @return void
     */
    public function setSerializer(Translator $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return AbstractRequest
     */
    public function setUsername(string $username): AbstractRequest
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return AbstractRequest
     */
    public function setKey(string $key): AbstractRequest
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpectedResponse()
    {
        return $this->expectedResponse;
    }

    /**
     * @param string $expectedResponse
     * @return AbstractRequest
     */
    public function setExpectedResponse(string $expectedResponse): AbstractRequest
    {
        $this->expectedResponse = $expectedResponse;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpectedErrorResponse()
    {
        return $this->expectedErrorResponse;
    }

    /**
     * @param string $expectedErrorResponse
     * @return AbstractRequest
     */
    public function setExpectedErrorResponse(string $expectedErrorResponse): AbstractRequest
    {
        $this->expectedErrorResponse = $expectedErrorResponse;
        return $this;
    }

    /**
     * @param string $name
     * @param mixed  $value
     * @return void
     */
    protected function setQueryArg(string $name, $value): void
    {
        $this->queryParts[$name] = $name . '=' . urlencode($value);
    }
}
