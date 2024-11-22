<?php

namespace Metaregistrar\Api\Client\Annotation;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD","ANNOTATION"})
 */
final class MustBeFilled
{
    /**
     * @var string
     * @Required
     */
    public $value;
}
