<?php

namespace App\Http\Controllers\Dashboard\PTPM\Tool;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Session;
use App\Models\Tool;
use App\Services\PsikotesTool\PsikotesToolResultService;

class PsikotesToolDataController extends Controller
{
    public function __construct(private PsikotesToolResultService $psikotesToolResultService) {}

    public function index(Tool $tool)
    {
        return view('dashboard.ptpm.tools.data.index', compact('tool'));
    }

    public function data(Tool $tool)
    {
        $sessions = $tool->load('sessions.user')->sessions;

        return view('dashboard.ptpm.tools.data.data', compact('tool', 'sessions'));
    }

    public function detail(Tool $tool, Session $session)
    {
        $tool->load('sections.questions');
        $session->load('responses.question');

        $data = $this->psikotesToolResultService->resultData($tool, $session);

        return view('dashboard.ptpm.tools.data.result', compact('data', 'tool', 'session'));
    }

    public function sections(Tool $tool) {
        $tool->load('sections.questions');
        return view('dashboard.ptpm/tools.data.sections', compact('psikotesTool'));
    }

    public function questions(Tool $tool, Section $psikotesSection) {
        $psikotesSection->load('questions');
        return view('dashboard.ptpm/tools.data.questions', compact('psikotesTool', 'psikotesSection'));
    }
}
