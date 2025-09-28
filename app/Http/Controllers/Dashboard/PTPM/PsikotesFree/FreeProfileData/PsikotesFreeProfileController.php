<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesFree\FreeProfileData;

use Illuminate\Support\Facades\DB;
use App\Models\PsikotesFreeProfile;
use App\Models\PsikotesFreeAttempt;
use App\Models\Tool;
use App\Http\Controllers\Controller;
use App\Services\Landing\PsikotesFree\ResultService;

class PsikotesFreeProfileController extends Controller
{
    public function __construct(private ResultService $resultService) {}

    // Show Profiles Data
    public function index()
    {
        // $profiles = PsikotesFreeProfile::whereHas('attempts')
        // ->with(['attempts' => fn($q) => $q->latest()])
        // ->get();
        $profiles = PsikotesFreeProfile::with(['attempts' => fn($q) => $q->latest()])
        ->get();

        return view('dashboard.ptpm_psikotes-free.free-profiles.index', compact('profiles'));
    }

    // Show Profile's Detail
    public function show($id)
    {
        $attempt = PsikotesFreeAttempt::with('responses')->find($id);

        $tool = Tool::where('name', 'OCEAN')->first();

        $data = $this->resultService->resultData($tool, $attempt);

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
            'attempt' => $attempt,
            'data' => $data,
            'percentages' => $percentages, // Kirim sebagai satu array
        ]);
    }

    // Detele Profile
    public function destroy($id)
    {
        $freeProfile = PsikotesFreeProfile::findOrFail($id);

        try {
            DB::transaction(function () use ($freeProfile) {
                if ($freeProfile->feedback) {
                    $freeProfile->feedback->delete();
                }

                foreach ($freeProfile->attempts as $attempt) {
                    // Hapus semua responses dari attempt
                    $attempt->responses()->delete();

                    // Hapus attempt
                    $attempt->delete();
                }

                $freeProfile->delete();
            });

            return redirect()->route('dashboard.free-profiles.data.show')->with([
                'alert'   => true,
                'type'    => 'success',
                'title'   => 'Berhasil!',
                'message' => 'Data berhasil dihapus',
                'icon'    => asset('assets/dashboard/images/success.png'),
            ]);
        } catch (\Exception $e) {
            dd($e);
            return back()->with([
                'alert'   => true,
                'type'    => 'error',
                'title'   => 'Gagal!',
                'message' => 'Terjadi kesalahan saat menghapus data',
                'icon'    => asset('assets/dashboard/images/success.png'),
            ]);
        }
    }
}
