<?php

namespace Metaregistrar\Api\Client;

use Exception;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Metaregistrar\Api\Client\Request\RequestInterface;
use Metaregistrar\Api\Client\Response\ResponseInterface;

/**
 * Class Translator
 * @package Metaregistrar\Api\Client
 */
class Translator
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * Translator constructor.
     * @param Serializer| null $serializer
     */
    public function __construct($serializer = null)
    {
        if (is_null($serializer)) {
            $serializer = SerializerBuilder::create()->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
                ->build();
        }
        $this->serializer = $serializer;
    }

    /**
     * @return Serializer
     */
    public function getSerializer(): ?Serializer
    {
        return $this->serializer;
    }

    /**
     * @param Serializer|null $serializer
     * @return void
     */
    public function setSerializer(?Serializer $serializer): void
    {
        $this->serializer = $serializer;
    }

    /**
     * @param RequestInterface $object
     * @return string
     */
    public function serialize(RequestInterface $object)
    {
        return $this->serializer->serialize($object, 'json');
    }

    /**
     * @param string $string
     * @param string $class
     * @return ResponseInterface
     */
    public function deserialize($string, $class)
    {
        try {
            return $this->serializer->deserialize($string, $class, 'json');
        } catch (Exception $exception) {
            return null;
        }
    }
}
