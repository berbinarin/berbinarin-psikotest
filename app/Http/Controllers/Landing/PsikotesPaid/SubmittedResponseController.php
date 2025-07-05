<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\PsikotesResponse;
use App\Models\PsikotesTool;
use App\Services\PsikotesResponse\PsikotesResponseService;
use Illuminate\Http\Request;

class SubmittedResponseController extends Controller
{
    public function __construct(private PsikotesResponseService $psikotesResponseService) {}

    public function question(PsikotesTool $psikotesTool)
    {
        // Eager load sections dan questions
        $psikotesTool->load('sections.questions');

        // Distructuring
        [$sectionOrder, $questionOrder] = [session('section_order'), session('question_order')];

        $currentSection = $psikotesTool->sections->firstWhere('order', $sectionOrder);
        $question = $currentSection->questions->firstWhere('order', $questionOrder);

        // Progress
        $progress = $this->calculateProgress($psikotesTool, $sectionOrder, $question->order);

        return view('landing.psikotes-paid.tools.question', compact('question', 'progress'));
    }

    private function calculateProgress(PsikotesTool $tool, int $currentSectionOrder, int $currentQuestionOrder): int
    {
        $totalQuestions = $tool->sections->sum(fn($section) => $section->questions->count());
        if ($totalQuestions === 0) {
            return 0;
        }

        $questionsAnswered = 0;
        // Hitung pertanyaan yang sudah dilewati di section-section sebelumnya.
        foreach ($tool->sections as $section) {
            if ($section->order < $currentSectionOrder) {
                $questionsAnswered += $section->questions->count();
            }
        }
        // Tambahkan pertanyaan yang sudah dilewati di section saat ini.
        $questionsAnswered += $currentQuestionOrder - 1;

        return (int) round(($questionsAnswered / $totalQuestions) * 100);
    }

    public function store(Request $request, PsikotesTool $psikotesTool)
    {
        $psikotesTool->load('sections.questions');

        [$sectionOrder, $questionOrder] = [session('section_order'), session('question_order')];

        // Dapatkan pertanyaan saat ini
        $currentSection = $psikotesTool->sections->firstWhere('order', $sectionOrder);

        // Pastikan section saat ini ada. Jika tidak, ada masalah dengan session atau data.
        if (!$currentSection) {
            // Anda bisa throw exception, log error, atau redirect ke halaman error
            return redirect('/error')->with('message', 'Section tidak ditemukan.');
        }

        $question = $currentSection->questions->firstWhere('order', $questionOrder);

        // Pastikan pertanyaan saat ini ada. Jika tidak, ada masalah dengan session atau data.
        if (!$question) {
            // Anda bisa throw exception, log error, atau redirect ke halaman error
            return redirect('/error')->with('message', 'Pertanyaan tidak ditemukan.');
        }

        // Service untuk menyimpan data
        $this->psikotesResponseService->store($request, $question, session('session_id'));

        // --- Logika untuk melanjutkan ke soal/sesi berikutnya ---

        $totalSections = $psikotesTool->sections->count();
        $currentQuestionCount = $currentSection->questions->count(); // Total pertanyaan di section saat ini

        // 1. Cek apakah pertanyaan saat ini adalah pertanyaan terakhir di section ini
        if ($questionOrder < $currentQuestionCount) {
            // Jika bukan pertanyaan terakhir, lanjut ke pertanyaan berikutnya di section yang sama
            session()->increment('question_order');
            return redirect('/psikotes-paid/tools/'. $psikotesTool->id .'/question'); // Hardcoded redirect for testing
        }

        // 2. Jika pertanyaan saat ini adalah yang terakhir di section ini,
        //    cek apakah section ini adalah section terakhir dari seluruh alat psikotes
        if ($sectionOrder < $totalSections) {
            // Jika bukan section terakhir, lanjut ke section berikutnya dan reset urutan pertanyaan ke 1
            session()->increment('section_order');
            session(['question_order' => 1]);
            return redirect('/psikotes-paid/tools/'. $psikotesTool->id .'/question'); // Hardcoded redirect for testing
        }

        // 3. Jika sudah di pertanyaan terakhir dari section terakhir, maka psikotes selesai
        session()->forget(['section_order', 'question_order', 'session_id']);
        return redirect('/psikotes-paid/tools');
    }
}
