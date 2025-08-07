<?php

namespace App\Http\Controllers\Landing\PsikotesFree;

use App\Http\Controllers\Controller;
use App\Models\PsikotesFreeProfile;
use Illuminate\Http\Request;

class PsikotesFreeController extends Controller
{
    public function introduce() {
        $user_id = session()->get('user_id');

        if (!$user_id){
            return redirect()->route('psikotes-free.profile')->withErrors('User belum mengisi profile.');
        }

        $user = PsikotesFreeProfile::findOrFail($user_id);

        return view('landing.psikotes-free.introduce', compact('user'));
    }
}
