<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\MaritalStatus\MaritalStatusSchema;

interface MaritalStatusServiceInterface
{
    public function send(MaritalStatusSchema $schema): ServiceResponse;
}
