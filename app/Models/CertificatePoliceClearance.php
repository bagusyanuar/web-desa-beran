<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatePoliceClearance extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'reference_number',
        'status',
        'purpose',
        'approved_by_id',
        'approved_at',
        'failed_description'
    ];

    public function applicant()
    {
        return $this->hasOne(CertificatePoliceClearanceApplicant::class, 'certificate_police_clearance_id');
    }

    public function descriptions()
    {
        return $this->hasMany(CertificatePoliceClearanceDescription::class, 'certificate_police_clearance_id');
    }

    public function person()
    {
        return $this->hasOne(CertificatePoliceClearancePerson::class, 'certificate_police_clearance_id');
    }
}
