<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Death;

use App\Commons\Const\Option;
use App\Commons\Libs\Captcha\Recaptcha;
use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\OnlineLetter\Death\DeathSchema;
use App\Services\Landing\OnlineLetter\DeathService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
     /** @var DeathService $service */
    private $service;

    public $genders = Option::Gender;
    public $citizenships = Option::Citizenship;
    public $marriages = Option::Marriage;
    public $religions = Option::Religion;

    public function boot(DeathService $service)
    {
        $this->service = $service;
    }

    public function send($body, $captchaToken)
    {
        $captchaValidation = Recaptcha::validate($captchaToken);
        if ($captchaValidation['success']) {
            $schema = (new DeathSchema())->hydrateSchemaBody($body);
            $response = $this->service->send($schema);
            return AlpineResponse::fromService($response);
        }
        return AlpineResponse::toJSON(500, "invalid captcha");
    }
    public function render()
    {
        return view('livewire.pages.landing.online-letter.death.index');
    }
}
