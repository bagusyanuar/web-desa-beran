<?php

namespace App\Livewire\Pages\WebPanel\Village;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Village\VillageSchema;
use App\Services\WebPanel\VillageService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Edit extends Component
{
    /** @var VillageService $service */
    private $service;

    public $id;

    public function boot(VillageService $service)
    {
        $this->service = $service;
    }

    public function mount($id)
    {
        $this->id = $id;
    }

    public function save($body)
    {
        $schema = (new VillageSchema())->hydrateSchemaBody($body);
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
        return view('livewire.pages.web-panel.village.edit');
    }
}
