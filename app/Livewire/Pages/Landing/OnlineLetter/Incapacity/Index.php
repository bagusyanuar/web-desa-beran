<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Incapacity;

use App\Commons\Const\Option;
use App\Commons\Libs\Captcha\Recaptcha;
use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\OnlineLetter\Incapacity\IncapacitySchema;
use App\Services\Landing\OnlineLetter\IncapacityService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    /** @var IncapacityService $service */
    private $service;

    public $genders = Option::Gender;
    public $citizenships = Option::Citizenship;
    public $marriages = Option::Marriage;
    public $religions = Option::Religion;

    public function boot(IncapacityService $service)
    {
        $this->service = $service;
    }

    public function send($body, $captchaToken)
    {
        $captchaValidation = Recaptcha::validate($captchaToken);
        if ($captchaValidation['success']) {
            $schema = (new IncapacitySchema())->hydrateSchemaBody($body);
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
        return view('livewire.pages.landing.online-letter.incapacity.index');
    }
}
