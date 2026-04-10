<?php

namespace Metaregistrar\Api\Client\Tests\TestTools;

use PHPUnit\Framework\Attributes\TestDox;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use ReflectionProperty;
use RuntimeException;

abstract class ModelTestCase extends TestCase
{
    private const SERIALIZABLE = 'serializable';
    private const ENTITY = 'entity';
    private SerializerInterface $serializer;
    abstract static protected function getIgnoreClasses(): array;
    abstract protected function getIgnoreMethods(): array;
    abstract protected function getIgnoreProperties(): array;
    abstract protected function getDefaultValues(): array;

    public function setUp(): void
    {
        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build();
    }

    #[TestDox('it serialized presentation is the same when all properties have been set')]
    public function assertSerializableClass(string $className): void
    {
        $class = new ReflectionClass($className);
        $serializable = $this->isClassSerializable($class);

        if ($serializable === false) {
            return;
        }

        $json = $this->generateJson($className);
        $data = $this->generateData($className, false);

        $objectPreFilled = $this->serializer->deserialize($json, $className, 'json');
        $objectEmpty = $this->serializer->deserialize('{}', $className, 'json');
        $propList = $this->getMethodListForClass($className);

        $this->assertInstanceOf($className, $objectEmpty);

        foreach ($propList as $property => $gands) {
            $expectedValue = $data[$property];

            if (isset($gands['get'])) {
                $getter = $gands['get'];
                $getValue = $objectPreFilled->$getter();
                $this->assertEquals($expectedValue, $getValue, 'Failed asserting get'. ucfirst($property));
            }

            if (isset($gands['set'])) {
                $setter = $gands['set'];
                $objectEmpty->$setter($expectedValue);
                $setValue = $class->getProperty($property)->getValue($objectEmpty);
                $this->assertSame($expectedValue, $setValue, 'Failed asserting set'. ucfirst($property));
            }

            if (!isset($gands['set'])) {
                 $class->getProperty($property)->setValue($objectEmpty, $expectedValue);
            }
        }

        $origin = json_encode(
            json_decode($this->serializer->serialize($objectPreFilled, 'json'), true),
            JSON_PRETTY_PRINT
        );
        $sample = json_encode(
            json_decode($this->serializer->serialize($objectEmpty, 'json'), true),
            JSON_PRETTY_PRINT
        );
        $this->assertSame($origin, $sample);
    }

    #[TestDox('it returns the value when the value has been set')]
    public function assertEntityClass(string $className): void
    {
        $class = new ReflectionClass($className);
        $isEntity = $this->isClassAnEntity($class);

        if ($isEntity === false) {
            return;
        }

        $data = $this->generateData($className);
        $objectEmpty = $this->serializer->deserialize('{}', $className, 'json');
        $propList = $this->getMethodListForClass($className);

        $this->assertInstanceOf($className, $objectEmpty);

        foreach ($propList as $property => $gands) {
            if (count($gands) !== 2) {
                continue;
            }
            $expectedValue = $data[$property];

            $setter = $gands['set'];
            $getter = $gands['get'];

            $objectEmpty->$setter($expectedValue);

            $this->assertSame($expectedValue, $objectEmpty->$getter(), 'Failed asserting value '. $className . '::' . $property);
        }

        $this->assertGetId($class, $objectEmpty);
    }

    protected function assertGetId(ReflectionClass $class, object $subject): void
    {
        if (!$class->hasProperty('id') || !$class->hasMethod('getId')) {
            return;
        }

        $id = $class->getProperty('id');
        $column = $this->getDoctrineProperty($id);

        $defaults = $this->getDefaultValues();

        if (!array_key_exists($column['type'], $defaults)) {
            throw new RuntimeException("undefined default value: $class->name::id of type ". $column['type']);
        }

        $expectedValue = $defaults[$column['type']];

        $id->setValue($subject, $expectedValue);
        $this->assertSame($expectedValue, $subject->getId());
    }

