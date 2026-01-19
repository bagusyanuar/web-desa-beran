<?php

namespace App\Livewire\Pages\Landing\Profile\Staff;

use App\Services\Landing\Profile\StaffService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    public $data;
    public $members;
    public $heads;
    public $secretaries;

    public function mount()
    {
        $service = new StaffService();
        $response = $service->getProfile();
        if ($response->getStatus() === 200) {
            $this->data = $response->getData();
            $data = $response->getData();
            $this->heads = $data->where('position_group', '=', 'head')->all();
            $this->secretaries = $data->where('position_group', '=', 'secretary')->all();
            $this->members = $data->whereNotIn('position_group', ['head', 'secretary'])->all();
        } else {
            $this->data = [];
            $this->heads = [];
            $this->secretaries = [];
            $this->members = [];
        }
    }

    public function render()
    {
        return view('livewire.pages.landing.profile.staff.index');
    }
}
