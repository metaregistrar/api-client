<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\ExclusionPolicy;
use Metaregistrar\Api\Client\Response\DomainListResponse;

/**
 * Class DomainListRequest
 * @package Metaregistrar\Api\Request
 */
#[ExclusionPolicy('all')]
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
     * @var string[]
     */
    protected $acceptableQueryArgs = [
        'name' => 'string',
        'autorenew' => 'boolean',
        'crmId' => 'string',
        'status' => 'string',
    ];

    /**
     * @var string
     */
    protected $expectedResponse = DomainListResponse::class;

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->setQueryArg('name', $name);
    }

    /**
     * @param boolean $autoRenew
     * @return void
     */
    public function setAutoRenew(bool $autoRenew): void
    {
        $this->setQueryArg('autorenew', $autoRenew);
    }

    /**
     * @param string $crmId
     * @return void
     */
    public function setCrmId(string $crmId): void
    {
        $this->setQueryArg('crmId', $crmId);
    }

    /**
     * @param string $status
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->setQueryArg('status', $status);
    }
}
