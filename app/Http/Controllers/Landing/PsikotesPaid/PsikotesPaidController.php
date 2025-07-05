<?php

namespace App\Http\Controllers\Landing\PsikotesPaid;

use App\Http\Controllers\Controller;
use App\Models\PsikotesSession;
use App\Models\PsikotesTool;
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
        $tools = PsikotesTool::all();

        return view('landing.psikotes-paid.tools.index', compact('user', 'tools'));
    }

    public function verifyToken(Request $request, PsikotesTool $psikotesTool)
    {
        $validateData = $request->validate([
            'token' => ['required', 'string'],
        ]);

        if ($psikotesTool->token === $validateData['token']) {
            $session = PsikotesSession::create([
                'user_id' => auth()->user()->id,
                'psikotes_tool_id' => $psikotesTool->id,
            ]);

            session([
                'session_id' => $session->id
            ]);

            return redirect('psikotes-paid/tools/' . $psikotesTool->id . '/introduce');
        }

        // Jika gagal, kembalikan ke halaman sebelumnya dengan pesan error.
        throw ValidationException::withMessages([
            'token' => 'Token yang Anda masukkan tidak valid.',
        ]);
    }

    public function introduce(PsikotesTool $psikotesTool)
    {

        if (!session()->has('section_order') || !session()->has('question_order')) {
            session([
                'section_order' => 1,
                'question_order' => 1
            ]);
        }

        return view('landing.psikotes-paid.tools.introduce', compact('psikotesTool'));
    }
}
