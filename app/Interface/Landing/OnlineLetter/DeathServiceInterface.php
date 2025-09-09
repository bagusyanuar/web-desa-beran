<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\Death\DeathSchema;

interface DeathServiceInterface
{
    public function send(DeathSchema $schema): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
