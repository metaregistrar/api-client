<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Fragment\Dns\Add;
use Metaregistrar\Api\Client\Fragment\Dns\Content;
use Metaregistrar\Api\Client\Fragment\Dns\Rem;
use Metaregistrar\Api\Client\Response\DnszoneUpdateResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DnszoneUpdateRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'dnszone/{name}';
    /**
     * @var string
     */
    protected $method = self::METHOD_PATCH;


    /**
     * @var string
     * @MustBeFilled("You must supply a name for the zone")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $name='';
    /**
     * @var array
     */
    protected $acceptableArgs = [
        "name" => "string"
    ];

    /**
     * @var Content[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Dns\Content>")
     *
     * @Expose
     */
    protected $add=[];

    /**
     * @var Content[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Dns\Content>")
     *
     * @Expose
     */
    protected $rem=[];

    /**
     * @var string
     */
    protected $expectedResponse = DnszoneUpdateResponse::class;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DnszoneUpdateRequest
     */
    public function setName(string $name): DnszoneUpdateRequest
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return Content[]
     */
    public function getAdd()
    {
        return $this->add;
    }

    /**
     * @param Content[] $add
     * @return DnszoneUpdateRequest
     */
    public function setAdd(array $add): DnszoneUpdateRequest
    {
        $this->add = $add;
        return $this;
    }

    /**
     * @return Content[]
     */
    public function getRem()
    {
        return $this->rem;
    }

    /**
     * @param Content[] $rem
     * @return DnszoneUpdateRequest
     */
    public function setRem(array $rem): DnszoneUpdateRequest
    {
        $this->rem = $rem;
        return $this;
    }
}
