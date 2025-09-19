<?php

namespace App\Services\WebPanel\OnlineLetter;

use App\Commons\Enum\CertificateConfirmationStatus;
use App\Commons\Enum\CertificateStatus;
use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\OnlineLetter\MaritalStatusServiceInterface;
use App\Models\CertificateMaritalStatus;
use App\Schemas\WebPanel\OnlineLetter\MaritalStatus\MaritalStatusConfirmationSchema;
use App\Schemas\WebPanel\OnlineLetter\MaritalStatus\MaritalStatusQuery;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;

class MaritalStatusService implements MaritalStatusServiceInterface
{
    public function findAll(MaritalStatusQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = CertificateMaritalStatus::with(['applicant'])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('reference_number', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhereRelation('applicant', 'name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->when($queryParams->getStatus(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->whereIn('status', $queryParams->getStatus());
                })
                ->when($queryParams->getType(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('type', $queryParams->getType());
                })
                ->when(($queryParams->getStartDate() && $queryParams->getEndDate()), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->whereBetween('date', [$queryParams->getStartDate(), $queryParams->getEndDate()]);
                })
                ->orderBy('date', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get certificate marital statuses", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = CertificateMaritalStatus::with(['applicant', 'person'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("certificate not found");
            }

            return ServiceResponse::statusOK("successfully get certificate marital status", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function confirm($id, MaritalStatusConfirmationSchema $schema): ServiceResponse
    {
        try {
            $userId = null;
            $approvedAt = Carbon::now();

            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();
            $data = CertificateMaritalStatus::with(['applicant'])
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

    public function createReceipt($id): ServiceResponse
    {
        try {
            //code...
            $certificate = CertificateMaritalStatus::with(['applicant', 'person'])
                ->where('id', '=', $id)
                ->first();
            if (!$certificate) {
                return ServiceResponse::notFound("certificate not found");
            }

            $type = $certificate->type;

             $pdfTemplate = match ($type) {
                'widower' => 'pdf.online-letter.widower',
                'widow' => 'pdf.online-letter.widow',
                default => ''
            };
            # create pdf
            $options = new Options();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $pdf = Pdf::loadView($pdfTemplate, [
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
