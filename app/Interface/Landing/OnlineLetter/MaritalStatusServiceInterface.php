<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\MaritalStatus\MaritalStatusSchema;

interface MaritalStatusServiceInterface
{
    public function send(MaritalStatusSchema $schema): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
