<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckpointResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'answer' => 'collection'
    ];

    protected $fillable = [
        'attempt_id',
        'checkpoint_question_id',
        'answer',
    ];
}
