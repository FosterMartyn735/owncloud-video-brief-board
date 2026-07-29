<?php

namespace OCA\VideoBriefBoard\AppInfo;

$application = new Application();
$application->registerRoutes(
    $this,
    [
        'routes' => [
            [
                'name' => 'page#index',
                'url' => '/',
                'verb' => 'GET',
            ],
            [
                'name' => 'page#save',
                'url' => '/briefs',
                'verb' => 'POST',
            ],
        ],
    ]
);
