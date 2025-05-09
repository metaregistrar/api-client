<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Response\HostInfoResponse;

/**
 * Class HostInfoRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class HostInfoRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url ='domain/{name}/host/{hostname}';
    /**
     * @var string
     */
    protected $method = self::METHOD_GET;

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
    public function setName(string $name): HostInfoRequest
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
    public function setHostname(string $hostname): HostInfoRequest
    {
        $this->hostname = $hostname;
        return $this;
    }
}
