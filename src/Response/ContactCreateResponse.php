<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\Contact\Contact;

/**
 * Class ContactCreateResponse
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
class ContactCreateResponse extends AbstractResponse implements ResponseInterface
{
    /**
     * @var Contact
     * @Type("Metaregistrar\Api\Client\Fragment\Contact\Contact")
     * @Description("The contact requested")
     * @SerializedName("contact")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $contact;

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return ContactCreateResponse
     */
    public function setContact(Contact $contact): ContactCreateResponse
    {
        $this->contact = $contact;
        return $this;
    }
}
