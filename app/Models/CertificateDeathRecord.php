<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateDeathRecord extends Model
{
    use HasFactory, Uuid;

    protected $table = 'certificate_death_records';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'certificate_death_id',
        'date',
        'district_name',
        'city_name', // no ktp
        'province_name',
        'cause_of_death',
        'decider',
        'post_mortem_notes',
        'birth_order',
    ];

    public function certificate_death()
    {
        return $this->belongsTo(CertificateDeath::class, 'certificate_death_id');
    }
}
