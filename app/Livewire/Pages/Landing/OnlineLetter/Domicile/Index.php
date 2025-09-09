<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Domicile;

use App\Commons\Const\Option;
use App\Commons\Libs\Captcha\Recaptcha;
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
        $captchaValidation = Recaptcha::validate($captchaToken);
        if ($captchaValidation['success']) {
            $schema = (new DomicileSchema())->hydrateSchemaBody($body);
            $response = $this->service->send($schema);
            return AlpineResponse::fromService($response);
        }
        return AlpineResponse::toJSON(500, "invalid captcha");
    }

    public function create_receipt($referenceNumber)
    {
        $response = $this->service->createReceipt($referenceNumber);
        return AlpineResponse::fromService($response);
    }


    public function render()
    {
        return view('livewire.pages.landing.online-letter.domicile.index');
    }
}
