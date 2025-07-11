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
}
