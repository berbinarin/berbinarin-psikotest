<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'psikotes_session_id',
        'psikotes_question_id',
        'answer',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(PsikotesSession::class, 'psikotes_session_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(PsikotesQuestion::class, 'psikotes_question_id');
    }
}
