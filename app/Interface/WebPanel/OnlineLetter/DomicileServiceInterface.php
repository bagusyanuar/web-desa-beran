<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\Domicile\DomicileConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\Domicile\DomicileQuery;

interface DomicileServiceInterface
{
    public function findAll(DomicileQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, DomicileConfirmationSchema $schema): ServiceResponse;
}
