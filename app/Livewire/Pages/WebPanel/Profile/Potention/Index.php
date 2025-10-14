<?php

namespace App\Livewire\Pages\WebPanel\Profile\Potention;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Profile\AboutPotention\AboutPotentionSchema;
use App\Services\WebPanel\Profile\AboutPotentionService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var AboutPotentionService $service */
    private $service;

    public function boot(AboutPotentionService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $schema = (new AboutPotentionSchema())->hydrateSchemaBody($body);
        $response = $this->service->save($schema);
        return AlpineResponse::fromService($response);
    }

    public function getAbout()
    {
        $response = $this->service->getAbout();
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.profile.potention.index');
    }
}
