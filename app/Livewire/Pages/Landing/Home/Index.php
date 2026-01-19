<?php

namespace App\Livewire\Pages\Landing\Home;

use App\Services\Landing\SettingService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{
    public $imageHero = null;
    public $greetingWord = '';
    public $landingTitle = '';
    public $landingSubTitle = '';

    public function mount()
    {
        $settingService = new SettingService();
        $settingServiceResponse = $settingService->getSetting();
        if ($settingServiceResponse->getStatus() === 200) {
            $data = $settingServiceResponse->getData();
            if ($data) {
                $this->imageHero = $data->image_hero;
                $this->greetingWord = $data->greeting_word;
                $this->landingTitle = $data->landing_title;
                $this->landingSubTitle = $data->landing_sub_title;
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.landing.home.index');
    }
}
