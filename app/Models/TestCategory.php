<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function testTypes(): HasMany
    {
        return $this->hasMany(TestType::class);
    }

    public function registrantProfiles() {
        return $this->hasManyThrough(RegistrantProfile::class, TestType::class, 'test_category_id', 'test_type_id', 'id', 'id');
    }
}
