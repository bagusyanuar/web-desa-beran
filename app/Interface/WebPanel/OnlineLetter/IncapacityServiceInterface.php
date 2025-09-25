<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\Incapacity\IncapacityConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\Incapacity\IncapacityQuery;

interface IncapacityServiceInterface
{
    public function findAll(IncapacityQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, IncapacityConfirmationSchema $schema): ServiceResponse;
    public function finish($id): ServiceResponse;
    public function createReceipt($id): ServiceResponse;
}
