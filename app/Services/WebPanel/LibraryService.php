<?php

namespace App\Services\WebPanel;

use App\Commons\FileUpload\FileUpload;
use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\LibraryServiceInterface;
use App\Models\Library;
use App\Schemas\WebPanel\Library\LibraryQuery;
use App\Schemas\WebPanel\Library\LibrarySchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LibraryService implements LibraryServiceInterface
{
    public function findAll(LibraryQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = Library::with([])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('title', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhere('author_name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('title', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get libraries", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function create(LibrarySchema $schema): ServiceResponse
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
                $fileUploadService = new FileUpload($schema->getImage(), "assets/library/images");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $imageName = $fileUploadResponse->getFileName();
            }

            # create file
            $fileName = null;
            if ($schema->getFile()) {
                $fileUploadService = new FileUpload($schema->getFile(), "assets/library/files");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $fileName = $fileUploadResponse->getFileName();
            }
            $dataLibrary = [
                'title' => $schema->getTitle(),
                'slug' => Str::slug($schema->getTitle()),
                'author_name' => $schema->getAuthorName(),
                'image' => $imageName,
                'file' => $fileName,
            ];
            Library::create($dataLibrary);
            DB::commit();
            return ServiceResponse::statusCreated("successfully create library");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = Library::with(['images'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            return ServiceResponse::statusOK("successfully get library", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function update($id, LibrarySchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = Library::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }

            $dataLibrary = [
                'title' => $schema->getTitle(),
                'slug' => Str::slug($schema->getTitle()),
                'author_name' => $schema->getAuthorName(),
            ];

            # create image
            if ($schema->getImage()) {
                $fileUploadService = new FileUpload($schema->getImage(), "assets/library/images");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $dataLibrary['image'] = $fileUploadResponse->getFileName();
            }

            # create file
            if ($schema->getFile()) {
                $fileUploadService = new FileUpload($schema->getFile(), "assets/library/files");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $dataLibrary['file'] = $fileUploadResponse->getFileName();
            }

            $data->update($dataLibrary);
            DB::commit();
            return ServiceResponse::statusOK("successfully update library");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function delete($id): ServiceResponse
    {
        try {
            $data = Library::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            $data->delete();
            return ServiceResponse::statusOK("successfully delete library");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
