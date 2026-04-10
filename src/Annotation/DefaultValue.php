<?php

namespace Metaregistrar\Api\Client\Annotation;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class DefaultValue
{
    public function __construct(public string $value)
    {
    }
}
