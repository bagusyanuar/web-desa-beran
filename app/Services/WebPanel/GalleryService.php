<?php

namespace App\Services\WebPanel;

use App\Commons\FileUpload\FileUpload;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\GalleryServiceInterface;
use App\Models\Gallery;
use App\Schemas\WebPanel\Gallery\GallerySchema;
use Illuminate\Support\Facades\DB;

class GalleryService implements GalleryServiceInterface
{
    public function findAll(): ServiceResponse
    {
        try {
            $data = Gallery::with([])
                ->orderBy('created_at', 'DESC')
                ->get();
            return ServiceResponse::statusOK("successfully get galleries", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function create(GallerySchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            # create image
            $imageName = null;
            if ($schema->getImage()) {
                $fileUploadService = new FileUpload($schema->getImage(), "assets/gallery");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $imageName = $fileUploadResponse->getFileName();
            }

            $dataGallery = [
                'title' => $schema->getTitle(),
                'image' => $imageName,
            ];
            Gallery::create($dataGallery);
            DB::commit();
            return ServiceResponse::statusCreated("successfully create gallery");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = Gallery::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            return ServiceResponse::statusOK("successfully get gallery", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function update($id, GallerySchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = Gallery::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }

            $dataGallery = [
                'title' => $schema->getTitle(),
            ];

            # create image
            if ($schema->getImage()) {
                $fileUploadService = new FileUpload($schema->getImage(), "assets/gallery");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $dataGallery['image'] = $fileUploadResponse->getFileName();
            }

            $data->update($dataGallery);
            DB::commit();
            return ServiceResponse::statusOK("successfully update gallery");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function delete($id): ServiceResponse
    {
        try {
            $data = Gallery::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            $data->delete();
            return ServiceResponse::statusOK("successfully delete gallery");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
