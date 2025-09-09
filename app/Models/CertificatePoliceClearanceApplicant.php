<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatePoliceClearanceApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_police_clearance_id',
        'name',
        'phone',
    ];

    public function certificate_police_clearance()
    {
        return $this->belongsTo(CertificatePoliceClearance::class, 'certificate_police_clearance_id');
    }
}
