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
class DomainTransfer
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
     * @Expose
     */
    protected $reID;
    /**
     * @var string
     * @Type("string")
     * @Expose
     */
    protected $reDate;
    /**
     * @var string
     * @Type("string")
     * @Expose
     */
    protected $acDate;

    /**
     * @var string
     * @Type("string")
     * @Expose
     */
    protected $exDate;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DomainTransfer
     */
    public function setName(string $name): DomainTransfer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getReID()
    {
        return $this->reID;
    }

    /**
     * @param string $reID
     * @return DomainTransfer
     */
    public function setReID(string $reID): DomainTransfer
    {
        $this->reID = $reID;
        return $this;
    }
}