    protected function getMethodListForClass(string $className): array
    {
        $methodList = get_class_methods($className);

        $propList = [];
        foreach ($methodList as $method) {
            if (in_array($method, $this->getIgnoreMethods())) {
                continue;
            }

            if ($this->skipSetter($className, $method) === true) {
                continue;
            }

            $property = $this->retrieveProperty($className, $method);

            if ($property === null) {
                continue;
            }

            if ($this->skipProperty($className, $property['name']) === true) {
                continue;
            }

            $propList[$property['name']][$property['operator']] = $method;
        }

        return $propList;
    }

    private function retrieveProperty(string $className, string $methodName): ?array
    {
        $class = new ReflectionClass($className);
        $properties = $class->getProperties();
        $propertyList = [];

        foreach ($properties as $property) {
            $propertyList[] = $property->getName();
        }

        $operator = 'get';

        if (preg_match('/^set/', $methodName) === 1) {
            $operator = 'set';
        }

        if (in_array($methodName, $propertyList)) {
            return ['name' => $methodName, 'operator' => $operator];
        }

        $methodStripped = lcfirst(preg_replace('/^(is|get|set|has)/', '', $methodName, 1));
        if (in_array($methodStripped, $propertyList)) {
            return ['name' => $methodStripped, 'operator' => $operator];
        }

        return null;
    }

    private function skipSetter(string $className, string $method): bool
    {
        try {
            $reflection = new ReflectionMethod($className, $method);
        } catch (ReflectionException) {
            return false;
        }

        if (!str_starts_with($method, 'set') && (count($reflection->getParameters()) > 1)) {
            return true;
        }

        return false;
    }

    private function skipProperty(string $className, string $propertyName): bool
    {
        $class = new ReflectionClass($className);
        $parent = $class->getParentClass();

        $classList = [$class];

        if ($parent !== false) {
            $classList[] = $parent;
        }
        $skip = false;

        foreach ($classList as $class) {
            if (in_array($className, $this->getIgnoreProperties()) &&
                in_array($propertyName, $this->getIgnoreProperties()[$className])
            ) {
                $skip = true;
                break;
            }

            if (!$class->hasProperty($propertyName)) {
                continue;
            }

            $property = $class->getProperty($propertyName);

            if ($this->isClassSerializable($class)) {
                return $this->isPropertyExposed($property) === false || $this->hasPropertyDatatype($property) === false;
            }

            break;
        }

        return $skip;
    }

    protected function generateJson($className): string
    {
        $data = $this->generateData($className);

        return $this->serializer->serialize($data, 'json');
    }

    protected function generateData($className, $serializedNames = true): array
    {
        $class = new ReflectionClass($className);
        $isEntity = $this->isClassAnEntity($class);
        $isSerializable = $this->isClassSerializable($class);

        $defaults = $this->getDefaultValues();
        $methods = $this->getMethodListForClass($className);

        $propertyNames = array_keys($methods);
        $data = [];

        foreach ($propertyNames as $propertyName) {
            try {
                $property = $class->getProperty($propertyName);
                $propertyName = $property->getName();
                $column = [];

                if ($isEntity === true) {
                    $column = $this->getDoctrineProperty($property);
                }

                if ($isSerializable === true) {
                    $column = $this->getSerializedProperty($property);
                    $propertyName = $serializedNames ? $column['name'] : $propertyName;
                }

                if (!array_key_exists($column['type'], $defaults)) {
                    throw new RuntimeException("undefined default value: $className::$propertyName of type ". $column['type']);
                }

                $data[$propertyName] = $defaults[$column['type']];
            } catch (ReflectionException) {
            }
        }

        return $data;
    }

    private function getDoctrineProperty(ReflectionProperty $property): array
    {
        $attributes = $property->getAttributes('Doctrine\ORM\Mapping\Column');

        if (empty($attributes)) {
            throw new RuntimeException("unknown datatype for: $property->class::". $property->getName());
        }

        $column = $attributes[0]->newInstance();

        return ['name' => $column->name, 'type' => $column->type];
    }

