<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIncome extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'reference_number',
        'status',
        'income_per_month',
        'purpose',
        'approved_by_id',
        'approved_at',
        'failed_description',
    ];

    protected $casts = [
        'income_per_month' => 'float'
    ];

    public function applicant()
    {
        return $this->hasOne(CertificateIncomeApplicant::class, 'certificate_income_id');
    }

    public function person()
    {
        return $this->hasOne(CertificateIncomePerson::class, 'certificate_income_id');
    }
}
