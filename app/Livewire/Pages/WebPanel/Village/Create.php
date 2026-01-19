<?php

namespace App\Livewire\Pages\WebPanel\Village;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Village\VillageSchema;
use App\Services\WebPanel\VillageService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Create extends Component
{
    /** @var VillageService $service */
    private $service;

    public function boot(VillageService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $schema = (new VillageSchema())->hydrateSchemaBody($body);
        $response = $this->service->create($schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.village.create');
    }
}
