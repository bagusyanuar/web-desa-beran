<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Complaint\ComplaintConfirmationSchema;
use App\Schemas\WebPanel\Complaint\ComplaintQuery;

interface ComplaintServiceInterface
{
    public function findAll(ComplaintQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function confirm($id, ComplaintConfirmationSchema $schema): ServiceResponse;
}
