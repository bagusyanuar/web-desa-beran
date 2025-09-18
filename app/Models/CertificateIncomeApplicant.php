<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIncomeApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_income_id',
        'name',
        'phone',
    ];

    public function certificate_income()
    {
        return $this->belongsTo(CertificateIncome::class, 'certificate_income_id');
    }
}
