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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

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
        $renderer = new ImageRenderer(
            new RendererStyle(200, 0),
            new SvgImageBackEnd() // 👈 pakai SVG backend, bukan PNG
        );

        $writer = new Writer($renderer);

        $qrCode = base64_encode($writer->writeString('SKD/20250907154003'));
        $options = new Options();
        $options->setIsPhpEnabled(true);
        $options->setIsRemoteEnabled(true);
        $pdf = Pdf::loadView('pdf.letter-receipt', [
            'qrcode' => $qrCode
        ])->setPaper('a5', 'landscape');
        $pdf->getDomPDF()->setOptions($options);
        $pdfBase64 = base64_encode($pdf->output());
        return AlpineResponse::toJSON(200, "successfully create pdf", $pdfBase64);
    }


    public function render()
    {
        return view('livewire.pages.landing.online-letter.domicile.index');
    }
}
