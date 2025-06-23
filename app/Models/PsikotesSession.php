<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesSession extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'psikotes_tool_id',
    ];

    public function responses(): HasMany
    {
        return $this->hasMany(PsikotesResponse::class, 'psikotes_session_id');
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function tool(): BelongsTo {
        return $this->belongsTo(PsikotesTool::class);
    }
}
