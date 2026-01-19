<?php

namespace App\Interface\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\OnlineLetter\Domicile\DomicileSchema;

interface DomicileServiceInterface
{
    public function send(DomicileSchema $schema): ServiceResponse;
}
