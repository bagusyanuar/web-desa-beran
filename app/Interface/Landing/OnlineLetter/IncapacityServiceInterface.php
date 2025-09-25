<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\Incapacity\IncapacitySchema;

interface IncapacityServiceInterface
{
    public function send(IncapacitySchema $schema): ServiceResponse;
    public function findByCode($code): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
