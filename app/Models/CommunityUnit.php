<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommunityUnit extends Model
{
    use HasFactory, Uuid, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'village_id',
        'code',
        'leader_name',
        'leader_contact',
    ];

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function neighborhood_units()
    {
        return $this->hasMany(NeighborhoodUnit::class, 'community_unit_id');
    }
}
