<?php

namespace Metaregistrar\Api\Client\Annotation;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD","ANNOTATION"})
 */
final class Description
{
    /**
     * @var string
     * @Required
     */
    public $value;
}
