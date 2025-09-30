<?php

namespace App\Livewire\Pages\WebPanel\MicroBusiness;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\MicroBusiness\MicroBusinessSchema;
use App\Services\WebPanel\MicroBusinessService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app-admin')]
class Detail extends Component
{
    use WithFileUploads;

    /** @var UploadedFile | null $ownerImage */
    public $ownerImage;

    /** @var UploadedFile | null $productImage */
    public $productImage;

    /** @var MicroBusinessService $service */
    private $service;

    public function boot(MicroBusinessService $service)
    {
        $this->service = $service;
    }

    public function save($body)
    {
        $mergeBody = array_merge($body, [
            'ownerImage' => $this->ownerImage,
            'productImage' => $this->productImage,
        ]);
        $schema = (new MicroBusinessSchema())->hydrateSchemaBody($mergeBody);
        $response = $this->service->create($schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.micro-business.detail');
    }
}
