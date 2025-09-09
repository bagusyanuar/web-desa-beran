<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateBirthApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_birth_id',
        'name',
        'phone',
    ];

    public function certificate_birth()
    {
        return $this->belongsTo(CertificateBirth::class, 'certificate_birth_id');
    }
}
