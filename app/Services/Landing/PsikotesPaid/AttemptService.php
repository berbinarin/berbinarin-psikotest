<?php

namespace App\Services\Landing\PsikotesPaid;

use App\Models\Tool;
use App\Models\Attempt;
use App\Models\Response;

class AttemptService
{
    private const KEY = 'attempt_session';

    /**
     * Metode utama yang cerdas:
     * - Cek apakah ada tes yang belum selesai.
     * - Jika ada, lanjutkan tes tersebut (rebuild session).
     * - Jika tidak ada, mulai tes baru.
     */
    public function startOrResume(Tool $tool): void
    {
        $existingAttempt = Attempt::where('user_id', auth()->id())
            ->where('tool_id', $tool->id)
            ->where('status', 'in_progress')
            ->latest() // Ambil yang paling baru jika ada duplikat
            ->first();

        if ($existingAttempt) {
            // JIKA DITEMUKAN TES LAMA: Lanjutkan tes
            $this->rebuildSessionFromAttempt($existingAttempt);
        } else {
            // JIKA TIDAK ADA: Mulai tes baru
            $this->startNewAttempt($tool);
        }
    }

    /**
     * Membangun kembali session dari data attempt yang ada di database.
     */
    private function rebuildSessionFromAttempt(Attempt $attempt): void
    {
        // Cari jawaban terakhir yang diberikan oleh user untuk attempt ini
        $lastResponse = Response::where('attempt_id', $attempt->id)
            ->latest('created_at')
            ->first();

        $sectionOrder = 1;
        $questionOrder = 1;

        if ($lastResponse) {
            // Jika ada jawaban, tentukan posisi soal berikutnya
            // Kita "pura-pura" berada di posisi soal terakhir yang dijawab
            // lalu gunakan logic progressToNextStep untuk maju
            session([
                self::KEY => [
                    'tool_id' => $attempt->tool_id,
                    'attempt_id' => $attempt->id,
                    'section_order' => $lastResponse->question->section->order,
                    'question_order' => $lastResponse->question->order,
                    'is_checkpoint' => false,
                ]
            ]);
            // Maju ke soal berikutnya
            $this->progressToNextStep();

            // Jika progressToNextStep me-return false (tes sudah selesai),
            // kita reset saja ke awal (kasus langka)
            if (!session()->has(self::KEY)) {
                session([
                    self::KEY => [
                        'tool_id' => $attempt->tool_id,
                        'attempt_id' => $attempt->id,
                        'section_order' => 1,
                        'question_order' => 1,
                        'is_checkpoint' => false,
                    ]
                ]);
            }
        } else {
            // Jika belum ada jawaban sama sekali, mulai dari awal
            session([
                self::KEY => [
                    'tool_id' => $attempt->tool_id,
                    'attempt_id' => $attempt->id,
                    'section_order' => $sectionOrder,
                    'question_order' => $questionOrder,
                    'is_checkpoint' => false,
                ]
            ]);
        }
    }

    /**
     * Logika untuk memulai tes yang benar-benar baru.
     * (Ini adalah isi dari fungsi start() Anda yang lama)
     */
    private function startNewAttempt(Tool $tool): void
    {
        $attempt = Attempt::create([
            'user_id' => auth()->user()->id,
            'tool_id' => $tool->id,
            'status' => 'in_progress'
        ]);

        session([
            self::KEY => [
                'tool_id' => $tool->id,
                'attempt_id' => $attempt->id,
                'section_order' => 1,
                'question_order' => 1,
                'is_checkpoint' => false,
            ]
        ]);
    }
    /**
     * Mengambil data session berdasarakan nama keynya
     *
     * @return bool
     */
    public function getSession($name = null)
    {
        $sessionData = session(self::KEY, []);
        if ($name === null) {
            return $sessionData;
        }
        return $sessionData[$name] ?? null;
    }

    public function updateSession(array $data): void
    {
        // Ambil semua data session yang ada saat ini
        $currentSession = session(self::KEY, []);

        // Gabungkan data lama dengan data baru (data baru akan menimpa yang lama jika key-nya sama)
        $newSessionData = array_merge($currentSession, $data);

        // Simpan kembali data yang sudah diperbarui ke dalam session
        session([self::KEY => $newSessionData]);
    }

    /**
     * Menghapus semua session
     */
    public function destroySession()
    {
        session()->forget(self::KEY);
    }

    /**
     * Memajukan tes ke pertanyaan atau seksi berikutnya.
     * Mengembalikan false jika tes telah selesai.
     *
     * @return bool
     */
    public function progressToNextStep(): bool
    {
        $toolId = $this->getSession('tool_id');
        $currentSectionOrder = $this->getSession('section_order');
        $currentQuestionOrder = $this->getSession('question_order');

        \Log::info('Starting progressToNextStep:', [
            'toolId' => $toolId,
            'currentSectionOrder' => $currentSectionOrder,
            'currentQuestionOrder' => $currentQuestionOrder
        ]);

        if (!$toolId) {
            \Log::warning('No tool_id found in session');
            return false;
        }

        $tool = Tool::with('sections.questions')->find($toolId);
        $currentSection = $tool->sections->firstWhere('order', $currentSectionOrder);

        $totalQuestionsInSection = $currentSection->questions->count();

        \Log::info('Section info:', [
            'totalQuestionsInSection' => $totalQuestionsInSection,
            'currentQuestionOrder' => $currentQuestionOrder,
            'sectionId' => $currentSection->id
        ]);

        if ($currentQuestionOrder < $totalQuestionsInSection) {
            session()->increment(self::KEY . '.question_order');

            \Log::info('Incremented question order', [
                'new_question_order' => $this->getSession('question_order')
            ]);

            return true;
        }

        $totalSections = $tool->sections->count();

        \Log::info('Section transition check:', [
            'currentSectionOrder' => $currentSectionOrder,
            'totalSections' => $totalSections
        ]);

        if ($currentSectionOrder < $totalSections) {
            $oldSectionOrder = $this->getSession('section_order');
            session()->increment(self::KEY . '.section_order');
            session([self::KEY . '.question_order' => 1]);

            \Log::info('Moving to next section', [
                'old_section' => $oldSectionOrder,
                'new_section' => $this->getSession('section_order'),
                'reset_question_order' => 1
            ]);

            return true;
        }

        \Log::info('Test completed, updating attempt status');

        Attempt::find($this->getSession('attempt_id'))->update([
            'status' => 'completed',
        ]);

        $this->destroySession();
        return false;
    }

    /**
     * Menghitung progress dalam bentuk persentase
     *
     * @return int
     */
    public function calculateProgress(Tool $tool): int
    {
        $tool->load('sections.questions');
        [$currentSectionOrder, $currentQuestionOrder] = [$this->getSession('section_order'), $this->getSession('question_order')];

        $totalQuestions = $tool->sections->sum(function ($section) {
            return $section->questions->count();
        });

        if ($totalQuestions === 0) {
            return 0;
        }

        $questionsAnswered = 0;
        foreach ($tool->sections as $section) {
            if ($section->order < $currentSectionOrder) {
                $questionsAnswered += $section->questions->count();
            }
        }
        $questionsAnswered += $currentQuestionOrder - 1;

        return (int) round(($questionsAnswered / $totalQuestions) * 100);
    }
}