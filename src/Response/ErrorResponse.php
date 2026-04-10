<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;

/**
 * Class Error
 * @package Metaregistrar\Api\Client\Response
 */
#[ExclusionPolicy('all')]
class ErrorResponse extends AbstractResponse implements ResponseInterface
{
    /**
     * @var string
     */
    #[Type('string')]
    #[Expose]
    #[Description('The error code')]
    #[MustBeFilled('yes')]
    protected $errorCode;

    /**
     * @var string
     */
    #[Type('string')]
    #[Expose]
    #[Description('Tells you what is wrong')]
    #[MustBeFilled('yes')]
    protected $errorMessage;

    /**
     * ErrorResponse constructor.
     * @param string $errorCode
     * @param string $errorMessage
     */
    public function __construct(string $errorCode, string $errorMessage)
    {
        $this->status = 'error';
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param string $errorCode
     * @return ErrorResponse
     */
    public function setErrorCode(string $errorCode): ErrorResponse
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     * @return ErrorResponse
     */
    public function setErrorMessage(string $errorMessage): ErrorResponse
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }
}
