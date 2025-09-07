<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Domicile;

use App\Commons\Const\Option;
use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\OnlineLetter\Domicile\DomicileSchema;
use App\Services\Landing\OnlineLetter\DomicileService;
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


    public function render()
    {
        return view('livewire.pages.landing.online-letter.domicile.index');
    }
}
