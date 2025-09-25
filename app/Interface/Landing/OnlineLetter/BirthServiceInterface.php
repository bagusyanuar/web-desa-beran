<?php

namespace App\Interface\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\OnlineLetter\Birth\BirthSchema;

interface BirthServiceInterface
{
    public function send(BirthSchema $schema): ServiceResponse;
    public function findByCode($code): ServiceResponse;
    public function createReceipt($referenceNumber): ServiceResponse;
}
