<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateDeathApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_death_id',
        'name',
        'phone',
    ];

    public function certificate_death()
    {
        return $this->belongsTo(CertificateDeath::class, 'certificate_death_id');
    }
}
