<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\ExclusionPolicy;
use Metaregistrar\Api\Client\Response\ContactListResponse;

/**
 * Class DomainListRequest
 * @package Metaregistrar\Api\Request
 * @ExclusionPolicy("all")
 */
class ContactListRequest extends AbstractListRequest
{
    /**
     * @var string
     */
    protected $url = 'contact';
    /**
     * @var string
     */
    protected $method = self::METHOD_GET;

    /**
     * @var string
     */
    protected $expectedResponse = ContactListResponse::class;
}
