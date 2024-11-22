<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Fragment\Domain\Domain;

/**
 * Class DnszoneInfoResponse
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
class DomainRenewResponse extends DomainInfoResponse implements ResponseInterface
{
    /**
     * @param Domain $domain
     * @return $this
     */
    public function setDomain(Domain $domain): DomainRenewResponse
    {
        parent::setDomain($domain);

        return $this;
    }
}
