<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateSingleStatusPerson extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_single_status_persons';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_single_status_id',
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

    public function certificate_single_status()
    {
        return $this->belongsTo(CertificateSingleStatus::class, 'certificate_single_status_id');
    }
}
