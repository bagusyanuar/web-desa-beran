<?php

namespace App\Http\Resources\Publication\News;

use App\Commons\Libs\Resource\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends BaseResource
{
    protected function transformData(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
        ];

        if ($this->relationLoaded('author')) {
            $author = $this->getRelation('author');
            $data['author'] = $author ? [
                'id' => $author->id,
                'username' => $author->username
            ] : null;
        }

        if ($this->relationLoaded('thumbnail')) {
            $thumbnail = $this->getRelation('thumbnail');
            $data['thumbnail'] = $thumbnail ? [
                'id' => $thumbnail->id,
                'image' => $thumbnail->image ? url($thumbnail->image) : null
            ] : null;
        }

        if ($this->relationLoaded('images')) {
            $data['images'] = $this->images->map(function ($thumbnail) {
                return [
                    'id' => $thumbnail->id,
                    'image' => $thumbnail->image ? url($thumbnail->image) : null,
                    'is_thumbnail' => $thumbnail->is_thumbnail
                ];
            });
        }
        return $data;
    }
}
