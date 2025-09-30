<?php

namespace App\Schemas\WebPanel\MicroBusiness;

use App\Commons\Libs\Http\BaseSchema;
use Illuminate\Http\UploadedFile;

class MicroBusinessSchema extends BaseSchema
{
    private $title;
    private $description;
    private $ownerName;
    /** @var UploadedFile|null $ownerImage */
    private $ownerImage;
    private $ownerDescription;
    private $ownerAddress;
    private $ownerContact;
    /** @var UploadedFile|null $ownerImage */
    private $productImage;


    protected function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'string',
            'ownerName' => 'required|string',
            'ownerDescription' => 'string',
            'ownerAddress' => 'string',
            'ownerContact' => 'string'
        ];
    }

    protected function messages()
    {
        return [
            'title.required' => 'kolom nama produk wajib diisi',
            'ownerName.required' => 'kolom nama pemilik wajib diisi'
        ];
    }

    public function hydrateBody()
    {
        $title = $this->body['title'];
        $ownerName = $this->body['ownerName'];
        $description = !empty(trim($this->body['description'] ?? '')) ? $this->body['description'] : null;
        $ownerImage = !empty(trim($this->body['ownerImage'] ?? '')) ? $this->body['ownerImage'] : null;
        $ownerDescription = !empty(trim($this->body['ownerDescription'] ?? '')) ? $this->body['ownerDescription'] : null;
        $ownerAddress = !empty(trim($this->body['ownerAddress'] ?? '')) ? $this->body['ownerAddress'] : null;
        $ownerContact = !empty(trim($this->body['ownerContact'] ?? '')) ? $this->body['ownerContact'] : null;
        $productImage = !empty(trim($this->body['productImage'] ?? '')) ? $this->body['productImage'] : null;

        $this->setTitle($title)
            ->setDescription($description)
            ->setOwnerName($ownerName)
            ->setOwnerImage($ownerImage)
            ->setOwnerDescription($ownerDescription)
            ->setOwnerAddress($ownerAddress)
            ->setOwnerContact($ownerContact)
            ->setProductImage($productImage);
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
     * Get the value of ownerName
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * Set the value of ownerName
     *
     * @return  self
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    /**
     * Get the value of ownerImage
     */
    public function getOwnerImage()
    {
        return $this->ownerImage;
    }

    /**
     * Set the value of ownerImage
     *
     * @return  self
     */
    public function setOwnerImage($ownerImage)
    {
        $this->ownerImage = $ownerImage;

        return $this;
    }

    /**
     * Get the value of ownerDescription
     */
    public function getOwnerDescription()
    {
        return $this->ownerDescription;
    }

    /**
     * Set the value of ownerDescription
     *
     * @return  self
     */
    public function setOwnerDescription($ownerDescription)
    {
        $this->ownerDescription = $ownerDescription;

        return $this;
    }

    /**
     * Get the value of ownerAddress
     */
    public function getOwnerAddress()
    {
        return $this->ownerAddress;
    }

    /**
     * Set the value of ownerAddress
     *
     * @return  self
     */
    public function setOwnerAddress($ownerAddress)
    {
        $this->ownerAddress = $ownerAddress;

        return $this;
    }

    /**
     * Get the value of ownerContact
     */
    public function getOwnerContact()
    {
        return $this->ownerContact;
    }

    /**
     * Set the value of ownerContact
     *
     * @return  self
     */
    public function setOwnerContact($ownerContact)
    {
        $this->ownerContact = $ownerContact;

        return $this;
    }

    /**
     * Get the value of productImage
     */
    public function getProductImage()
    {
        return $this->productImage;
    }

    /**
     * Set the value of productImage
     *
     * @return  self
     */
    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;

        return $this;
    }
}
