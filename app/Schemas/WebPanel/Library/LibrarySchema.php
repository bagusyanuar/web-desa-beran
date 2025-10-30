<?php

namespace App\Schemas\WebPanel\Library;

use App\Commons\Libs\Http\BaseSchema;
use Illuminate\Http\UploadedFile;

class LibrarySchema extends BaseSchema
{
    private $title;
    private $authorName;

    /** @var UploadedFile|null $image */
    private $image;

    /** @var UploadedFile|null $file */
    private $file;

    protected function rules()
    {
        return [
            'title' => 'required|string',
            'authorName' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'file' => 'nullable|file|mimes:pdf'
        ];
    }

    protected function messages()
    {
        return [
            'title.required' => 'kolom nama produk wajib diisi',
            'authorName.required' => 'kolom nama pengarang wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $title = $this->body['title'];
        $authorName = $this->body['authorName'];
        $image = !empty(trim($this->body['image'] ?? '')) ? $this->body['image'] : null;
        $file = !empty(trim($this->body['file'] ?? '')) ? $this->body['file'] : null;
        $this->setTitle($title)
            ->setAuthorName($authorName)
            ->setImage($image)
            ->setFile($file);
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
     * Get the value of authorName
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Set the value of authorName
     *
     * @return  self
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;

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

    /**
     * Get the value of file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
}
