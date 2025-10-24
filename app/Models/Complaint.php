<?php

namespace App\Models;

use App\Commons\Libs\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'reference_number',
        'description',
        'status',
        'response',
        'approved_by_id',
        'approved_at',
    ];

    public function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function applicant()
    {
        return $this->hasOne(ComplaintApplicant::class, 'complaint_id');
    }

    public function images()
    {
        return $this->hasMany(ComplaintImage::class, 'complaint_id');
    }
}
