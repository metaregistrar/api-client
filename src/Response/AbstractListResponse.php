<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Metaregistrar\Api\Client\Annotation\Description;
use Metaregistrar\Api\Client\Annotation\MustBeFilled;

/**
 * Class HostingCreateResponse
 * @package Metaregistrar\Api\Client\Response
 * @ExclusionPolicy("all")
 */
abstract class AbstractListResponse extends AbstractResponse
{
    /**
     * @var integer
     * @Type("integer")
     * @Description("The total number of results in the list")
     * @MustBeFilled("yes")
     * @Expose
     */
    protected $listItemCount = 0;

    /**
     * @return integer
     */
    public function getListItemCount()
    {
        return $this->listItemCount;
    }

    /**
     * @param integer $listItemCount
     * @return AbstractListResponse
     */
    public function setListItemCount(int $listItemCount): AbstractListResponse
    {
        $this->listItemCount = $listItemCount;
        return $this;
    }
}
