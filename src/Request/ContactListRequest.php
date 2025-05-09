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

    /**
     * @param string $country
     * @return void
     */
    public function setCountry(string $country): void
    {
        $this->setQueryArg('country', $country);
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->setQueryArg('email', $email);
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
     * @param string $org
     * @return void
     */
    public function setOrg(string $org): void
    {
        $this->setQueryArg('org', $org);
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->setQueryArg('name', $name);
    }
}
