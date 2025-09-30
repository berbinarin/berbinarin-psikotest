<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::orderBy('order', 'asc')->get();
        return view('dashboard.ptpm_psikotes-paid.tools.index', compact('tools'));
    }

    /**
     * generate token for psikotes tool
     */
    public function generateToken(Tool $tool)
    {
        $tool = Tool::findOrFail($tool->id);
        $tool->token = Str::random(8);
        $tool->save();

        return redirect()->back()->with([
            'alert'   => true,
            'type'    => 'Success',
            'title'   => 'Berhasil!',
            'message' => 'Yeeee!! Token berhasil diperbarui',
            'icon'    => asset('assets/dashboard/images/error.png'),
        ]);
    }
}
