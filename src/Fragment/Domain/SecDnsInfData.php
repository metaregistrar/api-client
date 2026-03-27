<?php

namespace Metaregistrar\Api\Client\Fragment\Domain;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class SecDnsInfData
 *
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.NPathComplexity)
 */
#[ExclusionPolicy('all')]
class SecDnsInfData
{
    /**
     * @var SecDnsKeyData[]
     */
    #[Type('array<Metaregistrar\Api\Client\Fragment\Domain\SecDnsKeyData>')]
    #[Expose]
    protected $keyData=[];

    /**
     * @return SecDnsKeyData[]
     */
    public function getKeyData()
    {
        return $this->keyData;
    }

    /**
     * @param SecDnsKeyData[] $keyData
     * @return SecDnsInfData
     */
    public function setKeyData(array $keyData): SecDnsInfData
    {
        $this->keyData = $keyData;
        return $this;
    }
}
