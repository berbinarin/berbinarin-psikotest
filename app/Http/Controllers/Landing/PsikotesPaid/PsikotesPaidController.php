<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PsikotesPaidController extends Controller
{
    public function index()
    {
        return view('psikotes.index');
    }

    public function tools()
    {
        $user = auth()->user();
        $tools = Tool::all();

        return view('landing.psikotes-paid.tools.index', compact('user', 'tools'));
    }

    public function verifyToken(Request $request, Tool $tool)
    {
        $validateData = $request->validate([
            'token' => ['required', 'string'],
        ]);

        if ($tool->token === $validateData['token']) {
            $session = Session::create([
                'user_id' => auth()->user()->id,
                'tool_id' => $tool->id,
            ]);

            session([
                'session_id' => $session->id
            ]);

            return redirect('psikotes-paid/tools/' . $tool->id . '/introduce');
        }

        // Jika gagal, kembalikan ke halaman sebelumnya dengan pesan error.
        throw ValidationException::withMessages([
            'token' => 'Token yang Anda masukkan tidak valid.',
        ]);
    }

    public function introduce(Tool $tool)
    {

        if (!session()->has('section_order') || !session()->has('question_order')) {
            session([
                'section_order' => 1,
                'question_order' => 1
            ]);
        }

        return view('landing.psikotes-paid.tools.introduce', compact('tool'));
    }
}
