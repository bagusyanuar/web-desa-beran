<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\Domicile\DomicileSchema;

interface DomicileServiceInterface
{
    public function send(DomicileSchema $schema): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
