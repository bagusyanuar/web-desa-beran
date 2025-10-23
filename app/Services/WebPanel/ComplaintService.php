<?php

namespace App\Services\WebPanel;

use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\ComplaintServiceInterface;
use App\Models\Complaint;
use App\Schemas\WebPanel\Complaint\ComplaintConfirmationSchema;
use App\Schemas\WebPanel\Complaint\ComplaintQuery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ComplaintService implements ComplaintServiceInterface
{
    public function findAll(ComplaintQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = Complaint::with(['applicant', 'images'])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('reference_number', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhereRelation('applicant', 'name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->when($queryParams->getStatus(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->whereIn('status', $queryParams->getStatus());
                })
                ->when(($queryParams->getStartDate() && $queryParams->getEndDate()), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->whereBetween('date', [$queryParams->getStartDate(), $queryParams->getEndDate()]);
                })
                ->orderBy('created_at', 'DESC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get complaints", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = Complaint::with(['applicant', 'images'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("complaint not found");
            }

            return ServiceResponse::statusOK("successfully get complaint", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function confirm($id, ComplaintConfirmationSchema $schema): ServiceResponse
    {
        try {
            $userId = Auth::user()->id;
            $approvedAt = Carbon::now();

            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();
            $data = Complaint::with(['applicant'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("certificate not found");
            }

            $data->update([
                'status' => $schema->getStatus(),
                'response' => $schema->getReason(),
                'approved_by_id' => $userId,
                'approved_at' => $approvedAt
            ]);
            return ServiceResponse::statusOK("successfully confirm complaint");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
