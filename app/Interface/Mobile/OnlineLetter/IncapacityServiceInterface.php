<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\Incapacity\IncapacitySchema;

interface IncapacityServiceInterface
{
    public function send(IncapacitySchema $schema): ServiceResponse;
}
