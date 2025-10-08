<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'news_id',
        'image',
        'is_thumbnail',
    ];

    protected $casts = [
        'is_thumbnail' => 'boolean'
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
