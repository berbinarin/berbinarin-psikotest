<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'feedbacks';

    protected $fillable = [
        'psikotes_free_profile_id',
        'rating',
        'experience',
    ];

    public function psikotesFreeProfile()
    {
        return $this->belongsTo(PsikotesFreeProfile::class, 'psikotes_free_profile_id');
    }
}
