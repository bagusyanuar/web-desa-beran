<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\NeighborhoodUnit\NeighborhoodUnitQuery;
use App\Schemas\WebPanel\NeighborhoodUnit\NeighborhoodUnitSchema;

interface NeighborhoodUnitServiceInterface
{
    public function findAll(NeighborhoodUnitQuery $queryParams): ServiceResponse;
    public function create(NeighborhoodUnitSchema $schema): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function update($id, NeighborhoodUnitSchema $schema): ServiceResponse;
    public function delete($id): ServiceResponse;
}
