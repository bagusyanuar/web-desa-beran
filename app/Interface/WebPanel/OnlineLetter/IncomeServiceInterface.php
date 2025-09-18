<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\Income\IncomeConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\Income\IncomeQuery;

interface IncomeServiceInterface
{
    public function findAll(IncomeQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, IncomeConfirmationSchema $schema): ServiceResponse;
    public function createReceipt($id): ServiceResponse;
}
