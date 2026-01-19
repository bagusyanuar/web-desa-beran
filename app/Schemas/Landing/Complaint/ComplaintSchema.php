<?php

namespace App\Schemas\Landing\Complaint;

use App\Commons\Libs\Http\BaseSchema;

class ComplaintSchema extends BaseSchema
{
    private $applicantName;
    private $applicantPhone;
    private $description;

    /** @var UploadedFile[]|[] $images */
    private $images;

    protected function rules()
    {
        return [
            'applicantName' => 'required|string',
            'applicantPhone' => 'required|string',
            'description' => 'required|string',
            'images' => 'array',
            'images.*' => 'file|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    protected function messages()
    {
        return [
            'applicantName.required' => 'kolom nama pengirim wajib diisi',
            'applicantPhone.required' => 'kolom no. whatsapp pengirim wajib diisi',
            'description.required' => 'kolom isi laporan wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $applicantName = $this->body['applicantName'];
        $applicantPhone = $this->body['applicantPhone'];
        $description = $this->body['description'];
        $images = $this->body['images'] ?? [];
        $this->setApplicantName($applicantName)
            ->setApplicantPhone($applicantPhone)
            ->setDescription($description)
            ->setImages($images);
    }

    /**
     * Get the value of applicantName
     */
    public function getApplicantName()
    {
        return $this->applicantName;
    }

    /**
     * Set the value of applicantName
     *
     * @return  self
     */
    public function setApplicantName($applicantName)
    {
        $this->applicantName = $applicantName;

        return $this;
    }

    /**
     * Get the value of applicantPhone
     */
    public function getApplicantPhone()
    {
        return $this->applicantPhone;
    }

    /**
     * Set the value of applicantPhone
     *
     * @return  self
     */
    public function setApplicantPhone($applicantPhone)
    {
        $this->applicantPhone = $applicantPhone;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set the value of images
     *
     * @return  self
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }
}
