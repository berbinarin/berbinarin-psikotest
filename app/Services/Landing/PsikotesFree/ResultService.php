<?php

namespace App\Services\Landing\PsikotesFree;

use App\Models\PsikotesFreeAttempt;
use App\Models\Tool;
use Illuminate\Support\Str;

class ResultService
{
    public function resultData(Tool $tool, PsikotesFreeAttempt $attempt)
    {
        $methodName = Str::camel(strtolower($tool->name));
        return $this->{$methodName}($attempt);
    }

    private function ocean(PsikotesFreeAttempt $attempt)
    {
        $attempt->load('responses.question');

        $categories = [
            "extraversion",
            "agreeableness",
            "neuroticism",
            "conscientiousness",
            "openness",
        ];

        $results = collect($categories)->mapWithKeys(function ($category) {
            return [$category => [
                'total_score' => 0,
                'question_count' => 0,
                'answer_distribution' => [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0],
            ]];
        });

        foreach ($attempt->responses as $response) {
            if (!isset($response->question) || !isset($response->question->scoring['scale'])) {
                continue;
            }

            $scale = $response->question->scoring['scale'];
            $value = (int) $response->answer['value'];
            $isReversed = (bool) ($response->question->scoring['reverse_scored'] ?? false);

            if ($results->has($scale)) {
                $categoryData = $results[$scale];

                $scoredValue = $isReversed ? (6 - $value) : $value;
                $categoryData['total_score'] += $scoredValue;
                $categoryData['question_count']++;

                if (isset($categoryData['answer_distribution'][$value])) {
                    $categoryData['answer_distribution'][$value]++;
                }

                $results->put($scale, $categoryData);
            }
        }

        return $results;
    }
}
