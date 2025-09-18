<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Incapacity;

use App\Commons\Const\Option;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    public $genders = Option::Gender;
    public $citizenships = Option::Citizenship;
    public $marriages = Option::Marriage;
    public $religions = Option::Religion;

    public function render()
    {
        return view('livewire.pages.landing.online-letter.incapacity.index');
    }
}
