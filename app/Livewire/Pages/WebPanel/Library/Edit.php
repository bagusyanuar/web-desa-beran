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
class Edit extends Component
{
    use WithFileUploads;

    /** @var UploadedFile | null $image */
    public $image;

    /** @var UploadedFile | null $file */
    public $file;

    /** @var LibraryService $service */
    private $service;

    public $id;

    public function boot(LibraryService $service)
    {
        $this->service = $service;
    }

    public function mount($id)
    {
        $this->id = $id;
    }

    public function save($body)
    {
        $mergeBody = array_merge($body, [
            'image' => $this->image,
            'file' => $this->file,
        ]);
        $schema = (new LibrarySchema())->hydrateSchemaBody($mergeBody);
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
        return view('livewire.pages.web-panel.library.edit');
    }
}
