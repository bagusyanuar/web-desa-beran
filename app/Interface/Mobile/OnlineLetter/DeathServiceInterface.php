<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\Death\DeathSchema;

interface DeathServiceInterface
{
    public function send(DeathSchema $schema): ServiceResponse;
}
