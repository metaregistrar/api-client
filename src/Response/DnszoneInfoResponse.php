<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\Dns\Zone;

/**
 * Class DnszoneInfoResponse
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
class DnszoneInfoResponse extends AbstractResponse implements ResponseInterface
{
    /**
     * @var Zone
     * @Type("Metaregistrar\Api\Client\Fragment\Dns\Zone")
     * @Description("The zone requested")
     * @SerializedName("dnsZone")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $dnsZone;

    /**
     * @return Zone
     */
    public function getDnsZone(): Zone
    {
        return $this->dnsZone;
    }

    /**
     * @param Zone $dnsZone
     * @return DnszoneInfoResponse
     */
    public function setDnsZone(Zone $dnsZone): DnszoneInfoResponse
    {
        $this->dnsZone = $dnsZone;
        return $this;
    }
}
