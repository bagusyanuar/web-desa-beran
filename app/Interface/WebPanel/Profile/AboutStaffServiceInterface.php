<?php

namespace App\Interface\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Profile\AboutStaff\AboutStaffQuery;
use App\Schemas\WebPanel\Profile\AboutStaff\AboutStaffSchema;

interface AboutStaffServiceInterface
{
    public function create(AboutStaffSchema $schema): ServiceResponse;
    public function findAll(AboutStaffQuery $queryParams): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function update($id, AboutStaffSchema $schema): ServiceResponse;
    public function delete($id): ServiceResponse;
}
