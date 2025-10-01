<?php

namespace App\Livewire\Pages\WebPanel\Profile\About;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Profile\About\AboutSchema;
use App\Services\WebPanel\Profile\AboutService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    use WithFileUploads;

    /** @var UploadedFile | null $image */
    public $image;

    /** @var AboutService $service */
    private $service;

    public function boot(AboutService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $mergeBody = array_merge($body, [
            'image' => $this->image,
        ]);
        $schema = (new AboutSchema())->hydrateSchemaBody($mergeBody);
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
        return view('livewire.pages.web-panel.profile.about.index');
    }
}
