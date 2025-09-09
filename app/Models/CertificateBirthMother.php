<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateBirthMother extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_birth_mothers';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_birth_id',
        'name',
        'identifier_number',
        'birth_place',
        'date_of_birth',
        'citizenship',
        'religion',
        'job',
        'address',
    ];

    public function certificate_birth()
    {
        return $this->belongsTo(CertificateBirth::class, 'certificate_birth_id');
    }
}
