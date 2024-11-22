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
use Metaregistrar\Api\Client\Response\DnszoneDnssecRemoveResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DnszoneDnssecRemoveRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'dnszone/{name}/dnssec';
    /**
     * @var string
     */
    protected $method = self::METHOD_DELETE;

    /**
     * @var string
     * @MustBeFilled("You must supply a name for the zone")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $name='';
    /**
     * @var array
     */
    protected $acceptableArgs = [
        "name"=>"string"
    ];

    /**
     * @var string
     */
    protected $expectedResponse = DnszoneDnssecRemoveResponse::class;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DnszoneDnssecRemoveRequest
     */
    public function setName(string $name): DnszoneDnssecRemoveRequest
    {
        $this->name = $name;
        return $this;
    }
}
