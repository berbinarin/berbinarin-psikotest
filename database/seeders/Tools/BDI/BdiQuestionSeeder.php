<?php

namespace Database\Seeders\Tools\BDI;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BdiQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bdi = Tool::where('name', 'BDI')->with('sections')->first();
        $questions = [
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 1,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa sedih'],
                    ['key' => 'B', 'text' => 'Saya merasa sedih'],
                    ['key' => 'C', 'text' => 'Sepanjang waktu saya sedih dan tidak bisa menghilangkan perasaan itu'],
                    ['key' => 'D', 'text' => 'Saya begitu sedih sehingga saya merasa tidak tahan lagi'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 2,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa berkecil hati terhadap masa depan'],
                    ['key' => 'B', 'text' => 'Saya merasa berkecil hati terhadap masa depan'],
                    ['key' => 'C', 'text' => 'Saya merasa tidak ada sesuatu yang saya nantikan'],
                    ['key' => 'D', 'text' => 'Saya merasa bahwa tidak ada harapan di masa depan dan segala sesuatunya tidak dapat diperbaiki'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 3,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa gagal'],
                    ['key' => 'B', 'text' => 'Saya merasa lebih banyak mengalami kegagalan daripada orang pada umumnya'],
                    ['key' => 'C', 'text' => 'Saat saya menengok masa lalu, maka yang terlihat oleh saya hanyalah kegagalan'],
                    ['key' => 'D', 'text' => 'Saya merasa bahwa saya adalah orang yang gagal total'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 4,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya memperoleh banyak kepuasan dari hal-hal yang saya lakukan, sama seperti sebelumnya'],
                    ['key' => 'B', 'text' => 'Saya tidak lagi menikmati berbagai hal, seperti yang pernah saya rasakan dulu'],
                    ['key' => 'C', 'text' => 'Saya tidak memperoleh kepuasan sejati dari apapun lagi'],
                    ['key' => 'D', 'text' => 'Saya tidak puas atau bosan dengan segalanya'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 5,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa bersalah'],
                    ['key' => 'B', 'text' => 'Saya cukup sering merasa bersalah'],
                    ['key' => 'C', 'text' => 'Saya sering merasa sangat bersalah'],
                    ['key' => 'D', 'text' => 'Saya merasa bersalah sepanjang waktu'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 6,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa bahwa saya sedang dihukum'],
                    ['key' => 'B', 'text' => 'Saya merasa mungkin saya telah dihukum'],
                    ['key' => 'C', 'text' => 'Saya pikir saya akan dihukum'],
                    ['key' => 'D', 'text' => 'Saya merasa bahwa saya sedang dihukum'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 7,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa kecewa terhadap diri saya sendiri'],
                    ['key' => 'B', 'text' => 'Saya merasa kecewa terhadap diri saya sendiri'],
                    ['key' => 'C', 'text' => 'Saya merasa muak terhadap diri saya sendiri'],
                    ['key' => 'D', 'text' => 'Saya membenci diri saya sendiri'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 8,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa bahwa saya lebih buruk daripada orang lain'],
                    ['key' => 'B', 'text' => 'Saya selalu mencela diri saya sendiri karena kelemahan atau kekeliruan saya'],
                    ['key' => 'C', 'text' => 'Saya menyalahkan diri saya sepanjang waktu atas kesalahan–kesalahan saya'],
                    ['key' => 'D', 'text' => 'Saya menyalahkan diri saya atas semua hal buruk yang terjadi'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 9,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak mempunyai pikiran untuk bunuh diri'],
                    ['key' => 'B', 'text' => 'Saya mempunyai pikiran-pikiran untuk bunuh diri, namun saya tidak akan melakukannya'],
                    ['key' => 'C', 'text' => 'Saya ingin bunuh diri'],
                    ['key' => 'D', 'text' => 'Saya akan bunuh diri jika ada kesempatan'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 10,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak menangis lebih dari biasanya'],
                    ['key' => 'B', 'text' => 'Sekarang saya lebih banyak menangis daripada biasanya'],
                    ['key' => 'C', 'text' => 'Sekarang saya menangis sepanjang waktu'],
                    ['key' => 'D', 'text' => 'Saya biasanya dapat menangis, namun kini saya tidak lagi dapat menangis walaupun saya menginginkannya'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 11,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak lebih banyak menangis dibandingkan biasanya'],
                    ['key' => 'B', 'text' => 'Saya lebih mudah jengkel atau marah daripada biasanya'],
                    ['key' => 'C', 'text' => 'Saya sekarang merasa jengkel sepanjang waktu'],
                    ['key' => 'D', 'text' => 'Kini saya merasa jengkel sepanjang waktu'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 12,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak kehilangan minat saya terhadap orang lain'],
                    ['key' => 'B', 'text' => 'Saya kurang berminat pada orang lain dibandingkan dengan biasanya'],
                    ['key' => 'C', 'text' => 'Saya kehilangan hampir seluruh minat saya pada orang lain'],
                    ['key' => 'D', 'text' => 'Saya telah kehilangan seluruh minat saya terhadap orang lain'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 13,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mengambil keputusan–keputusan hampir sama baiknya dengan yang biasa saya lakukan'],
                    ['key' => 'B', 'text' => 'Saya lebih banyak menunda keputusan daripada biasanya'],
                    ['key' => 'C', 'text' => 'Saya mengalami kesulitan lebih besar dalam mengambil keputusan-keputusan daripada sebelumnya'],
                    ['key' => 'D', 'text' => 'Saya sama sekali tidak dapat mengambil keputusan-keputusan lagi'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 14,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa bahwa saya kelihatan lebih jelek daripada sebelumnya'],
                    ['key' => 'B', 'text' => 'Saya merasa khawatir saya tampak tua atau tidak menarik'],
                    ['key' => 'C', 'text' => 'Saya merasa bahwa ada perubahan-perubahan permanen pada penampilan saya sehingga membuat saya tampak tidak menarik'],
                    ['key' => 'D', 'text' => 'Saya yakin bahwa saya tampak jelek'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 15,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya dapat bekerja dengan baik seperti sebelumnya'],
                    ['key' => 'B', 'text' => 'Saya membutuhkan usaha ekstra untuk mulai melakukan sesuatu'],
                    ['key' => 'C', 'text' => 'Saya harus memaksa diri saya sekuat tenaga untuk melakukan sesuatu'],
                    ['key' => 'D', 'text' => 'Saya tidak mampu mengerjakan apapun lagi'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 16,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya dapat tidur nyenyak seperti biasanya'],
                    ['key' => 'B', 'text' => 'Saya tidak dapat tidur nyenyak seperti biasanya'],
                    ['key' => 'C', 'text' => 'Saya bangun 1-2 jam lebih awal dari biasanya dan sukar tidur kembali'],
                    ['key' => 'D', 'text' => 'Saya bangun beberapa jam lebih awal daripada biasanya dan tidak dapat tidur kembali'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 17,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak merasa lebih lelah dari biasanya'],
                    ['key' => 'B', 'text' => 'Saya merasa lebih mudah lelah dari biasanya'],
                    ['key' => 'C', 'text' => 'Saya merasa lelah setelah melakukan apa saja'],
                    ['key' => 'D', 'text' => 'Saya merasa lelah setelah melakukan apapun'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 18,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Nafsu makan saya tidak lebih buruk daripada biasanya'],
                    ['key' => 'B', 'text' => 'Nafsu makan saya tidak sebaik biasanya'],
                    ['key' => 'C', 'text' => 'Nafsu makan saya kini jauh lebih buruk'],
                    ['key' => 'D', 'text' => 'Saya tidak mempunyai nafsu makan sama sekali'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 19,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak banyak kehilangan berat badan akhir-akhir ini'],
                    ['key' => 'B', 'text' => 'Berat badan saya turun lebih dari dua setengah kilogram'],
                    ['key' => 'C', 'text' => 'Berat badan saya turun lebih dari lima kilogram'],
                    ['key' => 'D', 'text' => 'Berat badan saya turun lebih dari tujuh setengah kilogram'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 20,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak mencemaskan kesehatan saya melebihi biasanya'],
                    ['key' => 'B', 'text' => 'Saya cemas akan masalah kesehatan fisik saya, seperti sakit dan rasa nyeri; sakit perut; ataupun susah buang air besar'],
                    ['key' => 'C', 'text' => 'Saya sangat cemas akan masalah kesehatan fisik saya dan sulit memikirkan hal-hal lainnya'],
                    ['key' => 'D', 'text' => 'Saya begitu cemas akan kesehatan fisik saya sehingga saya tidak dapat berpikir mengenai hal-hal lainnya'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
            [
                'section_id' => $bdi->sections[0]->id,
                'order' => 21,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak melihat adanya perubahan dalam minat saya terhadap seks'],
                    ['key' => 'B', 'text' => 'Saya kurang berminat di bidang seks dibandingkan biasanya'],
                    ['key' => 'C', 'text' => 'Sekarang saya sangat kurang berminat terhadap seks'],
                    ['key' => 'D', 'text' => 'Saya telah kehilangan minat terhadap seks sama sekali'],
                ],
                'scoring' => [
                    'A' => '0',
                    'B' => '1',
                    'C' => '2',
                    'D' => '3',
                ],
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
