<?php
namespace Metaregistrar\Api\Client\Fragment\Domain;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;

/**
 * Class AuthInfo
 *
 * @package Metaregistrar\Api\Client\Fragment\Domain
 * @ExclusionPolicy("all")

 */
class AuthInfo
{
    /**
     * @var string
     * @Type("string")
     * @SerializedName("pw")
     *
     * @Expose
     */
    protected $pw;

    /**
     * @return string
     */
    public function getPw()
    {
        return $this->pw;
    }

    /**
     * @param string $pw
     * @return AuthInfo
     */
    public function setPw($pw)
    {
        $this->pw = $pw;
        return $this;
    }
}
