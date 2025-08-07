<?php

namespace App\Http\Controllers\Landing\PsikotesFree;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsikotesFreeAttempt;
use App\Services\Landing\PsikotesFree\AttemptService;
use App\Services\Landing\PsikotesFree\ResultService;
use App\Models\Tool;

class ResultController extends Controller
{
    public function __construct(private AttemptService $attemptService, private ResultService $resultService) {}
    public function result(){
        $attemptId = $this->attemptService->getSession('attempt_id');

        $attempt = PsikotesFreeAttempt::find($attemptId);

        $tool = Tool::where('name', 'OCEAN')->first();

        $data = $this->resultService->resultData($tool, $attempt);

        $extraversionPresentage = (($data['extraversion']['question_count'] > 0 ? $data['extraversion']['question_count'] : 1) * 5) > 0 ? ($data['extraversion']['total_score'] / (($data['extraversion']['question_count'] > 0 ? $data['extraversion']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['extraversion']['answer_distribution']) ? max($data['extraversion']['answer_distribution']) : 1;
        // $extraversionPresentage = (($data['extraversion']['question_count'] > 0 ? $data['extraversion']['question_count'] : 1) * 5) > 0 ? ($data['extraversion']['total_score'] / (($data['extraversion']['question_count'] > 0 ? $data['extraversion']['question_count'] : 1) * 5)) * 100 : 0;
        $agreeablenessPresentage = (($data['agreeableness']['question_count'] > 0 ? $data['agreeableness']['question_count'] : 1) * 5) > 0 ? ($data['agreeableness']['total_score'] / (($data['agreeableness']['question_count'] > 0 ? $data['agreeableness']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['agreeableness']['answer_distribution']) ? max($data['agreeableness']['answer_distribution']) : 1;
        $neuroticismPresentage = (($data['neuroticism']['question_count'] > 0 ? $data['neuroticism']['question_count'] : 1) * 5) > 0 ? ($data['neuroticism']['total_score'] / (($data['neuroticism']['question_count'] > 0 ? $data['neuroticism']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['neuroticism']['answer_distribution']) ? max($data['neuroticism']['answer_distribution']) : 1;
        $conscientiousnessPresentage = (($data['conscientiousness']['question_count'] > 0 ? $data['conscientiousness']['question_count'] : 1) * 5) > 0 ? ($data['conscientiousness']['total_score'] / (($data['conscientiousness']['question_count'] > 0 ? $data['conscientiousness']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['conscientiousness']['answer_distribution']) ? max($data['conscientiousness']['answer_distribution']) : 1;
        $opennessPresentage = (($data['openness']['question_count'] > 0 ? $data['openness']['question_count'] : 1) * 5) > 0 ? ($data['openness']['total_score'] / (($data['openness']['question_count'] > 0 ? $data['openness']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['openness']['answer_distribution']) ? max($data['openness']['answer_distribution']) : 1;

        return view('landing.psikotes-free.result', compact('data', 'extraversionPresentage', 'agreeablenessPresentage', 'neuroticismPresentage', 'conscientiousnessPresentage', 'opennessPresentage'));
    }

    public function finish() {
        $this->attemptService->destroySession();

        return redirect()->route('home.index');
    }
}
