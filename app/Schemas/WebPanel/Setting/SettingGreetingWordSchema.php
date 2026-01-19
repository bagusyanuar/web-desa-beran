<?php

namespace App\Schemas\WebPanel\Setting;

use App\Commons\Libs\Http\BaseSchema;

class SettingGreetingWordSchema extends BaseSchema
{
    private $text;

    protected function rules()
    {
        return [
            'text' => 'nullable|string',
        ];
    }

    public function hydrateBody()
    {
        $text = !empty(trim($this->body['text'] ?? '')) ? $this->body['text'] : null;
        $this->setText($text);
    }

    public function setText($text): void
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }
}
