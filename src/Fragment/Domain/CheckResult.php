<?php

namespace Metaregistrar\Api\Client\Fragment\Domain;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class CheckResult
 *
 * @package Metaregistrar\Api\Client\Fragment\Domain
 * @ExclusionPolicy("all")
 */
class CheckResult
{
    /**
     * @var string
     * @Type("string")
     * @SerializedName("name")
     * @Expose
     */
    protected $name;
    /**
     * @var boolean
     * @Type("boolean")
     * @Expose
     */
    protected $available;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("reason")
     * @Expose
     */
    protected $reason;

    /**
     * @var integer
     * @Type("integer")
     * @SerializedName("defaultRegistrationPeriod")
     * @Expose
     */
    protected $defaultRegistrationPeriod;

    /**
     * @var boolean|null
     * @Type("boolean")
     * @Expose
     */
    protected $premium;

    /**
     * @var float|null
     * @Type("float")
     * @Expose
     */
    protected $premiumPrice;
    /**
     * @var float|null
     * @Type("float")
     * @Expose
     */
    protected $premiumRecurringPrice;

    /**
     * @var string|null
     * @Type("string")
     * @Expose
     */
    protected $premiumPriceCurrency;
    /**
     * @var string|null
     * @Type("string")
     * @Expose
     */
    protected $premiumPriceMessage;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CheckResult
     */
    public function setName(string $name): CheckResult
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @param boolean $available
     * @return CheckResult
     */
    public function setAvailable(bool $available): CheckResult
    {
        $this->available = $available;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPremium()
    {
        return $this->premium;
    }

    /**
     * @param boolean $premium
     * @return CheckResult
     */
    public function setPremium(bool $premium): CheckResult
    {
        $this->premium = $premium;
        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return CheckResult
     */
    public function setReason(string $reason): CheckResult
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return integer
     */
    public function getDefaultRegistrationPeriod()
    {
        return $this->defaultRegistrationPeriod;
    }

    /**
     * @param integer $defaultRegistrationPeriod
     * @return CheckResult
     */
    public function setDefaultRegistrationPeriod(int $defaultRegistrationPeriod): CheckResult
    {
        $this->defaultRegistrationPeriod = $defaultRegistrationPeriod;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPremiumPrice(): ?float
    {
        return $this->premiumPrice;
    }

    /**
     * @param float|null $premiumPrice
     * @return CheckResult
     */
    public function setPremiumPrice(?float $premiumPrice): CheckResult
    {
        $this->premiumPrice = $premiumPrice;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPremiumRecurringPrice(): ?float
    {
        return $this->premiumRecurringPrice;
    }

    /**
     * @param float|null $premiumRecurringPrice
     * @return CheckResult
     */
    public function setPremiumRecurringPrice(?float $premiumRecurringPrice): CheckResult
    {
        $this->premiumRecurringPrice = $premiumRecurringPrice;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPremiumPriceCurrency(): ?string
    {
        return $this->premiumPriceCurrency;
    }

    /**
     * @param string|null $premiumPriceCurrency
     * @return CheckResult
     */
    public function setPremiumPriceCurrency(?string $premiumPriceCurrency): CheckResult
    {
        $this->premiumPriceCurrency = $premiumPriceCurrency;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPremiumPriceMessage(): ?string
    {
        return $this->premiumPriceMessage;
    }

    /**
     * @param string|null $premiumPriceMessage
     * @return CheckResult
     */
    public function setPremiumPriceMessage(?string $premiumPriceMessage): CheckResult
    {
        $this->premiumPriceMessage = $premiumPriceMessage;
        return $this;
    }
}
