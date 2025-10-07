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
                'user_id' => auth()->id(),
                'question' => $data['question'],
                'type' => $data['type'],
                'answer' => $data['value']
            ]);
        }


        session()->flash('alert', true);
        session()->flash('icon', asset('assets/dashboard/images/success.png'));
        session()->flash('type', 'success');
        session()->flash('title', 'Terima kasih!');
        session()->flash('message', 'Testimoni berhasil disimpan.');

        return response()->json([
            'message' => 'Testimoni berhasil disimpan.',
            'redirect' => route('psikotes-paid.tools.index')
        ], 201);
    }
}
