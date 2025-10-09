<?php

namespace App\Livewire\Pages\Landing\News;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\News\NewsQuery;
use App\Services\Landing\NewsService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
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

    public function render()
    {
        return view('livewire.pages.landing.news.index');
    }
}
