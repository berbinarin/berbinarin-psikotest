<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
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
        return $this->hasMany(Section::class)->orderBy('order', 'asc');
    }

    public function questions(): HasManyThrough
    {
        return $this->hasManyThrough(Question::class, Section::class)->orderBy('order', 'asc');
    }

    public function attempts(): HasMany
    {
        return $this->hasMany(Attempt::class);
    }
}
