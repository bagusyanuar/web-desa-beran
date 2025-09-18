<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateSingleStatusApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_single_status_id',
        'name',
        'phone',
    ];

    public function certificate_single_status()
    {
        return $this->belongsTo(CertificateSingleStatus::class, 'certificate_single_status_id');
    }
}
