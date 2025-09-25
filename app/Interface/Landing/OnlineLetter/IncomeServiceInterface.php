<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\Income\IncomeSchema;

interface IncomeServiceInterface
{
    public function send(IncomeSchema $schema): ServiceResponse;
    public function findByCode($code): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
