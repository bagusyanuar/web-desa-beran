<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\SingleStatus\SingleStatusSchema;

interface SingleStatusServiceInterface
{
    public function send(SingleStatusSchema $schema): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
