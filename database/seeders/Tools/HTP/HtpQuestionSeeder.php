<?php

namespace Database\Seeders\Tools\HTP;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HtpQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $htp = Tool::with('sections')->firstWhere('name', 'HTP');

        $questions = [
            [
                'section_id' => $htp->sections[0]->id,
                'order' => 1,
                'text' => 'Sebelum masuk ke subtes selanjutnya, silahkan kesampingkan dulu kertas yang pertama dan kertas kedua. Kemudian silahkan ambil kertas HVS yang ketiga. pastikan bahwa kertas tersebut telah terisi identitas.',
                'type' => 'instruction',
            ],
            [
                'section_id' => $htp->sections[0]->id,
                'order' => 2,
                'text' => 'Pada tes ini, tugas Anda adalah menggambar manusia, pohon dan rumah dalam satu kertas tersebut.',
                'type' => 'instruction',
            ],
            [
                'section_id' => $htp->sections[0]->id,
                'order' => 3,
                'text' => 'Apabila sudah selesai, silahkan pada lembaran kertas yang ada identitasnya atau di halaman kertas sebaliknya, tuliskan atau ceritakan gambar yang baru Anda gambar dengan satu kalimat. Satu kalimat yang menggambarkan gambar yang telah anda buat.',
                'type' => 'instruction',
            ],
            [
                'section_id' => $htp->sections[0]->id,
                'order' => 4,
                'text' => 'Jika sudah, silakan foto kedua sisi kertas tersebut, baik bagian identitas maupun gambar Anda dan jika sudah di foto, silahkan mengunggah foto tersebut.',
                'type' => 'image_upload',
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
