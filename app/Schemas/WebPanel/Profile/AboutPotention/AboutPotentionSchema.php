<?php

namespace App\Schemas\WebPanel\Profile\AboutPotention;

use App\Commons\Libs\Http\BaseSchema;

class AboutPotentionSchema extends BaseSchema
{
    private $description;

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
        $this->setDescription($description);
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
}
