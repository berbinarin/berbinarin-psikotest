<?php

namespace App\Services\PsikotesTool;

use App\Models\PsikotesSession;
use App\Models\PsikotesTool;
use Illuminate\Support\Str;

class PsikotesToolResultService
{
    public function resultData(PsikotesTool $psikotesTool, PsikotesSession $psikotesSession)
    {
        $methodName = Str::camel($psikotesTool->name);
        return $this->{$methodName}($psikotesSession);
    }

    /**
     * Beri nama  Method / Function di bawah ini dengan bentuk camel case dari data yang ada di PsikotesTool->namespace
     * Contoh : 'DASS-42' -> 'dass42', 'Papi Kostick' -> 'papiKostick'
     *  */


    private function dass42(PsikotesSession $psikotesSession)
    {
        $psikotesSession->load('responses');

        $categoriesPoint = collect([
            "depression",
            "anxiety",
            "stress"
        ])->mapWithKeys(fn($key) => [$key => 0]);

        foreach ($psikotesSession->responses as $response) {
            $categoriesPoint[$response->question->scoring['scale']] += $response->answer['value'];
        }

        return $categoriesPoint->sortDesc();
    }

    private function rmib(PsikotesSession $psikotesSession)
    {
        $categoriesPoint = collect([
            "outdoor",
            "mechanical",
            "computational",
            "scientific",
            "personal contact",
            "aesthetic",
            "musical",
            "literacy",
            "social service",
            "clenical",
            "practical",
            "medical"
        ])->mapWithKeys(fn($key) => [$key => 0]);

        foreach ($psikotesSession->responses as $response) {
            $scoring = $response->question->scoring ?? null;
            if (!$scoring || !isset($response->answer['ranked_ids'])) continue;

            foreach ($response->answer['ranked_ids'] as $rank => $id) {
                $category = $scoring[$id] ?? null;
                if ($category && isset($categoriesPoint[$category])) {
                    $categoriesPoint[$category] += $rank + 1;
                }
            }
        }

        $sorted = $categoriesPoint->sort();
        $threshold = $sorted->take(3)->last();

        return $sorted->filter(fn($value) => $value <= $threshold);
    }
}
