<?php

namespace Metaregistrar\Api\Client\Fragment\Host;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class Status
 *
 * @package Metaregistrar\Api\Client\Fragment\Host
 * @ExclusionPolicy("all")
 */
class Status
{
    /**
     * @var string
     * @Type("string")
     *
     * @Expose
     */
    protected $status;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("s")
     *
     * @Expose
     */
    protected $s;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("lang")
     *
     * @Expose
     */
    protected $lang;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * @param string $s
     * @return Status
     */
    public function setS($s)
    {
        $this->s = $s;
        return $this;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     * @return Status
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }
}
