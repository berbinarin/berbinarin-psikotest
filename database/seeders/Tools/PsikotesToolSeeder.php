<?php

namespace Database\Seeders\Tools;

use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PsikotesToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'name' => 'Papi Kostick',
                'order' => 1,
                'token' => '1',
                'introduce' => 'ini introduce',
                'is_active' => true,
            ],
            [
                'name' => 'BAUM',
                'order' => 2,
                'token' => '2',
                'introduce' => 'ini introduce',
                'is_active' => true
            ],
            [
                'name' => 'DAP',
                'order' => 3,
                'token' => '3',
                'introduce' => 'ini introduce',
                'is_active' => true
            ],
            [
                'name' => 'HTP',
                'order' => 4,
                'token' => '4',
                'introduce' => 'ini introduce',
                'is_active' => true
            ],
            [
                'name' => 'SSCT',
                'order' => 5,
                'token' => '5',
                'introduce' => 'ini introduce',
                'is_active' => true
            ],
            [
                'name' => 'OCEAN',
                'order' => 7,
                'token' => '7',
                'introduce' => 'ini introduce',
                'is_active' => true,
            ],
            [
                'name' => 'DASS-42',
                'order' => 10,
                'token' => '10',
                'introduce' => 'ini introduce',
                'is_active' => true,
            ],
            [
                'name' => 'VAK',
                'order' => 14,
                'token' => '14',
                'introduce' => 'ini introduce',
                'is_active' => true,
            ],
            [
                'name' => 'Tes Esai',
                'order' => 18,
                'token' => '18',
                'introduce' => 'Akan terdapat 6 pertanyaan yang disajikan. Jawablah pertanyaan tersebut pada kolom yang tersedia sesuai dengan kondisi Anda saat ini.',
                'is_active' => true,
            ],
            [
                'name' => 'RMIB',
                'order' => 19,
                'token' => '19',
                'introduce' => '<p>Bayangkan Anda dikelompokkan dengan sebelas orang mahasiswa <strong>(PRIA/WANITA)</strong> dalam proyek "Wisma Kerja Nyata" (disingkat WKN), yang bertujuan menyadari makna Kelestarian Lingkungan Hidup (KLH). Perjalanan akan berlangsung ke beberapa tempat.</p>
                    <p>Di tempat-tempat tertentu, tim atau "keduabelasan" Anda akan mengerjakan proyek dan mendapat&nbsp; bantuan ahli-ahli yang akan membimbing dan melatih anggota-anggota tim bila diperlukan. Perusahaan "Supra Motor" telah bersedia menjadi sponsor kegiatan ini.</p>
                    <p>Setiap ada kegiatan tim, anggota-anggota membagi tugas sesuai dengan kesediaan masing-masing. Caranya adalah disajikan daftar tugas, kemudian setiap anggota mengurutkan tugas yang paling ia senangi sampai tugas yang paling tidak ia senangi, tidak peduli apakah dia mampu melakukannya (karena akan dilatih). Yang penting adalah minat dan kesediaan Anda melakukan tugas-tugas tersebut.</p>
                    <p>Urutkan pilihan tugas, mulai dari yang paling Anda senangi (nomor 1), nomor 2 Anda senangi, nomor 3, dan seterusnya, sampai pilihan paling akhir nomor 12, ialah yang paling tidak Anda senangi. Kemudian teliti kembali, jangan sampai ada yang Anda lewati, sebab keberhasilan WKN ini sangat tergantung pada kesadaran anggota.</p>',
                'is_active' => true,
            ],
            [
                'name' => 'EPI',
                'order' => 27,
                'token' => '27',
                'introduce' => 'ini introduce',
                'is_active' => true,
            ],
        ];

        foreach ($tools as $tool) {
            Tool::create($tool);
        }
    }
}
