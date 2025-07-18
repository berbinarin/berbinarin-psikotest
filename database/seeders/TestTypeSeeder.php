<?php

namespace Database\Seeders;

use App\Models\TestCategory;
use App\Models\TestType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = TestCategory::all();

        $types =
            [
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes kesiapan pernikahan',
                    'description' => 'Tes ini bertujuan untuk mengevaluasi kesiapan SobatBinar dalam menjalani pernikahan dengan mengidentifikasi aspek-aspek psikologis dan kepribadian.',
                    'price' => 299000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes kesiapan menjadi orang tua',
                    'description' => 'Tes ini bertujuan untuk menilai kesiapan SobatBinar dalam menjalani peran sebagai orang tua dengan mengidentifikasi aspek kepribadian.',
                    'price' => 299000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes kecocokan pasangan',
                    'description' => 'Tes ini membantu dalam menilai kesesuaian antara dua individu dalam sebuah hubungan dengan mengidentifikasi aspek kepribadian.',
                    'price' => 299000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes stress',
                    'description' => 'Membantu SobatBinar mengetahui gejala dan tingkat stres yang sedang dialami.',
                    'price' => 159999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes depresi',
                    'description' => 'Membantu SobatBinar untuk mengetahui gejala dan tingkat depresi yang dialami.',
                    'price' => 159999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes kecemasan',
                    'description' => 'Membantu SobatBinar untuk mengetahui gejala dan tingkat kecemasan.',
                    'price' => 159999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes kecemasan +',
                    'description' => 'Membantu SobatBinar untuk mengetahui gejala dan tingkat kecemasan disertai dengan konseling bersama psikolog.',
                    'price' => 299000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes fungsi kognitif',
                    'description' => 'Tes ini bertujuan untuk mengevaluasi kemampuan kognitif seseorang, seperti kemampuan problem solving, pemahaman, dan proses berpikir.',
                    'price' => 129999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes memori',
                    'description' => 'Membantu SobatBinar untuk menilai kemampuan memori, seperti daya ingat jangka pendek dan jangka panjang.',
                    'price' => 129999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes kepribadian gratis',
                    'description' => '',
                    'price' => 0
                ],
                [
                    'test_category_id' => $categories->where('name', 'Komunitas')->first()->id,
                    'name' => 'Tes demensia',
                    'description' => 'Tes ini bertujuan untuk menilai kemungkinan adanya demensia.',
                    'price' => 129999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Individu')->first()->id,
                    'name' => 'Tes memori',
                    'description' => 'Membantu SobatBinar untuk menilai kemampuan memori, seperti daya ingat jangka pendek dan jangka panjang.',
                    'price' => 129999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Individu')->first()->id,
                    'name' => 'Tes Self-love',
                    'description' => 'Membantu SobatBinar memahami diri sendiri, khususnya dari aspek hubungan sosial, sikap, dan aktivitas.',
                    'price' => 99000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Individu')->first()->id,
                    'name' => 'Tes demensia',
                    'description' => 'Tes ini bertujuan untuk menilai kemungkinan adanya demensia.',
                    'price' => 129999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Individu')->first()->id,
                    'name' => 'Tes stress',
                    'description' => 'Membantu SobatBinar mengetahui gejala dan tingkat stres yang sedang dialami.',
                    'price' => 159999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Individu')->first()->id,
                    'name' => 'Tes depresi',
                    'description' => 'Membantu SobatBinar untuk mengetahui gejala dan tingkat depresi yang dialami.',
                    'price' => 159999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Individu')->first()->id,
                    'name' => 'Tes kecemasan',
                    'description' => 'Membantu SobatBinar untuk mengetahui gejala dan tingkat kecemasan.',
                    'price' => 159999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Individu')->first()->id,
                    'name' => 'Tes kecemasan +',
                    'description' => 'Membantu SobatBinar untuk mengetahui gejala dan tingkat kecemasan disertai dengan konseling bersama psikolog.',
                    'price' => 299000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Individu')->first()->id,
                    'name' => 'Tes fungsi kognitif',
                    'description' => 'Tes ini bertujuan untuk mengevaluasi kemampuan kognitif seseorang, seperti kemampuan problem solving, pemahaman, dan proses berpikir.',
                    'price' => 129999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Instansi Pendidikan')->first()->id,
                    'name' => 'Paket WOW Gaya Belajar',
                    'description' => 'Membantu SobatBinar dalam mengenai gaya belajar yang dominan, sehingga dapat meningkatkan efektivitas dalam belajar.',
                    'price' => 99000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Instansi Pendidikan')->first()->id,
                    'name' => 'Paket Hemat Cita-cita',
                    'description' => 'Membantu SobatBinar mengenali jenis pekerjaan yang sesuai dengan kepribadian SobatBinar.',
                    'price' => 99000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Instansi Pendidikan')->first()->id,
                    'name' => 'Paket Lengkap Tes Kepribadian',
                    'description' => 'Tes ini dapat membantu SobatBinar mengenali aspek-aspek psikologis individu, seperti sifat, perilaku, dan preferensi.',
                    'price' => 129999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Instansi Pendidikan')->first()->id,
                    'name' => 'Tes memori',
                    'description' => 'Membantu SobatBinar untuk menilai kemampuan memori, seperti daya ingat jangka pendek dan jangka panjang.',
                    'price' => 129999
                ],
                [
                    'test_category_id' => $categories->where('name', 'Instansi Pendidikan')->first()->id,
                    'name' => 'Paket Mini Tes Penjurusan',
                    'description' => 'Membantu SobatBinar dalam mengetahui pilihan karir atau jurusan kuliah yang sesuai dengan kemampuan dan kepribadian.',
                    'price' => 255500
                ],
                [
                    'test_category_id' => $categories->where('name', 'Instansi Pendidikan')->first()->id,
                    'name' => 'Paket Gold Tes Penjurusan',
                    'description' => 'Membantu SobatBinar dalam mengetahui pilihan karir atau jurusan kuliah yang sesuai dengan kemampuan, kepribadian, dan gaya belajar.',
                    'price' => 319000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Instansi Pendidikan')->first()->id,
                    'name' => 'Paket Tahu Minat Bakat',
                    'description' => '',
                    'price' => 351000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Instansi Pendidikan')->first()->id,
                    'name' => 'Paket Lengkap Tes Penjurusan',
                    'description' => 'Membantu SobatBinar dalam mengetahui pilihan karir atau jurusan kuliah yang sesuai dengan kemampuan, kepribadian, dan gaya belajar serta mendapatkan sesi konseling dengan psikolog.',
                    'price' => 399000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Perusahaan')->first()->id,
                    'name' => 'Asesmen staf: Paket 1',
                    'description' => '',
                    'price' => 450000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Perusahaan')->first()->id,
                    'name' => 'Asesmen staf: Paket 2',
                    'description' => '',
                    'price' => 600000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Perusahaan')->first()->id,
                    'name' => 'Asesmen staf: Paket 3',
                    'description' => '',
                    'price' => 550000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Perusahaan')->first()->id,
                    'name' => 'Asesmen staf: Paket 4',
                    'description' => '',
                    'price' => 750000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Perusahaan')->first()->id,
                    'name' => 'Asesmen supervisor: Paket 1',
                    'description' => '',
                    'price' => 650000
                ],
                [
                    'test_category_id' => $categories->where('name', 'Perusahaan')->first()->id,
                    'name' => 'Asesmen supervisor: Paket 2',
                    'description' => '',
                    'price' => 850000
                ],
            ];

        foreach ($types as $type) {
            TestType::create($type);
        }
    }
}
