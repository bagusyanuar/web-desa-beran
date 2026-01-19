<?php

namespace App\Schemas\WebPanel\Setting;

use App\Commons\Libs\Http\BaseSchema;

class SettingLandingTitle extends BaseSchema
{
    private $title;
    private $subTitle;

    protected function rules()
    {
        return [
            'title' => 'nullable|string',
            'subTitle' => 'nullable|string',
        ];
    }

    public function hydrateBody()
    {
        $title = !empty(trim($this->body['title'] ?? '')) ? $this->body['title'] : null;
        $subTitle = !empty(trim($this->body['subTitle'] ?? '')) ? $this->body['subTitle'] : null;
        $this->setTitle($title)
            ->setSubTitle($subTitle);
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSubTitle()
    {
        return $this->subTitle;
    }
}
