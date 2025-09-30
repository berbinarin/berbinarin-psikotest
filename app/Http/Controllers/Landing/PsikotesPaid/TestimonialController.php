<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('user')->get();
        return view('landing.psikotes-paid.tools.testimoni', compact('testimonials'));
    }

    // Store Testimonial Data
    public function store(Request $request)
    {
        foreach ($request->answer as $data) {
            Testimonial::create([
                // --- PERUBAHAN DI SINI ---
                'user_id' => auth()->id(), // Cara yang benar dan aman
                'question' => $data['question'],
                'type' => $data['type'],
                'answer' => $data['value']
            ]);
        }

        return response()->json(['message' => 'Testimoni berhasil disimpan.'], 201);
    }
}
