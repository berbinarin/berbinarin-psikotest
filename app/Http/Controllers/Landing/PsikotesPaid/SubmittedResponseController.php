<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Tool;
use App\Services\Landing\PsikotesPaid\AttemptService;
use App\Services\Landing\PsikotesPaid\ResponseService;
use Illuminate\Http\Request;

class SubmittedResponseController extends Controller
{
    public function __construct(private ResponseService $responseService, private AttemptService $attemptService) {}

    public function introduce()
    {
        $user = auth()->user();
        $tool = Tool::find($this->attemptService->getSession('tool_id'));

        if (!$tool->introduce) {
            return redirect()->route('psikotes-paid.attempt.question');
        }

        return view('landing.psikotes-paid.attempts.introduce', compact('user', 'tool'));
    }

    public function question()
    {
        // Eager load sections dan questions
        $tool = Tool::with('sections.questions')->find($this->attemptService->getSession('tool_id'));
        $currentSection = $tool->sections->firstWhere('order', $this->attemptService->getSession('section_order'));
        $question = $currentSection->questions->firstWhere('order', $this->attemptService->getSession('question_order'));

        // Progress
        $progress = $this->attemptService->calculateProgress($tool);

        return view('landing.psikotes-paid.attempts.questions.index', compact('question', 'progress'));
    }

    public function submit(Request $request)
    {
        $tool = Tool::with('sections.questions')->find($this->attemptService->getSession('tool_id'));
        
        // Log session state before processing
        \Log::info('Before processing answer:', [
            'tool_id' => $this->attemptService->getSession('tool_id'),
            'section_order' => $this->attemptService->getSession('section_order'),
            'question_order' => $this->attemptService->getSession('question_order')
        ]);

        $currentSection = $tool->sections->firstWhere('order', $this->attemptService->getSession('section_order'));
        $question = $currentSection->questions->firstWhere('order', $this->attemptService->getSession('question_order'));

        // Simpan Jawaban User
        $this->responseService->store($request, $question);


        $isTestOngoing = $this->attemptService->progressToNextStep();
        
        // Log session state after processing
        \Log::info('After processing answer:', [
            'section_order' => $this->attemptService->getSession('section_order'),
            'question_order' => $this->attemptService->getSession('question_order'),
            'isTestOngoing' => $isTestOngoing
        ]);

        if ($isTestOngoing) {
            return redirect()->route('psikotes-paid.attempt.question');
        }

        return redirect()->route('psikotes-paid.attempt.complete');
    }

    public function complete()
    {
        return view('landing.psikotes-paid.attempts.complete');
    }

    public function timesUp()
    {
        $this->attemptService->destroySession();
    }
}
