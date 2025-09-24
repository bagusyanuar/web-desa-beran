<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\Birth\BirthConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\Birth\BirthQuery;

interface BirthServiceInterface
{
    public function findAll(BirthQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, BirthConfirmationSchema $schema): ServiceResponse;
    public function finish($id): ServiceResponse;
    public function createReceipt($id): ServiceResponse;
}
