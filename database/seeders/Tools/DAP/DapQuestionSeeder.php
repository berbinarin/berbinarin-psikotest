<?php

namespace Database\Seeders\Tools\DAP;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DapQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dap = Tool::where('name', 'DAP')->with('sections')->first();

        $questions = [
            [
                'section_id' => $dap->sections[0]->id,
                'order' => 1,
                'text' => 'Silahkan kesampingkan dulu kertas yang pertama. Kemudian silahkan ambil kertas HVS yang kedua, pastikan bahwa kertas tersebut telah terisi identitas.',
                'type' => 'instruction',
            ],
            [
                'section_id' => $dap->sections[0]->id,
                'order' => 2,
                'text' => 'Kertas yang sudah terisi gambar pohon silahkan dikesampingkan terlebih dahulu agar tidak mengganggu proses menggambar di sesi yang sekarang.
Baik jika sudah silahkan balik kertasnya pada bagian yang kosong atau bagian yang tidak ada identitasnya.',
                'type' => 'instruction',
            ],
            [
                'section_id' => $dap->sections[0]->id,
                'order' => 3,
                'text' => 'Pada tes ini, tugas Anda adalah menggambar seorang manusia. Apabila sudah selesai silahkan pada lembaran kertas yang ada identitasnya atau di halaman kertas sebaliknya, tuliskan:

Nama

Usia

Jenis Kelamin

Profesi

Aktivitas sedang apa

Alasan memilih menggambar itu',
                'type' => 'instruction',
            ],
            [
                'section_id' => $dap->sections[0]->id,
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
