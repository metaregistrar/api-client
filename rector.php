<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/Tests',
        __DIR__ . '/example',
        __DIR__ . '/src',
    ])
    // uncomment to reach your current PHP version
    // ->withPhpSets()
    ->withComposerBased(phpunit: true)
    ->withImportNames(removeUnusedImports: true)
    ->withAttributesSets(phpunit: true, jms: true)
    ->withTypeCoverageLevel(0)
    ->withDeadCodeLevel(0)
    ->withCodeQualityLevel(0);
