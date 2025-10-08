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

    protected function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'required|file|mimes:jpg,jpeg,png|max:2048'
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
        $description = $this->body['title'];
        $description = $this->body['title'];
        $thumbnail = $this->body['thumbnail'];
        $this->setTitle($title)
            ->setDescription($description)
            ->setThumbnail($thumbnail);
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
}
