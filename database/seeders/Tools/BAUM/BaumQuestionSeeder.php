<?php

namespace Database\Seeders\Tools\BAUM;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaumQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baum = Tool::firstWhere('name', 'BAUM');

        $questions = [
            [
                'section_id' => $baum->sections[0]->id,
                'order' => 1,
                'text' => 'Silahkan menyiapkan 3 lembar kertas HVS berukuran A4 dan pensil HB seperti yang telah diinfokan sebelumnya. Silahkan tuliskan di masing-masing kertas pada pojok kiri atas identitas Anda mulai dari:
                    Nama
                    Usia
                    Jenis Kelamin
                    Diakhiri dengan tanda tangan Anda',
                'type' => 'instruction',
            ],
            [
                'section_id' => $baum->sections[0]->id,
                'order' => 2,
                'text' => 'Jika sudah menuliskan identitas Anda. Bisa diambil satu kertas saja dan kertas lainnya bisa disimpan atau ditaruh di samping terlebih dahulu, sehingga kertasnya tidak saling bertumpuk.
                    Jika sudah silahkan balik kertasnya pada bagian yang kosong atau bagian yang tidak ada identitasnya.',
                'type' => 'instruction',
            ],
            [
                'section_id' => $baum->sections[0]->id,
                'order' => 3,
                'text' => 'Pada tes ini, tugas Anda adalah menggambar sebuah pohon dan apabila Anda sudah selesai menggambar pohon, silahkan tuliskan nama pohon yang Anda gambar di halaman kertas yang ada identitasnya atau di halaman kertas sebaliknya.',
                'type' => 'instruction',
            ],
            [
                'section_id' => $baum->sections[0]->id,
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
