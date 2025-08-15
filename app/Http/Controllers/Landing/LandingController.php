<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.home.index');
    }

    public function instruction()
    {
        return view('landing.psikotes-paid.attempts.introduce');
    }

    public function multiple()
    {
        return view('landing.psikotes-paid.attempts.questions.multiple-choice');
    }
    public function endtesti()
    {
        return view('landing.psikotes-paid.tools.end-testimoni');
    }
    public function success()
    {
        return view('landing.psikotes-paid.attempts.complete');
    }
    public function esai()
    {
        return view('landing.psikotes-paid.attempts.questions.essay');
    }
    public function binary()
    {
        return view('landing.psikotes-paid.attempts.questions.binary-choice');
    }

}
