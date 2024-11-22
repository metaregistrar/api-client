<?php

namespace Metaregistrar\Api\Client\Annotation;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD","ANNOTATION"})
 */
final class MustBe
{
    /**
     * @var string
     * @Required
     */
    public $value;
}
