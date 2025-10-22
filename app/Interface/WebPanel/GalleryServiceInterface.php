<?php

namespace App\Interface\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\WebPanel\Gallery\GallerySchema;

interface GalleryServiceInterface
{
    public function findAll(): ServiceResponse;
    public function create(GallerySchema $schema): ServiceResponse;
    public function findByID($id): ServiceResponse;
    public function update($id, GallerySchema $schema): ServiceResponse;
    public function delete($id): ServiceResponse;
}
