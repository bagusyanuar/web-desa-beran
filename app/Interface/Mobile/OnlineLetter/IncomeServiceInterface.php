<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\Income\IncomeSchema;

interface IncomeServiceInterface
{
    public function send(IncomeSchema $schema): ServiceResponse;
}
