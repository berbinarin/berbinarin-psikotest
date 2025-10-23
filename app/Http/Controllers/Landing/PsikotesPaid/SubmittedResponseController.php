<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\CheckpointQuestion;
use App\Models\CheckpointResponse;
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

        // Checkpoint Question
        $checkpointQuestion = $this->attemptService->getSession('is_checkpoint') ? CheckpointQuestion::inRandomOrder()->first() : null;
        $attemptId = $this->attemptService->getSession('attempt_id');
        return view('landing.psikotes-paid.attempts.questions.index', compact('question', 'progress', 'checkpointQuestion', 'attemptId', 'tool'));
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

        // Simpan Attempt User
        $attemptId = $this->attemptService->getSession('attempt_id');

        // Simpan Jawaban User
        $this->responseService->store($request, $question);

        // Cek apakah ada jawaban checkpoint yang dikirim dari form
        if ($request->has('checkpoint_question_id') && $request->has('checkpoint_answer')) {

            // 1. Ambil ID percobaan (attempt) yang sedang aktif dari session
            $attemptId = $this->attemptService->getSession('attempt_id');

            // 2. Jika sesi aktif, simpan jawaban checkpoint
            if ($attemptId) {
                $this->responseService->storeCheckpoint($request);
            }

            // 3. Matikan status checkpoint di session setelah diproses
            $this->attemptService->updateSession(['is_checkpoint' => false]);
        }

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

        return redirect()->route('psikotes-paid.attempt.complete', ['attemptId' => $attemptId]);
    }

    public function complete()
    {
        return view('landing.psikotes-paid.attempts.complete');
    }

    public function timesUp()
    {
        $attemptId = $this->attemptService->getSession('attempt_id');

        if ($attemptId) {
            $attempt = Attempt::find($attemptId);
            if ($attempt && $attempt->status === 'in_progress') {
                // Kalau habis waktu, tandai jadi unfinished
                $attempt->update(['status' => 'unfinished']);
            }
        }

        $this->attemptService->destroySession();
    }

    public function getCheckpointQuestion()
    {
        $question = CheckpointQuestion::inRandomOrder()->first();

        if ($question) {
            return response()->json($question);
        }

        return response()->json(['error' => 'No checkpoint question found.'], 404);
    }

    public function setCheckpoint(Request $request)
    {
        $validateData = $request->validate([
            'value' => 'required|boolean'
        ]);

        $this->attemptService->updateSession(['is_checkpoint' => $validateData['value']]);

        // Beri respon JSON untuk menandakan sukses
        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Checkpoint berhasil di update',
        ], 200);
    }
}
