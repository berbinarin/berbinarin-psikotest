<?php

namespace App\Services\Landing\PsikotesPaid;

use App\Models\CheckpointQuestion;
use App\Models\CheckpointResponse;
use App\Models\Question;
use App\Models\Response;
use App\Services\File\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ResponseService
{
    public function __construct(private FileUploadService $fileUploadService, private AttemptService $attemptService) {}

    public function store(Request $request, Question $question)
    {
        $methodName = Str::camel($question->type);
        $answer = $this->{$methodName}($request);
        if ($answer !== null) {
            Response::create([
                'attempt_id' => $this->attemptService->getSession('attempt_id'),
                'question_id' => $question->id,
                'answer' => $answer,
            ]);
        }
    }

    public function storeCheckpoint(Request $request)
    {
        $checkpointQuestion = CheckpointQuestion::find($request->checkpoint_question_id);
        $methodName = Str::camel($checkpointQuestion->type);
        $answer = $checkpointQuestion->type === 'multiple_choice'
                    ? ['choice' => $request->checkpoint_answer]
                    : ['value' => $request->checkpoint_answer];

        if ($answer !== null) {
            CheckpointResponse::create([
                'attempt_id' => $this->attemptService->getSession('attempt_id'),
                'checkpoint_question_id' => $checkpointQuestion->id,
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
            'answer' => 'required',
        ]);

        $answer = $validateData['answer'];
        if (is_array($answer)) {
            $answer = $answer[0] ?? null;
        }

        if (!is_string($answer)) {
            throw ValidationException::withMessages([
                'answer' => 'The answer must be a string.',
            ]);
        }

        return ['choice' => $answer];
    }

    private function imageMultipleChoice(Request $request)
    {
        $validateData = $request->validate([
            'answer' => 'required',
        ]);

        $answer = $validateData['answer'];
        if (is_array($answer)) {
            $answer = $answer[0] ?? null;
        }

        if (!is_string($answer)) {
            throw ValidationException::withMessages([
                'answer' => 'The answer must be a string.',
            ]);
        }

        return ['choice' => $answer];
    }

    private function multipleSelect(Request $request)
    {
        $validateData = $request->validate([
            'answer' => 'required|array',
            'answer.*' => 'required|string'
        ]);

        return ['choices' => $validateData['answer']];
    }

    private function imageMultipleSelect(Request $request)
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
        $validateData = $request->validate([
            'answer' => 'required',
        ]);

        $value = filter_var($validateData['answer'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        return ['value' => $value];
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

    private function form(Request $request)
    {
        // dd($request->except('_token'));
        return $request->except('_token');
    }
}
