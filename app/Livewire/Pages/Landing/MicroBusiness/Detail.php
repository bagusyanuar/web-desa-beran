<?php

namespace App\Livewire\Pages\Landing\MicroBusiness;

use App\Services\Landing\MicroBusinessService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Detail extends Component
{
    public $data;

    public function mount($slug)
    {
        $service = new MicroBusinessService();
        $response = $service->findBySlug($slug);
        if ($response->getStatus() === 200) {
            $this->data = $response->getData();
        } else {
            $this->data = null;
        }
    }

    public function render()
    {
        return view('livewire.pages.landing.micro-business.detail');
    }
}
