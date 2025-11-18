<?php

namespace App\Livewire\Pages\WebPanel\CommunityUnit;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\CommunityUnit\CommunityUnitSchema;
use App\Services\WebPanel\CommunityUnitService;
use App\Services\WebPanel\VillageService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Create extends Component
{
    /** @var CommunityUnitService $service */
    private $service;

    public $villages;

    public function boot(CommunityUnitService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $villageService = new VillageService();
        $villageServiceRespon = $villageService->findAllNoPaging();
        if ($villageServiceRespon->getStatus() === 200) {
            $this->villages = $villageServiceRespon->getData();
        }
    }


    public function save($body)
    {
        $schema = (new CommunityUnitSchema())->hydrateSchemaBody($body);
        $response = $this->service->create($schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.community-unit.create');
    }
}
