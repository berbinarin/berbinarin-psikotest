<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Http\Requests\Landing\PsikotesPaid\Tool\VerifyTokenRequest;
use App\Models\Tool;
use App\Services\Landing\PsikotesPaid\AttemptService;

class ToolController extends Controller
{
    public function __construct(private AttemptService $attemptService)
    {
        
    }

    public function index()
    {
        $user = auth()->user();
        $tools = Tool::all();

        return view('landing.psikotes-paid.tools.index', compact('user', 'tools'));
    }

    public function verifyToken(VerifyTokenRequest $request) {
        $request->validated();
        
        $tool = Tool::find($request->tool_id);

        if($tool->token === $request->token) {
            $this->attemptService->start($tool);
        }
        
        return redirect()->route('psikotes-paid.attempt.introduce');
    }
}
