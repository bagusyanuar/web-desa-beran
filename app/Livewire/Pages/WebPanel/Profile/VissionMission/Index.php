<?php

namespace App\Livewire\Pages\WebPanel\Profile\VissionMission;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Profile\AboutVissionMission\AboutVissionMissionSchema;
use App\Services\WebPanel\Profile\AboutVissionMissionService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var AboutVissionMissionService $service */
    private $service;

    public function boot(AboutVissionMissionService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $schema = (new AboutVissionMissionSchema())->hydrateSchemaBody($body);
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
        return view('livewire.pages.web-panel.profile.vission-mission.index');
    }
}
