<?php

namespace App\Livewire\Pages\Landing\Service\Birth;

use App\Commons\Const\Option;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{
    public $gender = Option::Gender;
    public $citizenship = Option::Citizenship;
    public $religion = Option::Religion;
    public $marriage = Option::Marriage;

    public function render()
    {
        return view('livewire.pages.landing.service.birth.index');
    }
}
