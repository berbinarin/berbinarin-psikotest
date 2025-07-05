<?php

namespace App\Http\Controllers\Dashboard\PTPM;

use App\Http\Controllers\Controller;
use App\Models\PsikotesSection;
use App\Models\PsikotesSession;
use App\Models\PsikotesTool;
use App\Services\PsikotesTool\PsikotesToolResultService;

class PsikotesToolDataController extends Controller
{
    public function __construct(private PsikotesToolResultService $psikotesToolResultService) {}

    public function index(PsikotesTool $psikotesTool)
    {
        return view('dashboard.ptpm.psikotes-tools.data.index', compact('psikotesTool'));
    }

    public function data(PsikotesTool $psikotesTool)
    {
        $sessions = $psikotesTool->load('sessions.user')->sessions;

        return view('dashboard.ptpm.psikotes-tools.data.data', compact('psikotesTool', 'sessions'));
    }

    public function detail(PsikotesTool $psikotesTool, PsikotesSession $psikotesSession)
    {
        $psikotesTool->load('sections.questions');
        $psikotesSession->load('responses.question');

        $data = $this->psikotesToolResultService->resultData($psikotesTool, $psikotesSession);

        return view('dashboard.ptpm.psikotes-tools.data.result', compact('data', 'psikotesTool', 'psikotesSession'));
    }

    public function sections(PsikotesTool $psikotesTool) {
        $psikotesTool->load('sections.questions');
        return view('dashboard.ptpm/psikotes-tools.data.sections', compact('psikotesTool'));
    }

    public function questions(PsikotesTool $psikotesTool, PsikotesSection $psikotesSection) {
        $psikotesSection->load('questions');
        return view('dashboard.ptpm/psikotes-tools.data.questions', compact('psikotesTool', 'psikotesSection'));
    }
}
