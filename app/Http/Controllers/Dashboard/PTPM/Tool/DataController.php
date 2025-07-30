<?php

namespace App\Http\Controllers\Dashboard\PTPM\Tool;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Section;
use App\Models\Tool;
use App\Services\Dashboard\PsikotesTool\ResultService;

class DataController extends Controller
{
    public function index(Tool $tool)
    {
        return view('dashboard.ptpm_psikotes-paid.tools.data.index', compact('tool'));
    }
}
