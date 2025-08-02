<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Tool;
use App\Services\Dashboard\PsikotesTool\ResultService;
use Illuminate\Http\Request;

class AttemptController extends Controller
{
    public function __construct(private ResultService $resultService) {}

    public function index(Tool $tool)
    {
        $attempts = $tool->load('attempts.user')->attempts;

        return view('dashboard.ptpm_psikotes-paid.tools.data.attempts.index', compact('tool', 'attempts'));
    }

    public function show(Tool $tool, Attempt $attempt)
    {
        $tool->load('sections.questions');
        $attempt->load('responses.question');

        $data = $this->resultService->resultData($tool, $attempt);

        return view('dashboard.ptpm_psikotes-paid.tools.data.attempts.results.index', compact('tool', 'attempt', 'data'));
    }
}
