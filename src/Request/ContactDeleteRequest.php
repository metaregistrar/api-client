<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\ExclusionPolicy;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Response\ContactDeleteResponse;

/**
 * Class HostInfoRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class ContactDeleteRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'contact/{id}';
    /**
     * @var string
     */
    protected $method = self::METHOD_DELETE;

    /**
     * @var string
     * @MustBeFilled("yes")
     */
    protected $id = '';

    /**
     * @var string
     */
    protected $expectedResponse = ContactDeleteResponse::class;

    /**
     * @var array
     */
    protected $acceptableArgs = [
        "id" => "string"
    ];

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ContactDeleteRequest
     */
    public function setId(string $id): ContactDeleteRequest
    {
        $this->id = $id;
        return $this;
    }
}
