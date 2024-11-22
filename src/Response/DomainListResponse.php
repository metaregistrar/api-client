<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;
use Metaregistrar\Api\Client\Fragment\Domain\DomainListItem;

/**
 * Class Error
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
class DomainListResponse extends AbstractListResponse implements ResponseInterface
{
    /**
     * @var DomainListItem[]
     * @Type("array<Metaregistrar\Api\Client\Fragment\Domain\DomainListItem>")
     * @Description("A list of domains that match your request but with limited ")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $domains;

    /**
     * @param DomainListItem[] $items
     * @param integer          $totalItems
     */
    public function __construct(array $items, int $totalItems = 0)
    {
        $this->domains = $items;
        $this->listItemCount = $totalItems;
    }
}
