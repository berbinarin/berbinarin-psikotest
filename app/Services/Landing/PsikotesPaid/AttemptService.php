<?php

namespace App\Services\Landing\PsikotesPaid;

use App\Models\Attempt;
use App\Models\Tool;

class AttemptService
{
    private const KEY = 'attempt_session';

    /**
     * Memulai session test baru dan menyimpannya di session
     */
    public function start(Tool $tool)
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
        return $name ?  session(self::KEY, [])[$name] : session(self::KEY, []);
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

        if (!$toolId) {
            return false;
        }

        $tool = Tool::with('sections.questions')->find($toolId);
        $currentSection = $tool->sections->firstWhere('order', $currentSectionOrder);

        $totalQuestionsInSection = $currentSection->questions->count();
        if ($currentQuestionOrder < $totalQuestionsInSection) {
            session()->increment(self::KEY . '.question_order');
            return true;
        }

        $totalSections = $tool->sections->count();
        if ($currentSectionOrder < $totalSections) {
            session()->increment(self::KEY . '.section_order');
            session([self::KEY . '.question_order' => 1]);
            return true;
        }

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
