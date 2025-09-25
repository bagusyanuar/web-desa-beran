<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\PoliceClearance\PoliceClearanceSchema;

interface PoliceClearanceServiceInterface
{
    public function send(PoliceClearanceSchema $schema): ServiceResponse;
    public function findByCode($code): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
