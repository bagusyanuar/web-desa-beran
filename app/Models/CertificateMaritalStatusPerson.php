<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateMaritalStatusPerson extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_marital_status_persons';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_marital_status_id',
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
        'spouse_name',
    ];

    public function certificate_marital_status()
    {
        return $this->belongsTo(CertificateMaritalStatus::class, 'certificate_marital_status_id');
    }
}
