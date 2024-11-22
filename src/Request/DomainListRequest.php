<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\ExclusionPolicy;
use Metaregistrar\Api\Client\Response\DomainListResponse;

/**
 * Class DomainListRequest
 * @package Metaregistrar\Api\Request
 * @ExclusionPolicy("all")
 */
class DomainListRequest extends AbstractListRequest
{
    /**
     * @var string
     */
    protected $url = 'domain';
    /**
     * @var string
     */
    protected $method = self::METHOD_GET;

    /**
     * @var string
     */
    protected $expectedResponse = DomainListResponse::class;
}
