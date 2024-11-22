<?php

namespace Metaregistrar\Api\Client\Fragment\Host;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class Addr
 *
 * @package Metaregistrar\Api\Client\Fragment\Host
 * @ExclusionPolicy("all")
 */
class Addr
{
    /**
     * @var string
     * @Type("string")
     * @Expose
     */
    protected $ipAddress;

    /**
     * @var string
     * @Type("string")
     *
     * @Expose
     */
    protected $ip = 'v4';

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return Addr
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return Addr
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }
}
