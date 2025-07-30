<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('userPsikotestPaid')->get();
        return view('landing.psikotes-paid.tools.testimoni', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sharing_testimonial' => 'required|string|max:500',
            'sharing_experience' => 'required|string|max:500',
            'opinion_psikotest' => 'required|string|max:500',
            'criticism_suggestion' => 'nullable|string|max:500',
        ]);

        Testimonial::create([
            'user_id' => auth()->id(),
            'sharing_testimonial' => $request->sharing_testimonial,
            'sharing_experience' => $request->sharing_experience,
            'opinion_psikotest' => $request->opinion_psikotest,
            'criticism_suggestion' => $request->criticism_suggestion,
        ]);

        return response()->json(['message' => 'Testimoni berhasil disimpan.']);
    }
}
