<?php

namespace App\Services\WebPanel\Profile;

use App\Commons\FileUpload\FileUpload;
use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\Profile\AboutStaffServiceInterface;
use App\Models\AboutStaff;
use App\Schemas\WebPanel\Profile\AboutStaff\AboutStaffQuery;
use App\Schemas\WebPanel\Profile\AboutStaff\AboutStaffSchema;
use Illuminate\Support\Facades\DB;

class AboutStaffService implements AboutStaffServiceInterface
{
    public function create(AboutStaffSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $index = 1;
            $lastStaff = AboutStaff::with([])
                ->orderBy('index', 'DESC')
                ->first();
            if ($lastStaff) {
                $index = $lastStaff->index + 1;
            }

            # create thumbnail
            $imageName = null;
            if ($schema->getImage()) {
                $fileUploadService = new FileUpload($schema->getImage(), "assets/images/staff");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $imageName = $fileUploadResponse->getFileName();
            }

            $dataStaff = [
                'name' => $schema->getName(),
                'position' => $schema->getPosition(),
                'position_group' => $schema->getPositionGroup(),
                'image' => $imageName,
                'index' => $index,
            ];

            AboutStaff::create($dataStaff);
            DB::commit();
            return ServiceResponse::statusCreated("successfully create new staff");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findAll(AboutStaffQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = AboutStaff::with([])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('index', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get staffs", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = AboutStaff::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            return ServiceResponse::statusOK("successfully get staff", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function update($id, AboutStaffSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $staff = AboutStaff::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$staff) {
                return ServiceResponse::notFound("staff not found");
            }

            $dataStaff = [
                'name' => $schema->getName(),
                'position' => $schema->getPosition(),
                'position_group' => $schema->getPositionGroup(),
            ];

            # create thumbnail
            if ($schema->getImage()) {
                $fileUploadService = new FileUpload($schema->getImage(), "assets/images/staff");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $imageName = $fileUploadResponse->getFileName();
                $dataStaff['image'] = $imageName;
            }



            $staff->update($dataStaff);
            DB::commit();
            return ServiceResponse::statusOK("successfully update staff");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function delete($id): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $data = AboutStaff::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }

            $currentIndex = $data->index;

            $dataAfterIndex = AboutStaff::with([])
                ->where('index', '>', $currentIndex)
                ->whereNot('id', '=', $data->id)
                ->get();

            # delete selected data
            $data->delete();

            # update index after selected data
            foreach ($dataAfterIndex as $datum) {
                $datumNewIndex = $datum->index - 1;
                $datum->update([
                    'index' => $datumNewIndex
                ]);
            }

            DB::commit();
            return ServiceResponse::statusOK("successfully delete staff", $data);
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
