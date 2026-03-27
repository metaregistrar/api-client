<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\PollMessage;

/**
 * Class HostInfoResponse
 * @package Metaregistrar\Api\Client\Response
 */
#[ExclusionPolicy('all')]
class PollResponse extends AbstractResponse implements ResponseInterface
{
    /**
     * @var PollMessage[]
     * @Description("A list of poll messages")
     * @MustBeFilled("yes")
     */
    #[Type('array<Metaregistrar\Api\Client\Fragment\PollMessage>')]
    #[SerializedName('pollMessages')]
    #[Expose]
    protected $pollMessages;

    /**
     * @var integer
     * @Description("count of results")
     * @MustBeFilled("yes")
     */
    #[Type('integer')]
    #[SerializedName('resultCount')]
    #[Expose]
    protected $resultCount;

    /**
     * @var integer
     * @Description("count of total waiting poll messages")
     * @MustBeFilled("yes")
     */
    #[Type('integer')]
    #[SerializedName('totalWaiting')]
    #[Expose]
    protected $totalWaiting;
    /**
     * @return PollMessage[]
     */
    public function getPollMessages()
    {
        return $this->pollMessages;
    }

    /**
     * @param PollMessage[] $pollMessages
     * @return PollResponse
     */
    public function setPollMessages(array $pollMessages): PollResponse
    {
        $this->pollMessages = $pollMessages;
        return $this;
    }

    /**
     * @return integer
     */
    public function getResultCount()
    {
        return $this->resultCount;
    }

    /**
     * @param integer $resultCount
     * @return PollResponse
     */
    public function setResultCount(int $resultCount): PollResponse
    {
        $this->resultCount = $resultCount;
        return $this;
    }

    /**
     * @return integer
     */
    public function getTotalWaiting()
    {
        return $this->totalWaiting;
    }

    /**
     * @param integer $totalWaiting
     * @return PollResponse
     */
    public function setTotalWaiting(int $totalWaiting): PollResponse
    {
        $this->totalWaiting = $totalWaiting;
        return $this;
    }
}
