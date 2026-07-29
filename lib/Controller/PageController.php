<?php

namespace OCA\VideoBriefBoard\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\Files\IRootFolder;
use OCP\IRequest;
use OCP\IUserSession;

class PageController extends Controller
{
    private $rootFolder;
    private $userSession;

    public function __construct(
        $appName,
        IRequest $request,
        IRootFolder $rootFolder,
        IUserSession $userSession
    ) {
        parent::__construct($appName, $request);
        $this->rootFolder = $rootFolder;
        $this->userSession = $userSession;
    }

    /**
     * @NoAdminRequired
     */
    public function index()
    {
        return new TemplateResponse($this->appName, 'index');
    }

    /**
     * @NoAdminRequired
     */
    public function save()
    {
        $user = $this->userSession->getUser();
        if ($user === null) {
            return new DataResponse(['error' => 'Authentication required.'], 401);
        }

        $title = trim((string) $this->request->getParam('title', ''));
        if ($title === '') {
            return new DataResponse(['error' => 'A brief title is required.'], 422);
        }

        $brief = [
            'schema' => 'video-brief-board/v1',
            'title' => $title,
            'subject' => trim((string) $this->request->getParam('subject', '')),
            'motion' => trim((string) $this->request->getParam('motion', '')),
            'camera' => trim((string) $this->request->getParam('camera', '')),
            'duration_seconds' => (int) $this->request->getParam('duration_seconds', 15),
            'aspect_ratio' => trim((string) $this->request->getParam('aspect_ratio', '16:9')),
            'constraints' => trim((string) $this->request->getParam('constraints', '')),
            'review_notes' => trim((string) $this->request->getParam('review_notes', '')),
            'created_at' => gmdate('c'),
        ];

        $userFolder = $this->rootFolder->getUserFolder($user->getUID());
        $briefFolder = $userFolder->nodeExists('Video Briefs')
            ? $userFolder->get('Video Briefs')
            : $userFolder->newFolder('Video Briefs');

        $baseName = preg_replace('/[^a-z0-9]+/i', '-', strtolower($title));
        $baseName = trim($baseName, '-') ?: 'video-brief';
        $fileName = $baseName . '-' . gmdate('Ymd-His') . '.json';
        $file = $briefFolder->newFile($fileName);
        $file->putContent(json_encode($brief, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return new DataResponse([
            'ok' => true,
            'path' => 'Video Briefs/' . $fileName,
        ]);
    }
}
