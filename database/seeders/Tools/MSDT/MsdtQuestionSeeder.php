<?php

namespace Database\Seeders\Tools\MSDT;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsdtQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $msdt = Tool::with('sections')->firstWhere('name', 'MSDT');
        $questions = [
            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 1,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak akan menegur pelanggar-pelanggar peraturan bila saya merasa pasti bahwa tidak ada satu orang pun yang mengetahui tentang pelanggar-pelanggar tersebut.'],
                    ['key' => 'B', 'text' => 'Bila saya mengumumkan suatu keputusan yang kurang menyenangkan, saya akan menjelaskan kepada bawahan saya bahwa keputusan ini dibuat oleh direktur.'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'A',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 2,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila ada seorang karyawan yang hasil kerjanya selalu tidak memuaskan saya, saya akan menunggu suatu kesempatan untuk memindahkannya dan bukan untuk memecatnya.'],
                    ['key' => 'B', 'text' => 'Bila ada bawahan saya yang dikucilkan dari kelompok kerjanya, saya akan mencari jalan agar orang lain dapat berteman dengannya.'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'B',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 3,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila direktur memberikan perintah yang kurang menyenangkan, saya pikir adalah cukup bijaksana bila saya menyebutkan namanya bukan nama saya.'],
                    ['key' => 'B', 'text' => 'Bila biasanya membuat keputusan-keputusan sendiri dan menyampaikannya kepada bawahan saya.'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'C',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 4,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila saya ditegur oleh atasan saya, saya akan memanggil semua bawahan saya dan mengatakan semua teguran tersebut kepada mereka.'],
                    ['key' => 'B', 'text' => 'Saya selalu memberikan tugas-tugas yang sangat sulit kepada karyawan-karyawan yang paling berpengalaman.'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'D',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 5,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya selalu melakukan diskusi-diskusi untuk mencapai kata sepakat.'],
                    ['key' => 'B', 'text' => 'Saya selalu menganjurkan kepada bawahan saya untuk memberikan usul-usul, tetapi kadang-kadang saya langsung mengambil tindakan tertentu.'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'E',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 6,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Seringkali saya lebih mementingkan tugas daripada diri saya sendiri.'],
                    ['key' => 'B', 'text' => 'Saya mengijinkan bawahan-bawahan saya untuk ikut serta dalam mengambil keputusan.'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'F',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 7,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila jumlah dan mutu hasil kerja bagian saya tidak memuaskan, saya mengatakan kepada bawahan-bawahan saya bahwa direktur merasa kecewa. Oleh karena itu, mereka harus memperbaiki kerja mereka.'],
                    ['key' => 'B', 'text' => 'Saya membuat keputusan-keputusan sendiri dan kemudian saya mencoba untuk “menjual” keputusan-keputusan itu kepada bawahan saya.'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'G',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 8,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila saya mengumumkan suatu keputusan yang kurang menyenangkan, saya akan menjelaskan kepada bawahan saya bahwa keputusan ini dibuat oleh direktur.'],
                    ['key' => 'B', 'text' => 'Saya mengijinkan bawahan-bawahan saya untuk ikut serta di dalam pengambilan keputusan, tetapi saya pun menyediakan sesuatu yang jitu sebagai keputusan akhir.'],
                ],
                'scoring' => [
                    'A' => 'A',
                    'B' => 'H',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 9,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya akan memberikan tugas-tugas yang sulit kepada bawahan saya yang belum berpengalaman, tetapi bila mereka memperoleh kesukaran, saya akan mengambil alih tanggung jawab mereka.'],
                    ['key' => 'B', 'text' => 'Bila jumlah dan mutu hasil kerja bagian saya tidak memuaskan, saya menjelaskan kepada bawahan-bawahan saya bahwa direktur merasa kecewa. Oleh karena itu, mereka harus memperbaiki mutu kerja mereka itu.'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'A',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 10,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merasa bahwa dengan bekerja keras untuk bawahan saya, mereka akan menyukai saya.'],
                    ['key' => 'B', 'text' => 'Saya membiarkan orang lain menangani tugas mereka masing-masing, walaupun mereka membuat banyak kesalahan.'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'B',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 11,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya menunjukkan minat saya terhadap kehidupan pribadi bawahan-bawahan saya, karena saya pun mengharapkan mereka berbuat seperti itu kepada saya.'],
                    ['key' => 'B', 'text' => 'Saya merasa bahwa bawahan-bawahan saya tidak perlu mengerti mengapa mereka mengerjakan sesuatu hal, sejauh mereka mengerjakan hal tersebut.'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'C',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 12,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya percaya bahwa bawahan-bawahan yang tidak disiplin tidak akan memperbaiki jumlah atau mutu kerja mereka dalam jangka waktu yang panjang.'],
                    ['key' => 'B', 'text' => 'Bila menghadapi masalah yang sulit, saya berusaha untuk mencapai pemecahan yang dapat diterima oleh sebagian besar orang.'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'D',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 13,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila beberapa bawahan saya merasa tidak berbahagia, saya akan mencoba melakukan sesuatu untuk mengatasi hal tersebut.'],
                    ['key' => 'B', 'text' => 'Saya berusaha bekerja sebaik mungkin dan memberikan ide-ide pengembangan pada pimpinan.'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'E',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 14,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya menyetujui kenaikan tunjangan-tunjangan untuk staf dan karyawan.'],
                    ['key' => 'B', 'text' => 'Saya mendukung bawahan saya yang ingin meningkatkan pengetahuan tentang pekerjaan dan perusahaan, walaupun hal itu sebenarnya belum diperlukan untuk kedudukan mereka sekarang.'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'F',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 15,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya membiarkan orang lain menangani tugas mereka masing-masing, walaupun mereka banyak membuat kesalahan.'],
                    ['key' => 'B', 'text' => 'Saya membuat keputusan-keputusan sendiri, tetapi saya akan mempertimbangkan usul-usul dari bawahan-bawahan saya'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'G',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 16,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila ada bawahan saya yang dikucilkan dari kelompok kerjanya, saya akan mencari cara agar orang lain dapat berteman dengannya.'],
                    ['key' => 'B', 'text' => 'Bila seorang karyawan tidak sanggup menyelesaikan tugasnya, saya akan membantu dia untuk menyelesaikan tugas tersebut.'],
                ],
                'scoring' => [
                    'A' => 'B',
                    'B' => 'H',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 17,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya percaya bahwa penerapan disiplin merupakan contoh untuk karyawan-karyawan lain.'],
                    ['key' => 'B', 'text' => 'Saya merasa saya lebih mementingkan tugas daripada diri saya sendiri.'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'A',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 18,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mencela pembicaraan-pembicaraan yang tidak perlu di antara bawahan-bawahan saya, selama mereka bekerja.'],
                    ['key' => 'B', 'text' => 'Saya menyetujui kenaikan tunjangan-tunjangan untuk staf dan karyawan.'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'B',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 19,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya selalu memperhatikan keterlambatan dan kemangkiran bawahan saya.'],
                    ['key' => 'B', 'text' => 'Saya percaya bahwa serikat-serikat buruh akan mencoba meruntuhkan kewibawaan pimpinan perusahaan.'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'C',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 20,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Kadang-kadang saya merasa bahwa apa yang dikeluhkan oleh serikat buruh bukanlah masalah yang mendasar.'],
                    ['key' => 'B', 'text' => 'Saya merasa bahwa keluhan-keluhan tidak dapat dicegah dan saya akan berusaha untuk menghilangkan keluhan tersebut.'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'D',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 21,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Adalah penting bagi saya untuk memperoleh penghargaan atas ide-ide saya yang baik.'],
                    ['key' => 'B', 'text' => 'Saya mengemukakan pendapat-pendapat saya di muka umum hanya bila saya merasa bahwa orang lain akan setuju dengan saya.'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'E',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 22,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya percaya bahwa serikat-serikat buruh akan mencoba meruntuhkan kewibawaan pimpinan perusahaan.'],
                    ['key' => 'B', 'text' => 'Saya percaya bahwa pertemuan-pertemuan yang sering dengan karyawan secara pribadi akan membantu pengembangan diri mereka.'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'F',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 23,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merasa bawahan-bawahan saya tidak perlu mengerti mengapa mereka mengerjakan sesuatu hal sejauh mereka mengerjakan hal tersebut.'],
                    ['key' => 'B', 'text' => 'Saya merasa bahwa jam pencatat waktu datang dan pulangnya para pegawai akan mengurangi keterlambatan.'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'G',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 24,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya biasanya membuat keputusan-keputusan sendiri dan menyampaikannya kepada bawahan saya.'],
                    ['key' => 'B', 'text' => 'Saya merasa bahwa serikat-serikat buruh dan pimpinan perusahaan dapat bekerjasama untuk mencapai tujuan-tujuan bersama.'],
                ],
                'scoring' => [
                    'A' => 'C',
                    'B' => 'H',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 25,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya menyukai penggunaan skala penggajian karyawan.'],
                    ['key' => 'B', 'text' => 'Saya selalu melakukan diskusi-diskusi untuk mencapai kata sepakat.'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'A',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 26,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak akan memberikan tugas yang tidak saya senangi kepada orang lain.'],
                    ['key' => 'B', 'text' => 'Bila beberapa bawahan saya merasa tidak berbahagia, saya akan mencoba melakukan sesuatu untuk mengatasi hal tersebut.'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'B',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 27,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila ada tugas yang mendesak, walaupun semua peralatannya sudah disediakan, saya akan membiarkannya saja dan meminta salah seorang bawahan saya untuk mengerjakan tugas tersebut.'],
                    ['key' => 'B', 'text' => 'Adalah penting bagi saya untuk memperoleh penghargaan atas ide-ide saya yang baik.'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'C',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 28,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Tujuan saya adalah berusaha mengerjakan tugas sebaik mungkin tanpa mengeluh.'],
                    ['key' => 'B', 'text' => 'Saya memberikan tugas kepada bawahan saya tanpa banyak mempertimbangkan pengalaman atau kemampuan, saya lebih menuntut pencapaian hasilnya saja.'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'D',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 29,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya memberikan tugas kepda bawahansaya tanpa banyak mempertimbangkan pengalaman atau kemampuan. saya lebih menuntut pada pencapaian hasilnya saja.'],
                    ['key' => 'B', 'text' => 'Saya dengan sabar mendengarkan keluhan-keluhan dan ketidakpuasan bawahan saya, tetapi seringkali saya meralat apa yang mereka katakan.'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'E',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 30,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merasa bahwa keluhan-keluhan tidak dapat dicegah dan saya berusaha untuk menghilangkan keluhan tersebut.'],
                    ['key' => 'B', 'text' => 'Saya percaya bahwa bawahan-bawahan saya akan merasakan kepuasan kerja tanpa merasa tertekan oleh saya.'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'F',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 31,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila menghadapi masalah yang sulit, saya berusaha untuk mencapai pemecahan yang dapat diterima leh sebagian besar orang.'],
                    ['key' => 'B', 'text' => 'Saya percaya bahwa pengalaman bekerja lebih bermanfaat daripada pendidikan teoritis.'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'G',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 32,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya selalu memberikan tugas-tugas yang sangat sulit kepada karyawan-karyawan yang paling berpengalaman.'],
                    ['key' => 'B', 'text' => 'Saya percaya bahwa kenaikan jabatan adalah semata-mata berdasarkan kemampuan yang ada.'],
                ],
                'scoring' => [
                    'A' => 'D',
                    'B' => 'H',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 33,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merasa bahwa masalah-masalah yang timbul di antara para karyawan-karyawan biasanya akan dapat diselesaikan di antara mereka sendiri, tanpa campur tangan dari saya.'],
                    ['key' => 'B', 'text' => 'Bila saya ditegur oleh atasan saya, saya akan memanggil semua bawahan saya dan mengatakan semua teguran tersebut kepada mereka.'],
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'A',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 34,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak peduli dengan apa yang dikerjakan oleh karyawan saya diluar jam kerja kantornya.'],
                    ['key' => 'B', 'text' => 'Saya percaya bahwa bawahan-bawahan yang tidak disiplin tidak akan memperbaiki jumlah atau mutu kerja mereka dalam jangka waktu yang panjang.'],
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'B',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 35,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya akan memberikan informasi kepada pimpinan perusahaan tidak lebih dari apa yang mereka tanyakan.'],
                    ['key' => 'B', 'text' => 'Kadang-kadang saya merasa bahwa apa yang dikeluhkan oleh serikat buruh bukanlah masalah yang mendasar.'],
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'C',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 36,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya kadang ragu-ragu untuk membuat suatu keputusan yang akan tidak disukai oleh bawahan-bawahan saya.'],
                    ['key' => 'B', 'text' => 'Tujuan saya adalah berusaha mengerjakan tugas sebaik mungkin tanpa mengeluh.'],
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'D',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 37,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya dengan sabar mendengarkan keluhan-keluhan dan ketidakpuasan-ketidakpuasan dari bawahan saya, tetapi seringkali meralat apa yang mereka katakan.'],
                    ['key' => 'B', 'text' => 'Saya kadang ragu-ragu untuk membuat suatu keputusan yang akan tidak disukai oleh bawahan-bawahan saya.'],
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'E',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 38,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mengemukakan pendapat-pendapat saya dimuka umum hanya bila saya merasa bahwa orang ain akan setuju dengan saya.'],
                    ['key' => 'B', 'text' => 'Sebagian besar dari bawahan-bawahan saya dapat menyelesaikan tugas-tugas mereka, bila perlu tanpa kehadiran saya.'],
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'F',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 39,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya berusaha bekerja sebaik mungkin dan memberikan ide-ide pengembangan pada pimpinan perusahaan.'],
                    ['key' => 'B', 'text' => 'Bila saya memberikan tugas kepada bawahan-bawahan saya, saya menuntukan batas penyelesaiannya.'],
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'G',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 40,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya selalu menganjurkan kepada bawahan-bawahan saya untuk memberikan usul-usul, tetapi kadang-kadang saya langsung mengambil tindakan tertentu.'],
                    ['key' => 'B', 'text' => 'Saya mencoba membuat bawahan-bawahan saya merasa senang apabila mereka berbicara dengan saya.'],
                ],
                'scoring' => [
                    'A' => 'E',
                    'B' => 'H',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 41,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Di dalam diskusi-diskusi saya memberikan fakta-fakta sesuai pemahaman saya, dan membiarkan mereka untuk membuat kesimpulan sendiri.'],
                    ['key' => 'B', 'text' => 'Bila direktur memberikan perintah yang kurang menyenangkan, saya pikir saya cukup bijaksana bila saya menyebutkan namanya, bukan nama saya.'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'A',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 42,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila ada tugas-tugas mendadak atau tugas yang tidak menyenangkan, sebelumnya saya akan meminta beberapa sukarelawan untuk mengerjakan tugas-tugas tersebut.'],
                    ['key' => 'B', 'text' => 'Saya menunjukkan minat saya terhadap kehidupan pribadi bawahan-bawahan saya karena saya pun mengharapkan mereka berbuat seperti itu pada saya.'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'B',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 43,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya selalu memperhatikan kebahagiaan karyawan-karyawan saya saat mereka mengerjakan tugas-tugas mereka.'],
                    ['key' => 'B', 'text' => 'Saya selalu memperhatikan keterlambatan dan kemangkiran bawahan saya.'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'C',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 44,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Sebagian besar dari bawahan-bawahan saya dapat menyelesaikan tugas-tugas mereka, bila perlu tanpa kehadiran saya.'],
                    ['key' => 'B', 'text' => 'Bila ada sesuatu tugas yang mendesak, walaupun semua peralatannya sudah disiapkan, saya akan membiarkannya saja dan meminta salah seorang bawahan saya untuk mengerjakan tugas tersebut.'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'D',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 45,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya percaya bahwa bawahan-bawahan saya akan merasakan kepuasan kerja tanpa merasa tertekan oleh saya.'],
                    ['key' => 'B', 'text' => 'Saya memberikan informasi kepada “Dewan Pimpinan Perusahaan” tidak lebih dari apa yang yang mereka katakan.'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'E',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 46,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya percaya bahwa pertemuan-pertemuan yang sering dengan karyawan secara pribadi akan membantu pengembangan diri mereka.'],
                    ['key' => 'B', 'text' => 'Saya selalu memperhatikan kebahagiaan karyawan-karyawan saya saat mereka mengerjakan tugas-tugas mereka'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'F',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 47,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mendukung bawahan saya yang ingin meningkatkan pengetahuan tentang pekerjaan dan perusahaan, walaupun hal itu sebenarnya belum diperlukan untuk kedudukan mereka sekarang.'],
                    ['key' => 'B', 'text' => 'Saya mengawasi benar bawahan-bawahan saya yang kurang mahir dalam pekerjaannya atau bawahan-bawahan saya yang hasil kerjanya kurang memuaskan.'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'G',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 48,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mengijinkan bawahan-bawahan saya untuk ikut serta dalam mengambil keputusan dan saya selalu mematuhi keputusan yang dibuat berdasarkan suara terbanyak.'],
                    ['key' => 'B', 'text' => 'Saya membuat bawahan-bawahan saya bekerja keras, dan saya berusaha meyakinkan mereka bahwa biasanya mereka akan mendapatkan perlakuan yang adil dari pimpinan perusahaan.'],
                ],
                'scoring' => [
                    'A' => 'F',
                    'B' => 'H',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 49,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merasa bahwa semua karyawan pada jabatan yang sama seharusnya memperoleh gaji yang sama.'],
                    ['key' => 'B', 'text' => 'Bila ada seorang karyawan yang hasil kerjanya selalu tidak memuaskan saya, saya akan menunggu suatu kesempatan untuk memindahkannya, dan bukan untuk memecatnya.'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'A',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 50,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merasa bahwa tujuan-tujuan serikat buruh dan tujuan-tujuan perusahaan saling berbeda.'],
                    ['key' => 'B', 'text' => 'Saya merasa bahwa dengan bekerja keras bagi bawahan saya, mereka akan menyenangi saya.'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'B',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 51,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mengawasi benar bawahan-bawahan saya yang kurang mahir dalam pekerjaannya atau bawahan-bawahan saya yang hasil kerjanya kurang memuaskan.'],
                    ['key' => 'B', 'text' => 'Saya mencela pembicaraan-pembicaraan yang tidak perlu diantara bawahan-bawahan saya, selama mereka bekerja.'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'C',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 52,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila saya memberi tugas kepada bawahan-bawahan saya, saya menentukan batas waktu penyelesaiannya.'],
                    ['key' => 'B', 'text' => 'Saya tidak akan memberikan tugas yang tidak saya senangi kepada orang lain.'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'D',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 53,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya percaya bahwa pengalaman bekerja lebih bermanfaat daripada pendidikan teoritis.'],
                    ['key' => 'B', 'text' => 'Saya tidak peduli dengan apa yang dikerjakan oleh para pegawai saya diluar jam kantornya'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'E',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 54,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merasa bahwa jam pencatat waktu datang dan pulangnya para pegawai akanmengurangi keterlambatan.'],
                    ['key' => 'B', 'text' => 'Saya mengijinkan bawahan-bawahan saya untuk ikut serta dalam pengambilan keputusan dan saya selalu mematuhi keputusan yang dibuat berdasarkan suara terbanyak.'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'F',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 55,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya membuat keputusan-keputusan sendiri, tetapi saya dapat mempertimbangkan saran-saran yang wajar dari bawahan-bawahan saya.'],
                    ['key' => 'B', 'text' => 'Saya merasa bahwa tujuan-tujuan serikat buruh dan tujuan-tujuan perusahaan adalah saling berbeda.'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'G',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 56,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya membuat keputusan-keputusan sendiri dan kemudian saya mencoba untuk “menjual” keputusan-keputusan itu kepada bawahan saya.'],
                    ['key' => 'B', 'text' => 'Apabila mungkin, saya akan membentuk kelompok-kelompok kerja yang terdiri dari orang-orang yang sudah menjadi teman-teman baik saya.'],
                ],
                'scoring' => [
                    'A' => 'G',
                    'B' => 'H',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 57,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya tidak akan ragu-ragu untuk mempekerjakan pegawai-pegawai yang cacat jasmani, bilamana saya merasa pasti bahwa mereka dapat menangani pekerjaannya.'],
                    ['key' => 'B', 'text' => 'Saya tidak akan menegur pelanggar-pelanggar peraturan, bila saya merasa pasti bahwa tidak ada satu orangpun yang mengetahui tentang pelanggaran-pelanggaran tersebut.'],
                ],
                'scoring' => [
                    'A' => 'H',
                    'B' => 'A',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 58,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Apabila mungkin, saya akan membentuk kelompok-kelompok kerja yang terdiri dari orang-orang yang sudah menjadi teman-teman baik saya.'],
                    ['key' => 'B', 'text' => 'Saya akan memberikan tugas yang sulit kepada bawahan-bawahan saya yang belum berpengalaman, tetapi bila mereka memperoleh kesukaran, saya akan mengambil alih tanggung jawab mereka.'],
                ],
                'scoring' => [
                    'A' => 'H',
                    'B' => 'B',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 59,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya membuat bawahan-bawahan saya bekerja keras dan saya berusaha meyakinkan mereka bahwa biasanya mereka akan mendapat perlakuan yang adil dari pimpinan perusahaan.'],
                    ['key' => 'B', 'text' => 'Saya percaya bahwa penerapan disiplin adalah merupakan contoh untuk karyawan-karyawan lainnya.'],
                ],
                'scoring' => [
                    'A' => 'H',
                    'B' => 'C',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 60,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mencoba untuk membuat bawahan-bawahan saya merasa senang apabila mereka berbicara dengan saya.'],
                    ['key' => 'B', 'text' => 'Saya menyukai penggunaan skala penggajian karyawan.'],
                ],
                'scoring' => [
                    'A' => 'H',
                    'B' => 'D',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 61,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya percaya bahwa kenaikan jabatan adalah semata-mata berdasarkan kemampuan yang ada.'],
                    ['key' => 'B', 'text' => 'Saya merasa bahwa masalah-masalah yang timbul diantara para karyawan biasanya akan dapat diselesaikan diantara mereka sendiri tanpa campur tangan dari saya.'],
                ],
                'scoring' => [
                    'A' => 'H',
                    'B' => 'E',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 62,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya merasa bahwa serikat-serikat buruh dan pimpinan perusahaan bekerja untuk mencapai tujuan-tujuan yang sama.'],
                    ['key' => 'B', 'text' => 'Di dalam diskusi, saya memberikan fakta-fakta sesuai dengan pemahaman bawahan saya dan membiarkan mereka untuk membuat kesimpulan sendiri.'],
                ],
                'scoring' => [
                    'A' => 'H',
                    'B' => 'F',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 63,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Bila seorang karyawan tidak sanggup menyelesaikan tugasnya, saya akan membantu dia untuk menyelesaikan tugas tersebut.'],
                    ['key' => 'B', 'text' => 'Saya merasa bahwa semua karyawan pada jabatan yang sama seharusnya memperoleh gaji yang sama.'],
                ],
                'scoring' => [
                    'A' => 'H',
                    'B' => 'G',
                ],
            ],

            [
                'section_id' => $msdt->sections[0]->id,
                'order' => 64,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Saya mengijinkan bawahan-bawahan saya untuk ikut serta dalam pengambilan keputusan, tetapi saya pun menyediakan sesuatu yang jitu sebagai keputusan akhir.'],
                    ['key' => 'B', 'text' => 'Saya tidak akan ragu-ragu untuk mempekerjakan pegawai-pegawai yang cacat jasmaninya, bilamana saya merasa bahwa mereka dapat menangani pekerjaannya.'],
                ],
                'scoring' => [
                    'A' => 'H',
                    'B' => 'H',
                ],
            ],

        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
