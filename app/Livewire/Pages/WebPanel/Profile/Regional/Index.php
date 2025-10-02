<?php

namespace App\Livewire\Pages\WebPanel\Profile\Regional;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Profile\AboutRegional\AboutRegionalSchema;
use App\Services\WebPanel\Profile\AboutRegionalService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var AboutRegionalService $service */
    private $service;

    public function boot(AboutRegionalService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $schema = (new AboutRegionalSchema())->hydrateSchemaBody($body);
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
        return view('livewire.pages.web-panel.profile.regional.index');
    }
}
