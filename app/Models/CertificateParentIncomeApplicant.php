<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateParentIncomeApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_parent_income_id',
        'name',
        'phone',
    ];

    public function certificate_parent_income()
    {
        return $this->belongsTo(CertificateParentIncome::class, 'certificate_parent_income_id');
    }
}
