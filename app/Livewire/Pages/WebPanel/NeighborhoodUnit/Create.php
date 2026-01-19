<?php

namespace App\Livewire\Pages\WebPanel\NeighborhoodUnit;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\NeighborhoodUnit\NeighborhoodUnitSchema;
use App\Services\WebPanel\CommunityUnitService;
use App\Services\WebPanel\NeighborhoodUnitService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Create extends Component
{
    /** @var NeighborhoodUnitService $service */
    private $service;

    public $communityUnits;

    public function boot(NeighborhoodUnitService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $communityUnitService = new CommunityUnitService();
        $communityUnitServiceRespon = $communityUnitService->findAllNoPaging();
        if ($communityUnitServiceRespon->getStatus() === 200) {
            $this->communityUnits = $communityUnitServiceRespon->getData();
        }
    }


    public function save($body)
    {
        $schema = (new NeighborhoodUnitSchema())->hydrateSchemaBody($body);
        $response = $this->service->create($schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.neighborhood-unit.create');
    }
}
