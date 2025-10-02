<?php

namespace App\Interface\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Profile\AboutRegional\AboutRegionalSchema;

interface AboutRegionalServiceInterface
{
    public function save(AboutRegionalSchema $schema): ServiceResponse;
    public function getAbout(): ServiceResponse;
}
