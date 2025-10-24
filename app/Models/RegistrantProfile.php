<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrantProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'test_type_id',
        'gender',
        'age',
        'domicile',
        'phone_number',
        'psikotes_service',
        'reason',
        'schedule',
        'voucher_category',
        'voucher_code',
        'discount_percentage',
        'student_card',
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
