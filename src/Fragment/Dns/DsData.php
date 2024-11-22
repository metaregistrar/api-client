<?php
namespace Metaregistrar\Api\Client\Fragment\Dns;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class DsData
 * @ExclusionPolicy("all")
 */
class DsData
{
    /**
     * @var string
     * @Type("string")
     * @SerializedName("keyTag")
     * @Expose
     */
    protected $keyTag;

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
     * @SerializedName("digestType")
     * @Expose
     */
    protected $digestType;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("digest")
     * @Expose
     */
    protected $digest;

    /**
     * @var KeyData
     * @Type("Metaregistrar\Api\Client\Fragment\Dns\KeyData")
     * @SerializedName("keyData")
     * @Expose
     */
    protected $keyData;

    /**
     * @return string
     */
    public function getKeytag()
    {
        return $this->keyTag;
    }

    /**
     * @param string $keytag
     * @return DsData
     */
    public function setKeytag($keytag)
    {
        $this->keyTag = $keytag;
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
     * @return DsData
     */
    public function setAlg($alg)
    {
        $this->alg = $alg;
        return $this;
    }

    /**
     * @return string
     */
    public function getDigestType()
    {
        return $this->digestType;
    }

    /**
     * @param string $digestType
     * @return DsData
     */
    public function setDigestType($digestType)
    {
        $this->digestType = $digestType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDigest()
    {
        return $this->digest;
    }

    /**
     * @param string $digest
     * @return DsData
     */
    public function setDigest($digest)
    {
        $this->digest = $digest;
        return $this;
    }

    /**
     * @return KeyData
     */
    public function getKeyData()
    {
        return $this->keyData;
    }

    /**
     * @param KeyData $keyData
     * @return DsData
     */
    public function setKeyData(KeyData $keyData)
    {
        $this->keyData = $keyData;
        return $this;
    }
}
