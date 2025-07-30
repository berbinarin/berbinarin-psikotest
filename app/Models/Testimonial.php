<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

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
