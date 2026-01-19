<?php

namespace App\Services\WebPanel\OnlineLetter;

use App\Commons\Enum\CertificateConfirmationStatus;
use App\Commons\Enum\CertificateStatus;
use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\OnlineLetter\IncapacityServiceInterface;
use App\Models\CertificateIncapacity;
use App\Schemas\WebPanel\OnlineLetter\Incapacity\IncapacityConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\Incapacity\IncapacityQuery;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;

class IncapacityService implements IncapacityServiceInterface
{
    public function findAll(IncapacityQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = CertificateIncapacity::with(['applicant', 'person'])
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
                ->orderBy('date', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get certificate incapacities", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = CertificateIncapacity::with(['applicant', 'person'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("certificate not found");
            }

            return ServiceResponse::statusOK("successfully get certificate incapacity", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function confirm($id, IncapacityConfirmationSchema $schema): ServiceResponse
    {
        try {
            $userId = null;
            $approvedAt = Carbon::now();

            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();
            $data = CertificateIncapacity::with(['applicant'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("certificate not found");
            }

            $data->update([
                'status' => $schema->getStatus() === CertificateConfirmationStatus::Accept->value ? CertificateStatus::Pending->value : CertificateStatus::Failed->value,
                'failed_description' => $schema->getReason(),
                'approved_by_id' => $userId,
                'approved_at' => $approvedAt
            ]);
            return ServiceResponse::statusOK("successfully confirm certificate");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function finish($id): ServiceResponse
    {
        try {
            $userId = Auth::user()->id;
            $approvedAt = Carbon::now();
            $data = CertificateIncapacity::with(['applicant'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("certificate not found");
            }

            $data->update([
                'status' => CertificateStatus::Finished->value,
                'approved_by_id' => $userId,
                'approved_at' => $approvedAt
            ]);
            return ServiceResponse::statusOK("successfully finish certificate");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function createReceipt($id): ServiceResponse
    {
        try {
            //code...
            $certificate = CertificateIncapacity::with(['applicant', 'person'])
                ->where('id', '=', $id)
                ->first();
            if (!$certificate) {
                return ServiceResponse::notFound("certificate not found");
            }


            # create pdf
            $options = new Options();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $options->set('chroot', public_path());
            $pdf = Pdf::loadView('pdf.online-letter.incapacity', [
                'certificate' => $certificate
            ])->setPaper('a4', 'potrait');
            $pdf->getDomPDF()->setOptions($options);
            $pdfBase64 = base64_encode($pdf->output());
            return ServiceResponse::statusOK("successfully create online letter", $pdfBase64);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
