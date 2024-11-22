<?php

namespace Metaregistrar\Api\Client\Fragment\Domain;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class DomainHost
 *
 * @package Metaregistrar\Api\Client\Fragment\Domain
 * @ExclusionPolicy("all")
 * @XmlNamespace(uri="urn:ietf:params:xml:ns:epp-1.0")
 * @XmlNamespace(uri="urn:ietf:params:xml:ns:domain-1.0", prefix="domain")
 */
class DomainHost
{
    /**
     * @var string
     * @Type("string")
     * @XmlValue

     *
     * @Expose
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DomainHost
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
