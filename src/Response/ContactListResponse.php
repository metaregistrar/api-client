<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\Contact\ContactListItem;

/**
 * Class Error
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
class ContactListResponse extends AbstractListResponse implements ResponseInterface
{
    /**
     * @var ContactListItem[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Contact\ContactListItem>")
     * @Description("A list of contact that match your request but with limited data")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $contacts;

    /**
     * @param ContactListItem[] $items
     * @param integer           $totalItems
     */
    public function __construct(array $items, int $totalItems = 0)
    {
        $this->contacts = $items;
        $this->listItemCount = $totalItems;
    }
}
