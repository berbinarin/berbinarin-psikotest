<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'options' => 'collection',
        'scoring' => 'collection',
    ];

    protected $fillable = [
        'psikotes_section_id',
        'order',
        'text',
        'image_path',
        'type',
        'options',
        'scoring',
    ];

    public function responses(): HasMany
    {
        return $this->hasMany(PsikotesResponse::class, 'psikotes_question_id');
    }

    public function tool(): HasOneThrough {
        return $this->hasOneThrough(PsikotesTool::class, PsikotesSection::class, 'id','id','psikotes_section_id','psikotes_tool_id' );
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(PsikotesSection::class, 'psikotes_section_id');
    }
}
