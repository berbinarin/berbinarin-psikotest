<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrantProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'test_type_id',
        'gender',
        'age',
        'domicile',
        'phone_number',
        'psikotes_service',
        'reason',
        'schedule'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function testType(): BelongsTo
    {
        return $this->belongsTo(TestType::class);
    }
}
