<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Response\DomainRenewResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DomainRenewRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'domain/{name}';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;


    /**
     * @var string
     */
    protected $expectedResponse = DomainRenewResponse::class;
    /**
     * @var string
     * @MustBeFilled("yes")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $name='';


    /**
     * @var array
     */
    protected $acceptableArgs = [
        "name"=>"string"
    ];

    /**
     * @var integer
     * @Type("integer")
     * @MustBeFilled("You must supply a period in months")
     * @Expose
     */
    protected $period=12;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DomainRenewRequest
     */
    public function setName(string $name): DomainRenewRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param integer $period
     * @return DomainRenewRequest
     */
    public function setPeriod(int $period): DomainRenewRequest
    {
        $this->period = $period;
        return $this;
    }
}
