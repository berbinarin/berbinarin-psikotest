<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index() {
        $testimonial = Testimonial::with('userPsikotestPaid')->get();

        return view('dashboard.ptpm_psikotes-paid.testimonial.index', compact('testimonial'));
    }

    public function show($id) {
        $testimonial = Testimonial::with('userPsikotestPaid')->findOrFail($id);

        return view('dashboard.ptpm_psikotes-paid.testimonial.detail', compact('testimonial'));
    }
}
