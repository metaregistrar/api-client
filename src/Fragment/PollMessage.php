<?php

namespace Metaregistrar\Api\Client\Fragment;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;

/**
 * @package Metaregistrar\Api\Client\Fragment
 */
#[ExclusionPolicy('all')]
class PollMessage
{


    /**
     * @var integer
     * @Description("The message id")
     * @MustBeFilled("yes")
     */
    #[Type('integer')]
    #[Expose]
    protected $id = 0;
    /**
     * @var string
     * @Description("The type of message")
     * @MustBeFilled("yes")
     */
    #[Type('string')]
    #[Expose]
    protected $type = 'epp';

    /**
     * @var string
     * @Description("The handler for the message")
     * @MustBeFilled("yes")
     */
    #[Type('string')]
    #[Expose]
    protected $handler = 'epp';
    /**
     * @var string
     * @Description("The message")
     * @MustBeFilled("yes")
     */
    #[Type('string')]
    #[Expose]
    protected $message = '';

    /**
     * @var integer
     * @Description("The timestamp this message was saved")
     * @MustBeFilled("yes")
     */
    #[Type('integer')]
    #[Expose]
    protected $timestamp;


    /**
     * @var array
     * @Description("the data for the poll message, this is a freeform array")
     * @MustBeFilled("yes")
     */
    #[Type('array')]
    #[Expose]
    protected $pollData =[];

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return PollMessage
     */
    public function setId(int $id): PollMessage
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array
     */
    public function getPollData()
    {
        return $this->pollData;
    }

    /**
     * @param array $pollData
     * @return PollMessage
     */
    public function setPollData(array $pollData): PollMessage
    {
        $this->pollData = $pollData;
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
     * @return PollMessage
     */
    public function setType(string $type): PollMessage
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return PollMessage
     */
    public function setMessage(string $message): PollMessage
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return integer
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param integer $timestamp
     * @return PollMessage
     */
    public function setTimestamp(int $timestamp): PollMessage
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param string $handler
     * @return PollMessage
     */
    public function setHandler(string $handler): PollMessage
    {
        $this->handler = $handler;
        return $this;
    }
}
