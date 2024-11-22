<?php
namespace Metaregistrar\Api\Client\Fragment\Domain;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlNamespace;

/**
 * Class Chg
 *
 * @package Metaregistrar\Api\Client\Fragment\Domain
 * @ExclusionPolicy("all")
 * @XmlNamespace(uri="urn:ietf:params:xml:ns:epp-1.0")
 * @XmlNamespace(uri="urn:ietf:params:xml:ns:domain-1.0", prefix="domain")
 */
class Chg
{
    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("registrant")
     *
     * @Expose
     */
    protected $registrant;
    /**
     * @var boolean|null
     * @Type("boolean")
     * @SerializedName("privacy")
     *
     * @Expose
     */
    protected $privacy;

    /**
     * @var boolean|null
     * @Type("boolean")
     * @SerializedName("autoRenew")
     *
     * @Expose
     */
    protected $autoRenew;
    /**
     * @var boolean|null
     * @Type("boolean")
     * @SerializedName("regenerateAuthcode")
     *
     * @Expose
     */
    protected $regenerateAuthcode;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("crmId")
     *
     * @Expose
     */
    protected $crmId;

    /**
     * @var array|null
     * @Type("array")
     * @SerializedName("metadata")
     *
     * @Expose
     */
    protected $metadata;
    /**
     * @return string|null
     */
    public function getRegistrant(): ?string
    {
        return $this->registrant;
    }

    /**
     * @param string|null $registrant
     * @return Chg
     */
    public function setRegistrant(?string $registrant): Chg
    {
        $this->registrant = $registrant;
        return $this;
    }

    /**
     * @return boolean|null
     */
    public function getPrivacy(): ?bool
    {
        return $this->privacy;
    }

    /**
     * @param boolean|null $privacy
     * @return Chg
     */
    public function setPrivacy(?bool $privacy): Chg
    {
        $this->privacy = $privacy;
        return $this;
    }

    /**
     * @return boolean|null
     */
    public function getAutoRenew(): ?bool
    {
        return $this->autoRenew;
    }

    /**
     * @param boolean|null $autoRenew
     * @return Chg
     */
    public function setAutoRenew(?bool $autoRenew): Chg
    {
        $this->autoRenew = $autoRenew;
        return $this;
    }

    /**
     * @return boolean|null
     */
    public function getRegenerateAuthcode(): ?bool
    {
        return $this->regenerateAuthcode;
    }

    /**
     * @param boolean|null $regenerateAuthcode
     * @return Chg
     */
    public function setRegenerateAuthcode(?bool $regenerateAuthcode): Chg
    {
        $this->regenerateAuthcode = $regenerateAuthcode;
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
     * @return Chg
     */
    public function setCrmId(?string $crmId): Chg
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
     * @return Chg
     */
    public function setMetadata(?array $metadata): Chg
    {
        $this->metadata = $metadata;
        return $this;
    }
}
