<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Village\VillageQuery;
use App\Schemas\WebPanel\Village\VillageSchema;

interface VillageServiceInterface
{
    public function findAllNoPaging(): ServiceResponse;
    public function findAll(VillageQuery $queryParams): ServiceResponse;
    public function create(VillageSchema $schema): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function update($id, VillageSchema $schema): ServiceResponse;
    public function delete($id): ServiceResponse;
}
