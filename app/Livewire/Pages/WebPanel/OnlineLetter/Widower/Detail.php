<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\Widower;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\MaritalStatus\MaritalStatusConfirmationSchema;
use App\Services\WebPanel\OnlineLetter\MaritalStatusService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Detail extends Component
{
    public $data;
    public $id;
    public $chatTextLink = '#';

    /** @var MaritalStatusService $service */
    private $service;

    public function boot(MaritalStatusService $service)
    {
        $this->service = $service;
    }

    public function mount($id)
    {
        $this->id = $id;
        $response = $this->service->findByID($id);
        if ($response->getStatus() === 404) {
            abort(404, 'Data Permohonan Tidak DiTemukan');
        }
        $this->data = $response->getData();
        $this->generateChatTextLink();
    }

    public function confirm($body)
    {
        $schema = (new MaritalStatusConfirmationSchema())->hydrateSchemaBody($body);
        $response = $this->service->confirm($this->id, $schema);
        return AlpineResponse::fromService($response);
    }

    private function generateChatTextLink()
    {
        $phone = $this->data->applicant->phone;
        $applicantName = $this->data->applicant->name;
        $name = $this->data->person->name;

        $header = "Pemberitahuan Pengajuan Surat Keterangan Duda Desa Beran\n\n";
        $subject = "Memberitahukan kepada {$applicantName} perihal pengajuan surat atas nama {$name}, dinyatakan :\n";
        $status = match ($this->data->status) {
            'pending' => "DITERIMA\n",
            'failed' => "TIDAK DITERIMA\n",
            default => ''
        };

        $body = match ($this->data->status) {
            'pending' => "Mengetahui hal tersebut dimohon surat pengajuan segera diambil di kantor DESA BERAN\n",
            'failed' => "di karenakan :\n{$this->data->failed_description}\n\n",
            default => ''
        };

        $footer = "Hormat Kami\n\nAdmin DESA BERAN";
        $message = urlencode($header . $subject . $status . $body . $footer);
        $this->chatTextLink = "https://wa.me/{$phone}?text={$message}";
    }

    public function create_receipt($id)
    {
        $response = $this->service->createReceipt($id);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.widower.detail');
    }
}
