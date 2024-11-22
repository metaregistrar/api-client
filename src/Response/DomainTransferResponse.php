<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\Domain\Domain;
use Metaregistrar\Api\Client\Fragment\Domain\DomainTransfer;

/**
 * Class DomainTransferResponse
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
class DomainTransferResponse extends AbstractResponse implements ResponseInterface
{
    /**
     * @var DomainTransfer
     * @Type("Metaregistrar\Api\Client\Fragment\Domain\DomainTransfer")
     * @Description("The domain requested")
     * @SerializedName("domain")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $transfer;

    /**
     * @return DomainTransfer
     */
    public function getTransfer(): DomainTransfer
    {
        return $this->transfer;
    }

    /**
     * @param DomainTransfer $transfer
     * @return DomainTransferResponse
     */
    public function setTransfer(DomainTransfer $transfer): DomainTransferResponse
    {
        $this->transfer = $transfer;
        return $this;
    }
}
