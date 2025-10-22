<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Response\PollResponse;

/**
 * Class HostInfoRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class PollRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url ='poll';
    /**
     * @var string
     */
    protected $method = self::METHOD_GET;


    /**
     * @var string
     */
    protected $expectedResponse = PollResponse::class;

    /**
     * @var array
     */
    protected $acceptableQueryArgs = ["limit"=>"integer","autoAck"=>'boolean'];

    /**
     * @var integer
     * @description("Greater than 0 and less than 250")
     */
    protected $limit=100;

    /**
     * @var boolean
     */
    protected $autoAck=false;

    /**
     * @return integer
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param integer $limit
     * @return PollRequest
     */
    public function setLimit(int $limit): PollRequest
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAutoAck()
    {
        return $this->autoAck;
    }

    /**
     * @param boolean $autoAck
     * @return PollRequest
     */
    public function setAutoAck(bool $autoAck): PollRequest
    {
        $this->autoAck = $autoAck;
        return $this;
    }
}
