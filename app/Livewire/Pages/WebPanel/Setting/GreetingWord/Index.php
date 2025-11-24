<?php

namespace App\Livewire\Pages\WebPanel\Setting\GreetingWord;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Setting\SettingGreetingWordSchema;
use App\Services\WebPanel\SettingService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app-admin')]
class Index extends Component
{

    /** @var SettingService $service */
    private $service;

    public function boot(SettingService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $schema = (new SettingGreetingWordSchema())->hydrateSchemaBody($body);
        $response = $this->service->createGreetingWord($schema);
        return AlpineResponse::fromService($response);
    }

    public function getSetting()
    {
        $response = $this->service->getSetting();
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.setting.greeting-word.index');
    }
}
