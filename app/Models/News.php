<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, Uuid, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function thumbnail()
    {
        return $this->hasOne(NewsImage::class, 'news_id')->where('is_thumbnail', '=', true);
    }

    public function images()
    {
        return $this->hasMany(NewsImage::class, 'news_id');
    }
}
