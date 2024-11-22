<?php

namespace Metaregistrar\Api\Client\Fragment\Domain;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlNamespace;

/**
 * Class Add
 *
 * @package Metaregistrar\Api\Client\Fragment\Domain
 * @ExclusionPolicy("all")
 * @XmlNamespace(uri="urn:ietf:params:xml:ns:epp-1.0")
 * @XmlNamespace(uri="urn:ietf:params:xml:ns:domain-1.0", prefix="domain")
 */
class Add
{
    /**
     * @var string[]
     * @Type("array<string>")
     * @SerializedName("nameservers")

     *
     * @Expose
     */
    protected $nameservers;

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
     *
     * @Expose
     */
    protected $status = [];


    /**
     * @var SecDnsKeyData[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Domain\SecDnsKeyData>")
     *
     * @Expose
     */
    protected $keyData = [];

    /**
     * @return string[]
     */
    public function getNameservers()
    {
        return $this->nameservers;
    }

    /**
     * @param string[] $nameservers
     * @return Add
     */
    public function setNameservers(array $nameservers): Add
    {
        $this->nameservers = $nameservers;
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
     * @return Add
     */
    public function setContact(array $contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string[] $status
     * @return Add
     */
    public function setStatus(array $status)
    {
        $this->status = $status;
        return $this;
    }



    /**
     * @return SecDnsKeyData[]
     */
    public function getKeyData()
    {
        return $this->keyData;
    }

    /**
     * @param SecDnsKeyData[] $keyData
     * @return Add
     */
    public function setKeyData(array $keyData): Add
    {
        $this->keyData = $keyData;
        return $this;
    }
}
