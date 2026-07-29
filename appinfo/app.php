<?php

namespace OCA\VideoBriefBoard\AppInfo;

\OC::$server->getNavigationManager()->add(function () {
    $urlGenerator = \OC::$server->getURLGenerator();

    return [
        'id' => 'video_brief_board',
        'order' => 35,
        'href' => $urlGenerator->linkToRoute('video_brief_board.page.index'),
        'icon' => $urlGenerator->imagePath('video_brief_board', 'app.svg'),
        'name' => 'Video Briefs',
    ];
});
