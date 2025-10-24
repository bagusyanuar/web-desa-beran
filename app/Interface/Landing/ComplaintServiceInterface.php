<?php

namespace App\Interface\Landing;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\Complaint\ComplaintSchema;

interface ComplaintServiceInterface
{
    public function send(ComplaintSchema $schema): ServiceResponse;
    public function findByCode($code): ServiceResponse;
}
