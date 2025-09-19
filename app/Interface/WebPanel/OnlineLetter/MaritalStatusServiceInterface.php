<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\MaritalStatus\MaritalStatusConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\MaritalStatus\MaritalStatusQuery;

interface MaritalStatusServiceInterface
{
    public function findAll(MaritalStatusQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, MaritalStatusConfirmationSchema $schema): ServiceResponse;
    public function createReceipt($id): ServiceResponse;
}
