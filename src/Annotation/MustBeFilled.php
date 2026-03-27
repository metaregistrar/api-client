<?php

namespace Metaregistrar\Api\Client\Annotation;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class MustBeFilled
{
    public function __construct(public string $value)
    {
    }
}
