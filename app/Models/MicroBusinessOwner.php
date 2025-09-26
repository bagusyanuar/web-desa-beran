<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroBusinessOwner extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'micro_business_id',
        'name',
        'image',
        'description',
    ];

    public function micro_bussines()
    {
        return $this->belongsTo(MicroBusiness::class, 'micro_business_id');
    }
}
