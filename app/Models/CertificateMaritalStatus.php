<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateMaritalStatus extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'reference_number',
        'status',
        'type',
        'approved_by_id',
        'approved_at',
        'failed_description',
    ];

    public function applicant()
    {
        return $this->hasOne(CertificateMaritalStatusApplicant::class, 'certificate_marital_status_id');
    }

    public function person()
    {
        return $this->hasOne(CertificateMaritalStatusPerson::class, 'certificate_marital_status_id');
    }
}
