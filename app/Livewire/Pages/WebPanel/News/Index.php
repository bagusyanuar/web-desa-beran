<?php

namespace App\Livewire\Pages\WebPanel\News;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\News\NewsQuery;
use App\Services\WebPanel\NewsService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{

    /** @var NewsService $service */
    private $service;

    public function boot(NewsService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new NewsQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function delete($id)
    {
        $response = $this->service->delete($id);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.news.index');
    }
}
