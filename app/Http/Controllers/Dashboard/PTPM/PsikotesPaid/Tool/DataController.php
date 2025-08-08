<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Section;
use App\Models\Tool;
use App\Services\Dashboard\PsikotesTool\ResultService;

class DataController extends Controller
{
    public function index(Tool $tool)
    {
        $users = $tool->load('attempts.user');

        $questions = $tool->load('sections.questions');

        $sections = $tool->load('sections');

        return view('dashboard.ptpm_psikotes-paid.tools.data.index', compact('tool', 'users', 'questions', 'sections'));
    }
}
