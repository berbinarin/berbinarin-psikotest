<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attempt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'tool_id',
        'status',
    ];

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function tool(): BelongsTo {
        return $this->belongsTo(Tool::class);
    }

    public function checkpointResponses(): HasMany {
        return $this->hasMany(CheckpointResponse::class);
    }
}
