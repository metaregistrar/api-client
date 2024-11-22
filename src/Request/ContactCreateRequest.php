<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Fragment\Contact\PostalInfo;
use Metaregistrar\Api\Client\Response\ContactCreateResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class ContactCreateRequest extends AbstractRequest
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
     */
    protected $expectedResponse = ContactCreateResponse::class;
    /**
     * @var PostalInfo
     * @Type("Metaregistrar\Api\Client\Fragment\Contact\PostalInfo")
     * @SerializedName("postalInfo")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $postalInfo;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("voice")
     * @MustBeFilled("yes")
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
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $email;

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
     * @Expose
     */
    protected $metadata;

    /**
     * @return PostalInfo
     */
    public function getPostalInfo(): ?PostalInfo
    {
        return $this->postalInfo;
    }

    /**
     * @param PostalInfo $postalInfo
     * @return ContactCreateRequest
     */
    public function setPostalInfo(PostalInfo $postalInfo): ContactCreateRequest
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
    public function setVoice(?string $voice): ContactCreateRequest
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
    public function setFax(?string $fax): ContactCreateRequest
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
    public function setEmail(?string $email): ContactCreateRequest
    {
        $this->email = $email;
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
     * @return ContactCreateRequest
     */
    public function setCrmId(?string $crmId): ContactCreateRequest
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
     * @return ContactCreateRequest
     */
    public function setMetadata(?array $metadata): ContactCreateRequest
    {
        $this->metadata = $metadata;
        return $this;
    }
}
