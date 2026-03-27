<?php

namespace Metaregistrar\Api\Client\Response;

use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * Class DomainRestoreResponse
 * @package Metaregistrar\Api\Client\Response
 */
#[ExclusionPolicy('all')]
class DomainRestoreResponse extends AbstractResponse implements ResponseInterface
{

}
