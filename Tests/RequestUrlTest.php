<?php

namespace Metaregistrar\Api\Client\Tests;

use Metaregistrar\Api\Client\Request\AbstractRequest;
use Metaregistrar\Api\Client\Request\RequestInterface;
use Mockery;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;

class RequestUrlTest extends TestCase
{
    protected array $ignoreSetters = [
        'setUrlParams',
        'setUrlParam',
        'setSerializer',
        'setExpectedResponse',
        'setExpectedErrorResponse',
        'setQueryArg',
    ];

    public function tearDown(): void
    {
        Mockery::close();
    }

    public static function provideRequestClasses(): array
    {
        $files = [];
        $directories = [[
            'namespace' => 'Metaregistrar\\Api\\Client\\Request\\',
            'path' => __DIR__ . '/../src/Request/',
        ]];


        foreach ($directories as $directory) {
            $d = opendir($directory['path']);

            while ($file = readdir($d)) {
                if (strpos($file, '.php') === false) {
                    continue;
                }

                $filepath = $directory['path'] . DIRECTORY_SEPARATOR . $file;

                if (!is_file($filepath)) {
                    continue;
                }

                $class = basename($filepath, '.php');
                $className = $directory['namespace'] . $class;
                if (!class_exists($className) || !is_subclass_of($className, AbstractRequest::class)) {
                    continue;
                }

                $reflectionClass = new ReflectionClass($className);
                if ($reflectionClass->isAbstract() === true) {
                    continue;
                }
                $files[$className] = [$className, $filepath];
            }
            closedir($d);
        }

        return $files;
    }

    /**
     * @dataProvider provideRequestClasses
     */
    public function testUrlIsParsed(string $className): void
    {

        $reflectionClass = new ReflectionClass($className);

        if ($reflectionClass->hasMethod('__construct')) {
            $params = [];
            foreach ($reflectionClass->getConstructor()->getParameters() as $param) {
                $type = $param->getType() ?? 'string';

                $value = ListRequestsTest::generateValue($type);
                $params[$param->getName()] = $value;
            }
            /** @var AbstractRequest $request */
            $request  = $reflectionClass->newInstanceArgs($params);
        } else {
            /** @var AbstractRequest $request */
            $request = $reflectionClass->newInstance();
        }


        $reflectionClass = new ReflectionClass($request);
        $methods = $reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            if (in_array($method->getName(), $this->ignoreSetters)) {
                continue;
            }

            $params = $method->getParameters();

            if (count($params) !== 1) {
                continue;
            }

            if (strpos($method->getName(), 'set') !== 0 ||
                empty($params[0]->getType()) ||
                class_exists($params[0]->getType())) {
                continue;
            }

            $value = ListRequestsTest::generateValue($params[0]->getType());
            $request->{$method->getName()}($value);
        }

        $url = $request->getUrl();

        $this->assertStringNotContainsString('{', $url);
        $this->assertStringNotContainsString('}', $url);
    }
}