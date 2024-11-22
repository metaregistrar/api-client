<?php

namespace Metaregistrar\Api\Client\Fragment\Host;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class Host
 *
 * @ExclusionPolicy("all")
 */
class Host
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
     * @SerializedName("roid")
     *
     * @Expose
     */
    protected $roid;

    /**
     * @var string[]
     * @Type("array")
     *
     * @Expose
     */
    protected $status = [];

    /**
     * @var Addr[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Host\Addr>")
     *
     * @Expose
     */
    protected $addr = [];

    /**
     * @var string
     * @Type("string")
     * @SerializedName("clID")
     *
     * @Expose
     */
    protected $clId;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("crID")
     *
     * @Expose
     */
    protected $crId;

    /**
     * @var \DateTime
     * @Type("DateTime")
     * @SerializedName("crDate")
     * @expose
     */
    protected $crDate;

    /**
     * @param Addr $ip
     * @return void
     */
    public function addAddress(Addr $ip)
    {
        $this->addr[] = $ip;
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
     * @return Host
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoid()
    {
        return $this->roid;
    }

    /**
     * @param string $roid
     * @return Host
     */
    public function setRoid($roid)
    {
        $this->roid = $roid;
        return $this;
    }

    /**
     * @return array
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param array $status
     * @return Host
     */
    public function setStatus(array $status)
    {
        $toSet = [];
        foreach ($status as $s) {
            if (is_string($s)) {
                $toSet[] = $s;
            } else {
                $toSet[] = $s['s'];
            }
        }
        $this->status = $toSet;
        return $this;
    }

    /**
     * @param Status $status
     * @return Host
     */
    public function addStatus(Status $status)
    {
        $this->status[] = $status;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCrDate()
    {
        return $this->crDate;
    }

    /**
     * @param \DateTime|null $crDate
     * @return Host
     */
    public function setCrDate($crDate)
    {
        $this->crDate = $crDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * @param string $clId
     * @return HostInfData
     */
    public function setClId($clId)
    {
        $this->clId = $clId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCrId()
    {
        return $this->crId;
    }

    /**
     * @param string $crId
     * @return HostInfData
     */
    public function setCrId($crId)
    {
        $this->crId = $crId;
        return $this;
    }
}
