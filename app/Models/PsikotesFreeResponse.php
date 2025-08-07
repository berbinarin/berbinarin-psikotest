<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesFreeResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'answer' => 'collection'
    ];

    protected $fillable = [
        'psikotes_free_attempt_id',
        'question_id',
        'answer',
    ];

    public function psikotesFreeAttempt()
    {
        return $this->belongsTo(PsikotesFreeAttempt::class, 'psikotes_free_attempt_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

}
