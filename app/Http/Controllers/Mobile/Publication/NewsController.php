<?php

namespace App\Http\Controllers\Mobile\Publication;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Http\Resources\Publication\News\NewsCollection;
use App\Http\Resources\Publication\News\NewsResource;
use App\Schemas\Mobile\Publication\News\NewsQuery;
use App\Services\Mobile\Publication\NewsService;
use Illuminate\Http\Request;

class NewsController extends CustomController
{
    /** @var NewsService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new NewsService();
    }

    public function findAll()
    {
        $schema = (new NewsQuery())->hydrateSchemaBody($this->queryParams());
        $response = $this->service->findAll($schema);
        return new NewsCollection($response->getData(), $response->getHttpStatus(), $response->getMessage());
    }

    public function findBySlug($slug)
    {
        $response = $this->service->findBySlug($slug);
        return new NewsResource($response->getData(), $response->getStatus(), $response->getMessage());
    }
}
