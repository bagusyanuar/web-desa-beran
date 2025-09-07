<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateDomicileApplicant extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_domicile_id',
        'name',
        'phone',
    ];

    public function certificate_domicile()
    {
        return $this->belongsTo(CertificateDomicile::class, 'certificate_domicile_id');
    }
}
