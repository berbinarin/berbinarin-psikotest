<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'psikotes_tool_id',
        'title',
        'description',
        'order',
        'duration'
    ];

    public function tool(): BelongsTo {
        return $this->belongsTo(PsikotesTool::class);
    }

    public function questions() {
        return $this->hasMany(PsikotesQuestion::class, 'psikotes_section_id');
    }
}
