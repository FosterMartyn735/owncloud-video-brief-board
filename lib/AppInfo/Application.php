<?php

namespace OCA\VideoBriefBoard\AppInfo;

use OCA\VideoBriefBoard\Controller\PageController;
use OCP\AppFramework\App;

class Application extends App
{
    public function __construct(array $urlParams = [])
    {
        parent::__construct('video_brief_board', $urlParams);

        $container = $this->getContainer();
        $container->registerService('PageController', function ($container) {
            return new PageController(
                $container->query('AppName'),
                $container->query('Request'),
                $container->query('ServerContainer')->getRootFolder(),
                $container->query('ServerContainer')->getUserSession()
            );
        });
    }
}
