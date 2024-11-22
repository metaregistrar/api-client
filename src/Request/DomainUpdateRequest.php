<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Fragment\Domain\Add;
use Metaregistrar\Api\Client\Fragment\Domain\Chg;
use Metaregistrar\Api\Client\Fragment\Domain\Rem;
use Metaregistrar\Api\Client\Response\DomainUpdateResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DomainUpdateRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url ='domain/{name}';
    /**
     * @var string
     */
    protected $method = self::METHOD_PATCH;


    /**
     * @var string
     */
    protected $expectedResponse = DomainUpdateResponse::class;


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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DomainCreateRequest
     */
    public function setName(string $name): DomainUpdateRequest
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @var Chg
     * @Type("Metaregistrar\Api\Client\Fragment\Domain\Chg")
     *
     * @Expose
     */
    protected $chg;
    /**
     * @var Add
     * @Type("Metaregistrar\Api\Client\Fragment\Domain\Add")
     *
     * @Expose
     */
    protected $add;

    /**
     * @var Rem
     * @Type("Metaregistrar\Api\Client\Fragment\Domain\Rem")
     *
     * @Expose
     */
    protected $rem;

    /**
     * @return Chg
     */
    public function getChg()
    {
        return $this->chg;
    }

    /**
     * @param Chg $chg
     * @return DomainUpdateRequest
     */
    public function setChg(Chg $chg): DomainUpdateRequest
    {
        $this->chg = $chg;
        return $this;
    }

    /**
     * @return Add
     */
    public function getAdd()
    {
        return $this->add;
    }

    /**
     * @param Add $add
     * @return DomainUpdateRequest
     */
    public function setAdd(Add $add): DomainUpdateRequest
    {
        $this->add = $add;
        return $this;
    }

    /**
     * @return Rem
     */
    public function getRem()
    {
        return $this->rem;
    }

    /**
     * @param Rem $rem
     * @return DomainUpdateRequest
     */
    public function setRem(Rem $rem): DomainUpdateRequest
    {
        $this->rem = $rem;
        return $this;
    }
}
