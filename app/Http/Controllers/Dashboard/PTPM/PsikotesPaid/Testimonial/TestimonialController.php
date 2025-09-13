<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $users = User::has('testimonials')->get();

        return view('dashboard.ptpm_psikotes-paid.testimonial.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('dashboard.ptpm_psikotes-paid.testimonial.detail', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->testimonials()->delete();

        return redirect()->route('dashboard.testimonial.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
