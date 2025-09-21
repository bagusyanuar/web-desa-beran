<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\ParentIncome\ParentIncomeConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\ParentIncome\ParentIncomeQuery;

interface ParentIncomeServiceInterface
{
    public function findAll(ParentIncomeQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, ParentIncomeConfirmationSchema $schema): ServiceResponse;
    public function createReceipt($id): ServiceResponse;
}
