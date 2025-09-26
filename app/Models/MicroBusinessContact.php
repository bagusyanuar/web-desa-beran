<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroBusinessContact extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'micro_business_id',
        'type',
        'value',
        'is_main',
    ];

    protected $casts = [
        'is_main' => 'boolean'
    ];

    public function micro_bussines()
    {
        return $this->belongsTo(MicroBusiness::class, 'micro_business_id');
    }
}
