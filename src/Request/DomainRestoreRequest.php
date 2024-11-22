<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\DefaultValue;
use Metaregistrar\Api\Client\Response\DomainRestoreResponse;

/**
 * Class DomainListingCreateRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DomainRestoreRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'domain/{name}/restore';
    /**
     * @var string
     */
    protected $method = self::METHOD_POST;


    /**
     * @var string
     */
    protected $expectedResponse = DomainRestoreResponse::class;
    /**
     * @var string
     * @MustBeFilled("yes")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $name = '';


    /**
     * @var array
     */
    protected $acceptableArgs = [
        "name" => "string"
    ];

    /**
     * @var string
     * @Type("string")
     * @MustBeFilled("You must supply a reason")
     * @Expose
     */
    protected $reason = "";

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DomainRenewRequest
     */
    public function setName(string $name): DomainRestoreRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return DomainRestoreRequest
     */
    public function setReason(string $reason): DomainRestoreRequest
    {
        $this->reason = $reason;
        return $this;
    }
}
