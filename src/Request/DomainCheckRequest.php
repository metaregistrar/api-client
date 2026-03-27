<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Response\DomainCheckResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 */
#[ExclusionPolicy('all')]
class DomainCheckRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'domain/check';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;


    /**
     * @var string
     */
    protected $expectedResponse = DomainCheckResponse::class;
    /**
     * @var string[]
     * @Description("the name should be an array with IDN domains in punycode format")
     */
    #[Type('array<string>')]
    #[Expose]
    protected $name=[];

    /**
     * @return string[]
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string[] $name
     * @return DomainCheckRequest
     */
    public function setName(array $name): DomainCheckRequest
    {
        $this->name = $name;
        return $this;
    }
}
