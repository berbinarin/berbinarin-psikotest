<?php

namespace Database\Seeders\Tools\PapiKostick;

use App\Models\PsikotesQuestion;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PapiKostickQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $papiKostick = PsikotesTool::where('name', 'Papi Kostick')->with('sections')->first();
        $questions = [
            [
                'psikotes_section_id' => $papiKostick->sections[0]->id,
                'order' => 1,
                'type' => 'multiple_choice',
                '' => [
                    'A' =>
                    'Saya seorang pekerja keras',
                    'B' =>
                    'Saya bukan seorang pemurung',
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'G',
                ],
            ],
        ];

        foreach ($questions as $question) {
            PsikotesQuestion::create($question);
        }
    }
}
