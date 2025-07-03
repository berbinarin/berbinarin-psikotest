<?php

namespace Database\Seeders\Tools\OCEAN;

use App\Models\PsikotesQuestion;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OceanQuestionSeeder extends Seeder
{
    /**
     * O = Openness
     * C = Conscientiousness
     * E = Extraversion
     * A = Agreeableness
     * N = Neuroticism
     */
    public function run(): void
    {
        $ocean = PsikotesTool::where('name', 'OCEAN')->with('sections')->first();
        $questions = [
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 1,
                'type' => 'likert',
                'text' => 'Saya mudah berteman dengan siapapun',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "extraversion",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 2,
                'type' => 'likert',
                'text' => 'Saya suka mencari-cari kesalahan orang lain',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 3,
                'type' => 'likert',
                'text' => 'Saya melakukan pekerjaan secara menyeluruh hingga selesai',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 4,
                'type' => 'likert',
                'text' => 'Saya sering merasa sedih',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "neuroticism",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 5,
                'type' => 'likert',
                'text' => 'Saya selalu memiliki ide-ide baru',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 6,
                'type' => 'likert',
                'text' => 'Saya sering merasa tertinggal',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "extraversion",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 7,
                'type' => 'likert',
                'text' => 'Saya lebih suka untuk membantu orang lain, dibandingkan mementingkan diri sendiri',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 8,
                'type' => 'likert',
                'text' => 'Saya seorang yang ceroboh',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 9,
                'type' => 'likert',
                'text' => 'Saya mampu menangani stres dengan baik',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "neuroticism",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 10,
                'type' => 'likert',
                'text' => 'Saya memiliki rasa ingin tahu yang tinggi',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 11,
                'type' => 'likert',
                'text' => 'Saya seorang yang energik',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "extraversion",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 12,
                'type' => 'likert',
                'text' => 'Saya suka memulai pertengkaran dengan orang lain',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 13,
                'type' => 'likert',
                'text' => 'Saya handal dalam pekerjaan yang saya lakukan',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 14,
                'type' => 'likert',
                'text' => 'Saya seorang yang tegang',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "neuroticism",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 15,
                'type' => 'likert',
                'text' => 'Saya seorang yang pemikir',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 16,
                'type' => 'likert',
                'text' => 'Saya seorang yang selalu meramaikan pesta',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "extraversion",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 17,
                'type' => 'likert',
                'text' => 'Saya seorang yang pemaaf',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 18,
                'type' => 'likert',
                'text' => 'Saya cenderung tidak terorganisir',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 19,
                'type' => 'likert',
                'text' => 'Saya selalu merasa khawatir terhadap berbagai hal',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "neuroticism",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 20,
                'type' => 'likert',
                'text' => 'Saya seorang yang imaginatif',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 21,
                'type' => 'likert',
                'text' => 'Saya seorang yang tenang',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "extraversion",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 22,
                'type' => 'likert',
                'text' => 'Saya mudah percaya dengan orang lain',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 23,
                'type' => 'likert',
                'text' => 'Saya seorang yang pemalas',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 24,
                'type' => 'likert',
                'text' => 'Saya tidak mudah marah',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "neuroticism",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 25,
                'type' => 'likert',
                'text' => 'Saya suka menciptakan hal-hal yang baru/inventif',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 26,
                'type' => 'likert',
                'text' => 'Saya seorang yang tegas',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "extraversion",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 27,
                'type' => 'likert',
                'text' => 'Saya lebih suka untuk menyendiri',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 28,
                'type' => 'likert',
                'text' => 'Saya sukses dalam menyelesaikan tugas',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 29,
                'type' => 'likert',
                'text' => 'Saya suka moody',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "neuroticism",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 30,
                'type' => 'likert',
                'text' => 'Saya percaya terhadap pentingnya nilai seni dan estetika',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 31,
                'type' => 'likert',
                'text' => 'Saya seorang yang pemalu',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "extraversion",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 32,
                'type' => 'likert',
                'text' => 'Saya perhatian dengan siapapun',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 33,
                'type' => 'likert',
                'text' => 'Saya melakukan berbagai hal secara efisien',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 34,
                'type' => 'likert',
                'text' => 'Saya mampu bersikap tenang di dalam situasi yang tegang',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "neuroticism",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 35,
                'type' => 'likert',
                'text' => 'Saya lebih suka dengan rutinitas',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 36,
                'type' => 'likert',
                'text' => 'Saya suka bersosialisasi dan jalan-jalan',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "extraversion",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 37,
                'type' => 'likert',
                'text' => 'Terkadang saya kasar dengan orang lain',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 38,
                'type' => 'likert',
                'text' => 'Ketika saya memiliki rencana, saya cenderung menindaklanjutinya',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 39,
                'type' => 'likert',
                'text' => 'Saya mudah merasa gugup',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "neuroticism",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 40,
                'type' => 'likert',
                'text' => 'Saya suka merenung',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 41,
                'type' => 'likert',
                'text' => 'Saya memiliki ketertarikan terhadap seni',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> true,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 42,
                'type' => 'likert',
                'text' => 'Saya lebih suka bekerja sama dalam melakukan pekerjaan saya',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "agreeableness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 43,
                'type' => 'likert',
                'text' => 'Saya mudah terdistraksi',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "conscientiousness",
                    "reverse_scored"=> false,
                ],
            ],
            [
                'psikotes_section_id' => $ocean->sections[0]->id,
                'order' => 44,
                'type' => 'likert',
                'text' => 'Saya ahli dalam seni, musik, atau sastra',
                'options' => [
                    '1' => 'Sangat Tidak Sesuai',
                    '2' => 'Tidak Sesuai',
                    '3' => 'Ragu-Ragu',
                    '4' => 'Sesuai',
                    '5' => 'Sangat Sesuai',
                ],
                'scoring' => [
                    "scale"=> "openness",
                    "reverse_scored"=> false,
                ],
            ],
        ];

        foreach ($questions as $question) {
            PsikotesQuestion::create($question);
        }
    }
}
