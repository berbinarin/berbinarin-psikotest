<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Checkpoint;

use App\Http\Controllers\Controller;
use App\Models\CheckpointQuestion;
use App\Models\CheckpointResponse;
use App\Models\User;
use App\Models\RegistrantProfile;
use App\Models\Tools;
use Illuminate\Http\Request;

class CheckpointController extends Controller
{
    public function index()
    {
        $questions = CheckpointQuestion::all();
        $responses = CheckpointResponse::with(['attempt.user', 'question'])
            ->whereHas('attempt.user')  // Memastikan hanya response yang memiliki attempt dan user
            ->get();

        return view('dashboard.ptpm_psikotes-paid.checkpoint.index', compact('questions', 'responses'));
    }

    public function responses()
    {
        $responses = CheckpointResponse::with(['question', 'attempt.user.profile', 'attempt.tool'])
            ->whereHas('attempt.user')
            ->get()
            ->groupBy('attempt_id')
            ->map(function ($responses) {
                return [
                    'attempt' => $responses->first()->attempt,
                    'user' => $responses->first()->attempt->user,
                    'tool' => $responses->first()->attempt->tool,
                ];
            });

        return view('dashboard.ptpm_psikotes-paid.checkpoint.responses.index', compact('responses'));
    }

    public function showResponse($id)
    {
        $responses = CheckpointResponse::with('question')
            ->where('attempt_id', $id)
            ->get()
            ->map(function ($response) {
                $answer = null;
                $correct = null;

                // Kalau soalnya pilihan ganda
                if ($response->question && $response->question->type === 'multiple_choice') {
                    $answer = $response->answer['choice'] ?? null;        // jawaban user (A/B/C/D)
                    $correct = $response->question->scoring['correct_answer'] ?? null; // jawaban benar (A/B/C/D)
                }
                // Kalau esai
                elseif ($response->question && $response->question->type === 'short_answer') {
                    $answer = $response->answer['value'] ?? null;
                    $correct = $response->question->scoring['correct_answer'] ?? null;
                }

                return [
                    'id' => $response->id,
                    'question' => $response->question->text ?? null,
                    'answer' => $answer,
                    'correct_answer' => $correct,
                ];
            });

        return response()->json($responses);
    }

    public function deleteResponse($id)
    {
        $responses = CheckpointResponse::where('attempt_id', $id)->get();

        if ($responses->isEmpty()) {
            abort(404, 'Data tidak ditemukan');
        }

        CheckpointResponse::where('attempt_id', $id)->delete();

        return redirect()->route('dashboard.checkpoint.responses.index')->with('success', 'Data berhasil dihapus');
    }

    public function questions()
    {
        $questions = CheckpointQuestion::with('responses')->get();

        return view('dashboard.ptpm_psikotes-paid.checkpoint.questions.index', compact('questions'));
    }

    public function showQuestion($id)
    {
        //
    }

    public function createQuestion()
    {
        //
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'type' => 'required|in:multiple_choice,short_answer',
            'question' => 'required|string',
        ]);

        // Persiapkan data scoring
        $scoring = null;
        if ($request->type === 'multiple_choice' && $request->has('options')) {
            // Temukan pilihan yang statusnya 'benar'
            $correctAnswerKey = collect($request->options)->keys()->first(function ($key) use ($request) {
                return $request->options[$key]['status'] === 'benar';
            });

            $scoring = ['correct_answer' => $correctAnswerKey];
        } elseif ($request->type === 'short_answer') {
            $scoring = ['correct_answer' => $request->correct_answer];
        }

        $question = CheckpointQuestion::create([
            'type' => $request->type,
            'text' => $request->question,
            'scoring' => $scoring,
        ]);

        // Simpan options
        if ($request->type === 'multiple_choice') {
            $question->options = collect($request->options)->map(function ($p, $key) {
                return [
                    'key' => $key,
                    'text' => $p['jawaban'],
                ];
            })->values();
            $question->save();
        }

        return redirect()->route('dashboard.checkpoint.questions.index')
            ->with('success', 'Soal berhasil ditambahkan.');
    }

    public function editQuestion($id)
    {
        //
    }

    public function updateQuestion(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:multiple_choice,short_answer',
            'question' => 'required|string',
        ]);

        $question = CheckpointQuestion::findOrFail($id);

        $scoring = null;
        if ($request->type === 'multiple_choice' && $request->has('options')) {
            // Temukan jawaban benar
            $correctAnswerKey = collect($request->options)->keys()->first(function ($key) use ($request) {
                return $request->options[$key]['status'] === 'benar';
            });

            $scoring = ['correct_answer' => $correctAnswerKey];

            // Simpan options
            $question->options = collect($request->options)->map(function ($p, $key) {
                return [
                    'key' => $key,
                    'text' => $p['jawaban'],
                ];
            })->values();
        } elseif ($request->type === 'short_answer') {
            $scoring = ['correct_answer' => $request->correct_answer];
            $question->options = null;
        }

        $question->update([
            'type' => $request->type,
            'text' => $request->question,
            'scoring' => $scoring,
        ]);

        return redirect()->route('dashboard.checkpoint.questions.index')
            ->with('success', 'Soal berhasil diperbarui.');
    }

    public function destroyQuestion($id)
    {
        $question = CheckpointQuestion::find($id);
        $question->delete();

        return redirect()->route('dashboard.checkpoint.questions.index')->with('success', 'Data berhasil dihapus.');
    }
}
