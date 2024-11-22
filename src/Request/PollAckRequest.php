<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Response\PollAckResponse;

/**
 * Class HostInfoRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class PollAckRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url ='poll';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;

    /**
     * @var string
     */
    protected $expectedResponse = PollAckResponse::class;

    /**
     * @var integer[]
     * @Type("array<integer>")
     * @Expose
     */
    protected $pollIds=[];

    /**
     * @return integer[]
     */
    public function getPollIds()
    {
        return $this->pollIds;
    }

    /**
     * @param integer[] $pollIds
     * @return PollAckRequest
     */
    public function setPollIds($pollIds)
    {
        $this->pollIds = $pollIds;
        return $this;
    }
}
