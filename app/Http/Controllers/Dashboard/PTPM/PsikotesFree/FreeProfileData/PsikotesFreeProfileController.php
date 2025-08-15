<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesFree\FreeProfileData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PsikotesFreeProfile;
use App\Models\PsikotesFreeAttempt;
use App\Models\Tool;
use App\Http\Controllers\Controller;
use App\Services\Landing\PsikotesFree\ResultService;

class PsikotesFreeProfileController extends Controller
{
    public function __construct(private ResultService $resultService) {}

    public function index() {
        $freeProfiles = PsikotesFreeProfile::with(['feedback', 'attempt'])->get();

        return view('dashboard.ptpm_psikotes-free.free-profiles.index', compact('freeProfiles'));
    }

    public function show($id) {
        $attempt = PsikotesFreeAttempt::find($id);

        $tool = Tool::where('name', 'OCEAN')->first();

        $data = $this->resultService->resultData($tool, $attempt);

        $freeProfile = PsikotesFreeProfile::with([
            'feedback',
            'attempt.responses.question' // load responses + pertanyaan
        ])->findOrFail($id);

        $extraversionPresentage = (($data['extraversion']['question_count'] > 0 ? $data['extraversion']['question_count'] : 1) * 5) > 0 ? ($data['extraversion']['total_score'] / (($data['extraversion']['question_count'] > 0 ? $data['extraversion']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['extraversion']['answer_distribution']) ? max($data['extraversion']['answer_distribution']) : 1;
        $agreeablenessPresentage = (($data['agreeableness']['question_count'] > 0 ? $data['agreeableness']['question_count'] : 1) * 5) > 0 ? ($data['agreeableness']['total_score'] / (($data['agreeableness']['question_count'] > 0 ? $data['agreeableness']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['agreeableness']['answer_distribution']) ? max($data['agreeableness']['answer_distribution']) : 1;
        $neuroticismPresentage = (($data['neuroticism']['question_count'] > 0 ? $data['neuroticism']['question_count'] : 1) * 5) > 0 ? ($data['neuroticism']['total_score'] / (($data['neuroticism']['question_count'] > 0 ? $data['neuroticism']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['neuroticism']['answer_distribution']) ? max($data['neuroticism']['answer_distribution']) : 1;
        $conscientiousnessPresentage = (($data['conscientiousness']['question_count'] > 0 ? $data['conscientiousness']['question_count'] : 1) * 5) > 0 ? ($data['conscientiousness']['total_score'] / (($data['conscientiousness']['question_count'] > 0 ? $data['conscientiousness']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['conscientiousness']['answer_distribution']) ? max($data['conscientiousness']['answer_distribution']) : 1;
        $opennessPresentage = (($data['openness']['question_count'] > 0 ? $data['openness']['question_count'] : 1) * 5) > 0 ? ($data['openness']['total_score'] / (($data['openness']['question_count'] > 0 ? $data['openness']['question_count'] : 1) * 5)) * 100 : 0; $maxValue = !empty($data['openness']['answer_distribution']) ? max($data['openness']['answer_distribution']) : 1;

        return view('dashboard.ptpm_psikotes-free.free-profiles.show', compact('freeProfile', 'data',  'extraversionPresentage', 'agreeablenessPresentage', 'neuroticismPresentage', 'conscientiousnessPresentage', 'opennessPresentage'));
    }

    public function destroy($id)
    {
        $freeProfile = PsikotesFreeProfile::findOrFail($id);

        try {
            DB::transaction(function () use ($freeProfile) {
                if ($freeProfile->feedback) {
                    $freeProfile->feedback->delete();
                }

                $freeProfile->attempt()->delete();

                $freeProfile->delete();
            });

            return redirect()->route('dashboard.free-profiles.data.show')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            dd($e);
            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
