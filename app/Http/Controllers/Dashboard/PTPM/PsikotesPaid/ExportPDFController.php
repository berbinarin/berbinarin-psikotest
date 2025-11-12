<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\PsikotesTool\ResultService;
use App\Models\RegistrantProfile;
use App\Models\Tool;
use App\Models\Attempt;
use AppModels\User;
use App\Models\Testimonial;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportPDFController extends Controller
{
    public function __construct(private ResultService $resultService){}

    public function index($id)
    {
        $registrant = RegistrantProfile::with(['user.attempts.tool', 'user.testimonials', 'testType.testCategory'])->findOrFail($id);

        $attempts = $registrant->user->attempts;

        if (!$attempts) {
            return redirect()->back()->with('error', 'Tidak ada data attempt untuk pendaftar ini.');
        }

        $testResults = [];

        foreach ($attempts as $attempt) {
            // Load relasi responses.question untuk setiap attempt
            $attempt->load('responses.question');

            // Panggil service untuk mendapatkan data hasil untuk attempt ini
            $data = $this->resultService->resultData($attempt->tool, $attempt);

            // Tambahkan data ke dalam array $testResults
            $testResults[] = [
                'tool' => $attempt->tool,
                'attempt' => $attempt,
                'data' => $data
            ];
        }

        $checkpoints = $registrant->user->attempts()
        ->with(['tool', 'checkpointResponses'])
        ->get()
        ->pluck('checkpointResponses')
        ->flatten();

        $testimonial = $registrant->user->testimonials;

        return view('dashboard.ptpm_psikotes-paid.registrants.report.index', compact('registrant', 'testResults', 'checkpoints','testimonial'));
    }

    public function export($id)
    {
        $registrant = RegistrantProfile::with(['user.attempts.tool', 'user.testimonials', 'testType.testCategory'])->findOrFail($id);

        $attempts = $registrant->user->attempts;

        if (!$attempts) {
            return redirect()->back()->with('error', 'Tidak ada data attempt untuk pendaftar ini.');
        }

        $testResults = [];

        foreach ($attempts as $attempt) {
            // Load relasi responses.question untuk setiap attempt
            $attempt->load('responses.question');

            // Panggil service untuk mendapatkan data hasil untuk attempt ini
            $data = $this->resultService->resultData($attempt->tool, $attempt);

            // Tambahkan data ke dalam array $testResults
            $testResults[] = [
                'tool' => $attempt->tool,
                'attempt' => $attempt,
                'data' => $data
            ];
        }

        $checkpoints = $registrant->user->attempts()
        ->with(['tool', 'checkpointResponses'])
        ->get()
        ->pluck('checkpointResponses')
        ->flatten();

        $testimonial = $registrant->user->testimonials;

        $pdf = Pdf::loadView('dashboard.ptpm_psikotes-paid.registrants.report.export', compact('registrant', 'testResults', 'checkpoints','testimonial'));
        $filename = 'Hasil Laporan Pendaftar ' . $registrant->user->name . ' ' . now()->format('d-m-Y') . '.pdf';
        return $pdf->download($filename);
    }
}
