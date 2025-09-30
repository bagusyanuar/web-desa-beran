<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\MicroBusiness\MicroBusinessQuery;
use App\Schemas\WebPanel\MicroBusiness\MicroBusinessSchema;

interface MicroBusinessServiceInterface
{
    public function findAll(MicroBusinessQuery $queryParams): ServiceResponse;
    public function create(MicroBusinessSchema $schema): ServiceResponse;
}
