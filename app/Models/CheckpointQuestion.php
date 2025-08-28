<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckpointQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'options' => 'collection',
        'scoring' => 'collection',
    ];

    protected $fillable = [
        'text',
        'type',
        'scoring',
        'options',
    ];
}
