<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\ExclusionPolicy;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use JMS\Serializer\Annotation\Expose;
use Metaregistrar\Api\Client\Response\DnszoneDeleteResponse;

/**
 * Class DnszoneDeleteRequest
 * @package Metaregistrar\Api\Client\Request
 * @ExclusionPolicy("all")
 */
class DnszoneDeleteRequest extends AbstractRequest
{

    /**
     * @var string
     */
    protected $url = 'dnszone/{zone}';
    /**
     * @var string
     */
    protected $method = self::METHOD_DELETE;

    /**
     * @var string
     * @MustBeFilled("You must supply a name for the zone")
     * @Description("the name should be a IDN domain in punycode format")
     */
    protected $name='';
    /**
     * @var array
     */
    protected $acceptableArgs = [
        "zone"=>"string"
    ];

    /**
     * @var string
     */
    protected $expectedResponse = DnszoneDeleteResponse::class;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DnszoneInfoRequest
     */
    public function setName(string $name): DnszoneDeleteRequest
    {
        $this->name = $name;
        return $this;
    }
}
