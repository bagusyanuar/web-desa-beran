<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\ParentIncome\ParentIncomeSchema;

interface ParentIncomeServiceInterface
{
    public function send(ParentIncomeSchema $schema): ServiceResponse;
}
