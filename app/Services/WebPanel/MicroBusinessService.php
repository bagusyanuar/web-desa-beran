<?php

namespace App\Services\WebPanel;

use App\Commons\FileUpload\FileUpload;
use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\MicroBusinessServiceInterface;
use App\Models\MicroBusiness;
use App\Models\MicroBusinessAddress;
use App\Models\MicroBusinessContact;
use App\Models\MicroBusinessImage;
use App\Models\MicroBusinessOwner;
use App\Schemas\WebPanel\MicroBusiness\MicroBusinessQuery;
use App\Schemas\WebPanel\MicroBusiness\MicroBusinessSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MicroBusinessService implements MicroBusinessServiceInterface
{
    public function findAll(MicroBusinessQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = MicroBusiness::with(['owner', 'contact'])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('title', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhereRelation('owner', 'name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('title', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get micro business", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = MicroBusiness::with(['owner', 'contact', 'address', 'image'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            return ServiceResponse::statusOK("successfully get micro business", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function update($id, MicroBusinessSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $microBusiness = MicroBusiness::with(['owner', 'contact', 'address', 'image'])
                ->where('id', '=', $id)
                ->first();
            if (!$microBusiness) {
                DB::rollBack();
                return ServiceResponse::notFound("data not found");
            }

            $dataMicroBusineess = [
                'title' => $schema->getTitle(),
                'slug' => Str::slug($schema->getTitle()),
                'description' => $schema->getDescription(),
            ];

            $microBusiness->update($dataMicroBusineess);

            # update owner
            $owner = $microBusiness->owner;
            if ($owner) {
                $ownerImageName = null;
                if ($schema->getOwnerImage()) {
                    $fileUploadService = new FileUpload($schema->getOwnerImage(), "assets/images/micro-business/owner");
                    $fileUploadResponse = $fileUploadService->upload();
                    if (!$fileUploadResponse->isSuccess()) {
                        DB::rollBack();
                        return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                    }
                    $ownerImageName = $fileUploadResponse->getFileName();
                }

                $dataOwner = [
                    'micro_business_id' => $microBusiness->id,
                    'name' => $schema->getOwnerName(),
                    'image' => $ownerImageName,
                    'description' => $schema->getOwnerDescription(),
                ];
                $owner->update($dataOwner);
            }

            # update address
            $address = $microBusiness->address;
            $dataAddress = [
                'micro_business_id' => $microBusiness->id,
                'address' => $schema->getOwnerAddress(),
                'is_main' => true,
            ];
            if ($address) {
                $address->update($dataAddress);
            } else {
                MicroBusinessAddress::create($dataAddress);
            }

            # update contact
            $contact = $microBusiness->contact;
            $dataContact = [
                'micro_business_id' => $microBusiness->id,
                'type' => 'phone',
                'value' => $schema->getOwnerContact(),
                'is_main' => true,
            ];
            if ($contact) {
                $contact->update($dataContact);
            } else {
                MicroBusinessContact::create($dataContact);
            }

            # update image
            $image = $microBusiness->image;
            $productImageName = null;
            if ($schema->getProductImage()) {
                $fileUploadService = new FileUpload($schema->getProductImage(), "assets/images/micro-business/product");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $productImageName = $fileUploadResponse->getFileName();
            }
            $dataImage = [
                'micro_business_id' => $microBusiness->id,
                'image' => $productImageName,
                'is_thumbnail' => true,
            ];

            if ($image) {
                $image->update($dataImage);
            } else {
                MicroBusinessImage::create($dataImage);
            }
            DB::commit();
            return ServiceResponse::statusOK("successfully update micro business");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function delete($id): ServiceResponse
    {
        try {
            $data = MicroBusiness::with(['owner', 'contact', 'address', 'image'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            $data->delete();
            return ServiceResponse::statusOK("successfully delete micro business");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function create(MicroBusinessSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataMicroBusineess = [
                'title' => $schema->getTitle(),
                'slug' => Str::slug($schema->getTitle()),
                'description' => $schema->getDescription(),
            ];

            $microBusiness = MicroBusiness::create($dataMicroBusineess);

            # create address
            $dataAddress = [
                'micro_business_id' => $microBusiness->id,
                'address' => $schema->getOwnerAddress(),
                'is_main' => true,
            ];

            MicroBusinessAddress::create($dataAddress);

            # create owner
            $ownerImageName = null;
            if ($schema->getOwnerImage()) {
                $fileUploadService = new FileUpload($schema->getOwnerImage(), "assets/images/micro-business/owner");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $ownerImageName = $fileUploadResponse->getFileName();
            }
            $dataOwner = [
                'micro_business_id' => $microBusiness->id,
                'name' => $schema->getOwnerName(),
                'image' => $ownerImageName,
                'description' => $schema->getOwnerDescription(),
            ];
            MicroBusinessOwner::create($dataOwner);

            # create contact
            $dataContact = [
                'micro_business_id' => $microBusiness->id,
                'type' => 'phone',
                'value' => $schema->getOwnerContact(),
                'is_main' => true,
            ];
            MicroBusinessContact::create($dataContact);

            # create images
            $productImageName = null;
            if ($schema->getProductImage()) {
                $fileUploadService = new FileUpload($schema->getProductImage(), "assets/images/micro-business/product");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $productImageName = $fileUploadResponse->getFileName();
            }
            $dataImage = [
                'micro_business_id' => $microBusiness->id,
                'image' => $productImageName,
                'is_thumbnail' => true,
            ];
            MicroBusinessImage::create($dataImage);
            DB::commit();
            return ServiceResponse::statusCreated("successfully create micro business");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
