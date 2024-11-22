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
 */
class DomainListItem
{
    /**
     * @var string
     * @Type("string")
     *
     * @Expose
     */
    protected $name = '';

    /**
     * @var string[]
     * @Type("array<string>")
     * @Expose
     */
    protected $status = [];

    /**
     * @var boolean
     * @Type("boolean")
     *
     * @Expose
     */
    protected $autorenew = false;

    /**
     * @var string
     * @Type("string")
     *
     * @Expose
     */
    protected $crmId;
    /**
     * @var array
     * @Type("array")
     *
     * @Expose
     */
    protected $metadata;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DomainListItem
     */
    public function setName(string $name): DomainListItem
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param string[] $status
     * @return DomainListItem
     */
    public function setStatus(array $status): DomainListItem
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAutorenew(): bool
    {
        return $this->autorenew;
    }

    /**
     * @param boolean $autorenew
     * @return DomainListItem
     */
    public function setAutorenew(bool $autorenew): DomainListItem
    {
        $this->autorenew = $autorenew;
        return $this;
    }

    /**
     * @return string
     */
    public function getCrmId(): string
    {
        return $this->crmId;
    }

    /**
     * @param string $crmId
     * @return DomainListItem
     */
    public function setCrmId($crmId): DomainListItem
    {
        if (is_null($crmId)) {
            return $this;
        }
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
     * @param array $metadata
     * @return DomainListItem
     */
    public function setMetadata(?array $metadata): DomainListItem
    {
        if (is_null($metadata)) {
            return $this;
        }
        $this->metadata = $metadata;
        return $this;
    }
}
