<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Fragment\Domain\DomainContact;
use Metaregistrar\Api\Client\Response\DomainTransferResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DomainTransferRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url ='domain/transfer';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;


    /**
     * @var string
     */
    protected $expectedResponse = DomainTransferResponse::class;
    /**
     * @var string
     * @Type("string")
     * @MustBeFilled("You must supply a name for the domain")
     * @Description("the name should be a IDN domain in punycode format")
     * @Expose
     */
    protected $name='';

    /**
     * @var string
     * @Type("string")
     * @MustBeFilled("You must supply an authcode")
     * @Expose
     */
    protected $authorizationCode;

    /**
     * @var string
     * @Type("string")
     * @MustBeFilled("You must supply a handle for the registrant")
     * @Expose
     */
    protected $registrant='';

    /**
     * @var DomainContact[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Domain\DomainContact>")
     * @Expose
     */
    protected $contact = [];


    /**
     * @var string[]
     * @Type("array<string>")
     * @SerializedName("nameservers")
     * @MustBeFilled("You must supply nameservers in puny code")
     * @Expose
     */
    protected $nameservers;


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
    public function setName(string $name): DomainTransferRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegistrant()
    {
        return $this->registrant;
    }

    /**
     * @param string $registrant
     * @return DomainCreateRequest
     */
    public function setRegistrant(string $registrant): DomainTransferRequest
    {
        $this->registrant = $registrant;
        return $this;
    }

    /**
     * @return DomainContact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param DomainContact[] $contact
     * @return DomainCreateRequest
     */
    public function setContact(array $contact): DomainTransferRequest
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @param string $authorizationCode
     * @return DomainTransferRequest
     */
    public function setAuthorizationCode(string $authorizationCode): DomainTransferRequest
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getNameservers()
    {
        return $this->nameservers??[];
    }

    /**
     * @param string[] $nameservers
     * @return DomainTransferRequest
     */
    public function setNameservers(array $nameservers): DomainTransferRequest
    {
        $this->nameservers = $nameservers;
        return $this;
    }
}
