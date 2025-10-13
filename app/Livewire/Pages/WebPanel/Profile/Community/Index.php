<?php

namespace App\Livewire\Pages\WebPanel\Profile\Community;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Profile\Community\CommunitySchema;
use App\Services\WebPanel\Profile\AboutCommunityService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
     /** @var AboutCommunityService $service */
    private $service;

    public function boot(AboutCommunityService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $schema = (new CommunitySchema())->hydrateSchemaBody($body);
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
        return view('livewire.pages.web-panel.profile.community.index');
    }
}
