<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesFreeAttempt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'psikotes_free_profile_id',
        'tool_id',
        'status',
    ];

    public function psikotesFreeProfile()
    {
        return $this->belongsTo(PsikotesFreeProfile::class, 'psikotes_free_profile_id');
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }
}
