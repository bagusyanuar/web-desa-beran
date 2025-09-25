<?php

namespace App\Interface\WebPanel\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\OnlineLetter\PoliceClearance\PoliceClearanceConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\PoliceClearance\PoliceClearanceQuery;

interface PoliceClearanceServiceInterface
{
    public function findAll(PoliceClearanceQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, PoliceClearanceConfirmationSchema $schema): ServiceResponse;
    public function finish($id): ServiceResponse;
    public function createReceipt($id): ServiceResponse;
}
