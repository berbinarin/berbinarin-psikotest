<?php

namespace App\Http\Controllers\Landing\PsikotesFree;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultController extends Controller
{
        public function result(){
            $result = session('result_data');

            if (!$result) {
                return redirect()->route('psikotes-free.feedback.show')->withErrors(['message' => 'Hasil tidak ditemukan.']);
            }

            return view('landing.psikotes-free.result', compact('result'));
        }
}
