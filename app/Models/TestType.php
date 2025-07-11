<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestType extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_category_id',
        'name',
        'description',
        'price'
    ];

    public function profiles(): HasMany
    {
        return $this->hasMany(RegistrantProfile::class);
    }
    public function testCategory(): BelongsTo
    {
        return $this->belongsTo(TestCategory::class);
    }
}
