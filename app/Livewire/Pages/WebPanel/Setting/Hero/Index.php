<?php

namespace App\Livewire\Pages\WebPanel\Setting\Hero;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Setting\SettingHeroSchema;
use App\Services\WebPanel\SettingService;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    use WithFileUploads;

    /** @var UploadedFile | null $imageHero */
    public $imageHero;

    /** @var SettingService $service */
    private $service;

    public function boot(SettingService $service)
    {
        $this->service = $service;
    }

    public function save()
    {
        $body = [
            'heroImage' => $this->imageHero,
        ];

        $schema = (new SettingHeroSchema())->hydrateSchemaBody($body);
        $response = $this->service->createHeroImage($schema);
        return AlpineResponse::fromService($response);
    }

    public function getSetting()
    {
        $response = $this->service->getSetting();
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.setting.hero.index');
    }
}
