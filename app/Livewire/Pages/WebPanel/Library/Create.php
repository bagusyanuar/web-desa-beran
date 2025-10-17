<?php

namespace App\Livewire\Pages\WebPanel\Library;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Library\LibrarySchema;
use App\Services\WebPanel\LibraryService;
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

    /** @var UploadedFile | null $file */
    public $file;

    /** @var LibraryService $service */
    private $service;

    public function boot(LibraryService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $mergeBody = array_merge($body, [
            'image' => $this->image,
            'file' => $this->file
        ]);
        $schema = (new LibrarySchema())->hydrateSchemaBody($mergeBody);
        $response = $this->service->create($schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.library.create');
    }
}
