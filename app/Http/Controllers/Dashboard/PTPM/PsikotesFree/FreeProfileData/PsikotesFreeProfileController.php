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

    public function index()
    {
        // $freeProfiles = PsikotesFreeProfile::with(['feedback', 'attempt'])->get();
        $attempts = PsikotesFreeAttempt::with('profile')->get();

        return view('dashboard.ptpm_psikotes-free.free-profiles.index', compact('attempts'));
    }

    public function show(PsikotesFreeAttempt $psikotesFreeAttempt)
    {
        $psikotesFreeAttempt->load('responses');
        
        $data = $this->resultService->resultData($psikotesFreeAttempt);

        $dimensions = ['extraversion', 'agreeableness', 'neuroticism', 'conscientiousness', 'openness'];
        $percentages = [];

        foreach ($dimensions as $dimension) {
            $dimensionData = $data[$dimension];
            $totalScore = $dimensionData['total_score'];

            $questionCount = $dimensionData['question_count'];
            if ($questionCount === 0) {
                $percentages[$dimension] = 0;
                continue;
            }

            $maxPossibleScore = $questionCount * 5;

            $percentages[$dimension] = ($totalScore / $maxPossibleScore) * 100;
        }

        // 4. Kirim data ke view dengan lebih rapi
        return view('dashboard.ptpm_psikotes-free.free-profiles.show', [
            'attempt' => $psikotesFreeAttempt,
            'data' => $data,
            'percentages' => $percentages, // Kirim sebagai satu array
        ]);
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
