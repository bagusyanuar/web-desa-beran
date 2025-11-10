<?php

namespace App\Schemas\WebPanel\News;

use App\Commons\Libs\Http\BaseSchema;
use Illuminate\Http\UploadedFile;

class NewsSchema extends BaseSchema
{
    private $title;
    private $description;

    /** @var UploadedFile|null $thumbnail */
    private $thumbnail;

    /** @var UploadedFile[]|[] $images */
    private $images;

    protected function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'images' => 'array',
            'images.*' => 'file|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    protected function messages()
    {
        return [
            'title.required' => 'kolom nama produk wajib diisi',
            'description.required' => 'kolom isi berita wajib diisi',
            'thumbnail.required' => 'kolom gambar thumbnail wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $title = $this->body['title'];
        $description = $this->body['description'];
        $thumbnail = $this->body['thumbnail'];
        $images = $this->body['images'] ?? [];
        $this->setTitle($title)
            ->setDescription($description)
            ->setThumbnail($thumbnail)
            ->setImages($images);
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
     * Get the value of thumbnail
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set the value of thumbnail
     *
     * @return  self
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

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
