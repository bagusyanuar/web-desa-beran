<?php

namespace App\Livewire\Pages\WebPanel\Complaint;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Complaint\ComplaintConfirmationSchema;
use App\Services\WebPanel\ComplaintService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Detail extends Component
{
    public $data;
    public $id;
    public $chatTextLink = '#';

    /** @var ComplaintService $service */
    private $service;

    public function boot(ComplaintService $service)
    {
        $this->service = $service;
    }

    public function mount($id)
    {
        $this->id = $id;
        $response = $this->service->findByID($id);
        if ($response->getStatus() === 404) {
            abort(404, 'Data Aduan Masyarakat Tidak DiTemukan');
        }
        $this->data = $response->getData();
        // $this->generateChatTextLink();
    }

    public function confirm($body)
    {
        $schema = (new ComplaintConfirmationSchema())->hydrateSchemaBody($body);
        $response = $this->service->confirm($this->id, $schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.complaint.detail');
    }
}
