<?php

namespace Metaregistrar\Api\Client\Request;

use GuzzleHttp\Psr7\Response;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Response\ContactInfoResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
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
