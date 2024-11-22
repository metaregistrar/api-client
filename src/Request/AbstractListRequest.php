<?php

namespace Metaregistrar\Api\Client\Request;

use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * The AbstractRequest containing the way to serialize and deserialize requests
 * @ExclusionPolicy("all")
 */
class AbstractListRequest extends AbstractRequest
{

    /**
     * @var integer
     */
    protected $maxLimit = 50;

    /**
     * @var integer
     */
    protected $defaultLimit = 10;

    /**
     * @var string[]
     */
    protected $acceptableQueryDefaultArgs = [
        "start" => "string",
        "limit" => "string",
        'orderBy' => "string",
        'orderDirection' => "string"
    ];

    /**
     * @var array
     */
    protected $acceptableArgs = [];

    /**
     * @var string[]
     */
    protected $acceptableQueryArgs = [];

    /**
     * @var integer
     */
    protected $start = 0;

    /**
     * @var integer
     */
    protected $limit = 10;

    /**
     * @var string
     */
    protected $orderBy;

    /**
     * @var string
     */
    protected $orderDirection = 'ASC';

    /**
     * @return integer
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * @param integer $start
     * @return AbstractRequest
     */
    public function setStart(int $start): AbstractRequest
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return integer
     */
    public function getLimit(): int
    {
        if ($this->limit < 1) {
            return $this->defaultLimit;
        }
        if ($this->limit > $this->maxLimit) {
            return $this->maxLimit;
        }
        return $this->limit;
    }

    /**
     * @param integer $limit
     * @return AbstractRequest
     */
    public function setLimit(int $limit): AbstractRequest
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @return string
     */
    public function getOrderDirection()
    {
        return $this->orderDirection;
    }

    /**
     * @param string $orderDirection
     * @return AbstractListRequest
     */
    public function setOrderDirection(string $orderDirection): AbstractListRequest
    {
        $this->orderDirection = $orderDirection;
        return $this;
    }

    /**
     * @param string $orderBy
     * @return AbstractListRequest
     */
    public function setOrderBy(string $orderBy): AbstractListRequest
    {
        $this->orderBy = $orderBy;
        return $this;
    }


    /**
     * @return string[]
     */
    public function getAcceptableQueryArgs()
    {
        return $this->acceptableQueryArgs;
    }
}
