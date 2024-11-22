<?php
namespace Metaregistrar\Api\Client\Fragment\Dns;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class KeyData
 * @ExclusionPolicy("all")
 */
class KeyData
{
    /**
     * @var string
     * @Type("string")
     * @SerializedName("flags")
     * @Expose
     */
    protected $flags;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("protocol")
     * @Expose
     */
    protected $protocol;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("alg")
     * @Expose
     */
    protected $alg;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("pubKey")
     * @Expose
     */
    protected $pubKey;

    /**
     * @return string
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param string $flags
     * @return KeyData
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;
        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     * @return KeyData
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlg()
    {
        return $this->alg;
    }

    /**
     * @param string $alg
     * @return KeyData
     */
    public function setAlg($alg)
    {
        $this->alg = $alg;
        return $this;
    }

    /**
     * @return string
     */
    public function getPubKey()
    {
        return $this->pubKey;
    }

    /**
     * @param string $pubKey
     * @return KeyData
     */
    public function setPubKey($pubKey)
    {
        $this->pubKey = $pubKey;
        return $this;
    }
}
