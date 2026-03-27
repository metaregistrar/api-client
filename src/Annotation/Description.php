<?php

namespace Metaregistrar\Api\Client\Annotation;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD)]
final class Description
{
    public function __construct(public string $value)
    {
    }
}
