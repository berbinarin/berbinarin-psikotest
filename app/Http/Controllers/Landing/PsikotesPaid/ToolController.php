<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Http\Requests\Landing\PsikotesPaid\Tool\VerifyTokenRequest;
use App\Models\Tool;
use App\Services\Landing\PsikotesPaid\AttemptService;
use Jenssegers\Agent\Agent;

class ToolController extends Controller
{
    public function __construct(private AttemptService $attemptService) {}

    // View Test Page
    public function index()
    {
        $agent = new Agent();

        if ($agent->isMobile() && !$agent->isTablet()) {
            return view('landing.psikotes-paid.tools.block-mobile');
        }
        $user = auth()->user();
        $tools = Tool::orderBy('order', 'ASC')->get();

        return view('landing.psikotes-paid.tools.index', compact('user', 'tools'));
    }

    public function verifyToken(VerifyTokenRequest $request)
    {
        $request->validated();

        $tool = Tool::find($request->tool_id);

        if ($tool && $tool->token === $request->token) {
            $this->attemptService->startOrResume($tool);

            return redirect()->route('psikotes-paid.attempt.introduce');
        } else {
            return redirect()->back()->withInput()->with([
                'alert' => true,
                'icon' => asset('assets/dashboard/images/error.webp'),
                'type' => 'error',
                'title' => 'Token Salah',
                'message' => 'Token yang kamu masukkan tidak valid. Silakan coba lagi.',
            ]);
        }
    }

    // View Testimonial Page
    public function testimoni()
    {
        return view('landing.psikotes-paid.tools.testimoni');
    }
}
