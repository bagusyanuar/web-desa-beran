<?php

namespace App\Interface\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Profile\AboutPotention\AboutPotentionSchema;

interface AboutPotentionServiceInterface
{
    public function save(AboutPotentionSchema $schema): ServiceResponse;
    public function getAbout(): ServiceResponse;
}
