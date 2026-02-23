<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\CheckpointQuestion;
use App\Models\CheckpointResponse;
use App\Models\Attempt;
use App\Models\Response;
use App\Models\Tool;
use App\Services\Landing\PsikotesPaid\AttemptService;
use App\Services\Landing\PsikotesPaid\ResponseService;
use Illuminate\Http\Request;

class SubmittedResponseController extends Controller
{
    public function __construct(private ResponseService $responseService, private AttemptService $attemptService)
    {
    }

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
        // Render soal aktif berdasarkan pointer session:
        // section_order + question_order.
        $tool = Tool::with('sections.questions')->find($this->attemptService->getSession('tool_id'));
        $currentSection = $tool?->sections?->firstWhere('order', $this->attemptService->getSession('section_order'));
        $question = $currentSection?->questions?->firstWhere('order', $this->attemptService->getSession('question_order'));

        \Log::info('CFIT session check', [
            'attempt_session' => session('attempt_session'),
            'tool_id' => $this->attemptService->getSession('tool_id'),
            'section_order' => $this->attemptService->getSession('section_order'),
            'question_order' => $this->attemptService->getSession('question_order'),
        ]);


        if (!$tool || !$currentSection || !$question) {
            $this->attemptService->destroySession();
            return redirect()->route('psikotes-paid.attempt.complete');
        }

        // Progress dipakai untuk progress bar UI.
        $progress = $this->attemptService->calculateProgress($tool);

        // Checkpoint bersifat opsional, aktif berdasarkan flag session.
        $checkpointQuestion = $this->attemptService->getSession('is_checkpoint') ? CheckpointQuestion::inRandomOrder()->first() : null;
        $attemptId = $this->attemptService->getSession('attempt_id');
        $savedResponse = Response::where('attempt_id', $attemptId)
            ->where('question_id', $question->id)
            ->latest('id')
            ->first();
        $savedAnswer = $savedResponse?->answer?->toArray() ?? [];
        $canGoBack = $this->attemptService->canGoBack($tool);

        return view('landing.psikotes-paid.attempts.questions.index', compact('question', 'progress', 'checkpointQuestion', 'attemptId', 'tool', 'canGoBack', 'savedAnswer'));
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

        $currentSection = $tool?->sections?->firstWhere('order', $this->attemptService->getSession('section_order'));
        $question = $currentSection?->questions?->firstWhere('order', $this->attemptService->getSession('question_order'));
        if (!$tool || !$currentSection || !$question) {
            $this->attemptService->destroySession();
            return redirect()->route('psikotes-paid.attempt.complete');
        }

        $action = $request->input('action', 'next');
        if ($action === 'back') {
            // Aksi "back" tidak menyimpan jawaban baru.
            // Hanya menggeser pointer session ke soal sebelumnya.
            if ($this->attemptService->canGoBack($tool)) {
                $this->attemptService->progressToPreviousStep();
            }
            return redirect()->route('psikotes-paid.attempt.question');
        }

        // Simpan Attempt User
        $attemptId = $this->attemptService->getSession('attempt_id');

        // Simpan/replace jawaban untuk soal saat ini.
        $this->responseService->store($request, $question);

        // Cek apakah ada jawaban checkpoint yang dikirim dari form
        if ($request->has('checkpoint_question_id') && $request->has('checkpoint_answer')) {

            // 1. Ambil ID percobaan (attempt) yang sedang aktif dari session
            $attemptId = $this->attemptService->getSession('attempt_id');

            // 2. Jika sesi aktif, simpan jawaban checkpoint
            if ($attemptId) {
                $this->responseService->storeCheckpoint($request);
            }

            // Matikan checkpoint agar tidak tampil berulang pada request berikutnya.
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

    // public function timesUp()
    // {
    //     $attemptId = $this->attemptService->getSession('attempt_id');

    //     if ($attemptId) {
    //         $attempt = Attempt::find($attemptId);
    //         if ($attempt && $attempt->status === 'in_progress') {
    //             // Kalau habis waktu, tandai jadi unfinished
    //             $attempt->update(['status' => 'unfinished']);
    //         }
    //     }

    //     $this->attemptService->destroySession();
    // }

    public function timesUp()
    {
        // Saat waktu habis, flow saat ini mencoba lanjut ke section berikutnya.
        // Jika tidak ada section lagi, attempt ditandai unfinished.
        $attemptId = $this->attemptService->getSession('attempt_id');
        $currentOrder = $this->attemptService->getSession('section_order');

        if (!$attemptId || $currentOrder === null) {
            return;
        }

        $attempt = Attempt::with('tool.sections.questions')->find($attemptId);

        if (!$attempt || $attempt->status !== 'in_progress') {
            return;
        }

        // Ambil semua section urut
        $sections = $attempt->tool->sections->sortBy('order')->values();

        // Temukan index section berdasarkan order
        $currentIndex = $sections->search(fn($s) => $s->order == $currentOrder);

        if ($currentIndex === false) {
            // Jika gagal menemukan section, akhiri saja
            $attempt->update(['status' => 'unfinished']);
            $this->attemptService->destroySession();
            return;
        }

        // Cek apakah ada next section
        $hasNext = $currentIndex + 1 < $sections->count();

        if ($hasNext) {
            // Pindah ke next section
            $next = $sections[$currentIndex + 1];

            /// reset question ke awal section
            $firstQuestion = $next->questions->sortBy('order')->first();

            $this->attemptService->updateSession([
                'section_order' => $next->order,
                'question_order' => $firstQuestion->order ?? 1,
            ]);

            return; // Jangan akhiri attempt
        }

        // Kalau tidak ada next section → akhiri tes
        $attempt->update(['status' => 'unfinished']); // atau 'finished'

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
