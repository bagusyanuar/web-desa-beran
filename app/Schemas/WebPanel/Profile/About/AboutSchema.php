<?php

namespace App\Schemas\WebPanel\Profile\About;

use App\Commons\Libs\Http\BaseSchema;
use Illuminate\Http\UploadedFile;

class AboutSchema extends BaseSchema
{
    private $description;

    /** @var UploadedFile|null $image */
    private $image;

    protected function rules()
    {
        return [
            'description' => 'required'
        ];
    }

    protected function messages()
    {
        return [
            'description.required' => 'kolom deskripsi wajib diisi'
        ];
    }

    public function hydrateBody()
    {
        $description = $this->body['description'];
        $image = !empty(trim($this->body['image'] ?? '')) ? $this->body['image'] : null;
        $this->setDescription($description)
            ->setImage($image);
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
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
