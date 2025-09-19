<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\ParentIncome\ParentIncomeSchema;

interface ParentIncomeServiceInterface
{
    public function send(ParentIncomeSchema $schema): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
