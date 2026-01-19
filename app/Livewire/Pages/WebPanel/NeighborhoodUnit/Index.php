<?php

namespace App\Livewire\Pages\WebPanel\NeighborhoodUnit;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\NeighborhoodUnit\NeighborhoodUnitQuery;
use App\Services\WebPanel\NeighborhoodUnitService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var NeighborhoodUnitService $service */
    private $service;

    public function boot(NeighborhoodUnitService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new NeighborhoodUnitQuery())->hydrateSchemaQuery($query);
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
        return view('livewire.pages.web-panel.neighborhood-unit.index');
    }
}
