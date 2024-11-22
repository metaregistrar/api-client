<?php
namespace Metaregistrar\Api\Client\Fragment\Contact;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class PostalInfo
 *
 * @package Metaregistrar\Api\Client\Fragment\Contact
 * @ExclusionPolicy("all")
 */
class PostalInfo
{
    const TYPE_LOC = 'loc';
    const TYPE_INT = 'int';

    /**
     * @var string
     * @Type("string")
     * @SerializedName("type")
     */
    protected $type = 'loc';

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("roid")
     *
     * @Expose
     */
    protected $roid;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("name")
     *
     * @Expose
     */
    protected $name;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("org")
     *
     * @Expose
     */
    protected $org;

    /**
     * @var Addr
     * @Type("Metaregistrar\Api\Client\Fragment\Contact\Addr")
     * @SerializedName("addr")
     *
     * @Expose
     */
    protected $addr;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return PostalInfo
     */
    public function setName(?string $name): PostalInfo
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrg(): ?string
    {
        return $this->org;
    }

    /**
     * @param string|null $org
     * @return PostalInfo
     */
    public function setOrg(?string $org): PostalInfo
    {
        $this->org = $org;
        return $this;
    }

    /**
     * @return \Metaregistrar\Api\Client\Fragment\Contact\Addr
     */
    public function getAddr(): \Metaregistrar\Api\Client\Fragment\Contact\Addr
    {
        return $this->addr;
    }

    /**
     * @param \Metaregistrar\Api\Client\Fragment\Contact\Addr $addr
     * @return PostalInfo
     */
    public function setAddr(\Metaregistrar\Api\Client\Fragment\Contact\Addr $addr): PostalInfo
    {
        $this->addr = $addr;
        return $this;
    }
}
