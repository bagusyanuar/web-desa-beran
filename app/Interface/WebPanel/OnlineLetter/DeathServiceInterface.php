<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\Death\DeathConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\Death\DeathQuery;

interface DeathServiceInterface
{
    public function findAll(DeathQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, DeathConfirmationSchema $schema): ServiceResponse;
    public function createReceipt($id): ServiceResponse;
    public function finish($id): ServiceResponse;
}
