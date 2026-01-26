<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\SingleStatus\SingleStatusSchema;

interface SingleStatusServiceInterface
{
    public function send(SingleStatusSchema $schema): ServiceResponse;
}
