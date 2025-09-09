<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateBirthInfant extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_birth_infants';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_birth_id',
        'name',
        'birth_place',
        'date_of_birth',
        'gender',
        'birth_type',
        'birth_order',
    ];

    public function certificate_birth()
    {
        return $this->belongsTo(CertificateBirth::class, 'certificate_birth_id');
    }
}
