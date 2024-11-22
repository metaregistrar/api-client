<?php

namespace Metaregistrar\Api\Client\Fragment\Contact;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class Contact
 *
 * @package Metaregistrar\Api\Client\Fragment\Contact
 * @ExclusionPolicy("all")
 */
class Contact
{

    /**
     * @var string
     * @Type("string")
     * @SerializedName("id")
     *
     * @Expose
     */
    protected $id;

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
     *
     * @Expose
     */
    protected $status;

    /**
     * @var PostalInfo
     * @Type("Metaregistrar\Api\Client\Fragment\Contact\PostalInfo")
     * @SerializedName("postalInfo")
     *
     * @Expose
     */
    protected $postalInfo;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("voice")
     *
     * @Expose
     */
    protected $voice;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("fax")
     *
     * @Expose
     */
    protected $fax;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("email")
     *
     * @Expose
     */
    protected $email;


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
     * @var ContactProperty[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Contact\ContactProperty>")
     * @SerializedName("property")
     * @expose
     */
    protected $property;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Contact
     */
    public function setId(string $id): Contact
    {
        $this->id = $id;
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
     * @return Contact
     */
    public function setRoid(string $roid): Contact
    {
        $this->roid = $roid;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param array $status
     * @return Contact
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
     * @return PostalInfo
     */
    public function getPostalInfo(): PostalInfo
    {
        return $this->postalInfo;
    }

    /**
     * @param PostalInfo $postalInfo
     * @return Contact
     */
    public function setPostalInfo(PostalInfo $postalInfo): Contact
    {
        $this->postalInfo = $postalInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getVoice()
    {
        return $this->voice;
    }

    /**
     * @param string $voice
     * @return Contact
     */
    public function setVoice(string $voice): Contact
    {
        $this->voice = $voice;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return Contact
     */
    public function setFax(string $fax): Contact
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        $this->email = $email;
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
     * @return Contact
     */
    public function setClId(string $clId): Contact
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
     * @return Contact
     */
    public function setCrId(string $crId): Contact
    {
        $this->crId = $crId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCrDate(): \DateTime
    {
        return $this->crDate;
    }

    /**
     * @param \DateTime $crDate
     * @return Contact
     */
    public function setCrDate(\DateTime $crDate): Contact
    {
        $this->crDate = $crDate;
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
     * @return Contact
     */
    public function setUpId(string $upId): Contact
    {
        $this->upId = $upId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpDate(): \DateTime
    {
        return $this->upDate;
    }

    /**
     * @param \DateTime $upDate
     * @return Contact
     */
    public function setUpDate(\DateTime $upDate): Contact
    {
        $this->upDate = $upDate;
        return $this;
    }

    /**
     * @return ContactProperty[]
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param ContactProperty[] $property
     * @return Contact
     */
    public function setProperty(array $property): Contact
    {

        $this->property = $property;
        return $this;
    }

    /**
     * @param array $properties
     * @return void
     */
    public function setProperties(array $properties)
    {
        $props = [];
        foreach ($properties as $property) {
            if (is_array($property)) {
                $prop = new ContactProperty();
                $prop->setName($property['name']);
                $prop->setRegistry($property['registry']);
                $prop->setValue($property['value']);
            } else {
                $prop = new ContactProperty();
                $prop->setName($property->getName());
                $prop->setRegistry($property->getRegistry());
                $prop->setValue($property->getValue());
            }
            $props[] = $prop;
        }
        $this->setProperty($props);
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
     * @return Contact
     */
    public function setCrmId(?string $crmId): Contact
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
     * @return Contact
     */
    public function setMetadata(?array $metadata): Contact
    {
        $this->metadata = $metadata;
        return $this;
    }
}
