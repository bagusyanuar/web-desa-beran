<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatePoliceClearancePerson extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_police_clearance_persons';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_police_clearance_id',
        'name',
        'identifier_number', // no ktp
        'birth_place',
        'date_of_birth',
        'gender',
        'citizenship',
        'religion',
        'marriage',
        'job',
        'address',
    ];

    public function certificate_police_clearance()
    {
        return $this->belongsTo(CertificatePoliceClearance::class, 'certificate_police_clearance_id');
    }
}
