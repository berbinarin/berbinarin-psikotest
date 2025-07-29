<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Models\Tool;
use App\Services\PsikotesResponse\PsikotesResponseService;
use Illuminate\Http\Request;

class SubmittedResponseController extends Controller
{
    public function __construct(private PsikotesResponseService $psikotesResponseService) {}

    public function question(Tool $tool)
    {
        // Eager load sections dan questions
        $tool->load('sections.questions');

        // Destructuring
        [$sectionOrder, $questionOrder] = [session('section_order'), session('question_order')];

        $currentSection = $tool->sections->firstWhere('order', $sectionOrder);
        $question = $currentSection->questions->firstWhere('order', $questionOrder);

        // Progress
        $progress = $this->calculateProgress($tool, $sectionOrder, $question->order);

        return view('landing.psikotes-paid.tools.question', compact('question', 'progress'));
    }

    private function calculateProgress(Tool $tool, int $currentSectionOrder, int $currentQuestionOrder): int
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

    public function store(Request $request, Tool $tool)
    {
        $tool->load('sections.questions');

        // Destructuring
        [$sectionOrder, $questionOrder, $sessionId] = [session('section_order', 1), session('question_order', 1), session('session_id')];

        // Mengmabil data section saat ini
        $currentSection = $tool->sections->firstWhere('order', $sectionOrder);

        // Cek apakah data section saat ini ada
        if (!$currentSection) {
            return redirect('/error')->with('message', 'Section tidak ditemukan.');
        }

        // mengambil data question saat ini
        $question = $currentSection->questions->firstWhere('order', $questionOrder);

        // cek apakah data question saat ini ada
        if (!$question) {
            return redirect('/error')->with('message', 'Pertanyaan tidak ditemukan.');
        }

        // Jika section dan question valid, simpan jawaban user
        $this->psikotesResponseService->store($request, $question, $sessionId);

        // ----- Penanganan lanjut Soal / Next Question -----

        // Ambil data jumlah section pada alat psikotes saat ini
        $totalSections = $tool->sections->count();

        // Ambil data jumlah soal di section saat ini
        $totalQuestionsInSection = $currentSection->questions->count();

        // Cek apakah urutan dari question saat ini itu lebih kecil dari jumlah question pada section saat ini
        // (Cek apakah masih ada sisa pertanyaan)
        if ($questionOrder < $totalQuestionsInSection) {
            // Update session question_order(+1)
            session()->increment('question_order');

            // Arahkan kembali ke halaman pertanyaan
            return redirect()->route('psikotes-paid.question', ['tool' => $tool->id]);
            // (Jika pertanyaan sudah habis)
        } else {
            
            // Cek apakah urutan dari section saat ini itu lebih kecil dari jumlah section pada alat psikotes saat ini
            // (cek apakah masih ada sisa section)
            if ($sectionOrder < $totalSections) {
                // update session section_oder (+1)
                session()->increment('section_order');

                // kembalika urutan pertanyaan ke 1
                session(['question_order' => 1]);

                // Arahkan kembali ke halaman pertanyaan
                return redirect()->route('psikotes-paid.question', ['tool' => $tool->id]);
            }
        }

        // Jika section saat ini adalah section terkahir dan pertanyaan saat ini juga pertanyaan terkahir dari section ini
        
        // Hapus session
        session()->forget(['section_order', 'question_order', 'session_id']);

        // arahkan ke halaman summary

        return redirect()->route('psikotes-paid.summary', ['tool' => $tool->id]);    
    }
}