    protected static function isClassAnEntity(ReflectionClass $class): bool
    {
        $attributes = $class->getAttributes('\Doctrine\ORM\Mapping\Entity');
        return !empty($attributes);
    }

    protected static function isClassSerializable(ReflectionClass $class): bool
    {
        $properties = $class->getProperties();

        foreach ($properties as $property) {
            $attributes = $property->getAttributes(Serializer\Type::class);

            if (!empty($attributes)) {
                return true;
            }
        }

        return false;
    }

    private function isPropertyExposed(ReflectionProperty $property): bool
    {
        $attributes = $property->getDeclaringClass()->getAttributes(Serializer\ExclusionPolicy::class);

        if (empty($attributes) || $attributes[0]->newInstance()->policy !== Serializer\ExclusionPolicy::ALL) {
            return false;
        }

        $attributes = $property->getAttributes(Serializer\Expose::class);

        return !empty($attributes);
    }

    private function hasPropertyDatatype(ReflectionProperty $property): bool
    {
        try {
            $this->getSerializedProperty($property);
        } catch (RuntimeException) {
            return false;
        }

        return true;
    }

    private function getSerializedProperty(ReflectionProperty $property): array
    {
        $propertyName = $property->getName();
        $attributes = $property->getAttributes(Serializer\Type::class);

        if (empty($attributes)) {
            throw new RuntimeException("unknown datatype for: $property->class::$propertyName");
        }
        $serializedType = $attributes[0]->newInstance();

        $attributes = $property->getAttributes(Serializer\SerializedName::class);

        if (!empty($attributes)) {
            $propertyName = $attributes[0]->newInstance()->name;
        }

        return ['name' => $propertyName, 'type' => $serializedType->name];
    }

    public static function getSubdirectories(array $directories): array
    {
        $subDirectories = [];

        foreach ($directories as $directory) {
            $handle = opendir($directory['path']);
            while ($subDirectory = readdir($handle)) {
                if ($subDirectory === '.' || $subDirectory === '..') {
                    continue;
                }

                $path = $directory['path'] . $subDirectory . DIRECTORY_SEPARATOR;

                if (!is_dir($path)) {
                    continue;
                }

                $subDirectories[] = [
                    'path' => $path,
                    'namespace' => $directory['namespace'] . $subDirectory . '\\',
                ];
            }
        }

        return $subDirectories;
    }

    #[TestDox('gets class files in directory and filters non-serializable classes')]
    public static function getSerializableClassFiles(array $directories): array
    {
        return self::getClassFiles($directories, self::SERIALIZABLE);
    }

    #[TestDox('gets class files in directory and filters non entity classes')]
    public static function getEntityClassFiles(array $directories): array
    {
        return self::getClassFiles($directories, self::ENTITY);
    }

    private static function getClassFiles(array $directories, ?string $type = null): array
    {
        $files = [];

        foreach ($directories as $directory) {
            $d = opendir($directory['path']);

            while ($file = readdir($d)) {
                if (!str_ends_with($file, '.php')) {
                    continue;
                }

                $filepath = $directory['path'] . DIRECTORY_SEPARATOR . $file;

                if (!is_file($filepath)) {
                    continue;
                }

                $class = basename($filepath, '.php');
                $className = $directory['namespace'] . $class;
                if (!class_exists($className) || in_array($className, static::getIgnoreClasses())) {
                    continue;
                }

                $reflectionClass = new ReflectionClass($className);
                if ($reflectionClass->isAbstract() === true) {
                    continue;
                }

                if ($type === self::SERIALIZABLE && !static::isClassSerializable($reflectionClass)) {
                    continue;
                }

                if ($type === self::ENTITY && !static::isClassAnEntity($reflectionClass)) {
                    continue;
                }

                $files[$className] = [$className, $filepath];
            }
            closedir($d);
        }

        return $files;
    }
}
