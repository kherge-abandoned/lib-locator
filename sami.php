<?php

use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$versions = GitVersionCollection::create(__DIR__)
    ->add('master')
    ->addFromTags('*.*.0');

return new Sami(
    Finder::create()
        ->files()
        ->name('*.php')
        ->in(__DIR__ . '/src/lib'),
    array(
        'build_dir' => __DIR__ . '/../docs/%version%',
        'cache_dir' => sys_get_temp_dir() . '/lib-locator/%version%',
        'theme' => 'github',
        'versions' => $versions
    )
);
