<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIncapacityApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_incapacity_id',
        'name',
        'phone',
    ];

    public function certificate_incapacity()
    {
        return $this->belongsTo(CertificateIncapacity::class, 'certificate_incapacity_id');
    }
}
