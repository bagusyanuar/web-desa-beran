<?php

namespace App\Livewire\Pages\WebPanel\CommunityUnit;

use App\Commons\Libs\Http\AlpineResponse;
use App\Models\CommunityUnit;
use App\Schemas\WebPanel\CommunityUnit\CommunityUnitQuery;
use App\Services\WebPanel\CommunityUnitService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var CommunityUnitService $service */
    private $service;

    public function boot(CommunityUnitService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new CommunityUnitQuery())->hydrateSchemaQuery($query);
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
        return view('livewire.pages.web-panel.community-unit.index');
    }
}
