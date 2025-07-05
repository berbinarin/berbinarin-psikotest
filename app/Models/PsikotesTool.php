<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesTool extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'order',
        'introduce',
        'token',
        'is_active',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(PsikotesSection::class)->orderBy('order', 'asc');
    }

    public function questions(): HasManyThrough
    {
        return $this->hasManyThrough(PsikotesQuestion::class, PsikotesSection::class)->orderBy('order', 'asc');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(PsikotesSession::class);
    }
}
