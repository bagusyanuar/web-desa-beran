<?php

namespace App\Livewire\Pages\Landing\Complaint;

use App\Commons\Libs\Captcha\Recaptcha;
use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\Complaint\ComplaintSchema;
use App\Services\Landing\ComplaintService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class Index extends Component
{
    use WithFileUploads;

    /** @var UploadedFile[] | [] $images */
    public $images = [];

    /** @var ComplaintService $service */
    private $service;

    public function boot(ComplaintService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->images = [];
    }

    public function send($body, $captchaToken)
    {
        $captchaValidation = Recaptcha::validate($captchaToken);
        if ($captchaValidation['success']) {
            $mergeBody = array_merge($body, [
                'images' => $this->images,
            ]);
            $schema = (new ComplaintSchema())->hydrateSchemaBody($mergeBody);
            $response = $this->service->send($schema);
            return AlpineResponse::fromService($response);
        }
        return AlpineResponse::toJSON(500, "invalid captcha");
    }

    public function render()
    {
        return view('livewire.pages.landing.complaint.index');
    }
}
