<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\News\NewsQuery;
use App\Schemas\WebPanel\News\NewsSchema;

interface NewsServiceInterface
{
    public function findAll(NewsQuery $queryParams): ServiceResponse;
    public function create(NewsSchema $schema): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function update($id, NewsSchema $schema): ServiceResponse;
    public function delete($id): ServiceResponse;
}
