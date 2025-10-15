<?php

namespace App\Schemas\WebPanel\Profile\AboutStaff;

use App\Commons\Libs\Http\BaseSchema;
use Illuminate\Http\UploadedFile;

class AboutStaffSchema extends BaseSchema
{
    private $name;
    private $position;

    /** @var UploadedFile|null $image */
    private $image;

    protected function rules()
    {
        return [
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'kolom nama wajib diisi',
            'position.required' => 'kolom jabatan wajib diisi',
            'image.required' => 'kolom foto / gambar wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $name = $this->body['name'];
        $position = $this->body['position'];
        $image = !empty(trim($this->body['image'] ?? '')) ? $this->body['image'] : null;
        $this->setName($name)
            ->setPosition($position)
            ->setImage($image);
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @return  self
     */
    public function setPosition($position)
    {
        $this->position = $position;

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
