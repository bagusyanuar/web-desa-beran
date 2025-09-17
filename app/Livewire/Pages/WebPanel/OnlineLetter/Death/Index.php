<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\Death;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\Death\DeathQuery;
use App\Services\WebPanel\OnlineLetter\DeathService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var DeathService $service */
    private $service;

    public function boot(DeathService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new DeathQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.death.index');
    }
}
