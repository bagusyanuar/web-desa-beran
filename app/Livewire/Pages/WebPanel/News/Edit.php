<?php

namespace App\Livewire\Pages\WebPanel\News;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\News\NewsSchema;
use App\Services\WebPanel\NewsService;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app-admin')]
class Edit extends Component
{
    use WithFileUploads;

    /** @var UploadedFile | null $thumbnail */
    public $thumbnail;

    /** @var NewsService $service */
    private $service;

    public $id;

    public function boot(NewsService $service)
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
            'thumbnail' => $this->thumbnail,
        ]);
        $schema = (new NewsSchema())->hydrateSchemaBody($mergeBody);
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
        return view('livewire.pages.web-panel.news.edit');
    }
}
