<?php

namespace Database\Seeders\Tools\DASS;

use App\Models\PsikotesQuestion;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DassQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $dass42 = PsikotesTool::where('name', 'DASS-42')->with('sections')->first();
        $questions = [
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 1,
                'type' => 'likert',
                'text' => 'Saya merasa bahwa diri saya menjadi marah karena hal-hal sepele.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "depression",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 2,
                'type' => 'likert',
                'text' => 'Saya merasa bibir saya sering kering.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "anxiety",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 3,
                'type' => 'likert',
                'text' => 'Saya sama sekali tidak dapat merasakan perasaan positif. ',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "stress",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 4,
                'type' => 'likert',
                'text' => 'Saya mengalami kesulitan bernafas (misalnya: seringkali terengah-engah atau tidak dapat bernafas padahal tidak melakukan aktivitas fisik sebelumnya).',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "anxiety",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 5,
                'type' => 'likert',
                'text' => 'Saya sepertinya tidak kuat lagi untuk melakukan suatu kegiatan.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "stress",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 6,
                'type' => 'likert',
                'text' => 'Saya cenderung bereaksi berlebihan terhadap suatu situasi.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "depression",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 7,
                'type' => 'likert',
                'text' => 'Saya merasa goyah (misalnya, kaki terasa mau ’copot’).',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "anxiety",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 8,
                'type' => 'likert',
                'text' => 'Saya merasa sulit untuk bersantai.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "depression",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 9,
                'type' => 'likert',
                'text' => 'Saya menemukan diri saya berada dalam situasi yang membuat saya merasa sangat cemas dan saya akan merasa sangat lega jika semua ini berakhir. ',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "anxiety",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 10,
                'type' => 'likert',
                'text' => 'Saya merasa tidak ada hal yang dapat diharapkan di masa depan. ',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "stress",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 11,
                'type' => 'likert',
                'text' => 'Saya menemukan diri saya mudah merasa kesal.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "depression",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 12,
                'type' => 'likert',
                'text' => 'Saya merasa telah menghabiskan banyak energi untuk merasa cemas.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "depression",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 13,
                'type' => 'likert',
                'text' => 'Saya merasa sedih dan tertekan.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "stress",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 14,
                'type' => 'likert',
                'text' => 'Saya menemukan diri saya menjadi tidak sabar ketika mengalami penundaan (misalnya: kemacetan lalu lintas, menunggu sesuatu).',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "depression",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 15,
                'type' => 'likert',
                'text' => 'Saya merasa lemas seperti mau pingsan.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "anxiety",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 16,
                'type' => 'likert',
                'text' => 'Saya merasa saya kehilangan minat akan segala hal.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "stress",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 17,
                'type' => 'likert',
                'text' => 'Saya merasa bahwa saya tidak berharga sebagai seorang manusia.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "stress",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 18,
                'type' => 'likert',
                'text' => 'Saya merasa bahwa saya mudah tersinggung.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "depression",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 19,
                'type' => 'likert',
                'text' => 'Saya berkeringat secara berlebihan (misalnya: tangan berkeringat), padahal temperatur tidak panas atau tidak melakukan aktivitas fisik sebelumnya. ',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "anxiety",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 20,
                'type' => 'likert',
                'text' => 'Saya merasa takut tanpa alasan yang jelas.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "anxiety",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $dass42->sections[0]->id,
                'order' => 21,
                'type' => 'likert',
                'text' => 'Saya merasa bahwa hidup tidak bermanfaat.',
                'options' => [
                    '0' => 'Tidak pernah',
                    '1' => 'Kadang-Kadang',
                    '2' => 'Lumayan Sering',
                    '3' => 'Sering Sekali',
                ],
                'scoring' => [
                    "scale"=> "stress",
                    "reverse_scored"=> false,
                ],
            ],
        ];

        foreach ($questions as $question) {
            PsikotesQuestion::create($question);
        }
    }
}
