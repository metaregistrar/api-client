<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\ExclusionPolicy;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Response\ContactInfoResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 */
#[ExclusionPolicy('all')]
class ContactInfoRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'contact/{id}';
    /**
     * @var string
     */
    protected $method = self::METHOD_GET;

    /**
     * @var string
     * @MustBeFilled("yes")
     */
    protected $id='';

    /**
     * @var array
     */
    protected $acceptableArgs = [
        "id"=>"string"
    ];

    /**
     * @var string
     */
    protected $expectedResponse=ContactInfoResponse::class;
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ContactInfoRequest
     */
    public function setId(string $id): ContactInfoRequest
    {
        $this->id = $id;
        return $this;
    }
}
