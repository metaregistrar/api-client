<?php

namespace Metaregistrar\Api\Client\Tests;

use Metaregistrar\Api\Client\Request\AbstractListRequest;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class ListRequestsTest extends TestCase
{
    protected array $ignoreQueryParameeters = [
        'autorenew', // odd duck, is lowercased
    ];

    public static function provideListRequests(): array
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
                if (!class_exists($className) || !is_subclass_of($className, AbstractListRequest::class)) {
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
     * @dataProvider provideListRequests
     */
    public function testQueryString(string $className): void
    {
        $query = [];
        $reflectionClass = new ReflectionClass($className);
        /** @var AbstractListRequest $request */
        $request = $reflectionClass->newInstanceWithoutConstructor();
        $queryArgs = $request->getAcceptableQueryArgs();

        foreach ($queryArgs as $name => $type) {
            $method = 'set' . ucfirst($name);
            if (!$reflectionClass->hasMethod($method)) {
                continue;
            }

            if (in_array($name, $this->ignoreQueryParameeters)) {
                continue;
            }

            $reflectionMethod = $reflectionClass->getMethod($method);
            $params = $reflectionMethod->getParameters();

            if (count($params) !== 1 || empty($params[0]->getType())) {
                continue;
            }
            $value = self::generateValue($params[0]->getType());
            $request->{$method}($value);

            $query[$name] = $value;
        }

        $url = $request->getUrl();

        foreach ($query as $param => $value) {
            self::assertStringContainsString(http_build_query([$param => $value]), $url, $url);
        }
    }

    /**
     * @param string $type
     * @return array|boolean|float|integer|string
     * @throws ExpectationFailedException
     */
    public static function generateValue(string $type)
    {
        $type = str_replace('?', '', $type);
        if ($type === 'int' || empty($type)) {
            return random_int(0, 99);
        }

        if ($type === 'float') {
            return random_int(1, 99) / 10;
        }

        if ($type === 'bool') {
            return (bool)random_int(0, 1);
        }

        if ($type === 'array') {
            return [random_int(0, 99), random_int(0, 99)];
        }

        if ($type === 'string') {
            return sha1(rand(1, 255));
        }

        throw new ExpectationFailedException('Unsupported value of type: ' . $type);
    }
}