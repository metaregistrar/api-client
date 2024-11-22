<?php
namespace Metaregistrar\Api\Client\Fragment\Contact;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class ContactProperty
 * @ExclusionPolicy("all")
 *
 */
class ContactProperty
{
    /**
     * @var string
     * @Type("string")
     * @SerializedName("registry")
     * @Expose
     */
    protected $registry;
    /**
     * @var string
     * @Type("string")
     * @SerializedName("name")
     * @Expose
     */
    protected $name;
    /**
     * @var string
     * @Type("string")
     * @SerializedName("value")
     * @Expose
     */
    protected $value;

    /**
     * @return string
     */
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * @param string $registry
     * @return ContactProperty
     */
    public function setRegistry(string $registry): ContactProperty
    {
        $this->registry = $registry;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ContactProperty
     */
    public function setName(string $name): ContactProperty
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return ContactProperty
     */
    public function setValue(string $value): ContactProperty
    {
        $this->value = $value;
        return $this;
    }
}
