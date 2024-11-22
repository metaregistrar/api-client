<?php

namespace Metaregistrar\Api\Client\Annotation;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD","ANNOTATION"})
 */
final class DefaultValue
{
    /**
     * @var string
     * @Required
     */
    public $value;
}
