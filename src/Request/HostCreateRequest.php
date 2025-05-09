<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Fragment\Host\Addr;
use Metaregistrar\Api\Client\Response\HostCreateResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class HostCreateRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'domain/{name}/host';

    /**
     * @var string
     */
    protected $method = self::METHOD_POST;


    /**
     * @var string
     */
    protected $expectedResponse = HostCreateResponse::class;

    /**
     * @var array
     */
    protected $acceptableArgs = [
        "name" => "string"
    ];

    /**
     * @var string
     * @MustBeFilled("yes")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $name = '';

    /**
     * @var string
     * @Type("string")
     * @MustBeFilled("You must supply a name for the domain")
     * @Description("the name should be a IDN domain in punycode format")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $hostname='';


    /**
     * @var Addr[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Host\Addr>")
     * @MustBeFilled("yes")
     * @Description("The Ip addresses attached to the ")
     * @Expose
     */
    protected $addr = [];

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname
     * @return HostCreateRequest
     */
    public function setHostname(string $hostname): HostCreateRequest
    {
        $this->hostname = $hostname;
        return $this;
    }

    /**
     * @return Addr[]
     */
    public function getAddr()
    {
        return $this->addr;
    }

    /**
     * @param Addr[] $addr
     * @return HostCreateRequest
     */
    public function setAddr(array $addr): HostCreateRequest
    {
        $this->addr = $addr;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
