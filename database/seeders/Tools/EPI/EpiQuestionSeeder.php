<?php

namespace Database\Seeders\Tools\EPI;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpiQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $epi = Tool::where('name', 'EPI')->with('sections')->first();

        $questions = [
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 1,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda selalu bersemangat?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 2,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda sering membutuhkan kawan untuk membuat Anda gembira?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 3,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda adalah orang yang santai dan tidak terbebani oleh masalah?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'ectroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 4,
                'type' => 'binary_choice',
                'text' => 'Apakah sangat sulit bagi Anda untuk menolak sesuatu?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 5,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda berpikir terlebih dahulu sebelum bertindak?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 6,
                'type' => 'binary_choice',
                'text' => 'Jika Anda telah berjanji, sulit apapun kondisinya apakah Anda akan merealisikannya?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 7,
                'type' => 'binary_choice',
                'text' => 'Apakah suasana hati Anda berubah-ubah?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 8,
                'type' => 'binary_choice',
                'text' => 'Apakah biasanya Anda melakukan dan mengatakan sesuatu dengan cepat, tanpa Anda pikirkan terlebih dahulu?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 9,
                'type' => 'binary_choice',
                'text' => 'Pernahkah Anda merasa sedih tanpa sebab yang jelas?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 10,
                'type' => 'binary_choice',
                'text' => 'Apakah setiap tantangan akan Anda hadapi?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 11,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda tiba-tiba merasa malu saat ingin berbicara dengan orang asing yang atraktif?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 12,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda kadang-kadang tidak dapat menahan kemarahan Anda?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 13,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda sering melakukan sesuatu secara tiba-tiba?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 14,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda merasa khawatir akan tindakan atau perkataan Anda yang tidak semestinya Anda lakukan/ucapkan?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 15,
                'type' => 'binary_choice',
                'text' => 'Pada pada umumnya Anda lebih suka membaca daripada bermain-main?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 16,
                'type' => 'binary_choice',
                'text' => 'Apakah perasaan Anda mudah tersinggung?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 17,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda suka sekali bepergian?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 18,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda kadang-kadang mempunyai pikiran atau gangguan yang Anda tidak inginkan untuk diketahui oleh orang lain?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 19,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda kadang-kadang sangat bersemangat dan kadang-kadang sangat lesu?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 20,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda lebih suka mempunyai teman sedikit tapi betul-betul akrab?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 21,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda sering melamun?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 22,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda membalas membentak jika ada orang yang membentak kepada Anda?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 23,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda sering terganggu perasaan bersalah?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 24,
                'type' => 'binary_choice',
                'text' => 'Apakah semua kebiasaan Anda baik dan disukai?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 25,
                'type' => 'binary_choice',
                'text' => 'Apakah biasanya Anda dapat bergembira pada suatu pesta yang meriah?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 26,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda merasa diri Anda kadang tegang atau kaku?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 27,
                'type' => 'binary_choice',
                'text' => 'Apakah orang lain menganggap diri Anda seorang yang bersemangat?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 28,
                'type' => 'binary_choice',
                'text' => 'Setelah Anda menyelesaikan sesuatu yang penting, apakah Anda sering merasa seharusnya dapat mengerjakannya dengan lebih baik?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 29,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda lebih senang diri jika Anda ada bersama dengan orang lain?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 30,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda kadang-kadang suka bergosip?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 31,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda tidak dapat tertidur karena banyak pikiran di kepala Anda?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 32,
                'type' => 'binary_choice',
                'text' => 'Jika ada sesuatu yang ingin Anda ketahui, apakah Anda lebih suka mencarinya di buku daripada menanyakannya kepada seseorang?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 33,
                'type' => 'binary_choice',
                'text' => 'Apakah jantung Anda sering berdebar-debar?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 34,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda suka akan jenis pekerjaan yang membutuhkan kecermatan dan ketelitian?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 35,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda sering gemetar tanpa suatu sebab?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 36,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda akan 100% jujur tentang suatu hal penting, meskipun Anda tahu bahwa Anda tidak akan pernah ketahuan?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 37,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda benci berkumpul bersama orang-orang suka mengolok-olok satu sama lain?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 38,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda orang yang mudah terpancing amarahnya?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 39,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda suka akan pekerjaan yang memerlukan kecepatan dalam bertindak?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 40,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda mengkhawatirkan kejadian-kejadian yang kurang baik yang mungkin bisa terjadi?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 41,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda termasuk orang yang lambat dan tidak tergesa-gesa dalam bertindak?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 42,
                'type' => 'binary_choice',
                'text' => 'Pernahkah Anda lambat dalam sebuah perjanjian atau pekerjaan?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 43,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda sering bermimpi buruk?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 44,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda sangat suka mengobrol dengan orang lain, sehingga Anda senang jika dapat mengobrol dengan orang asing?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 45,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda merasa suka terganggu oleh perasaan sakit dan nyeri?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 46,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda merasa sangat kesal, jika Anda lama tidak bertemu dengan orang banyak?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 47,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda menganggap diri Anda seorang yang gugup?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 48,
                'type' => 'binary_choice',
                'text' => 'Dari semua kenalan Anda, apakah ada diantara mereka yang tidak Anda sukai?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 49,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda termasuk orang yang cukup percaya diri?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 50,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda mudah tersinggung apabila orang lain tahu pekerjaan Anda salah?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 51,
                'type' => 'binary_choice',
                'text' => 'Sulitkah bagi Anda untuk benar-benar menikmati pesta yang meriah?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 52,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda merasa terganggu karena tidak percaya diri?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 53,
                'type' => 'binary_choice',
                'text' => 'Dapatkah Anda memeriahkan pesta yang membosankan?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 54,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda kadang berbicara mengenai hal-hal yang tidak Anda ketahui?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'lie',
                    'correct_answer' => false
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 55,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda mengkhawatirkan kesehatan Anda?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 56,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda suka jahil pada orang lain?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'extroversion',
                    'correct_answer' => true
                ],
            ],
            [
                'section_id' => $epi->sections[0]->id,
                'order' => 57,
                'type' => 'binary_choice',
                'text' => 'Apakah Anda menderita sulit tidur?',
                'options' => [
                    [
                        'value' => true,
                        'text' => 'Ya'
                    ],
                    [
                        'value' => false,
                        'text' => 'Tidak'
                    ],
                ],
                'scoring' => [
                    'scale' => 'neuroticism',
                    'correct_answer' => true
                ],
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
