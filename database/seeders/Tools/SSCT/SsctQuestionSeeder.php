<?php

namespace Database\Seeders\Tools\SSCT;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SsctQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ssct = Tool::where('name', 'SSCT')->with('sections')->first();

        $questions = [
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 1,
                'type' => 'short_answer',
                'text' => 'Saya merasa bahwa Ayah saya jarang ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 2,
                'type' => 'short_answer',
                'text' => 'Bila keadaan tidak menguntungkan bagi saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 3,
                'type' => 'short_answer',
                'text' => 'Saya selalu mempunyai keinginan untuk ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 4,
                'type' => 'short_answer',
                'text' => 'Umpamanya saya ditugaskan untuk ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 5,
                'type' => 'short_answer',
                'text' => 'Bagi saya hari depan ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 6,
                'type' => 'short_answer',
                'text' => 'Orang-orang di atas saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 7,
                'type' => 'short_answer',
                'text' => 'Saya sadar bahwa hal tersebut janggal tetapi saya takut akan ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 8,
                'type' => 'short_answer',
                'text' => 'Saya merasa bahwa seorang teman sejati ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 9,
                'type' => 'short_answer',
                'text' => 'Waktu saya masih kecil ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 10,
                'type' => 'short_answer',
                'text' => 'Saya gambarkan sebagai seorang wanita yang sempurna ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 11,
                'type' => 'short_answer',
                'text' => 'Bila saya melihat seorang wanita dan lelaki bersama-sama ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 12,
                'type' => 'short_answer',
                'text' => 'Dibandingkan dengan kebanyakan keluarga, keluarga saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 13,
                'type' => 'short_answer',
                'text' => 'Di tempat kerja saya, saya paling cocok dengan ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 14,
                'type' => 'short_answer',
                'text' => 'Ibu saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 15,
                'type' => 'short_answer',
                'text' => 'Saya mau berbuat apa saja untuk melupakan waktu di mana saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 16,
                'type' => 'short_answer',
                'text' => 'Sekiranya Ayah saya sudi ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 17,
                'type' => 'short_answer',
                'text' => 'Saya yakin bahwa saya mempunyai kemampuan untuk ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 18,
                'type' => 'short_answer',
                'text' => 'Saya dapat merasa betul-betul senang kalau ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 19,
                'type' => 'short_answer',
                'text' => 'Bila orang kerja untuk saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 20,
                'type' => 'short_answer',
                'text' => 'Saya menantikan dengan penuh harapan ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 21,
                'type' => 'short_answer',
                'text' => 'Di sekolah guru-guru saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 22,
                'type' => 'short_answer',
                'text' => 'Kebanyakan teman-teman tidak mengetahui bahwa saya takut akan ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 23,
                'type' => 'short_answer',
                'text' => 'Saya tidak senang kepada orang yang ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 24,
                'type' => 'short_answer',
                'text' => 'Dahulu saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 25,
                'type' => 'short_answer',
                'text' => 'Saya kira kebanyakan anak perempuan ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 26,
                'type' => 'short_answer',
                'text' => 'Perasaan saya mengenai kehidupan perkawinan adalah ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 27,
                'type' => 'short_answer',
                'text' => 'Keluarga saya memperlakukan saya sebagai ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 28,
                'type' => 'short_answer',
                'text' => 'Teman-teman sekerja saya adalah ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 29,
                'type' => 'short_answer',
                'text' => 'Ibu saya dan saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 30,
                'type' => 'short_answer',
                'text' => 'Kesalahan saya yang terbesar adalah ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 31,
                'type' => 'short_answer',
                'text' => 'Saya ingin Ayah saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 32,
                'type' => 'short_answer',
                'text' => 'Kelemahan saya yang terbesar adalah ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 33,
                'type' => 'short_answer',
                'text' => 'Hasrat keinginan saya yang terpendam dalam hidup adalah ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 34,
                'type' => 'short_answer',
                'text' => 'Orang-orang yang bekerja untuk saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 35,
                'type' => 'short_answer',
                'text' => 'Pada suatu hari saya akan ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 36,
                'type' => 'short_answer',
                'text' => 'Bila saya melihat majikan saya datang ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 37,
                'type' => 'short_answer',
                'text' => 'Saya akan menghilangkan ketakutan saya akan ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 38,
                'type' => 'short_answer',
                'text' => 'Orang-orang yang paling saya sukai ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 39,
                'type' => 'short_answer',
                'text' => 'Andaikata saya muda kembali ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 40,
                'type' => 'short_answer',
                'text' => 'Saya percaya kebanyakan wanita ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 41,
                'type' => 'short_answer',
                'text' => 'Umpamakan saya mempunyai hubungan seksual ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 42,
                'type' => 'short_answer',
                'text' => 'Kebanyakan keluarga yang saya kenal ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 43,
                'type' => 'short_answer',
                'text' => 'Saya senang bekerja dengan orang yang ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 44,
                'type' => 'short_answer',
                'text' => 'Saya kira kebanyakan Ibu ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 45,
                'type' => 'short_answer',
                'text' => 'Waktu saya masih muda, saya merasa berdosa mengenai ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 46,
                'type' => 'short_answer',
                'text' => 'Saya merasa bahwa Ayah saya adalah ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 47,
                'type' => 'short_answer',
                'text' => 'Bila mengalami nasib malang ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 48,
                'type' => 'short_answer',
                'text' => 'Dalam memberikan perintah pada orang lain saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 49,
                'type' => 'short_answer',
                'text' => 'Yang paling saya inginkan dari hidup ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 50,
                'type' => 'short_answer',
                'text' => 'Bila saya sudah lebih tua ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 51,
                'type' => 'short_answer',
                'text' => 'Orang-orang yang saya anggap sebagai atasan saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 52,
                'type' => 'short_answer',
                'text' => 'Rasa ketakutan kadang-kadang memaksa saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 53,
                'type' => 'short_answer',
                'text' => 'Bila saya tidak ada, teman-teman saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 54,
                'type' => 'short_answer',
                'text' => 'Kenangan yang paling jelas dalam hidup dari masa kanak-kanak ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 55,
                'type' => 'short_answer',
                'text' => 'Yang paling tidak saya sukai mengenai wanita ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 56,
                'type' => 'short_answer',
                'text' => 'Kehidupan seksual saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 57,
                'type' => 'short_answer',
                'text' => 'Waktu saya masih seorang anak, keluarga saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 58,
                'type' => 'short_answer',
                'text' => 'Orang-orang yang bekerja dengan saya ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 59,
                'type' => 'short_answer',
                'text' => 'Saya suka kepada Ibu saya tetapi ...',
            ],
            [
                'section_id' => $ssct->sections[0]->id,
                'order' => 60,
                'type' => 'short_answer',
                'text' => 'Hal terburuk yang pernah saya lakukan ...',
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
