<?php

namespace App\Interface\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Profile\About\AboutSchema;

interface AboutServiceInterface
{
    public function save(AboutSchema $schema): ServiceResponse;
    public function getAbout(): ServiceResponse;
}
