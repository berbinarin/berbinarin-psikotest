<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool;

use Illuminate\Support\Facades\DB;
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
        $attempts = $tool->load(['attempts.user', 'sections'])->attempts;

        return view('dashboard.ptpm_psikotes-paid.tools.data.attempts.index', compact('tool', 'attempts'));
    }

    public function show(Tool $tool, Attempt $attempt)
    {
        $tool->load('sections.questions');
        $attempt->load('responses.question');

        $data = $this->resultService->resultData($tool, $attempt);

        return view('dashboard.ptpm_psikotes-paid.tools.data.attempts.results.index', compact('tool', 'attempt', 'data'));
    }

    public function destroy(Tool $tool, Attempt $attempt){
        try {
            DB::transaction(function () use ($attempt) {
                $attempt->delete();
            });

            return redirect()->route('dashboard.tools.data.attempts.index', [$tool->id])->with([
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Data berhasil dihapus',
            'icon'    => asset('assets/dashboard/images/success.webp'),
        ]);
        } catch (\Exception $e) {
            dd($e);
            return back()->with([
            'alert'   => true,
            'type'    => 'error',
            'title'   => 'Gagal',
            'message' => 'Terjdi kesalahan saat menghapus data... Sorry 😺',
            'icon'    => asset('assets/dashboard/images/error.webp'),
        ]);
        }
    }
}
