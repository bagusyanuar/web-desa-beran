<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Login\LoginSchema;

interface AuthServiceInterface
{
    public function login(LoginSchema $schema): ServiceResponse;
}
