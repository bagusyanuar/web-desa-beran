<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateParentIncome extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'reference_number',
        'status',
        'father_income_per_month',
        'mother_income_per_month',
        'approved_by_id',
        'approved_at',
        'failed_description',
    ];

    protected $casts = [
        'father_income_per_month' => 'float',
        'mother_income_per_month' => 'float'
    ];

    public function applicant()
    {
        return $this->hasOne(CertificateParentIncomeApplicant::class, 'certificate_parent_income_id');
    }

    public function person()
    {
        return $this->hasOne(CertificateParentIncomePerson::class, 'certificate_parent_income_id');
    }

    public function parent()
    {
        return $this->hasOne(CertificateParentIncomeParent::class, 'certificate_parent_income_id');
    }
}
