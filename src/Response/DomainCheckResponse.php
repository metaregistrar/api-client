<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\Domain\CheckResult;

/**
 * Class DnszoneInfoResponse
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
class DomainCheckResponse extends AbstractResponse implements ResponseInterface
{


    /**
     * @var CheckResult[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Domain\CheckResult>")
     * @Description("The results of the domain check")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $results;

    /**
     * @var CheckResult[];
     */
    private $tempResults = [];

    /**
     * @var array
     */
    private $baseChkData = [];

    /**
     * @var array
     */
    private $extCheckData = [];

    /**
     * @param array $baseChkData
     * @return void
     */
    public function setBaseChkData(array $baseChkData)
    {
        $this->baseChkData = $baseChkData;
        foreach ($this->baseChkData['domainCd'] as $res) {
            $c = new CheckResult();
            $name = $res['name']['name']??'unknown';
            $c->setName($name);
            $c->setAvailable($res['name']['avail']??false);
            $c->setReason($res['reason']['reason']??'Unknown');
            $this->tempResults[$name]=$c;
        }
        $this->results = array_values($this->tempResults);
    }
    /**
     * @param array|mixed $extCheckData
     * @return DomainCheckResponse
     */
    public function setExtCheckData($extCheckData): DomainCheckResponse
    {

        $this->extCheckData = $extCheckData;

        foreach ($this->extCheckData['cd'] as $res) {
            $name = $res['name']??'unknown';
            if (!isset($this->tempResults[$name])) {
                $c = new CheckResult();
                $c->setName($name);
                $c->setAvailable(false);
                $c->setReason("Unknown");
            } else {
                $c = $this->tempResults[$name];
            }
            $c->setPremium($res['premium']??false);
            $c->setPremiumPrice($res['premiumPrice']??null);
            $c->setPremiumPriceCurrency($res['premiumCurrency']??null);
            $c->setPremiumPriceMessage($res['premiumPriceMessage']??null);

            $this->tempResults[$name]=$c;
        }
        $this->results = array_values($this->tempResults);
        return $this;
    }

    /**
     * @return CheckResult[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param CheckResult[] $results
     * @return DomainCheckResponse
     */
    public function setResults(array $results): DomainCheckResponse
    {
        $this->results = $results;
        return $this;
    }
}
