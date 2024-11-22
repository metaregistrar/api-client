<?php

namespace Metaregistrar\Api\Client\Fragment\Dns;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class Content
 *
 * @package Metaregistrar\Api\Client\Fragment\Dns
 * @ExclusionPolicy("all")
 */
class Content
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
     * @SerializedName("type")
     * @Expose
     */
    protected $type;

    /**
     * @var integer
     * @Type("string")
     * @SerializedName("ttl")
     * @Expose
     */
    protected $ttl;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("content")
     * @Expose
     */
    protected $content;

    /**
     * @var integer
     * @Type("integer")
     * @SerializedName("priority")
     * @Expose
     */
    protected $priority = null;

    /**
     * @var boolean
     * @Type("boolean")
     * @SerializedName("disabled")
     *
     * @Expose
     */
    protected $disabled = false;

    /**
     * Content constructor.
     * @param string  $name
     * @param string  $content
     * @param string  $type
     * @param integer $ttl
     * @param integer $priority
     * @param boolean $disabled
     * @return void
     */
    public function init($name, $content, $type, $ttl, $priority, $disabled = false)
    {
        $this->name = $name;
        $this->content = $content;
        $this->type = $type;
        $this->ttl = $ttl;
        $this->priority = $priority;
        $this->setDisabled($disabled);
    }
    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Content
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Content
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return integer
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @param integer $ttl
     * @return Content
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param boolean $disabled
     * @return Content
     */
    public function setDisabled($disabled = false)
    {
        $this->disabled = $disabled;
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
     * @return Content
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param integer $priority
     * @return Content
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }
}
