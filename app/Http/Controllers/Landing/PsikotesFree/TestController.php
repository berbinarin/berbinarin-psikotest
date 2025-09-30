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

    public function attempt(Request $request) {
        $userId = $request->input('user_id');
        $user = PsikotesFreeProfile::findOrFail($userId);

        session(['user_id' => $user->id]);
        $this->attemptService->start($user);
        $this->attemptService->getSession('tool_id');

        return redirect()->route('psikotes-free.test');
    }

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

    public function timesUp(Request $request)
    {
        $tool = Tool::with('sections.questions')->find($this->attemptService->getSession('tool_id'));

        $currentSection = $tool->sections->firstWhere('order', $this->attemptService->getSession('section_order'));
        $question = $currentSection->questions->firstWhere('order', $this->attemptService->getSession('question_order'));

        // Simpan Jawaban User
        $this->responseService->store($request, $question);

        return redirect()->route('psikotes-free.feedback.show');
    }
}
