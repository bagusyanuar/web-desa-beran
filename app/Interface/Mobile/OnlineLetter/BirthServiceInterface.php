<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\Birth\BirthSchema;

interface BirthServiceInterface
{
    public function send(BirthSchema $schema): ServiceResponse;
}
