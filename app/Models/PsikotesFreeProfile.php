<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsikotesFreeProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'date_of_test',
        'email',
    ];

    public function feedback(): HasMany
    {
        return $this->hasMany(Feedback::class, 'psikotes_free_profile_id');
    }

    public function attempt(): HasMany
    {
        return $this->hasMany(User::class, 'foreign_key', 'local_key');
    }
}
