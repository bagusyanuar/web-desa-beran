<?php

namespace App\Livewire\Pages\WebPanel\Village;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Village\VillageQuery;
use App\Services\WebPanel\VillageService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var VillageService $service */
    private $service;

    public function boot(VillageService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new VillageQuery())->hydrateSchemaQuery($query);
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
        return view('livewire.pages.web-panel.village.index');
    }
}
