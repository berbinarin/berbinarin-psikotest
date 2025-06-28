<?php

namespace Database\Seeders\Tools\RMIB;

use App\Models\PsikotesQuestion;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RmibQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rmib = PsikotesTool::where('name', 'RMIB')->with('sections')->first();
        $questions = [
            [
                'psikotes_section_id' => $rmib->sections[0]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Tim mengadakan persiapan perjalanan. Rapat-rapat perlu diadakan. Dana dari sponsor, kendaraan, peralatan dan sebagainya perlu diurus. Bacalah terlebih dahulu semua tugas yang ada, lalu urutkan tugas yang paling Anda senangi dengan menggunakan opsi "urutan __". Pastikan tidak ada pekerjaan yang mendapat urutan yang sama. ',
                'options' => [
                    'male' => [
                        'outdoor' => 'Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan,  dari satu tempat ke tempat lain.',
                        'mechanical' => 'Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai ti',
                        'computational' => 'Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponso',
                        'scientific' => 'Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepa',
                        'personal' => 'Contact	Menghadap sponsor untuk tawar-menawar dana di perusahaan "Supra Motor',
                        'aesthetic' => 'Memilih berbagai khasanah lagu-lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidu',
                        'musical' => 'Merancang simbol dan logo untuk peralatan tim WK',
                        'literacy' => 'Menyiapkan bacaan populer dan membuat kliping dari koran/majala',
                        'social' => 'Service Menjadi penghubung dengan kelompok WKN lain (karena memiliki banyak teman/kenalan',
                        'clerical' => 'Mencatat hasil, menyusun, dan menyimpan arsi',
                        'pratical' => 'Menyiapkan peralatan makan dan baha',
                        'medical' => 'Menyiapkan peralatan kedokteran, P3K, dan obat-obata',
                    ],
                    'female' => [
                        'outdoor' => 'Menyetir mobil antar-jemput para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.',
                        'mechanical' => 'Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.  ',
                        'computational' => 'Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.',
                        'scientific' => 'Membaca setumpuk laporan penelitian KLH untuk memilih proyek KLH yang tepat.',
                        'personal' => 'Menjadi anggota delegasi yang menghadap ibu Direksi (sponsor) untuk tawar menawar dana.',
                        'aesthetic' => 'Membuat gambar, simbol dan logo untuk tim WKN.',
                        'musical' => 'Memilih aransemen lagu-lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.',
                        'literacy' => 'Menyiapkan bacaan-bacaan populer KLH untuk tingkat remaja.',
                        'social' => 'Menjadi penghubung dengan kelompok WKN lain (karena memiliki banyak teman/kenalan).',
                        'clerical' => 'Mencatat rencana-rencana, menyusun, dan menyimpan sebagai arsip.',
                        'pratical' => 'Menyiapkan peralatan makan dan bahan makanan/perbekalan.',
                        'medical' => 'Menyiapkan peralatan kedokteran dan obat-obatan bagi hewan dan manusia.',
                    ],
                ],
            ],
        ];

        foreach ($questions as $question) {
            PsikotesQuestion::create($question);
        }
    }
}
