<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateSingleStatus extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'reference_number',
        'status',
        'approved_by_id',
        'approved_at',
        'failed_description'
    ];

    public function applicant()
    {
        return $this->hasOne(CertificateSingleStatusApplicant::class, 'certificate_single_status_id');
    }

    public function person()
    {
        return $this->hasOne(CertificateSingleStatusPerson::class, 'certificate_single_status_id');
    }

}
