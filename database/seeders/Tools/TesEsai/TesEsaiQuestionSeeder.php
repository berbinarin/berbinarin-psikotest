<?php

namespace Database\Seeders\Tools\TesEsai;

use App\Models\PsikotesQuestion;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TesEsaiQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tesEsai = PsikotesTool::with('sections')->firstWhere('name', 'Tes Esai');

        $questions = [
[
                'psikotes_section_id' => $tesEsai->sections[0]->id,
                'order' => 1,
                'text' => 'Jelaskan pandangan Anda mengenai peran Anda dalam perubahan ini nantinya dan apa saja yang harus dilakukan sebagai seorang karyawan di posisi tersebut?',
                'type' => 'essay',
            ],
            [
                'psikotes_section_id' => $tesEsai->sections[0]->id,
                'order' => 2,
                'text' => 'Bagaimana cara Anda agar dapat menguasai prosedur kerja di posisi Anda?',
                'type' => 'essay',
            ],
            [
                'psikotes_section_id' => $tesEsai->sections[0]->id,
                'order' => 3,
                'text' => 'Tuliskan 1 prestasi terbaik yang pernah Anda raih dalam 2 tahun terakhir!',
                'type' => 'essay',
            ],
            [
                'psikotes_section_id' => $tesEsai->sections[0]->id,
                'order' => 4,
                'text' => 'Jika Anda perlu untuk menyelesaikan suatu urusan yang ada di rumah, sementara saat ini Anda sedang di tengah jam kerja, apa yang akan Anda lakukan?',
                'type' => 'essay',
            ],
            [
                'psikotes_section_id' => $tesEsai->sections[0]->id,
                'order' => 5,
                'text' => 'Ketika Anda ditegur di depan pada staf lainnya oleh atasan, bagaimana reaksi Anda setelahnya?',
                'type' => 'essay',
            ],
            [
                'psikotes_section_id' => $tesEsai->sections[0]->id,
                'order' => 6,
                'text' => 'Berikan satu contoh dimana Anda berhasil menyelesaikan tugas di dalam tim!',
                'type' => 'essay',
            ],
        ];

        foreach ($questions as $question) {
            PsikotesQuestion::create($question);
        }
    }
}
