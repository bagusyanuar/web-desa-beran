<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateBirth extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'reference_number',
        'status',
        'approved_by_id',
        'approved_at'
    ];

    public function applicant()
    {
        return $this->hasOne(CertificateBirthApplicant::class, 'certificate_birth_id');
    }
}
