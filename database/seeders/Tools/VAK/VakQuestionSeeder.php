<?php

namespace Database\Seeders\Tools\VAK;

use App\Models\PsikotesQuestion;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VakQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vak = PsikotesTool::with('sections')->firstWhere('name', 'VAK');


        $questions = [
            // Subtes 1
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 1,
                'text' => '	Saya menikmati mencorat-coret, dan bahkan buku catatan saya penuh dengan gambar di dalamnya.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 2,
                'text' => '	Saya akan lebih baik dalam mengingat sesuatu jika saya menuliskannya.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 3,
                'text' => '	Saya akan tersesat atau terlambat jika seseorang memberitahu saya untuk menuju ke suatu tempat baru dan saya tidak menuliskan petunjuknya.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 4,
                'text' => '	Ketika mencoba mengingat nomor telepon seseorang, atau mengingat sesuatu yang baru, saya menghubungkannya dengan sebuah gambar atau simbol di dalam pikiran.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 5,
                'text' => '	Jika saya mengikuti suatu ujian, saya dapat mengingat halaman buku teks dan dimana letak jawabannya berada.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 6,
                'text' => '	Melihat seseorang sambil mendengarkan, membuat saya tetap fokus.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 7,
                'text' => '	Menggunakan kartu bantuan saat belajar membantu saya mengingat materi untuk ujian.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 8,
                'text' => '	Sulit bagi saya untuk mengerti apa yang orang katakan manakala di saat yang sama ada seseorang yang berbicara atau bermain musik.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 9,
                'text' => '	Sulit bagi saya untuk mengerti sebuah lelucon ketika seseorang menceritakannya kepada saya.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[0]->id,
                'order' => 10,
                'text' => 'Lebih baik bagi saya untuk bekerja di tempat yang sepi.',
                'type' => 'likert',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "visual",
                    "reverse_scored" => false
                ],
            ],

            // Subtes 2
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 1,
                'type' => 'likert',
                'text' => 'Tulisan tangan saya tidak terlihat rapi. Catatan saya dipenuhi dengan coretan dan hapusan.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 2,
                'type' => 'likert',
                'text' => 'Jika saya sedang membaca, saya harus dibantu oleh jari untuk menunjuk ke arah bacaan.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 3,
                'type' => 'likert',
                'text' => 'Catatan saya berisi tulisan yang sangat kecil, terdapat bercak kotoran atau salinan yang buruk ada pada tulisan saya.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 4,
                'type' => 'likert',
                'text' => 'Saya mengerti bagaimana cara mengerjakan sesuatu jika seseorang menjelaskan langsung kepada saya, daripada harus saya harus membacanya buku petunjuknya sendiri.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 5,
                'type' => 'likert',
                'text' => 'Saya lebih mudah mengingat dari hal-hal yang saya dengar,dibandingkan dari hal-hal yang saya lihat atau saya baca.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 6,
                'type' => 'likert',
                'text' => 'Menulis sangat melelahkan karena saya menekan terlalu keras pensil.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 7,
                'type' => 'likert',
                'text' => 'Mata saya mudah lelah, meskipun dokter mata bilang kalau mata saya baik-baik saja.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 8,
                'type' => 'likert',
                'text' => 'Ketika saya membaca, saya sering keliru membaca kata-kata yang mempunyai bunyi serupa.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 9,
                'type' => 'likert',
                'text' => 'Sulit bagi saya untuk membaca tulisan tangan orang lain.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],
            [
                'psikotes_section_id' => $vak->sections[1]->id,
                'order' => 10,
                'type' => 'likert',
                'text' => '	Jika saya mempunyai pilihan untuk mempelajari informasi baru melalui penjelasan guru atau buku, saya akan memilih untuk mendengarkan dari guru daripada membaca dari buku.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    "scale" => "auditori",
                    "reverse_scored" => false
                ],
            ],

            // Subtes 3
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 1,
                'type' => 'likert',
                'text' => 'Saya tidak suka membaca petunjuk pengerjaan suatu tugas, saya lebih suka untuk langsung mulai melaksanakannya.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 2,
                'type' => 'likert',
                'text' => 'Saya belajar tentang sesuatu secara lebih baik pada saat saya memiliki kesempatan untuk mencoba melakukannya dan menunjukkan kepada orang lain cara melakukannya.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 3,
                'type' => 'likert',
                'text' => 'Saya tidak terbiasa untuk belajar di meja belajar.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 4,
                'type' => 'likert',
                'text' => 'Ketika menyelesaikan suatu permasalahan biasanya saya lebih sering mencoba-coba untuk menyelesaikannya daripada menggunakan buku panduan untuk memecahkannya.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 5,
                'type' => 'likert',
                'text' => 'Sebelum saya mengikuti buku petunjuk, ada baiknya saya melihat orang lain melaksanakannya terlebih dahulu.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 6,
                'type' => 'likert',
                'text' => 'Saya membutuhkan lebih banyak istirahat ketika sedang belajar.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 7,
                'type' => 'likert',
                'text' => 'Saya tidak pandai dalam memberikan penjelasan atau arahan secara lisan.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 8,
                'type' => 'likert',
                'text' => 'Saya tidak mudah tersesat, bahkan di lingkungan yang tidak pernah saya datangi.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 9,
                'type' => 'likert',
                'text' => 'Saya bisa berpikir lebih baik ketika saya diberikan kebebasan untuk bergerak.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
            [
                'psikotes_section_id' => $vak->sections[2]->id,
                'order' => 10,
                'type' => 'likert',
                'text' => 'Ketika saya tidak dapat memikirkan kata-kata tertentu, saya akan banyak menggunakan tangan untuk mengisyaratkan sesuatu dan menyebut sesuatu seperti “ehm-ah-eh”.',
                'options' => [
                    ['value' => '1', 'text' => 'Tidak Sesuai'],
                    ['value' => '2', 'text' => 'Cukup Sesuai'],
                    ['value' => '3', 'text' => 'Sangat Sesuai'],
                ],
                'scoring' => [
                    'scale' => 'kinestetik',
                    "reverse_scored" => false
                ],

            ],
        ];

        foreach ($questions as $question) {
            PsikotesQuestion::create($question);
        }
    }
}
