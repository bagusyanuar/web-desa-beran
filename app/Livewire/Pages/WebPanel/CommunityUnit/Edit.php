<?php

namespace App\Livewire\Pages\WebPanel\CommunityUnit;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\CommunityUnit\CommunityUnitSchema;
use App\Services\WebPanel\CommunityUnitService;
use App\Services\WebPanel\VillageService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Edit extends Component
{
    /** @var CommunityUnitService $service */
    private $service;

    public $villages;

    public $id;

    public function boot(CommunityUnitService $service)
    {
        $this->service = $service;
    }

    public function mount($id)
    {
        $this->id = $id;

        $villageService = new VillageService();
        $villageServiceRespon = $villageService->findAllNoPaging();
        if ($villageServiceRespon->getStatus() === 200) {
            $this->villages = $villageServiceRespon->getData();
        }
    }


    public function save($body)
    {
        $schema = (new CommunityUnitSchema())->hydrateSchemaBody($body);
        $response = $this->service->update($this->id, $schema);
        return AlpineResponse::fromService($response);
    }

    public function getDetail()
    {
        $response = $this->service->findByID($this->id);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.community-unit.edit');
    }
}
