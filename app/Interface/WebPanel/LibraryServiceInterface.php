<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Library\LibraryQuery;
use App\Schemas\WebPanel\Library\LibrarySchema;

interface LibraryServiceInterface
{
    public function findAll(LibraryQuery $queryParams): ServiceResponse;
    public function create(LibrarySchema $schema): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function update($id, LibrarySchema $schema): ServiceResponse;
    public function delete($id): ServiceResponse;
}
