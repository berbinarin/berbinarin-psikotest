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

        $testimonial = $registrant->user->testimonials;

        return view('dashboard.ptpm_psikotes-paid.registrants.report.index', compact('registrant', 'testResults', 'testimonial'));
    }

    public function export($id)
    {
        $registrant = RegistrantProfile::with(['user.attempts.tool', 'user.testimonials', 'testType.testCategory'])->findOrFail($id);

        $attempt = $registrant->user->attempts->first();

        if (!$attempt) {
            return redirect()->back()->with('error', 'Tidak ada data attempt untuk pendaftar ini.');
        }

        $tool = $attempt->tool;

        $tool->load('sections.questions');
        $attempt->load('responses.question');

        $data = $this->resultService->resultData($tool, $attempt);

        $testimonial = $registrant->user->testimonials;

        $pdf = Pdf::loadView('dashboard.ptpm_psikotes-paid.registrants.report.export', compact('registrant', 'attempt', 'tool', 'data', 'testimonial'));
        return $pdf->download('Laporan_Pendaftar_' . $registrant->user->name . '.pdf');
    }
}
