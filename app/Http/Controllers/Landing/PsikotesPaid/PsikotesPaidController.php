<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\PsikotesTool;
use Illuminate\Http\Request;

class PsikotesPaidController extends Controller
{
    public function index()
    {
        return view('psikotes.index');
    }

    public function tools()
    {
        $user = auth()->user();
        $tools = PsikotesTool::all();
        return view('landing.psikotes-paid.tools.index', compact('user', 'tools'));
    }

    public function verifyToken(Request $request, PsikotesTool $psikotesTool)
    {
        // if ($tool->token === $token) {
        //     $path = 'psikotest-paid.tool.' . $tool->name . '.showLanding';
        //     Alert::toast('Valid Token!', 'success')->autoClose(5000);
        //     return redirect()->route($path);
        // }
        // Alert::toast('Invalid Token!', 'error')->autoClose(5000);
        // return back();

        // Check token
        if ($psikotesTool->token === $request->token) {
            return redirect('psikotes-paid/tools/'. $psikotesTool->id);
        } else {
            return 'salah';
        }
    }

    public function landing(PsikotesTool $psikotesTool) {
        $progress = 60;
        return view('landing.psikotes-paid.tools.types.index', compact('psikotesTool', 'progress'));
    }
}
