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
use Metaregistrar\Api\Client\Response\DomainCreateResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DomainCreateRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'domain';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;


    /**
     * @var string
     */
    protected $expectedResponse = DomainCreateResponse::class;
    /**
     * @var string
     * @Type("string")
     * @MustBeFilled("You must supply a name for the domain")
     * @Description("the name should be a IDN domain in punycode format")
     * @Expose
     */
    protected $name = '';

    /**
     * @var string
     * @Type("string")
     * @MustBeFilled("You must supply a handle for the registrant")
     * @Expose
     */
    protected $registrant = '';

    /**
     * @var DomainContact[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Domain\DomainContact>")
     *
     * @Expose
     */
    protected $contact = [];


    /**
     * @var string[]
     * @Type("array<string>")
     * @SerializedName("nameservers")
     * @MustBeFilled("You must supply a nameservers in in puny code")
     * @Expose
     */
    protected $nameservers;

    /**
     * @var string|null
     * @Type("string")
     * @Expose
     */
    protected $crmId;
    /**
     * @var array|null
     * @Type("array")
     * @Expose
     */
    protected $metadata;

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
    public function setName(string $name): DomainCreateRequest
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
    public function setRegistrant(string $registrant): DomainCreateRequest
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
    public function setContact(array $contact): DomainCreateRequest
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getNameservers()
    {
        return $this->nameservers;
    }

    /**
     * @param string[] $nameservers
     * @return DomainCreateRequest
     */
    public function setNameservers(array $nameservers): DomainCreateRequest
    {
        $this->nameservers = $nameservers;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCrmId(): ?string
    {
        return $this->crmId;
    }

    /**
     * @param string|null $crmId
     * @return DomainCreateRequest
     */
    public function setCrmId(?string $crmId): DomainCreateRequest
    {
        $this->crmId = $crmId;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param array|null $metadata
     * @return DomainCreateRequest
     */
    public function setMetadata(?array $metadata): DomainCreateRequest
    {
        $this->metadata = $metadata;
        return $this;
    }
}
