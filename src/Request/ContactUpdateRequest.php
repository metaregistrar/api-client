<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Fragment\Contact\ContactProperty;
use Metaregistrar\Api\Client\Fragment\Contact\PostalInfo;
use Metaregistrar\Api\Client\Response\ContactUpdateResponse;

/**
 * Class ContactUpdateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class ContactUpdateRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'contact';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;

    /**
     * @var string
     * @MustBeFilled("yes")
     */
    protected $id='';

    /**
     * @var array
     */
    protected $acceptableArgs = [
        "id"=>"string"
    ];
    /**
     * @var string
     */
    protected $expectedResponse = ContactUpdateResponse::class;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ContactUpdateRequest
     */
    public function setId(string $id): ContactUpdateRequest
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @var PostalInfo
     * @Type("Metaregistrar\Api\Client\Fragment\Contact\PostalInfo")
     * @SerializedName("postalInfo")
     * @Expose
     */
    protected $postalInfo;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("voice")
     * @Expose
     */
    protected $voice;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("fax")
     * @Expose
     */
    protected $fax;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("email")
     * @Expose
     */
    protected $email;

    /**
     * @var ContactProperty[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Contact\ContactProperty>")
     * @SerializedName("property")
     * @Expose
     */
    protected $property;


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
     * @return PostalInfo|null
     */
    public function getPostalInfo(): ?PostalInfo
    {
        return $this->postalInfo;
    }

    /**
     * @param PostalInfo $postalInfo
     * @return ContactCreateRequest
     */
    public function setPostalInfo(PostalInfo $postalInfo): ContactUpdateRequest
    {
        $this->postalInfo = $postalInfo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVoice(): ?string
    {
        return $this->voice;
    }

    /**
     * @param string|null $voice
     * @return ContactCreateRequest
     */
    public function setVoice(?string $voice): ContactUpdateRequest
    {
        $this->voice = $voice;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     * @return ContactCreateRequest
     */
    public function setFax(?string $fax): ContactUpdateRequest
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return ContactCreateRequest
     */
    public function setEmail(?string $email): ContactUpdateRequest
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return ContactProperty[]|null
     */
    public function getProperty(): ?array
    {
        return $this->property;
    }

    /**
     * @param ContactProperty[]|null $property
     * @return ContactUpdateRequest
     */
    public function setProperty(?array $property): ContactUpdateRequest
    {
        $this->property = $property;
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
     * @return ContactUpdateRequest
     */
    public function setCrmId(?string $crmId): ContactUpdateRequest
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
     * @return ContactUpdateRequest
     */
    public function setMetadata(?array $metadata): ContactUpdateRequest
    {
        $this->metadata = $metadata;
        return $this;
    }
}
