<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\Host\Host;

/**
 * Class HostInfoResponse
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
class HostInfoResponse extends AbstractResponse implements ResponseInterface
{
    /**
     * @var Host
     * @Type("Metaregistrar\Api\Client\Fragment\Host\Host")
     * @Description("The host requested")
     * @SerializedName("host")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $host;

    /**
     * @return Host
     */
    public function getHost(): Host
    {
        return $this->host;
    }

    /**
     * @param Host $host
     * @return HostInfoResponse
     */
    public function setHost(Host $host): HostInfoResponse
    {
        $this->host = $host;
        return $this;
    }
}
