<?php

namespace Metaregistrar\Api\Client\Fragment\Dns;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class Zone
 * @package Metaregistrar\Api\Client\Fragment\Dns
 * @ExclusionPolicy("all")
 */
class Zone
{

    /**
     * @var string
     * @Type("string")
     * @Expose
     */
    protected $name;


    /**
     * @var boolean
     * @Type("boolean")
     * @Expose
     */
    protected $premium = false;


    /**
     * @var Content[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Dns\Content>")
     *
     * @Expose
     */
    protected $records = [];


    /**
     * @var KeyData[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Dns\KeyData>")
     * @SerializedName("keyData")
     * @Expose
     */
    protected $keyData = [];

    /**
     * @var DsData[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Dns\DsData>")
     * @SerializedName("dsData")
     * @Expose
     */
    protected $dsData = [];

    /**
     * @return Content[]
     */
    public function getRecords(): array
    {
        return $this->records;
    }

    /**
     * @param Content[] $records
     * @return Zone
     */
    public function setRecords(array $records): Zone
    {
        $this->records = $records;
        return $this;
    }

    /**
     * @return KeyData[]
     */
    public function getKeyData(): array
    {
        return $this->keyData;
    }

    /**
     * @param KeyData[] $keyData
     * @return Zone
     */
    public function setKeyData(array $keyData): Zone
    {
        $this->keyData = $keyData;
        return $this;
    }

    /**
     * @return DsData[]
     */
    public function getDsData(): array
    {
        return $this->dsData;
    }

    /**
     * @param DsData[] $dsData
     * @return Zone
     */
    public function setDsData(array $dsData): Zone
    {
        $this->dsData = $dsData;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Zone
     */
    public function setName(string $name): Zone
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getPremium(): bool
    {
        return $this->premium;
    }

    /**
     * @param boolean $premium
     * @return Zone
     */
    public function setPremium(bool $premium): Zone
    {
        $this->premium = $premium;
        return $this;
    }
}
