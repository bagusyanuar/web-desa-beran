<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\CommunityUnit\CommunityUnitQuery;
use App\Schemas\WebPanel\CommunityUnit\CommunityUnitSchema;

interface CommunityUnitServiceInterface
{
    public function findAll(CommunityUnitQuery $queryParams): ServiceResponse;
    public function create(CommunityUnitSchema $schema): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function update($id, CommunityUnitSchema $schema): ServiceResponse;
    public function delete($id): ServiceResponse;
}
