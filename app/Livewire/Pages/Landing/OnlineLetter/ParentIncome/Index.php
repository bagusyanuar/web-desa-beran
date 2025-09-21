<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\ParentIncome;

use App\Commons\Const\Option;
use App\Commons\Libs\Captcha\Recaptcha;
use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\OnlineLetter\ParentIncome\ParentIncomeSchema;
use App\Services\Landing\OnlineLetter\ParentIncomeService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
     /** @var ParentIncomeService $service */
    private $service;

    public $genders = Option::Gender;
    public $citizenships = Option::Citizenship;
    public $marriages = Option::Marriage;
    public $religions = Option::Religion;

    public function boot(ParentIncomeService $service)
    {
        $this->service = $service;
    }

    public function send($body, $captchaToken)
    {
        $captchaValidation = Recaptcha::validate($captchaToken);
        if ($captchaValidation['success']) {
            $schema = (new ParentIncomeSchema())->hydrateSchemaBody($body);
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
        return view('livewire.pages.landing.online-letter.parent-income.index');
    }
}
