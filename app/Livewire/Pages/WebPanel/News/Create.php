<?php

namespace App\Livewire\Pages\WebPanel\News;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\News\NewsSchema;
use App\Services\WebPanel\NewsService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app-admin')]
class Create extends Component
{
    use WithFileUploads;

    /** @var UploadedFile | null $thumbnail */
    public $thumbnail;

    /** @var UploadedFile[] | [] $images */
    public $images = [];

    /** @var NewsService $service */
    private $service;

    public function boot(NewsService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->images = [];
    }

    public function save($body)
    {
        $mergeBody = array_merge($body, [
            'thumbnail' => $this->thumbnail,
            'images' => $this->images,
        ]);
        $schema = (new NewsSchema())->hydrateSchemaBody($mergeBody);
        $response = $this->service->create($schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.news.create');
    }
}
