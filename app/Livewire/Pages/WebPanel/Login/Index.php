<?php

namespace App\Livewire\Pages\WebPanel\Login;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Login\LoginSchema;
use App\Services\WebPanel\AuthService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.auth-admin')]
class Index extends Component
{
    /** @var AuthService $service */
    private $service;

    public function boot(AuthService $service)
    {
        $this->service = $service;
    }

    public function login($body)
    {
        $schema = (new LoginSchema())->hydrateSchemaBody($body);
        $response = $this->service->login($schema);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.login.index');
    }
}
