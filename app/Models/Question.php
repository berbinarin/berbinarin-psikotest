<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'options' => 'collection',
        'scoring' => 'collection',
    ];

    protected $fillable = [
        'section_id',
        'order',
        'text',
        'image_path',
        'type',
        'options',
        'scoring',
    ];

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class, 'question_id');
    }

    public function tool(): HasOneThrough {
        return $this->hasOneThrough(Tool::class, Section::class, 'id','id','section_id','tool_id' );
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function psikotesFreeResponses(): HasMany
    {
        return $this->hasMany(PsikotesFreeResponse::class, 'question_id');
    }
}
