<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIncomePerson extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_income_persons';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_income_id',
        'name',
        'identifier_number',
        'birth_place',
        'date_of_birth',
        'gender',
        'citizenship',
        'religion',
        'marriage',
        'job',
        'address',
    ];

    public function certificate_income()
    {
        return $this->belongsTo(CertificateIncome::class, 'certificate_income_id');
    }
}
