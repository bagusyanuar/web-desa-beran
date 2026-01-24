<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\PoliceClearance\PoliceClearanceSchema;

interface PoliceClearanceServiceInterface
{
    public function send(PoliceClearanceSchema $schema): ServiceResponse;
}
