<?php

namespace Database\Seeders\Checkpoint;

use App\Models\CheckpointQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckpointQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'text' => 'Berapa hasil dari 5 × 6?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '30'],
                    ['key' => 'B', 'text' => '25'],
                    ['key' => 'C', 'text' => '35'],
                    ['key' => 'D', 'text' => '40'],
                ],
                'scoring' => [
                    'correct_answer' => 'A'
                ],
            ],
            [
                'text' => 'Planet terbesar di tata surya adalah?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bumi'],
                    ['key' => 'B', 'text' => 'Jupiter'],
                    ['key' => 'C', 'text' => 'Saturnus'],
                    ['key' => 'D', 'text' => 'Mars'],
                ],
                'scoring' => [
                    'correct_answer' => 'B'
                ],
            ],
            [
                'text' => 'Siapa penemu lampu pijar?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => 'Thomas Edison'
                ],
            ],
            [
                'text' => 'Hasil dari 144 ÷ 12 adalah?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '10'],
                    ['key' => 'B', 'text' => '11'],
                    ['key' => 'C', 'text' => '12'],
                    ['key' => 'D', 'text' => '13'],
                ],
                'scoring' => [
                    'correct_answer' => 'C'
                ],
            ],
            [
                'text' => 'Unsur kimia dengan simbol O adalah?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => 'Oksigen'
                ],
            ],
            [
                'text' => 'Gunung tertinggi di dunia adalah?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Kilimanjaro'],
                    ['key' => 'B', 'text' => 'Everest'],
                    ['key' => 'C', 'text' => 'Elbrus'],
                    ['key' => 'D', 'text' => 'Denali'],
                ],
                'scoring' => [
                    'correct_answer' => 'B'
                ],
            ],
            [
                'text' => 'Berapakah nilai π (pi) dibulatkan dua angka di belakang koma?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => '3.14'
                ],
            ],
            [
                'text' => 'Negara dengan jumlah penduduk terbanyak di dunia adalah?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'India'],
                    ['key' => 'B', 'text' => 'Tiongkok'],
                    ['key' => 'C', 'text' => 'Amerika Serikat'],
                    ['key' => 'D', 'text' => 'Indonesia'],
                ],
                'scoring' => [
                    'correct_answer' => 'B'
                ],
            ],
            [
                'text' => 'Hasil dari 15 + 27 adalah?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => '42'
                ],
            ],
            [
                'text' => 'Hewan tercepat di darat adalah?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Cheetah'],
                    ['key' => 'B', 'text' => 'Singa'],
                    ['key' => 'C', 'text' => 'Kuda'],
                    ['key' => 'D', 'text' => 'Rusa'],
                ],
                'scoring' => [
                    'correct_answer' => 'A'
                ],
            ],
            [
                'text' => 'Siapa presiden pertama Republik Indonesia?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => 'Soekarno'
                ],
            ],
            [
                'text' => 'Berapa hasil dari 9²?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '81'],
                    ['key' => 'B', 'text' => '72'],
                    ['key' => 'C', 'text' => '99'],
                    ['key' => 'D', 'text' => '90'],
                ],
                'scoring' => [
                    'correct_answer' => 'A'
                ],
            ],
            [
                'text' => 'Laut terluas di dunia adalah?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => 'Samudra Pasifik'
                ],
            ],
            [
                'text' => 'Hasil dari 100 - 45 adalah?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '45'],
                    ['key' => 'B', 'text' => '55'],
                    ['key' => 'C', 'text' => '65'],
                    ['key' => 'D', 'text' => '75'],
                ],
                'scoring' => [
                    'correct_answer' => 'B'
                ],
            ],
            [
                'text' => 'Berapakah jumlah planet di tata surya?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => '8'
                ],
            ],
            [
                'text' => 'Hewan yang dapat hidup di darat dan air disebut?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Mamalia'],
                    ['key' => 'B', 'text' => 'Amfibi'],
                    ['key' => 'C', 'text' => 'Reptil'],
                    ['key' => 'D', 'text' => 'Pisces'],
                ],
                'scoring' => [
                    'correct_answer' => 'B'
                ],
            ],
            [
                'text' => 'Siapa ilmuwan yang menemukan teori relativitas?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => 'Albert Einstein'
                ],
            ],
            [
                'text' => 'Hasil dari 7 × 8 adalah?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '54'],
                    ['key' => 'B', 'text' => '56'],
                    ['key' => 'C', 'text' => '58'],
                    ['key' => 'D', 'text' => '60'],
                ],
                'scoring' => [
                    'correct_answer' => 'B'
                ],
            ],
            [
                'text' => 'Berapakah suhu air mendidih pada tekanan udara normal (dalam °C)?',
                'type' => 'short_answer',
                'scoring' => [
                    'correct_answer' => '100'
                ],
            ],
            [
                'text' => 'Ibukota negara Jepang adalah?',
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Tokyo'],
                    ['key' => 'B', 'text' => 'Osaka'],
                    ['key' => 'C', 'text' => 'Kyoto'],
                    ['key' => 'D', 'text' => 'Hiroshima'],
                ],
                'scoring' => [
                    'correct_answer' => 'A'
                ],
            ],
        ];

        foreach ($questions as $question) {
            CheckpointQuestion::create($question);
        }
    }
}
