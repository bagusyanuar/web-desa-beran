<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Domicile;

use App\Commons\Const\Option;
use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\OnlineLetter\Domicile\DomicileSchema;
use App\Services\Landing\OnlineLetter\DomicileService;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{
    /** @var DomicileService $service */
    private $service;

    public $genders = Option::Gender;
    public $citizenships = Option::Citizenship;
    public $marriages = Option::Marriage;
    public $religions = Option::Religion;

    public function boot(DomicileService $service)
    {
        $this->service = $service;
    }

    public function send($body, $captchaToken)
    {
        $schema = (new DomicileSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return AlpineResponse::fromService($response);
    }

    public function create_receipt()
    {
        $options = new Options();
        $options->setIsPhpEnabled(true);
        $options->setIsRemoteEnabled(true);
        $pdf = Pdf::loadView('pdf.letter-receipt')->setPaper('a5', 'landscape');
        $pdf->getDomPDF()->setOptions($options);
        $pdfBase64 = base64_encode($pdf->output());
        return AlpineResponse::toJSON(200, "successfully create pdf", $pdfBase64);
    }


    public function render()
    {
        return view('livewire.pages.landing.online-letter.domicile.index');
    }
}
