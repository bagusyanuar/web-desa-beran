<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateDeathPerson extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_death_persons';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_death_id',
        'name',
        'family_identifier_number', // no kk
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

    public function certificate_death()
    {
        return $this->belongsTo(CertificateDeath::class, 'certificate_death_id');
    }
}
