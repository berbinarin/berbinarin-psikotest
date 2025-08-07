<?php

namespace App\Http\Controllers\Landing\PsikotesFree;

use App\Http\Controllers\Controller;
use App\Models\PsikotesFreeAttempt;
use App\Services\Landing\PsikotesFree\AttemptService;
use App\Services\Landing\PsikotesFree\ResponseService;
use App\Models\PsikotesFreeProfile;
use App\Models\PsikotesFreeResponse;
use App\Models\Tool;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function __construct(private ResponseService $responseService, private AttemptService $attemptService) {

    }

    // public function attempt(Request $request) {
    //     $userId = $request->input('user_id');
    //     $user = PsikotesFreeProfile::findOrFail($userId);

    //     $tool = Tool::where('name', 'OCEAN')->firstOrFail();

    //     $attempt = PsikotesFreeAttempt::create([
    //         'psikotes_free_profile_id' => $user->id,
    //         'tool_id' => $tool->id,
    //         'status' => 'in_progress',
    //     ]);

    //     session()->put('attempt_id', $attempt->id);
    //     session()->put('user_id', $user->id);

    //     return redirect()->route('psikotes-free.test', [
    //         'attempt_id' => $attempt->id,
    //     ]);
    // }

    public function attempt(Request $request) {
        $userId = $request->input('user_id');
        $user = PsikotesFreeProfile::findOrFail($userId);

        session(['user_id' => $user->id]);
        $this->attemptService->start($user);
        $this->attemptService->getSession('tool_id');

        return redirect()->route('psikotes-free.test');
    }

    // public function test(Request $request, $attempt_id) {
    //     $attempt = PsikotesFreeAttempt::with(['tool.sections.questions'])->findOrFail($attempt_id);
    //     $userId = session('user_id');

    //     // Cek apakah user yang berhak
    //     if ($attempt->psikotes_free_profile_id != $userId) {
    //         abort(403, 'Unauthorized access');
    //     }

    //     $section = $attempt->tool->sections->first();

    //     if (!$section) {
    //         return redirect()->route('psikotes-free.profile')->withErrors(['message' => 'Soal tidak ditemukan.']);
    //     }

    //     // Ambil urutan soal saat ini dari session
    //     $questionOrder = session("question_order_$attempt_id", 1);

    //     $question = $section->questions->sortBy('order')->values()->get($questionOrder - 1);

    //     if (!$question) {
    //         $attempt->update(['status' => 'finished']);
    //         session()->forget(["question_order_$attempt_id"]);
    //         return redirect()->route('psikotes-free.attempt.feedback', $attempt_id);
    //     }

    //     $progress = ($questionOrder / $section->questions->count()) * 100;

    //     return view('landing.psikotes-free.test', [
    //         'attempt' => $attempt,
    //         'section' => $section,
    //         'question' => $question,
    //         'progress' => $progress,
    //     ]);
    // }

    public function test() {
        // Eager load sections dan questions
        $tool = Tool::with('sections.questions')->find($this->attemptService->getSession('tool_id'));
        $currentSection = $tool->sections->firstWhere('order', $this->attemptService->getSession('section_order'));
        $question = $currentSection->questions->firstWhere('order', $this->attemptService->getSession('question_order'));

        // Progress
        $progress = $this->attemptService->calculateProgress($tool);

        return view('landing.psikotes-free.test', compact('question', 'progress'));
    }

    public function submit(Request $request){
        $tool = Tool::with('sections.questions')->find($this->attemptService->getSession('tool_id'));

        $currentSection = $tool->sections->firstWhere('order', $this->attemptService->getSession('section_order'));
        $question = $currentSection->questions->firstWhere('order', $this->attemptService->getSession('question_order'));

        // Simpan Jawaban User
        $this->responseService->store($request, $question);

        $isTestOngoing = $this->attemptService->progressToNextStep();
        if ($isTestOngoing) {
            return redirect()->route('psikotes-free.test');
        }

        return redirect()->route('psikotes-free.feedback.show');
    }

    // public function timesUp()
    // {
    //     $this->attemptService->destroySession();
    // }
}
