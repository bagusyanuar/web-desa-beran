<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateMaritalStatusApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_marital_status_id',
        'name',
        'phone',
    ];

    public function certificate_marital_status()
    {
        return $this->belongsTo(CertificateIncome::class, 'certificate_marital_status_id');
    }
}
