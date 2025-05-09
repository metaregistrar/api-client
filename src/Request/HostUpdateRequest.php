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
use Metaregistrar\Api\Client\Response\HostInfoResponse;

/**
 * Class HostInfoRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class HostUpdateRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url ='domain/{name}/host/{hostname}';
    /**
     * @var string
     */
    protected $method = self::METHOD_PATCH;

    /**
     * @var string
     * @MustBeFilled("yes")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $name = '';
    /**
     * @var string
     * @MustBeFilled("yes")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $hostname = '';

    /**
     * @var string
     */
    protected $expectedResponse = HostInfoResponse::class;

    /**
     * @var Addr[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Host\Addr>")
     * @MustBeFilled("yes")
     * @Description("The Ip addresses to be added")
     * @Expose
     */
    protected $add = [];

    /**
     * @var Addr[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Host\Addr>")
     * @MustBeFilled("yes")
     * @Description("The Ip addresses to be removed")
     * @Expose
     */
    protected $rem = [];
    /**
     * @var array
     */
    protected $acceptableArgs = [
        "name" => "string",
        "hostname" => "string"
    ];

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DomainInfoRequest
     */
    public function setName(string $name): HostUpdateRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname
     * @return HostInfoRequest
     */
    public function setHostname(string $hostname): HostUpdateRequest
    {
        $this->hostname = $hostname;
        return $this;
    }

    /**
     * @return Addr[]
     */
    public function getAdd()
    {
        return $this->add;
    }

    /**
     * @param Addr[] $add
     * @return HostUpdateRequest
     */
    public function setAdd(array $add): HostUpdateRequest
    {
        $this->add = $add;
        return $this;
    }

    /**
     * @return Addr[]
     */
    public function getRem()
    {
        return $this->rem;
    }

    /**
     * @param Addr[] $rem
     * @return HostUpdateRequest
     */
    public function setRem(array $rem): HostUpdateRequest
    {
        $this->rem = $rem;
        return $this;
    }
}
