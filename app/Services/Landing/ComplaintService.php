<?php

namespace App\Services\Landing;

use App\Commons\FileUpload\MultipleFileUpload;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\ComplaintServiceInterface;
use App\Models\Complaint;
use App\Models\ComplaintApplicant;
use App\Models\ComplaintImage;
use App\Schemas\Landing\Complaint\ComplaintSchema;
use Illuminate\Support\Facades\DB;

class ComplaintService implements ComplaintServiceInterface
{
    public function send(ComplaintSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataComplaint = [
                'reference_number' => "AD" . date('YmdHis'),
                'description' => $schema->getDescription(),
                'status' => 'pending',
                'response' => null,
                'approved_by_id' => null,
                'approved_at' => null,
            ];

            $complaint = Complaint::create($dataComplaint);

            $dataApplicant = [
                'complaint_id' => $complaint->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            ComplaintApplicant::create($dataApplicant);

            $multipleFileUploadService = new MultipleFileUpload($schema->getImages(), "assets/complaints");
            $multipleFileUploadResponse = $multipleFileUploadService->upload();
            if (!$multipleFileUploadResponse->isSuccess()) {
                DB::rollBack();
                return ServiceResponse::internalServerError($multipleFileUploadResponse->getMessage());
            }

            foreach ($multipleFileUploadResponse->getData() as $image) {
                $dataImage = [
                    'complaint_id' => $complaint->id,
                    'image' => $image,
                ];
                ComplaintImage::create($dataImage);
            }
            DB::commit();
            return ServiceResponse::statusCreated("successfully send complaint", [
                'complaint' => $complaint,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('complaint.code', [
                    'code' => $complaint->reference_number
                ])
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
