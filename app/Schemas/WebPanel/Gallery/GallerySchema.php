<?php

namespace App\Schemas\WebPanel\Gallery;

use App\Commons\Libs\Http\BaseSchema;
use Illuminate\Http\UploadedFile;

class GallerySchema extends BaseSchema
{
    private $title;

    /** @var UploadedFile|null $image */
    private $image;

    protected function rules()
    {
        return [
            'title' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    protected function messages()
    {
        return [
            'title.required' => 'kolom judul wajib diisi',
            'image.required' => 'kolom foto / gambar wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $title = !empty(trim($this->body['title'] ?? '')) ? $this->body['title'] : null;
        $image = !empty(trim($this->body['image'] ?? '')) ? $this->body['image'] : null;
        $this->setTitle($title)
            ->setImage($image);
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
