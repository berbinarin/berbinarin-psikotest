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
        'sharing_testimonial',
        'sharing_experience',
        'opinion_psikotest',
        'criticism_suggestion',
    ];

    public function userPsikotestPaid()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
