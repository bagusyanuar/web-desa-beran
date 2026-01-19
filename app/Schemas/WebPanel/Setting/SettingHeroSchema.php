<?php

namespace App\Schemas\WebPanel\Setting;

use App\Commons\Libs\Http\BaseSchema;
use Illuminate\Http\UploadedFile;

class SettingHeroSchema extends BaseSchema
{
    /** @var UploadedFile|null $heroImage */
    private $heroImage;

    protected function rules()
    {
        return [
            'heroImage' => 'file|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    protected function messages()
    {
        return [
            'heroImage.required' => 'kolom gambar latar wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $heroImage = !empty(trim($this->body['heroImage'] ?? '')) ? $this->body['heroImage'] : null;
        $this->setHeroImage($heroImage);
    }

    public function setHeroImage($heroImage): void
    {
        $this->heroImage = $heroImage;
    }

    public function getHeroImage()
    {
        return $this->heroImage;
    }
}
