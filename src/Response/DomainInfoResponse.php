<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\Domain\Domain;

/**
 * Class DnszoneInfoResponse
 * @package Metaregistrar\Api\Client\Response
 */
#[ExclusionPolicy('all')]
class DomainInfoResponse extends AbstractResponse implements ResponseInterface
{
    /**
     * @var Domain
     */
    #[Type('Metaregistrar\Api\Client\Fragment\Domain\Domain')]
    #[SerializedName('domain')]
    #[Expose]
    #[Description('The domain requested')]
    #[MustBeFilled('yes')]
    protected $domain;

    /**
     * @return Domain
     */
    public function getDomain(): Domain
    {
        return $this->domain;
    }

    /**
     * @param Domain $domain
     * @return DomainInfoResponse
     */
    public function setDomain(Domain $domain): DomainInfoResponse
    {
        $this->domain = $domain;
        return $this;
    }
}
