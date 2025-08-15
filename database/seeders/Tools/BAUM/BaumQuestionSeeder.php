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
                'text' => '<p>Silahkan<strong> menyiapkan 3 lembar kertas HVS berukuran A4 dan pensil HB</strong> seperti yang telah diinfokan sebelumnya.<strong> Silahkan tuliskan di masing-masing kertas pada pojok kiri atas identitas Anda mulai dari:</strong></p>
                            <ul>
                            <li>Nama</li>
                            <li>Usia</li>
                            <li>Jenis Kelamin</li>
                            <li>Diakhiri dengan tanda tangan Anda</li>
                            </ul>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $baum->sections[0]->id,
                'order' => 2,
                'text' => '<p>Jika sudah menuliskan identitas Anda. Bisa diambil satu kertas saja dan kertas lainnya bisa disimpan atau ditaruh di samping terlebih dahulu, sehingga kertasnya tidak saling bertumpuk.</p>
                            <p><br />Jika sudah silahkan <strong>balik kertasnya pada bagian yang kosong atau bagian yang tidak ada identitasnya.</strong></p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $baum->sections[0]->id,
                'order' => 3,
                'text' => '<p>Pada tes ini, <strong>tugas Anda adalah menggambar sebuah pohon</strong> dan apabila Anda sudah selesai menggambar pohon, <strong>silahkan tuliskan nama pohon yang Anda gambar di halaman kertas yang ada identitasnya atau di halaman kertas sebaliknya.</strong></p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $baum->sections[0]->id,
                'order' => 4,
                'text' => '<p>ika sudah, silakan foto kedua sisi kertas tersebut, baik bagian identitas maupun gambar Anda dan jika sudah di foto, silahkan mengunggah foto tersebut.</p>',
                'type' => 'image_upload',
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
