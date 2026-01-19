<?php

namespace App\Interface\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Profile\AboutVissionMission\AboutVissionMissionSchema;

interface AboutVissionMissionServiceInterface
{
    public function save(AboutVissionMissionSchema $schema): ServiceResponse;
    public function getAbout(): ServiceResponse;
}
