<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Setting\SettingHeroSchema;

interface SettingServiceInterface
{
    public function createHeroImage(SettingHeroSchema $schema): ServiceResponse;
    public function getSetting(): ServiceResponse;
}
