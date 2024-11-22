<?php

namespace Metaregistrar\Api\Client\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use  Metaregistrar\Api\Client\Connection;
use Metaregistrar\Api\Client\Request\DnszoneCreateRequest;
use Metaregistrar\Api\Client\Response\DnszoneCreateResponse;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

class ConnectionTest extends TestCase
{
    /**
     * @var Connection
     */
    private $connection;


    /**
     * @var string
     */
    private $hostname;

    /**
     * @var string
     */
    private $token;

    /**
     * @var MockInterface
     */
    private $client;

    public function setUp(): void
    {
        $this->hostname = 'eu.thisisfakedmarc.com';
        $this->token = 'totalfake2dh80h3280fh38f33*(&*';
        $this->client = Mockery::mock(Client::class);

        $this->connection = new Connection(
            $this->hostname,
            $this->token,
            $this->client
        );

        // reset static properties:
        $this->connection::setLoggingService(null);

        $loggingEnabled = new ReflectionProperty(Connection::class, 'loggingEnabled');
        $loggingEnabled->setValue($this->connection, false);

        $debugMode = new ReflectionProperty(Connection::class, 'debugMode');
        $debugMode->setValue($this->connection, false);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testDebugOutputIsDisabled(): void
    {
        $testInputString = 'some test input';

        ob_start();
        $this->connection->debugOutput($testInputString);
        $output = ob_get_clean();

        $this->assertEquals('', $output);
    }

    public function testDebugOutputDebugModeEnabled(): void
    {
        $testInputString = ' some test input';
        $this->connection->enableDebugMode();
        ob_start();
        $this->connection->debugOutput($testInputString);
        $output = ob_get_clean();
        $this->assertEquals("\nConnection debug" . $testInputString . "\n", $output);
    }

    public function testDebugOutputResponseNull(): void
    {
        $this->connection->enableDebugMode();
        ob_start();
        $this->connection->debugOutputResponse(null);
        $output = ob_get_clean();
        $this->assertEquals("Connection debug Response: NULL", $output);
    }

    public function testDebugOutputResponse(): void
    {
        $this->connection->enableDebugMode();
        $responseArray = ['{"added": ["https://eu.dmarcadvisor.com/api/v1/domains/462097"]}'];
        $requestResponse = new Response(200, array('Content-Type' => 'application/json'), json_encode($responseArray));
        ob_start();
        $this->connection->debugOutputResponse($requestResponse);
        $output = ob_get_clean();
        $this->assertEquals(
'
Connection debug Response:200::["{\"added\": [\"https:\/\/eu.dmarcadvisor.com\/api\/v1\/domains\/462097\"]}"]
',
            $output);
    }

    public function testSendCommand(): void
    {
        $dnsZoneRequest = new DnszoneCreateRequest();
        $dnsZoneRequest->setName('test.a');
        $responseArray = ['{"added": ["https://' . $this->hostname . '/dnszone"]}'];
        $requestResponse = new Response(200, array('Content-Type' => 'application/json'), json_encode($responseArray));

        $this->client
            ->expects('request')
            ->with(
                    'POST',
                    'https://' . $this->hostname . '/dnszone',
                    [
                        'headers' => [
                            'content-type' => 'application/json',
                            'token' => $this->token,
                        ],
                        'body' => '{"name":"test.a","premium":false,"records":[]}',
                    ]
                )
            ->andReturn($requestResponse);

        $response = $this->connection->sendCommand($dnsZoneRequest);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('{"records":["{\"added\": [\"https:\/\/'. $this->hostname .'\/dnszone\"]}"]}', $response->getRawBody());
    }

    public function testSendCommandReturnException(): void
    {
        $this->connection->setLoggingEnabled(true);
        $dnsZoneRequest = new DnszoneCreateRequest();
        $dnsZoneRequest->setName('test.a');

        //First logRequest
        $loggingService = mockery::mock('loggingService');
        $cibClosure = new Mockery\Matcher\Closure(function ($message) {
            $this->assertStringStartsWith('Hosting Request:', $message);
            return true;
        });
        $loggingService->expects('log')->withArgs(
            [
                $cibClosure,
                200,
                [
                    'method' => 'POST',
                    'url' => '/dnszone'
                ]
            ]
        );
        $request = new Request('GET', 'https://' . $this->hostname . '/dnszone', []);
        $response = new Response(500,  [], '{"failed": true}');
        $exception = new RequestException('failed', $request, $response);
        $this->client->expects('request')->withArgs(
            [
                'POST',
                'https://' . $this->hostname . '/dnszone',
                [
                    'headers' => [
                        'content-type' => 'application/json',
                        'token' => $this->token
                    ],
                    'body' => '{"name":"test.a","premium":false,"records":[]}',
                ]
            ]
        )
        ->andThrow($exception)
        ->once();
        $cibResponseClosure = new Mockery\Matcher\Closure(function ($message) {
            $this->assertStringContainsString('Hosting Response:', $message);
            return true;
        });
        $paramsClosure  = new Mockery\Matcher\Closure(function ($params) {
            $this->assertEquals('POST', $params['method']);
            $this->assertEquals('/dnszone', $params['url']);
            $this->assertTrue($params['exception']);
            $this->assertEquals(500, $params['exceptionCode']);
            $this->assertEquals('failed', $params['exceptionMessage']);
            $this->assertEquals(500, $params['responseCode']);
            return true;
        });
        //Second logRequest
        $loggingService->expects('log')->withArgs(
            [
                $cibResponseClosure,
                200,
                $paramsClosure
            ]
        );
        $this->connection::setLoggingService($loggingService);
        $response = $this->connection->sendCommand($dnsZoneRequest);
        $this->assertEquals(500, $response->getStatusCode());
        $this->assertEquals('{"failed": true}', $response->getRawBody());
    }

    public function testLogExceptionRequest(): void
    {
        $method = DnszoneCreateResponse::class;
        $url = 'https://' . $this->hostname . '/api/v1/domain-groups/2155/add-domains/';
        $time = 1;
        $request = new Request('GET', 'https://eu.thisisfakedmarc.com/api/v1/domains/2155', []);
        $exception = new RequestException('failed', $request);
        $response = new Response(404, []);
        $hash = '2fh320ih3r80fh-2';
        $this->connection::setLoggingEnabled(true);
        $this->connection::setLoggingService(null);
        ob_start();
        $this->connection->logExceptionRequest($method, $url, $time, $exception, $response, $hash);
        $output = ob_get_clean();
        $this->assertStringContainsString('Hosting Response: '. $hash . ' ResponseCode: '. 404, $output);
    }

    public function testLogIsDisabled(): void
    {
        $this->connection::setLoggingEnabled(false);

        $request = new Request('GET', 'https://eu.thisisfakedmarc.com/api/v1/domains/2155', []);
        $exception = new RequestException('failed', $request);

        ob_start();
        $this->connection->logExceptionRequest('method', 'https://', 1, $exception, null, 'hash');
        $output = ob_get_clean();

        $this->assertStringContainsString('', $output);
    }
}
