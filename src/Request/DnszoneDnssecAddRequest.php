<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Response\DnszoneDnssecAddResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DnszoneDnssecAddRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'dnszone/{name}/dnssec';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;

    /**
     * @var string
     * @MustBeFilled("You must supply a hostname")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $name='';
    /**
     * @var array
     */
    protected $acceptableArgs = [
        "name" => "string"
    ];


    /**
     * @var string
     */
    protected $expectedResponse = DnszoneDnssecAddResponse::class;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DnszoneDnssecAddRequest
     */
    public function setName(string $name): DnszoneDnssecAddRequest
    {
        $this->name = $name;
        return $this;
    }
}
