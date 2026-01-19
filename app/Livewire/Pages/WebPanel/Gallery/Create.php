<?php

namespace App\Livewire\Pages\WebPanel\Gallery;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Gallery\GallerySchema;
use App\Services\WebPanel\GalleryService;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app-admin')]
class Create extends Component
{
    use WithFileUploads;

    /** @var UploadedFile | null $image */
    public $image;

     /** @var GalleryService $service */
    private $service;

    public function boot(GalleryService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $mergeBody = array_merge($body, [
            'image' => $this->image,
        ]);
        $schema = (new GallerySchema())->hydrateSchemaBody($mergeBody);
        $response = $this->service->create($schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.gallery.create');
    }
}
