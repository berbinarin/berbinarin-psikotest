<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'testimonials';

    protected $fillable = [
        'user_id',
        'question',
        'type',
        'answer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
