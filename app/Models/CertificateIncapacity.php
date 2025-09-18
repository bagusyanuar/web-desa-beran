<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIncapacity extends Model
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
        'failed_description',
    ];

    public function applicant()
    {
        return $this->hasOne(CertificateIncapacityApplicant::class, 'certificate_incapacity_id');
    }

    public function person()
    {
        return $this->hasOne(CertificateIncapacityPerson::class, 'certificate_incapacity_id');
    }
}
