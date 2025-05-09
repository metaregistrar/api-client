<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;

/**
 * Class HostingCreateResponse
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class AbstractResponse implements ResponseInterface
{
    /**
     * @var string
     * @Type("string")
     * @Description("The response id")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $responseId;
    /**
     * @var string
     * @Type("string")
     * @Description("The status of the request")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $status;

    /**
     * @var string
     * @Type("string")
     * @Description("The message")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $message;


    /**
     * @var integer
     */
    protected $statusCode = 413;

    /**
     * @var string
     */
    protected $rawBody = '';

    /**
     * @param string  $message
     * @param string  $status
     * @param integer $statusCode
     */
    public function __construct($message = 'your response is attached', $status = 'ok', $statusCode = '200')
    {
        $this->message = $message;
        $this->status = $status;
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getResponseId()
    {
        return $this->responseId;
    }

    /**
     * @param string $responseId
     * @return AbstractResponse
     */
    public function setResponseId(string $responseId): AbstractResponse
    {
        $this->responseId = $responseId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return AbstractResponse
     */
    public function setStatus(string $status): AbstractResponse
    {
        $this->status = $status;
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
     * @return AbstractResponse
     */
    public function setMessage(string $message): AbstractResponse
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param integer $statusCode
     * @return AbstractResponse
     */
    public function setStatusCode(int $statusCode): AbstractResponse
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getRawBody()
    {
        return $this->rawBody;
    }

    /**
     * @param string $rawBody
     * @return AbstractResponse
     */
    public function setRawBody(string $rawBody): AbstractResponse
    {
        $this->rawBody = $rawBody;
        return $this;
    }
}
