<?php

namespace Metaregistrar\Api\Client\Fragment\Contact;

use Metaregistrar\EPPLanguageBundle\Messages\Command\AbstractCommandMessage;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class Addr
 *
 * @package Metaregistrar\Api\Client\Fragment\Contact
 * @ExclusionPolicy("all")
 */
class Addr
{
    /**
     * @var string[]|null
     * @Type("array<string>")
     * @SerializedName("street")
     * @Expose
     */
    protected $street = [];

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("city")
     *
     * @Expose
     */
    protected $city;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("sp")
     *
     * @Expose
     */
    protected $sp;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("pc")
     *
     * @Expose
     */
    protected $pc;

    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("cc")
     *
     * @Expose
     */
    protected $cc;

    /**
     * @return string[]|null
     */
    public function getStreet(): ?array
    {
        return $this->street;
    }

    /**
     * @param string[]|null $street
     * @return Addr
     */
    public function setStreet(?array $street): Addr
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Addr
     */
    public function setCity(?string $city): Addr
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSp(): ?string
    {
        return $this->sp;
    }

    /**
     * @param string|null $sp
     * @return Addr
     */
    public function setSp(?string $sp): Addr
    {
        $this->sp = $sp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPc(): ?string
    {
        return $this->pc;
    }

    /**
     * @param string|null $pc
     * @return Addr
     */
    public function setPc(?string $pc): Addr
    {
        $this->pc = $pc;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCc(): ?string
    {
        return $this->cc;
    }

    /**
     * @param string|null $cc
     * @return Addr
     */
    public function setCc(?string $cc): Addr
    {
        $this->cc = $cc;
        return $this;
    }
}
