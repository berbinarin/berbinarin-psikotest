<?php

namespace App\Http\Controllers\Landing\PsikotesFree;

use App\Http\Controllers\Controller;
use App\Models\PsikotesFreeResponse;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\PsikotesFreeAttempt;
use App\Services\Landing\PsikotesFree\AttemptService;
use App\Services\Landing\PsikotesFree\ResponseService;
use App\Services\Landing\PsikotesFree\ResultService;

class FeedbackController extends Controller
{

    public function __construct(private AttemptService $attemptService, private ResponseService $responseService, private ResultService $resultService) {}

    public function show() {
        $this->attemptService->getSession('attempt_id');

        return view('landing.psikotes-free.feedback');
    }

    public function store(Request $request){
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'experience' => 'required|string',
        ]);

        $attemptId = $this->attemptService->getSession('attempt_id');

        $attempt = PsikotesFreeAttempt::find($attemptId);

        \Log::info('Data Attempt:', $attempt->toArray());

        $userId = $attempt->psikotes_free_profile_id    ;

        Feedback::create([
            'psikotes_free_profile_id' => $userId,
            'rating' => $request->input('rating'),
            'experience' => $request->input('experience'),
        ]);

        // Ambil tool dari relasi (pastikan relasi tool sudah dibuat di model PsikotesFreeAttempt)
        $tool = $attempt->tool; // pastikan ada relasi 'tool' di model

        // Ambil hasil dari ResultService
        $result = $this->resultService->resultData($tool, $attempt);

        // Simpan ke session
        session(['result_data' => $result]);

        return redirect()->route('psikotes-free.result');
    }
}
