<?php

namespace App\Interface\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Profile\Community\CommunitySchema;

interface CommunityServiceInterface
{
    public function save(CommunitySchema $schema): ServiceResponse;
    public function getAbout(): ServiceResponse;
}
