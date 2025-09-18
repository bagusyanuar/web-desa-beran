<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIncapacityPerson extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_incapacity_persons';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_incapacity_id',
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

    public function certificate_incapacity()
    {
        return $this->belongsTo(CertificateIncapacity::class, 'certificate_incapacity_id');
    }
}
