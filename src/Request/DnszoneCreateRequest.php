<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Fragment\Dns\Content;
use Metaregistrar\Api\Client\Response\DnszoneCreateResponse;

/**
 * Class DnszoneCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DnszoneCreateRequest extends AbstractRequest
{

    /**
     * @var string
     */
    protected $url = 'dnszone';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;


    /**
     * @var string
     * @Type("string")
     * @MustBeFilled("You must supply a name for the zone")
     * @Description("the name should be a IDN domain in punycode format")
     * @Expose
     */
    protected $name='';


    /**
     * @var boolean
     * @Type("boolean")
     * @Expose
     */
    protected $premium = false;


    /**
     * @var Content[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Dns\Content>")
     *
     * @Expose
     */
    protected $records = [];


    /**
     * @var string
     */
    protected $expectedResponse = DnszoneCreateResponse::class;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DnszoneCreateRequest
     */
    public function setName(string $name): DnszoneCreateRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPremium()
    {
        return $this->premium;
    }

    /**
     * @param boolean $premium
     * @return DnszoneCreateRequest
     */
    public function setPremium(bool $premium): DnszoneCreateRequest
    {
        $this->premium = $premium;
        return $this;
    }

    /**
     * @return Content[]
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * @param Content[] $records
     * @return DnszoneCreateRequest
     */
    public function setRecords(array $records): DnszoneCreateRequest
    {
        $this->records = $records;
        return $this;
    }
}
