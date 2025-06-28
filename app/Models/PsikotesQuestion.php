<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        '' => 'array',
        'scoring' => 'array',
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

    public function section(): BelongsTo
    {
        return $this->belongsTo(PsikotesSection::class, 'psikotes_section_id');
    }
}
