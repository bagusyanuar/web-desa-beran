<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MicroBusiness extends Model
{
    use HasFactory, Uuid, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function owner()
    {
        return $this->hasOne(MicroBusinessOwner::class, 'micro_business_id');
    }

    public function addresses()
    {
        return $this->hasMany(MicroBusinessAddress::class, 'micro_business_id');
    }

    public function contacts()
    {
        return $this->hasMany(MicroBusinessContact::class, 'micro_business_id');
    }

    public function main_contact()
    {
        return $this->hasOne(MicroBusinessContact::class, 'micro_business_id')->where('is_main', '=', true);
    }

    public function images()
    {
        return $this->hasMany(MicroBusinessImage::class, 'micro_business_id');
    }
}
