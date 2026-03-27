<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\ExclusionPolicy;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Response\DnszoneInfoResponse;

/**
 * Class DnszoneInfoRequest
 * @package Metaregistrar\Api\Client\Request
 */
#[ExclusionPolicy('all')]
class DnszoneInfoRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $url = 'dnszone/{name}';
    /**
     * @var string
     */
    protected $method = self::METHOD_GET;

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
        "name"=>"string"
    ];

    /**
     * @var string
     */
    protected $expectedResponse = DnszoneInfoResponse::class;

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
    public function setName(string $name): DnszoneInfoRequest
    {
        $this->name = $name;
        return $this;
    }
}
