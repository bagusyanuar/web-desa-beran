<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Setting\SettingGreetingWordSchema;
use App\Schemas\WebPanel\Setting\SettingHeroSchema;
use App\Schemas\WebPanel\Setting\SettingLandingTitle;

interface SettingServiceInterface
{
    public function createHeroImage(SettingHeroSchema $schema): ServiceResponse;
    public function createGreetingWord(SettingGreetingWordSchema $schema): ServiceResponse;
    public function createLandingTitle(SettingLandingTitle $schema): ServiceResponse;
    public function getSetting(): ServiceResponse;
}
