<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php80\Rector\Class_\AnnotationToAttributeRector;
use Rector\Php80\ValueObject\AnnotationToAttribute;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/Tests',
        __DIR__ . '/example',
        __DIR__ . '/src',
    ])
    // uncomment to reach your current PHP version
    // ->withPhpSets()
    ->withConfiguredRule(AnnotationToAttributeRector::class, [
        new AnnotationToAttribute('Metaregistrar\Api\Client\Annotation\DefaultValue'),
        new AnnotationToAttribute('Metaregistrar\Api\Client\Annotation\Description'),
        new AnnotationToAttribute('Metaregistrar\Api\Client\Annotation\MustBe'),
        new AnnotationToAttribute('Metaregistrar\Api\Client\Annotation\MustBeFilled'),
    ])
    ->withComposerBased(phpunit: true)
    ->withImportNames(removeUnusedImports: true)
    ->withAttributesSets(phpunit: true, jms: true)
    ->withTypeCoverageLevel(0)
    ->withDeadCodeLevel(0)
    ->withCodeQualityLevel(0);
