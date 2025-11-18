<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NeighborhoodUnit extends Model
{
    use HasFactory, Uuid, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'community_unit_id',
        'code',
        'leader_name',
        'leader_contact',
    ];

    public function community_unit()
    {
        return $this->belongsTo(CommunityUnit::class, 'community_unit_id');
    }
}
