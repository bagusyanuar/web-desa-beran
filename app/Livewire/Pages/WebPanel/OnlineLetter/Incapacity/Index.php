<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\Incapacity;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\Incapacity\IncapacityQuery;
use App\Services\WebPanel\OnlineLetter\IncapacityService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var IncapacityService $service */
    private $service;

    public function boot(IncapacityService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new IncapacityQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.incapacity.index');
    }
}
