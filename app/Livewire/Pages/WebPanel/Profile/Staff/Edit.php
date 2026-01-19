<?php

namespace App\Livewire\Pages\WebPanel\Profile\Staff;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Profile\AboutStaff\AboutStaffSchema;
use App\Services\WebPanel\Profile\AboutStaffService;
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

    /** @var AboutStaffService $service */
    private $service;

    public $id;

    public function boot(AboutStaffService $service)
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
        ]);
        $schema = (new AboutStaffSchema())->hydrateSchemaBody($mergeBody);
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
        return view('livewire.pages.web-panel.profile.staff.edit');
    }
}
