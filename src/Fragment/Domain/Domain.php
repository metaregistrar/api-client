<?php

namespace Metaregistrar\Api\Client\Fragment\Domain;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class Domain
 *
 * @ExclusionPolicy("all")
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.NPathComplexity)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class Domain
{
    /**
     * @var string
     * @Type("string")
     * @SerializedName("name")
     *
     * @Expose
     */
    protected $name;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("roid")
     *
     * @Expose
     */
    protected $roid;

    /**
     * @var string[]
     * @Type("array")
     * @Expose
     */
    protected $status;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("registrant")
     *
     * @Expose
     */
    protected $registrant;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("authorizationCode")
     *
     * @Expose
     */
    protected $authorizationCode;


    /**
     * @var DomainContact[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Domain\DomainContact>")
     *
     * @Expose
     */
    protected $contact;

    /**
     * @var string[]
     * @Type("array<string>")
     * @SerializedName("nameservers")
     *
     * @Expose
     */
    protected $nameservers=[];

    /**
     * @var DomainHost[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Domain\DomainHost>")
     *
     * @Expose
     */
    protected $host;


    /**
     * @var boolean
     * @Type("boolean")
     * @SerializedName("autoRenew")
     *
     * @Expose
     */
    protected $autoRenew;

    /**
     * @var integer
     * @Type("integer")
     * @SerializedName("autoRenewPeriod")
     *
     * @Expose
     */
    protected $autoRenewPeriod;

    /**
     * @var boolean
     * @Type("boolean")
     * @SerializedName("privacy")
     *
     * @Expose
     */
    protected $privacy;


    /**
     * @var SecDnsKeyData[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Domain\SecDnsKeyData>")
     * @SerializedName("keyData")
     *
     * @Expose
     */
    protected $keyData;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("clID")
     *
     * @Expose
     */
    protected $clId;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("crID")
     *
     * @Expose
     */
    protected $crId;

    /**
     * @var \DateTime
     * @Type("DateTime")
     * @SerializedName("crDate")
     * @expose
     */
    protected $crDate;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("upID")
     *
     * @Expose
     */
    protected $upId;

    /**
     * @var \DateTime
     * @Type("DateTime")
     * @SerializedName("upDate")
     * @expose
     */
    protected $upDate;

    /**
     * @var \DateTime
     * @Type("DateTime")
     * @SerializedName("exDate")
     * @expose
     */
    protected $exDate;

    /**
     * @var AuthInfo
     */
    private $authInfo;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("crmId")
     *
     * @Expose
     */
    protected $crmId;

    /**
     * @var array
     * @Type("array")
     * @SerializedName("metadata")
     * @expose
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
     * @return Domain
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCrDate()
    {
        return $this->crDate;
    }

    /**
     * @param \DateTime $crDate
     * @return Domain
     */
    public function setCrDate(\DateTime $crDate)
    {
        $this->crDate = $crDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoid()
    {
        return $this->roid;
    }

    /**
     * @param string $roid
     * @return Domain
     */
    public function setRoid($roid)
    {
        $this->roid = $roid;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpDate()
    {
        return $this->upDate;
    }

    /**
     * @param \DateTime $upDate
     * @return Domain
     */
    public function setUpDate(\DateTime $upDate)
    {
        $this->upDate = $upDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExDate()
    {
        return $this->exDate;
    }

    /**
     * @param \DateTime $exDate
     * @return Domain
     */
    public function setExDate(\DateTime $exDate)
    {
        $this->exDate = $exDate;
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
     * @return Domain
     */
    public function setRegistrant($registrant)
    {
        $this->registrant = $registrant;
        return $this;
    }

    /**
     * @return array
     */
    public function getContacts()
    {
        return $this->contact;
    }

    /**
     * @param DomainContact $contact
     * @return Domain
     */
    public function addContact(DomainContact $contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * @return array
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param array $host
     * @return Domain
     */
    public function setHost(array $host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return array
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param array $status
     * @return Domain
     */
    public function setStatus(array $status)
    {
        $toSet = [];
        foreach ($status as $s) {
            if (is_string($s)) {
                $toSet[] = $s;
            } else {
                $toSet[] = $s['s'];
            }
        }
        $this->status = $toSet;
        return $this;
    }

    /**
     * @return AuthInfo
     */
    public function getAuthInfo()
    {
        return $this->authInfo;
    }

    /**
     * @param AuthInfo $authInfo
     * @return Domain
     */
    public function setAuthInfo(AuthInfo $authInfo)
    {
        $this->authInfo = $authInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * @param string $clId
     * @return Domain
     */
    public function setClId($clId)
    {
        $this->clId = $clId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCrId()
    {
        return $this->crId;
    }

    /**
     * @param string $crId
     * @return Domain
     */
    public function setCrId($crId)
    {
        $this->crId = $crId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpId()
    {
        return $this->upId;
    }

    /**
     * @param string $upId
     * @return Domain
     */
    public function setUpId($upId)
    {
        $this->upId = $upId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAutoRenew()
    {
        return $this->autoRenew;
    }

    /**
     * @param boolean|string $autoRenew
     * @return Domain
     */
    public function setAutoRenew($autoRenew): Domain
    {
        if (is_string($autoRenew) && $autoRenew == 'true') {
            $autoRenew = true;
        } elseif (is_string($autoRenew) && $autoRenew == 'false') {
            $autoRenew = false;
        }
        $this->autoRenew = $autoRenew;
        return $this;
    }

    /**
     * @return integer
     */
    public function getAutoRenewPeriod()
    {
        return $this->autoRenewPeriod;
    }

    /**
     * @param integer $autoRenewPeriod
     * @return Domain
     */
    public function setAutoRenewPeriod(int $autoRenewPeriod): Domain
    {
        $this->autoRenewPeriod = $autoRenewPeriod;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPrivacy()
    {
        return $this->privacy;
    }

    /**
     * @param boolean|string $privacy
     * @return Domain
     */
    public function setPrivacy($privacy): Domain
    {

        if (is_string($privacy) && $privacy == 'true') {
            $privacy = true;
        } elseif (is_string($privacy) && $privacy == 'false') {
            $privacy = false;
        }
        $this->privacy = $privacy;
        return $this;
    }


    /**
     * @param SecDnsInfData $secDns
     * @return Domain
     */
    public function setSecDns(SecDnsInfData $secDns): Domain
    {
//        $this->secDns = $secDns;
        $this->setKeyData($secDns->getKeyData());
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
     * @return Domain
     */
    public function setKeyData(array $keyData): Domain
    {
        $this->keyData = $keyData;
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
     * @param string|null $authorizationCode
     * @return Domain
     */
    public function setAuthorizationCode($authorizationCode): Domain
    {
        $this->authorizationCode = $authorizationCode;
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
     * @return Domain
     */
    public function setNameservers(array $nameservers): Domain
    {
        $this->nameservers = $nameservers;
        return $this;
    }

    /**
     * @return string
     */
    public function getCrmId(): ?string
    {
        return $this->crmId;
    }

    /**
     * @param string|null $crmId
     * @return Domain
     */
    public function setCrmId(?string $crmId): Domain
    {
        $this->crmId = $crmId;
        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param array|null $metadata
     * @return Domain
     */
    public function setMetadata(?array $metadata): Domain
    {
        $this->metadata = $metadata;
        return $this;
    }
}
