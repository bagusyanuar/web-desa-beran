<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\SingleStatus\SingleStatusConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\SingleStatus\SingleStatusQuery;

interface SingleStatusServiceInterface
{
    public function findAll(SingleStatusQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, SingleStatusConfirmationSchema $schema): ServiceResponse;
    public function finish($id): ServiceResponse;
    public function createReceipt($id): ServiceResponse;
}
