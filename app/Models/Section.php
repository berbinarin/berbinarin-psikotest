<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tool_id',
        'title',
        'description',
        'order',
        'duration'
    ];

    public function tool(): BelongsTo {
        return $this->belongsTo(Tool::class);
    }

    public function questions() {
        return $this->hasMany(Question::class, 'section_id')->orderBy('order', 'asc');;
    }
}
