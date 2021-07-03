<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'AuditStash' => $baseDir . '/vendor/lorenzo/audit-stash/',
        'Authentication' => $baseDir . '/vendor/cakephp/authentication/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'CakePdf' => $baseDir . '/vendor/friendsofcake/cakepdf/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'CsvView' => $baseDir . '/vendor/friendsofcake/cakephp-csvview/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'ReCrud' => $baseDir . '/plugins/ReCrud/',
        'Search' => $baseDir . '/vendor/friendsofcake/search/',
        'Shim' => $baseDir . '/vendor/dereuromark/cakephp-shim/',
        'SocialShare' => $baseDir . '/vendor/drmonkeyninja/cakephp-social-share/',
        'Tools' => $baseDir . '/vendor/dereuromark/cakephp-tools/',
    ],
];
