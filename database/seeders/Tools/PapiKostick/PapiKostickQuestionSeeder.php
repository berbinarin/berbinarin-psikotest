<?php

namespace Database\Seeders\Tools\PapiKostick;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PapiKostickQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $papiKostick = Tool::where('name', 'Papi Kostick')->with('sections')->first();
        $questions = [
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 1,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya seorang pekerja keras'],
                    ['key' => 'B', 'text' => 'Saya bukan seorang pemurung'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 2,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka bekerja lebih baik dari orang lain'],
                    ['key' => 'B', 'text' => 'Saya suka menekuni pekerjaan yang saya lakukan sampai selesai'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'N',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 3,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka memperagakan kepada orang lain bagaimana cara melakukan sesuatu'],
                    ['key' => 'B', 'text' => 'Saya ingin bekerja sebaik mungkin'],
                ],
                'scoring' => [
                    'A' => 'P',
                    'B' => 'A',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 4,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka melakukan hal-hal yang lucu'],
                    ['key' => 'B', 'text' => 'Saya senang mengatakan kepada orang lain, apa yang harus dilakukannya'],
                ],
                'scoring' => [
                    'A' => 'X',
                    'B' => 'P',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 5,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka berkumpul dalam kelompok'],
                    ['key' => 'B', 'text' => 'Saya suka jika diperhatikan oleh orang lain'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'X',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 6,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya senang bersahabat intim'],
                    ['key' => 'B', 'text' => 'Saya suka berteman dalam suatu kelompok'],
                ],
                'scoring' => [
                    'A' => 'O',
                    'B' => 'B',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 7,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya cepat berubah jika saya rasa diperlukan'],
                    ['key' => 'B', 'text' => 'Saya berusaha untuk intim dengan teman-teman'],
                ],
                'scoring' => [
                    'A' => 'Z',
                    'B' => 'O',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 8,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka membalas jika saya disakiti'],
                    ['key' => 'B', 'text' => 'Saya suka melakukan hal-hal yang baru dan berbeda'],
                ],
                'scoring' => [
                    'A' => 'K',
                    'B' => 'Z',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 9,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya ingin agar atasan menyukai saya'],
                    ['key' => 'B', 'text' => 'Saya suka memberitahui orang lain jika mereka salah'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'K',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 10,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka mengikuti petunjuk-petunjuk yang diberikan pada saya'],
                    ['key' => 'B', 'text' => 'Saya suka menyenangkan atasan'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'F',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 11,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya berusaha bekerja “keras” (sekuat tenaga)'],
                    ['key' => 'B', 'text' => 'Saya seorang yang teratur. Saya menaruh semua barang pada tempatnya'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'C',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 12,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya dapat mempengaruhi orang lain untuk melakukan apa yang saya inginkan'],
                    ['key' => 'B', 'text' => 'Saya tidak mudah marah'],
                ],
                'scoring' => [
                    'A' => 'L',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 13,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka memberitahukan kepada kelompok tentang apa yang harus mereka kerjakan'],
                    ['key' => 'B', 'text' => 'Saya selalu menekuni suatu pekerjaan sampai selesai'],
                ],
                'scoring' => [
                    'A' => 'P',
                    'B' => 'N',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 14,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka centil dan ingin diperhatikan'],
                    ['key' => 'B', 'text' => 'Saya ingin menjadi orang yang sangat berhasil'],
                ],
                'scoring' => [
                    'A' => 'X',
                    'B' => 'A',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 15,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya ingin sesuai dan diterima dalam kelompok'],
                    ['key' => 'B', 'text' => 'Saya suka membantu orang lain mengambil keputusan'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'P',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 16,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya cemas bila seseorang tidak menyukai saya'],
                    ['key' => 'B', 'text' => 'Saya suka bilang orang-orang memperhatikan saya'],
                ],
                'scoring' => [
                    'A' => 'O',
                    'B' => 'X',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 17,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka mencoba hal-hal yang baru'],
                    ['key' => 'B', 'text' => 'Saya lebih suka bekerja bersama orang lain daripada sendiri'],
                ],
                'scoring' => [
                    'A' => 'Z',
                    'B' => 'B',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 18,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya kadang-kadang menyalahkan orang lain jika terjadi kesalahan'],
                    ['key' => 'B', 'text' => 'Saya merasa terganggu jika ada yang tidak menyukai saya'],
                ],
                'scoring' => [
                    'A' => 'K',
                    'B' => 'O',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 19,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka membiarkan bila orang lain mengatur saya'],
                    ['key' => 'B', 'text' => 'Saya suka mencoba pekerjaan-pekerjaan yang baru dan berbeda'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'Z',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 20,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya menyukai petunjuk-petunjuk terperinci dalam menyelesaikan tugas'],
                    ['key' => 'B', 'text' => 'Bila saya terganggu oleh siapapun, saya akan memberitahukannya'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'K',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 21,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya selalu bekerja “keras”'],
                    ['key' => 'B', 'text' => 'Saya suka melaksanakan setiap langkah dengan teliti'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'D',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 22,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya akan menjadi seorang pemimpin yang baik'],
                    ['key' => 'B', 'text' => 'Saya dapat mengorganisir suatu pekerjaan dengan baik'],
                ],
                'scoring' => [
                    'A' => 'L',
                    'B' => 'C',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 23,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mudah tersinggung'],
                    ['key' => 'B', 'text' => 'Saya lambat dalam membuat keputusan'],
                ],
                'scoring' => [
                    'A' => 'I',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 24,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka mengerjakan beberapa pekerjaan sekaligus'],
                    ['key' => 'B', 'text' => 'Bila saya berada dalam suatu kelompok saya suka berdiam diri'],
                ],
                'scoring' => [
                    'A' => 'X',
                    'B' => 'N',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 25,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya senang bila diundang'],
                    ['key' => 'B', 'text' => 'Saya ingin lebih baik dari yang lain dalam mengerjakan sesuatu'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'A',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 26,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka berteman secara intim'],
                    ['key' => 'B', 'text' => 'Saya suka menasehati orang lain'],
                ],
                'scoring' => [
                    'A' => 'O',
                    'B' => 'P',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 27,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka melakukan hal-hal yang baru dan berbeda'],
                    ['key' => 'B', 'text' => 'Saya suka menceritakan bagaimana saya berhasil melakukan sesuatu'],
                ],
                'scoring' => [
                    'A' => 'Z',
                    'B' => 'X',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 28,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila saya benar, saya suka mempertahankannya'],
                    ['key' => 'B', 'text' => 'Saya ingin diterima dan diakui dalam suatu kelompok'],
                ],
                'scoring' => [
                    'A' => 'K',
                    'B' => 'B',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 29,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak mau berbeda dengan orang lain'],
                    ['key' => 'B', 'text' => 'Saya berusaha untuk sangat intim dengan orang lain'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'O',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 30,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya senang diberitahu bagaimana melakukan sesuatu pekerjaan'],
                    ['key' => 'B', 'text' => 'Saya mudah bosan'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'Z',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 31,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya bekerja “keras”'],
                    ['key' => 'B', 'text' => 'Saya banyak berpikir dan berencana'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'R',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 32,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya memimpin kelompok'],
                    ['key' => 'B', 'text' => 'Hal-hal kecil (detail) menarik bagi saya'],
                ],
                'scoring' => [
                    'A' => 'L',
                    'B' => 'D',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 33,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya dapat mengambil keputusan secara mudah dan tepat'],
                    ['key' => 'B', 'text' => 'Saya menyimpan barang-barang saya secara rapih dan teratur'],
                ],
                'scoring' => [
                    'A' => 'I',
                    'B' => 'C',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 34,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya cepat dalam melaksanakan suatu pekerjaan'],
                    ['key' => 'B', 'text' => 'Saya tidak sering marah atau sedih'],
                ],
                'scoring' => [
                    'A' => 'T',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 35,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya ingin menjadi bagian dari kelompok'],
                    ['key' => 'B', 'text' => 'Saya hanya ingin melakukan satu pekerjaan pada suatu saat'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'N',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 36,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya berusaha untuk intim dengan teman-teman saya'],
                    ['key' => 'B', 'text' => 'Saya berusaha keras menjadi yang terbaik'],
                ],
                'scoring' => [
                    'A' => 'O',
                    'B' => 'A',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 37,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka model terbaru untuk pakaian dan mobil'],
                    ['key' => 'B', 'text' => 'Saya suka bertanggungjawab bagi orang lain'],
                ],
                'scoring' => [
                    'A' => 'Z',
                    'B' => 'P',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 38,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya menyukai perdebatan'],
                    ['key' => 'B', 'text' => 'Saya suka mendapat perhatian'],
                ],
                'scoring' => [
                    'A' => 'K',
                    'B' => 'X',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 39,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya senang diatur oleh orang lain'],
                    ['key' => 'B', 'text' => 'Saya tertarik menjadi bagian dari kelompok'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'B',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 40,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka mengikuti peraturan dengan hati-hati'],
                    ['key' => 'B', 'text' => 'Saya suka orang mengenal saya dengan baik'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'O',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 41,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya bekerja sangat “keras”'],
                    ['key' => 'B', 'text' => 'Saya mempunyai sifat bersahabat'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'S',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 42,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Orang lain beranggapan bahwa saya adalah seorang pemimpin yang baik'],
                    ['key' => 'B', 'text' => 'Saya berpikir panjang dan berhati-hati'],
                ],
                'scoring' => [
                    'A' => 'L',
                    'B' => 'R',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 43,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya sering mengambil kesempatan'],
                    ['key' => 'B', 'text' => 'Saya senang mengurus hal-hal kecil'],
                ],
                'scoring' => [
                    'A' => 'I',
                    'B' => 'D',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 44,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Orang berpendapat bahwa saya bekerja cepat'],
                    ['key' => 'B', 'text' => 'Orang berpendapat bahwa saya rapi dan teratur'],
                ],
                'scoring' => [
                    'A' => 'T',
                    'B' => 'C',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 45,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya senang permainan-permainan dan berolahraga'],
                    ['key' => 'B', 'text' => 'Saya mempunyai pribadi yang menyenangkan'],
                ],
                'scoring' => [
                    'A' => 'V',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 46,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya senang bila orang lain bersikap intim dan bersahabat'],
                    ['key' => 'B', 'text' => 'Saya selalu berusaha untuk menyelesaikan sesuatu yang telah saya mulai'],
                ],
                'scoring' => [
                    'A' => 'O',
                    'B' => 'N',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 47,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya senang bereksperimen dan mencoba hal-hal baru'],
                    ['key' => 'B', 'text' => 'Saya suka melaksanakan suatu pekerjaan sulit dengan baik'],
                ],
                'scoring' => [
                    'A' => 'Z',
                    'B' => 'A',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 48,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka diperlakukan secara adil'],
                    ['key' => 'B', 'text' => 'Saya suka memberitahu orang lain bagaimana melaksanakan sesuatu'],
                ],
                'scoring' => [
                    'A' => 'K',
                    'B' => 'P',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 49,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka melakukan apa yang diharapkan dari saya'],
                    ['key' => 'B', 'text' => 'Saya suka menarik perhatian'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'X',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 50,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka petunjuk-petunjuk terperinci dalam melaksanakan suatu pekerjaan'],
                    ['key' => 'B', 'text' => 'Saya suka bertemu dengan orang lain'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'B',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 51,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya selalu berusaha menyelesaikan pekerjaan secara sempurna'],
                    ['key' => 'B', 'text' => 'Saya menganggap bahwa di dalam bekerja sehari-hari saya tidak mengenal lelah'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'V',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 52,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya adalah tipe seorang pemimpin'],
                    ['key' => 'B', 'text' => 'Saya mudah berteman'],
                ],
                'scoring' => [
                    'A' => 'L',
                    'B' => 'S',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 53,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya memanfaatkan peluang-peluang yang ada'],
                    ['key' => 'B', 'text' => 'Saya banyak sekali berpikir'],
                ],
                'scoring' => [
                    'A' => 'I',
                    'B' => 'R',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 54,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya bekerja dengan cara-cara yang selalu cepat'],
                    ['key' => 'B', 'text' => 'Saya senang bekerja dengan hal-hal kecil atau terperinci'],
                ],
                'scoring' => [
                    'A' => 'T',
                    'B' => 'D',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 55,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mempunyai banyak tenaga untuk berolahraga'],
                    ['key' => 'B', 'text' => 'Saya suka mengatur dan menyimpan barang-barang secara rapi dan teratur'],
                ],
                'scoring' => [
                    'A' => 'V',
                    'B' => 'C',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 56,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya dapat bergaul baik dengan semua orang'],
                    ['key' => 'B', 'text' => 'Saya seorang yang “pandai mengendalikan diri”'],
                ],
                'scoring' => [
                    'A' => 'S',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 57,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya ingin bertemu dengan orang-orang baru dan melakukan hal-hal baru'],
                    ['key' => 'B', 'text' => 'Saya selalu ingin menyelesaikan pekerjaan yang telah saya mulai'],
                ],
                'scoring' => [
                    'A' => 'Z',
                    'B' => 'N',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 58,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya biasanya mempertahankan pendapat yang saya yakini'],
                    ['key' => 'B', 'text' => 'Saya biasanya suka bekerja “keras”'],
                ],
                'scoring' => [
                    'A' => 'K',
                    'B' => 'A',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 59,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka saran-saran dari orang yang saya kagumi'],
                    ['key' => 'B', 'text' => 'Saya suka diatur oleh orang lain'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'P',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 60,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya biarkan diri saya banyak dipengaruhi oleh orang lain'],
                    ['key' => 'B', 'text' => 'Saya suka jika mendapat banyak perhatian'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'X',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 61,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya biasanya bekerja sangat "keras"'],
                    ['key' => 'B', 'text' => 'Saya biasanya bekerja cepat'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'T',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 62,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila saya berbicara kelompok mendengarkan'],
                    ['key' => 'B', 'text' => 'Saya terampil menggunakan alat-alat kerja'],
                ],
                'scoring' => [
                    'A' => 'L',
                    'B' => 'V',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 63,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya lambat didalam pergaulan'],
                    ['key' => 'B', 'text' => 'Saya lambat dalam membuat keputusan'],
                ],
                'scoring' => [
                    'A' => 'I',
                    'B' => 'S',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 64,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya biasanya makan secara tepat'],
                    ['key' => 'B', 'text' => 'Saya suka membaca'],
                ],
                'scoring' => [
                    'A' => 'T',
                    'B' => 'R',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 65,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka ganti-ganti pekerjaan'],
                    ['key' => 'B', 'text' => 'Saya suka pekerjaan yang dilakukan dengan hati-hati'],
                ],
                'scoring' => [
                    'A' => 'V',
                    'B' => 'D',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 66,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya berteman sebanyak mungkin'],
                    ['key' => 'B', 'text' => 'Saya dapat menemukan kembali apa yang telah saya simpan'],
                ],
                'scoring' => [
                    'A' => 'S',
                    'B' => 'C',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 67,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merencanakan jauh-jauh sebelumnya'],
                    ['key' => 'B', 'text' => 'Saya selalu menyenangkan'],
                ],
                'scoring' => [
                    'A' => 'R',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 68,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mempertahankan dengan bangga nama baik saya'],
                    ['key' => 'B', 'text' => 'Saya terus menekuni suatu masalah sampai selesai'],
                ],
                'scoring' => [
                    'A' => 'K',
                    'B' => 'N',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 69,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tunduk kepada orang-orang yang saya kagumi'],
                    ['key' => 'B', 'text' => 'Saya ingin sukses'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'A',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 70,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka orang-orang lain yang membuat keputusan-keputusan kelompok'],
                    ['key' => 'B', 'text' => 'Saya suka membuat keputusan-keputusan untuk kelompok'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'P',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 71,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya selalu bekerja “keras”'],
                    ['key' => 'B', 'text' => 'Saya mengambil keputusan secara cepat dan mudah'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'I',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 72,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Kelompok biasanya melakukan apa yang saya inginkan'],
                    ['key' => 'B', 'text' => 'Saya biasanya bekerja cepat'],
                ],
                'scoring' => [
                    'A' => 'L',
                    'B' => 'T',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 73,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya sering merasa lelah'],
                    ['key' => 'B', 'text' => 'Saya lambat dalam mengambil keputusan'],
                ],
                'scoring' => [
                    'A' => 'I',
                    'B' => 'V',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 74,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya bekerja cepat'],
                    ['key' => 'B', 'text' => 'Saya mudah berteman'],
                ],
                'scoring' => [
                    'A' => 'T',
                    'B' => 'S',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 75,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya biasanya mempunyai gairah dan tenaga'],
                    ['key' => 'B', 'text' => 'Saya banyak menghabiskan waktu dengan berpikir'],
                ],
                'scoring' => [
                    'A' => 'V',
                    'B' => 'R',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 76,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya ramah terhadap orang'],
                    ['key' => 'B', 'text' => 'Saya suka pekerjaan yang memerlukan ketelitian'],
                ],
                'scoring' => [
                    'A' => 'S',
                    'B' => 'D',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 77,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya banyak berpikir dan berencana'],
                    ['key' => 'B', 'text' => 'Saya suka pekerjaan yang memerlukan ketelitian'],
                ],
                'scoring' => [
                    'A' => 'R',
                    'B' => 'C',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 78,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka pekerjaan yang menuntut hal-hal terperinci'],
                    ['key' => 'B', 'text' => 'Saya tidak mudah marah'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 79,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka mengikuti orang-orang yang saya kagumi'],
                    ['key' => 'B', 'text' => 'Saya selalu menyelesaikan pekerjaan yang telah saya mulai'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'N',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 80,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka petunjuk-petunjuk yang jelas'],
                    ['key' => 'B', 'text' => 'Saya suka bekerja “keras”'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'A',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 81,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mengejar apa yang saya inginkan'],
                    ['key' => 'B', 'text' => 'Saya seorang pemimpin yang baik'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'L',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 82,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya dapat membuat orang lain bekerja keras'],
                    ['key' => 'B', 'text' => 'Saya adalah orang yang “senang hura-hura”'],
                ],
                'scoring' => [
                    'A' => 'L',
                    'B' => 'I',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 83,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mengambil keputusan secara cepat'],
                    ['key' => 'B', 'text' => 'Saya berbicara dengan cepat'],
                ],
                'scoring' => [
                    'A' => 'I',
                    'B' => 'T',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 84,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya biasanya bekerja cepat'],
                    ['key' => 'B', 'text' => 'Saya berolahraga secara teratur'],
                ],
                'scoring' => [
                    'A' => 'T',
                    'B' => 'V',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 85,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak suka bertemu dengan orang lain'],
                    ['key' => 'B', 'text' => 'Saya cepat merasa lelah'],
                ],
                'scoring' => [
                    'A' => 'S',
                    'B' => 'V',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 86,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mempunyai banyak sekali teman'],
                    ['key' => 'B', 'text' => 'Saya banyak menghabiskan waktu dengan berpikir'],
                ],
                'scoring' => [
                    'A' => 'S',
                    'B' => 'R',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 87,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka bekerja dengan teori'],
                    ['key' => 'B', 'text' => 'Saya suka bekerja dengan hal-hal terperinci'],
                ],
                'scoring' => [
                    'A' => 'R',
                    'B' => 'D',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 88,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka bekerja dengan hal-hal terperinci'],
                    ['key' => 'B', 'text' => 'Saya suka mengorganisir pekerjaan saya'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'C',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 89,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya menaruh barang pada tempatnya'],
                    ['key' => 'B', 'text' => 'Saya selalu menyenangkan'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'E',
                ],
            ],
            [
                'section_id' => $papiKostick->sections[0]->id,
                'order' => 90,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya suka diberitahu tentang apa yang perlu saya lakukan'],
                    ['key' => 'B', 'text' => 'Saya harus menyelesaikan apa yang saya mulai'],
                ],
                'scoring' => [
                    'A' => 'W',
                    'B' => 'N',
                ],
            ],

        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
