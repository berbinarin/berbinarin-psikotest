<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesFree\FreeProfileData;

use Illuminate\Http\Request;
use App\Models\PsikotesFreeProfile;
use App\Http\Controllers\Controller;

class PsikotesFreeProfileController extends Controller
{
    public function index() {
        $freeProfiles = PsikotesFreeProfile::with(['feedback', 'attempt'])->get();

        return view('dashboard.ptpm_psikotes-free.free-profiles.index', compact('freeProfiles'));
    }

    public function show($id) {
        $freeProfiles = PsikotesFreeProfile::with(['feedback', 'attempt.responses'])->findOrFail($id);

        $freeProfile = PsikotesFreeProfile::with([
        'feedback',
        'attempt.responses.question' // load responses + pertanyaan
    ])->findOrFail($id);

        return view('dashboard.ptpm_psikotes-free.free-profiles.show', compact('freeProfiles', 'freeProfile'));
    }
}
