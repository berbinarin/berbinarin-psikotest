<?php

namespace App\Services\PsikotesResponse;

use App\Models\Question;
use App\Models\Response;
use App\Models\Session;
use App\Services\File\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PsikotesResponseService
{
    public function __construct(private FileUploadService $fileUploadService) {}

    public function store(Request $request, Question $question, int $session)
    {
        $methodName = Str::camel($question->type);

        $answer = $this->{$methodName}($request);

        // Hanya buat response jika ada answer yang valid (bukan null)
        if ($answer !== null) {
            Response::create([
                'psikotes_session_id' => $session,
                'question_id' => $question->id,
                'answer' => $answer,
            ]);
        }
    }

    private function ordering(Request $request)
    {
        $validateData = $request->validate([
            'answer' => 'required|array',
            'answer.*' => 'required|string'
        ]);

        return ['ranked_ids' => $validateData['answer']];
    }

    private function multipleChoice(Request $request)
    {
        $validateData = $request->validate([
            'answer' => 'required|string',
        ]);

        return ['choice' => $validateData['answer']];
    }

    private function multipleSelect(Request $request)
    {
        $validateData = $request->validate([
            'answer' => 'required|array',
            'answer.*' => 'required|string'
        ]);

        return ['choices' => $validateData['answer']];
    }

    private function likert(Request $request)
    {

        $validateData = $request->validate([
            'answer' => 'required|integer',
        ]);

        return ['value' => $validateData['answer']];
    }

    private function imageUpload(Request $request)
    {
        $request->validate([
            'answer' => 'required|file|mimes:jpeg,png,jpg,webp|max:15360',
        ]);

        $filePath = null;

        if ($request->hasFile('answer')) {
            $uploadedFilePath = $this->fileUploadService->upload(
                $request->file('answer'),
                'psikotes/response/image_upload'
            );

            if ($uploadedFilePath) {
                $filePath = $uploadedFilePath;
            } else {
                throw new \Exception('Failed to upload file.');
            }
        }

        // Kembalikan path file yang telah disimpan
        return ['file_path' => $filePath];
    }

    private function essay(Request $request)
    {
        $validateData = $request->validate([
            'answer' => 'required|string',
        ]);

        return ['text' => $validateData['answer']];
    }

    private function binaryChoice(Request $request)
    {
        dd($request);
        $validateData = $request->validate([
            'answer' => 'required|boolean',
        ]);

        return ['value' => $validateData['answer']];
    }

    private function shortAnswer(Request $request)
    {

        $validateData = $request->validate([
            'answer' => 'required|string',
        ]);

        return ['value' => $validateData['answer']];
    }

    private function instruction()
    {
        return;
    }
}
