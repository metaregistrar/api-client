<?php

namespace Metaregistrar\Api\Client\Response;

/**
 * Interface ResponseInterface
 * @package Metaregistrar\Api\Client\Response
 */
interface ResponseInterface
{
    /**
     * @return string
     */
    public function getResponseId();

    /**
     * @param string $responseId
     * @return AbstractResponse
     */
    public function setResponseId(string $responseId): AbstractResponse;

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param string $status
     * @return AbstractResponse
     */
    public function setStatus(string $status): AbstractResponse;

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @param string $message
     * @return AbstractResponse
     */
    public function setMessage(string $message): AbstractResponse;
}
