<?php

namespace App\Livewire\Pages\Landing\Service\Domicile;

use App\Commons\Const\Option;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{

    public $gender = Option::Gender;
    public $citizenship = Option::Citizenship;
    public $religion = Option::Religion;
    public $marriage = Option::Marriage;

    public function mutate($captcha)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('CAPTCHA_SECRET_KEY'),
            'response' => $captcha,
            'remoteip' => request()->ip(),
        ]);
        dd($response->json());
    }
    public function render()
    {
        return view('livewire.pages.landing.service.domicile.index');
    }
}
