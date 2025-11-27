<?php

namespace Database\Seeders\Tools;

use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
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
                'introduce' => '<p style="text-align: justify;">Akan terdapat 90 pasang pernyataan. Pilihlah satu pernyataan dari pasangan pernyataan yang Anda rasakan paling mendekati gambaran diri Anda, atau yang paling menunjukkan perasaan Anda.</p>
                                <p style="text-align: justify;">Terkadang Anda akan merasa bahwa kedua pernyataan itu sesuai benar dengan diri Anda, meskipun demikian Anda harus tetap memilih satu pernyataan yang paling menunjukkan diri Anda.</p>
                                <p style="text-align: justify;">Anda <strong>HARUS</strong> memilih salah satu yang dominan serta mengisi semua nomor.</p>',
                'is_active' => true,
            ],
            [
                'name' => 'BAUM',
                'order' => 2,
                'token' => '2',
                'introduce' => null,
                'is_active' => true
            ],
            [
                'name' => 'DAP',
                'order' => 3,
                'token' => '3',
                'introduce' => null,
                'is_active' => true
            ],
            [
                'name' => 'HTP',
                'order' => 4,
                'token' => '4',
                'introduce' => null,
                'is_active' => true
            ],
            [
                'name' => 'SSCT',
                'order' => 5,
                'token' => '5',
                'introduce' => '<p>Pada tes ini terdapat beberapa kalimat yang belum sempurna, dan setiap kalimat merupakan permulaan dari suatu kalimat yang masih harus diselesaikan.</p>
                                <p>Bacalah setiap kalimat dan selesaikan dengan pikiran yang segera timbul setelah membaca permulaan kalimat.</p>
                                <p>Kerjakanlah secapat mungkin.</p>',
                'is_active' => true
            ],
            [
                'name' => 'OCEAN',
                'order' => 7,
                'token' => '7',
                'introduce' => '<p>Pada tes ini, setiap nomor berisikan satu pernyataan beserta lima pilihan skor jawaban. Tugas Kamu adalah menentukan skor kesesuaian setiap pernyataan dengan keadaan diri Kamu yang sebenarnya. Tiap pilihan skor kesesuaian yang kamu pilih memiliki kriterianya masing-masing.</p>
                                <p>Keterangan Skor:</p>
                                <div><strong>1: Sangat tidak sesuai</strong></div>
                                <div><strong>2: Tidak sesuai</strong></div>
                                <div><strong>3: Ragu-ragu</strong></div>
                                <div><strong>4: Sesuai</strong></div>
                                <div><strong>5: Sangat sesuai</strong></div>',
                'is_active' => true,
            ],
            [
                'name' => 'DASS-42',
                'order' => 10,
                'token' => '10',
                'introduce' => '<p>Tes ini terdiri dari berbagai pernyataan yang mungkin sesuai dengan pengalaman Anda dalam menghadapi situasi hidup sehari-hari. Terdapat empat pilihan jawaban yang disediakan untuk setiap pernyataan yaitu:</p>
                                <p><strong>Keterangan pilihan jawaban:</strong></p>
                                <div>0 : Tidak sesuai dengan saya sama sekali, atau tidak pernah.</div>
                                <div>1 : Sesuai dengan saya sampai tingkat tertentu, atau kadang kadang.</div>
                                <div>2 : Sesuai dengan saya sampai batas yang dapat dipertimbangkan, atau lumayan sering.</div>
                                <div>3 : Sangat sesuai dengan saya, atau sering sekali.</div>
                                <p>Selanjutnya, Anda diminta untuk memilih salah satu kolom yang paling sesuai dengan pengalaman Anda selama satu minggu belakangan ini. Tidak ada jawaban yang benar ataupun salah, karena itu isilah sesuai dengan keadaan diri Anda yang sesungguhnya, yaitu berdasarkan jawaban pertama yang terlintas dalam pikiran Anda.</p>',
                'is_active' => true,
            ],
            [
                'name' => 'VAK',
                'order' => 14,
                'token' => '14',
                'introduce' => '<p>Bacalah setiap kalimat dengan hati-hati lalu pertimbangkan apakah pernyataan tersebut menggambarkan diri Anda. Setiap pernyataan akan tersedia tiga opsi pilihan jawaban, pilihlah salah satu opsi jawaban yang sesuai dengan gambaran diri Anda.</p>
                                <p><strong>Keterangan pilihan jawaban:</strong><br>
                                1 : Jika pernyataan <strong>"TIDAK SESUAI"</strong> dengan gambaran diri Anda.<br>
                                2 : Jika pernyataan <strong>"CUKUP SESUAI"</strong> dengan gambaran diri Anda.<br>
                                3 : Jika pernyataan <strong>"SANGAT SESUAI"</strong> dengan gambaran diri Anda.</p>
                                <p>Tidak ada benar atau salah dalam pengerjaan soal ini, jadi silakan Anda menjawab sejujur-jujurnya.</p>',
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
                'order' => 17,
                'token' => '17',
                'introduce' => '<p>Berikut ini, terdapat pertanyaan-pertanyaan yang menyangkut tingkah laku, perasaan dan perbuatan Anda. Di bawah setiap pertanyaan disediakan tempat untuk menjawab:</p>
                                <p style="text-align: center;"><strong><span style="color: #4caf50;">YA </span>atau <span style="color: #ef5350;">TIDAK</span></strong></p>
                                <p style="text-align: justify;">Hendaknya Anda mencoba menentukan jawaban manakah yang paling tepat dengan yang Anda rasakan atau Anda lakukan, pilihlah opsi "<strong><span style="color: #4caf50;">YA</span></strong>", jika jawaban Anda adalah YA, dan&nbsp; pilihlah opsi "<strong><span style="color: #ef5350;">TIDAK</span></strong>" jika jawaban Anda adalah TIDAK.</p>
                                <p style="text-align: justify;">Pilihlah jawaban setiap Anda selesai membaca pertanyaan sehingga Anda <strong>tidak perlu untuk melakukan proses pemikiran panjang</strong></p>
                                <p style="text-align: justify;">Untuk menyelesaikan daftar pertanyaan ini diperlukan waktu yang terbatas. Silahkan Anda membaca halaman berikutnya dan mulailah menjawab setiap pertanyaan. <strong>Dalam hal ini tidak ada penilaian yang salah terhadap tiap jawaban yang Anda berikan</strong>. Pertanyaan-pertanyaan ini bukanlah untuk tes inteligensi atau tes kecakapan, hal ini melainkan semata-mata bertujuan hanya untuk mengukur cara perilaku, perasaan, dan pikiran Anda</p>',
                'is_active' => true,
            ],
            [
                'name' => 'Biodata Perusahaan',
                'order' => 22,
                'token' => '22',
                'introduce' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Biodata Pendidikan',
                'order' => 23,
                'token' => '23',
                'introduce' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Biodata Komunitas',
                'order' => 24,
                'token' => '24',
                'introduce' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Biodata Individual',
                'order' => 25,
                'token' => '25',
                'introduce' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Biodata Klinis',
                'order' => 26,
                'token' => '26',
                'introduce' => null,
                'is_active' => true,
            ],
            [
                'name' => 'HEXACO',
                'order' => 6,
                'token' => '6',
                'introduce' => '<p>Di bawah Anda akan menemukan beberapa pernyataan tentang diri Anda. Bacalah setiap pernyataan dengan seksama dan tentukan seberapa setujukah Anda terhadap pernyataan tersebut. Setelah itu, pilihlah jawaban Anda dengan skala sebagai berikut:</p>
                                <p>Keterangan pilihan jawaban:</p>
                                <div><strong>1: Sangat Tidak Setuju</strong></div>
                                <div><strong>2: Tidak Setuju</strong></div>
                                <div><strong>3: Netral</strong></div>
                                <div><strong>4: Setuju</strong></div>
                                <div><strong>5: Sangat Setuju</strong></div>',
                'is_active' => true,
            ],
            [
                'name' => 'BDI',
                'order' => 8,
                'token' => '8',
                'introduce' => '<p>Akan terdapat 4 pernyataan dalam setiap soal. Bacalah setiap pernyataan dan pilih salah satu pernyataan yang paling mencerminkan apa yang Anda rasakan selama beberapa hari ini. Pastikan Anda menjawab pernyataan tanpa ada yang terlewat.</p>
                                <p>Tidak ada benar atau salah dalam pengerjaan soal ini, jadi silakan Anda menjawab sejujur-jujurnya.</p>',
                'is_active' => true,
            ],
            [
                'name' => 'D4 Bagian 1',
                'order' => 27,
                'token' => '27',
                'introduce' => '<p>Pada tes ini terdapat kombinasi-kombinasi huruf dan angka. Tugas Anda adalah membandingkan kombinasi-kombinasi tersebut dengan cepat dan teliti. Masing-masing soal berisi lima macam kombinasi. Kombinasi-kombinasi yang serupa juga terdapat pada pilihan jawaban yang tersedia, namun dengan susunan yang berbeda. Anda nantinya akan melihat bahwa dalam tiap-tiap soal ada salah satu kombinasi yang dicetak tebal.</p>
                                <p>Tugas Anda dalah untuk melihat kombinasi yang dicetak tebal itu, kemudian melihat kombinasi yang serupa di pilihan jawaban yang tersedia dan memilih kombinasi tersebut sebagai jawaban</p>',
                'is_active' => true,
            ],
            [
                'name' => 'D4 Bagian 2',
                'order' => 28,
                'token' => '28',
                'introduce' => '<p>Pada tes ini terdapat kombinasi-kombinasi huruf dan angka. Tugas Anda adalah membandingkan kombinasi-kombinasi tersebut dengan cepat dan teliti. Masing-masing soal berisi lima macam kombinasi. Kombinasi-kombinasi yang serupa juga terdapat pada pilihan jawaban yang tersedia, namun dengan susunan yang berbeda. Anda nantinya akan melihat bahwa dalam tiap-tiap soal ada salah satu kombinasi yang dicetak tebal.</p>
                                <p>Tugas Anda dalah untuk melihat kombinasi yang dicetak tebal itu, kemudian melihat kombinasi yang serupa di pilihan jawaban yang tersedia dan memilih kombinasi tersebut sebagai jawaban</p>',
                'is_active' => true,
            ],
            [
                'name' => 'IST',
                'order' => 12,
                'token' => '12',
                'introduce' => '<p>Tes ini terdiri dari beberapa bagian, dimana masing-masing bagian memiliki cara pengerjaan yang berbeda dan waktu penyelesaian yang berbeda pula.</p>
                                <p>Pada awal setiap bagian, akan dibacakan instruksi dan contoh soal, harap diperhatikan dengan baik. Jika belum jelas diperkenankan mengajukan pertanyaan karena apabila tes sudah dimulai Anda tidak diperkenankan untuk bertanya lagi.</p>
                                <p>Untuk menjawab soal hitungan, Anda diperbolehkan menggunakan kertas untuk menghitung dalam menjawab soal.</p>',
                'is_active' => true,
            ],
        ];

        foreach ($tools as $tool) {
            Tool::create($tool);
        }
    }
}
