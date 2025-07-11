<?php

namespace Database\Seeders\Tools\RMIB;

use App\Models\Question;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RmibQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rmib = Tool::with('sections')->firstWhere('name', 'RMIB');

        $questions = [
            [
                'section_id' => $rmib->sections[0]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Tim mengadakan persiapan perjalanan. Rapat-rapat perlu diadakan. Dana dari sponsor, kendaraan, peralatan dan sebagainya perlu diurus.

                Bacalah terlebih dahulu semua tugas yang ada, lalu urutkan tugas yang paling Anda senangi dengan menggunakan opsi "urutan __". Pastikan tidak ada pekerjaan yang mendapat urutan yang sama. ',
                'options' => [
                    'variants' => [
                        'male' => [
                            ["id" => 1, "text" => 'Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan,  dari satu tempat ke tempat lain.  '],
                            ["id" => 2, "text" => 'Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.'],
                            ["id" => 3, "text" => 'Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.'],
                            ["id" => 4, "text" => 'Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.'],
                            ["id" => 5, "text" => 'Menghadap sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".'],
                            ["id" => 6, "text" => 'Memilih berbagai khasanah lagu-lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.'],
                            ["id" => 7, "text" => 'Merancang simbol dan logo untuk peralatan tim WKN.'],
                            ["id" => 8, "text" => 'Menyiapkan bacaan populer dan membuat kliping dari koran/majalah.'],
                            ["id" => 9, "text" => 'Menjadi penghubung dengan kelompok WKN lain (karena memiliki banyak teman/kenalan).'],
                            ["id" => 10, "text" => 'Mencatat hasil, menyusun, dan menyimpan arsip.'],
                            ["id" => 11, "text" => 'Menyiapkan peralatan makan dan bahan '],
                            ["id" => 12, "text" => 'Menyiapkan peralatan kedokteran, P3K, dan obat-obatan.'],
                        ],
                        'female' => [
                            ["id" => 1, "text" => 'Menyetir mobil antar-jemput para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.'],
                            ["id" => 2, "text" => 'Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.  '],
                            ["id" => 3, "text" => 'Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.'],
                            ["id" => 4, "text" => 'Membaca setumpuk laporan penelitian KLH untuk memilih proyek KLH yang tepat.'],
                            ["id" => 5, "text" => 'Menjadi anggota delegasi yang menghadap ibu Direksi (sponsor) untuk tawar menawar dana.'],
                            ["id" => 6, "text" => 'Membuat gambar, simbol dan logo untuk tim WKN.'],
                            ["id" => 7, "text" => 'Memilih aransemen lagu-lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.'],
                            ["id" => 8, "text" => 'Menyiapkan bacaan-bacaan populer KLH untuk tingkat remaja.'],
                            ["id" => 9, "text" => 'Menjadi penghubung dengan kelompok WKN lain (karena memiliki banyak teman/kenalan).'],
                            ["id" => 10, "text" => 'Mencatat rencana-rencana, menyusun, dan menyimpan sebagai arsip.'],
                            ["id" => 11, "text" => 'Menyiapkan peralatan makan dan bahan makanan/perbekalan.'],
                            ["id" => 12, "text" => 'Menyiapkan peralatan kedokteran dan obat-obatan bagi hewan dan manusia.'],
                        ]
                    ]
                ],
                "scoring" => [
                    1 => "outdoor",
                    2 => "mechanical",
                    3 => "computational",
                    4 => "scientific",
                    5 => "personal contact",
                    6 => "aesthetic",
                    7 => "musical",
                    8 => "literacy",
                    9 => "social service",
                    10 => "clenical",
                    11 => "practical",
                    12 => "medical",
                ]
            ],
            [
                'section_id' => $rmib->sections[1]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Anggota yang melakukan tawar-menawar dana mengabarkan bahwa keduabelasan Anda diminta membantu pelaksanaan "bazar malam" untuk menjual barang-barang simpanan sponsor. Kedua-belasan Anda akan mendapat 20% hasil penjualan sebagai tambahan bekal.

                Pilih sendiri tugas yang Anda sukai.',
                'options' => [
                    'variants' => [

                        'male' => [
                            ["id" => 1, "text" => 'Menservis mesin disel dan mensolder komponen panel-panel pengatur lampu iklan.'],
                            ["id" => 2, "text" => 'Menghitung pengeluaran dan pemasukan bazar (dan 20% hasil penjualannya).'],
                            ["id" => 3, "text" => 'Meneliti ulat dan kutu yang telah menyerang gudang barang-barang yang akan dibazarkan.'],
                            ["id" => 4, "text" => 'Menggunakan pengeras suara untuk menarik pengunjung agar membeli.'],
                            ["id" => 5, "text" => 'Merancang dan menggambar papan reklame bazar.'],
                            ["id" => 6, "text" => 'Menggubah lagu-lagu yang tepat dan memikat untuk iklan bazar yang disiarkan melalui radio.'],
                            ["id" => 7, "text" => 'Mengarang sajak-sajak jenaka untuk dibacakan guna memeriahkan acara bazar.'],
                            ["id" => 8, "text" => 'Membantu para pengunjung mengisi daftar pesanan barang yang perlu diantar ke rumah.'],
                            ["id" => 9, "text" => 'Mengetik undangan khusus untuk para pejabat/jutawan.'],
                            ["id" => 10, "text" => 'Memasang tenda, spanduk rumbai-rumbai, dan bendera.'],
                            ["id" => 11, "text" => 'Membantu dokter melayani pengobatan gratis bagi pengunjung.'],
                            ["id" => 12, "text" => 'Menjaga keamanan di halaman gedung, siap dengan "halo-halo" (walkie-talkie).'],
                        ],

                        'female' => [
                            ["id" => 1, "text" => 'Meminyaki mesin jahit yang dipakai untuk permak pakaian yang dibazarkan.'],
                            ["id" => 2, "text" => 'Menghitung pengeluaran dan pemasukan bazar (dan 20% hasil penjualannya).'],
                            ["id" => 3, "text" => 'Bekerja di laboratorium meneliti kemurnian insektisida yang akan "dibazarkan".'],
                            ["id" => 4, "text" => 'Menggunakan pengeras suara untuk menarik pengunjung agar membeli.'],
                            ["id" => 5, "text" => 'Melukis papan reklame bazar menggunakan kuas dan cat.'],
                            ["id" => 6, "text" => 'Mengarang lagu-lagu KLH sederhana, yang mudah ditiru anak-anak kecil untuk disiarkan melalui radio.'],
                            ["id" => 7, "text" => 'Memilih sajak-sajak jenaka untuk memeriahkan acara bazar.'],
                            ["id" => 8, "text" => 'Membantu para pengunjung mengisi daftar pesanan barang yang perlu diantar ke rumah.'],
                            ["id" => 9, "text" => 'Mengetik undangan khusus untuk para pejabat/jutawan.'],
                            ["id" => 10, "text" => 'Memasak dan mengatur meja makanan di kafetaria.'],
                            ["id" => 11, "text" => 'Menjadi asisten/pembantu dokter dalam rangka pengobatan gratis bagi pengunjung.'],
                            ["id" => 12, "text" => 'Menjaga keamanan anak-anak yang sedang bermain di halaman gedung.'],
                        ]
                    ]
                ],
                "scoring" => [
                    1 => "mechanical",
                    2 => "computational",
                    3 => "scientific",
                    4 => "personal contact",
                    5 => "aesthetic",
                    6 => "musical",
                    7 => "literacy",
                    8 => "social service",
                    9 => "clenical",
                    10 => "practical",
                    11 => "medical",
                    12 => "outdoor",

                ]
            ],
            [
                'section_id' => $rmib->sections[2]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Persiapan berjalan mulus. Perjalanan juga menyenangkan. Di Kecamatan Depok, Pak Camat meminta agar tim WKN membenahi wisma padepokan KLH tempat tim Anda menginap serta mengadakan pameran dan kampanye KLH.

                Urutkan pilihan tugas Anda.',
                'options' => [
                    'variants' => [

                        'male' => [
                            ["id" => 1, "text" => 'Melakukan perhitungan biaya pembenahan Wisma.'],
                            ["id" => 2, "text" => 'Meneliti apakah ular-ular yang berkeliaran di wisma berbisa.'],
                            ["id" => 3, "text" => 'Menghadap Pak Camat untuk meyakinkan beliau bahwa meskipun mahal, proyek pembenahan Wisma tersebut masih seimbang dari segi manfaat.'],
                            ["id" => 4, "text" => 'Menggambar sketsa tokoh-tokoh KLH.'],
                            ["id" => 5, "text" => 'Membuat aransemen lagu "Lestarikan Lingkunganku" yang akan dimainkan Band Musik Remaja Depok.'],
                            ["id" => 6, "text" => 'Menulis puisi yang mendukung KLH untuk lomba deklarasi anak-anak/remaja Depok.'],
                            ["id" => 7, "text" => 'Menyambut penduduk yang datang di Wisma untuk berdiskusi mengenai pencemaran lingkungan.'],
                            ["id" => 8, "text" => 'Menyimpan arsip surat-surat dan rekening-rekening.'],
                            ["id" => 9, "text" => 'Mengecat tembok Wisma.'],
                            ["id" => 10, "text" => 'Mengobati penduduk Depok yang menderita gatal-gatal.'],
                            ["id" => 11, "text" => 'Mengatur letak batu-batuan dalam kolam di halaman Wisma.'],
                            ["id" => 12, "text" => 'Memperbaiki pompa air yang macet karena lama tidak dipakai.'],
                        ],

                        'female' => [
                            ["id" => 1, "text" => 'Mengukur panjang dan lebarnya kain gorden dan permadani yang dibutuhkan di Wisma.'],
                            ["id" => 2, "text" => 'Memeriksa di laboratorium air sumur Wisma yang berbau busuk, yang diduga terkena pencemaran.'],
                            ["id" => 3, "text" => 'Menghimbau Ibu Camat dan ibu-ibu PKK untuk membantu pembenahan wisma.'],
                            ["id" => 4, "text" => 'Menyiapkan gambar sketsa perubahan dekorasi tata ruang.'],
                            ["id" => 5, "text" => 'Memilih aransemen lagu "Lestarikan Lingkunganku" yang akan dimainkan Band Musik Remaja Depok.'],
                            ["id" => 6, "text" => 'Menulis puisi yang mendukung KLH untuk lomba deklarasi anak-anak/remaja Depok.'],
                            ["id" => 7, "text" => 'Menerima tamu-tamu siswa setempat yang meminta informasi mengenai KLH.'],
                            ["id" => 8, "text" => 'Menyimpan arsip surat-surat dan rekening-rekening tagihan.'],
                            ["id" => 9, "text" => 'Membersihkan wisma dan perkakas rumah tangga.'],
                            ["id" => 10, "text" => 'Mengobati penduduk Depok yang menderita gatal-gatal di tenggorokan.'],
                            ["id" => 11, "text" => 'Mengatur tanaman di kolam di halaman Wisma.'],
                            ["id" => 12, "text" => 'Memasang kembali kran air yang dicopot karena lama tidak dipakai.'],
                        ]
                    ]
                ],
                "scoring" => [
                    1 => "computational",
                    2 => "scientific",
                    3 => "personal contact",
                    4 => "aesthetic",
                    5 => "musical",
                    6 => "literacy",
                    7 => "social service",
                    8 => "clenical",
                    9 => "practical",
                    10 => "medical",
                    11 => "outdoor",
                    12 => "mechanical",

                ]
            ],
            [
                'section_id' => $rmib->sections[3]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Kampanye di Wisma direncanakan terdiri atas beberapa acara, antara lain penghijauan, kependudukan, dan masalah polusi.

                Urutkan tugas-tugas yang Anda pilih.',
                'options' => [
                    'variants' => [

                        'male' => [
                            ["id" => 1, "text" => 'Memeriksa unsur-unsur kimiawi air limbah membusuk yang diduga tercemar.'],
                            ["id" => 2, "text" => 'Menjadi anggota utusan yang menghimbau direksi pabrik agar memperbaiki pengolahan limbah.'],
                            ["id" => 3, "text" => 'Merancang/menggambar poster dan spanduk kampanye menggunakan cat minyak.'],
                            ["id" => 4, "text" => 'Menggubah lagu sederhana kampanye penghijauan.'],
                            ["id" => 5, "text" => 'Menyiapkan kata-kata brosur dan selebaran Kampanye Penghijauan dan Keluarga Berencana.'],
                            ["id" => 6, "text" => 'Memberi penjelasan kepada para pengunjung pameran.'],
                            ["id" => 7, "text" => 'Mengetik naskah dan memperbanyak naskah.'],
                            ["id" => 8, "text" => 'Mengatur meja, kursi, dan lemari pameran.'],
                            ["id" => 9, "text" => 'Menjadi "mantri kesehatan" di puskesmas setempat.'],
                            ["id" => 10, "text" => 'Menanamkan pohon-pohon lindung di jalur hijau.'],
                            ["id" => 11, "text" => 'Merakit dan memasang pompa air bersih untuk penduduk.'],
                            ["id" => 12, "text" => 'Membantu penduduk menghitung ganti rugi akibat pencemaran.'],
                        ],

                        'female' => [
                            ["id" => 1, "text" => 'Memeriksa penyakit hewan yang minum air sungai yang tercampur limbah industri.'],
                            ["id" => 2, "text" => 'Menjadi anggota utusan yang menghimbau direksi pabrik agar memperbaiki pengolahan limbah.'],
                            ["id" => 3, "text" => 'Merancang gambar, poster, dan spanduk kampanye.'],
                            ["id" => 4, "text" => 'Mengarang lagu sederhana kampanye penghijauan.'],
                            ["id" => 5, "text" => 'Menyiapkan kata-kata penerangan melalui radio.'],
                            ["id" => 6, "text" => 'Memberi penjelasan kepada para siswa SMA yang mengunjungi pameran.'],
                            ["id" => 7, "text" => 'Mengetik naskah dan membantu tata usaha.'],
                            ["id" => 8, "text" => 'Mengatur meja, kursi, dan lemari pameran.'],
                            ["id" => 9, "text" => 'Menjadi anggota "tim kesehatan" yang mengobati penduduk yang sakit kulit akibat pencemaran air.'],
                            ["id" => 10, "text" => 'Menanamkan bibit semak atau perdu di jalur hijau.'],
                            ["id" => 11, "text" => 'Merakit saringan air bersih untuk penduduk.'],
                            ["id" => 12, "text" => 'Membantu menghitung besarnya ganti rugi bagi penduduk yang terkena pencemaran.'],
                        ]
                    ]
                ],
                "scoring" => [
                    1 => "scientific",
                    2 => "personal contact",
                    3 => "aesthetic",
                    4 => "musical",
                    5 => "literacy",
                    6 => "social service",
                    7 => "clenical",
                    8 => "practical",
                    9 => "medical",
                    10 => "outdoor",
                    11 => "mechanical",
                    12 => "computational",

                ]
            ],
            [
                'section_id' => $rmib->sections[4]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Bagi para remaja dan anak-anak, KLH diperkenalkan dengan mengadakan berbagai lomba.

                Urutkan pilihan tugas anda. ',
                'options' => [
                    'variants' => [

                        'male' => [
                            ["id" => 1, "text" => 'Juri lomba pidato mengenai KLH.'],
                            ["id" => 2, "text" => 'Juri lomba seni lukis dan seni patung.'],
                            ["id" => 3, "text" => 'Juri lomba memainkan instrumen musik daerah.'],
                            ["id" => 4, "text" => 'Juri lomba deklamasi puisi/membaca prosa KLH.'],
                            ["id" => 5, "text" => 'Juri "10 Remaja Pria yang pandai bergaul".'],
                            ["id" => 6, "text" => 'Juri lomba mengetik cepat dan rapih.'],
                            ["id" => 7, "text" => 'Juri lomba memasak nasi goreng dan mie instan.'],
                            ["id" => 8, "text" => 'Juri lomba Palang Merah Remaja dan dokter kecil.'],
                            ["id" => 9, "text" => 'Juri lomba voli dan sepak bola.'],
                            ["id" => 10, "text" => 'Juri lomba matematika SD.'],
                            ["id" => 11, "text" => 'Juri lomba pidato mengenai KLH.'],
                            ["id" => 12, "text" => 'Juri lomba penelitian populer.'],
                        ],

                        'female' => [
                            ["id" => 1, "text" => 'Juri lomba pidato mengenai KLH.'],
                            ["id" => 2, "text" => 'Juri lomba seni merangkai bunga.'],
                            ["id" => 3, "text" => 'Juri lomba menyanyi lagu daerah.'],
                            ["id" => 4, "text" => 'Juri lomba merangkai kata-kata menjadi cerita KLH.'],
                            ["id" => 5, "text" => 'Juri lomba "Remaja Putri Ngetop dan Bergaul".'],
                            ["id" => 6, "text" => 'Juri lomba mengetik cepat dan rapih.'],
                            ["id" => 7, "text" => 'Juri lomba memasak nasi goreng paling istimewa.'],
                            ["id" => 8, "text" => 'Juri lomba PPPK dan Palang Merah Remaja.'],
                            ["id" => 9, "text" => 'Juri lomba voli.'],
                            ["id" => 10, "text" => 'Juri lomba menambal ban sepeda.'],
                            ["id" => 11, "text" => 'Juri lomba matematika murid SD.'],
                            ["id" => 12, "text" => 'Juri lomba proyek observasi IPA.'],
                        ]
                    ]
                ],
                "scoring" => [
                    1 => "personal contact",
                    2 => "aesthetic",
                    3 => "musical",
                    4 => "literacy",
                    5 => "social service",
                    6 => "clenical",
                    7 => "practical",
                    8 => "medical",
                    9 => "outdoor",
                    10 => "mechanical",
                    11 => "computational",
                    12 => "scientific",

                ]
            ],
            [
                'section_id' => $rmib->sections[5]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Guru SD perlu mendapat pengetahuan lebih mendalam mengenai KLH. Mereka mendapat penataran, dan Anda-Anda perlu menggantikan tugas mereka.

                Urutkan pilihan Anda.',
                'options' => [
                    'variants' => [
                        'male' => [
                            ["id" => 1, "text" => 'Mengajar seni lukis dan seni patung.'],
                            ["id" => 2, "text" => 'Mengajar memainkan musik dan menyanyi.'],
                            ["id" => 3, "text" => 'Mengajar bahasa dan mengarang.'],
                            ["id" => 4, "text" => 'Mengajar mata pelajaran agama.'],
                            ["id" => 5, "text" => 'Mengajar mengetik surat.'],
                            ["id" => 6, "text" => 'Mengajar prakarya.'],
                            ["id" => 7, "text" => 'Mengajar teknik merawat orang sakit.'],
                            ["id" => 8, "text" => 'Mengajar olahraga dan sepak bola.'],
                            ["id" => 9, "text" => 'Mengajar penggunaan alat-alat pertukangan sederhana.'],
                            ["id" => 10, "text" => 'Mengajar berhitung.'],
                            ["id" => 11, "text" => 'Mengajar ilmu hewan dan ilmu tumbuh-tumbuhan.'],
                            ["id" => 12, "text" => 'Menjelaskan seluk beluk koperasi (IPS).'],
                        ],

                        'female' => [
                            ["id" => 1, "text" => 'Mengajar menggambar dengan cat air.'],
                            ["id" => 2, "text" => 'Mengajar memainkan angklung/kulintang.'],
                            ["id" => 3, "text" => 'Mengajar mengarang mengenai KLH.'],
                            ["id" => 4, "text" => 'Menggantikan tugas guru Agama.'],
                            ["id" => 5, "text" => 'Mengajar anak-anak menulis dengan mesin ketik.'],
                            ["id" => 6, "text" => 'Mengajar memasak lauk pauk sederhana.'],
                            ["id" => 7, "text" => 'Mengajar cara membersihkan luka yang infeksi.'],
                            ["id" => 8, "text" => 'Mengajar olah raga.'],
                            ["id" => 9, "text" => 'Mengajar murid-murid merakit serutan pensil.'],
                            ["id" => 10, "text" => 'Mengajar berhitung praktis.'],
                            ["id" => 11, "text" => 'Mengajar ilmu hewan dan ilmu tumbuh-tumbuhan.'],
                            ["id" => 12, "text" => 'Mengajar dasar-dasar koperasi sekolah.'],
                        ]
                    ]
                ],
                "scoring" => [
                    1 => "aesthetic",
                    2 => "musical",
                    3 => "literacy",
                    4 => "social service",
                    5 => "clenical",
                    6 => "practical",
                    7 => "medical",
                    8 => "outdoor",
                    9 => "mechanical",
                    10 => "computational",
                    11 => "scientific",
                    12 => "personal contact",

                ]
            ],
            [
                'section_id' => $rmib->sections[6]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Tim Anda diminta menjadi agen rahasia untuk menyelidiki satu keluarga pedagang kaya raya yang diduga terlibat dalam masalah narkotika. Keluarga ini akan mengadakan pesta besar-besaran di salah satu pulau di Pulau Seribu. Setiap anggota tim menyamar sebagai petugas.

                Urutkan pilihan tugas Anda.',
                'options' => [
                    'variants' => [

                        'male' => [
                            ["id" => 1, "text" => 'Menjadi pianis/gitaris "Band Musik".'],
                            ["id" => 2, "text" => 'Menjadi asisten pengarang yang membuatkan teks undangan berbentuk puisi yang indah.'],
                            ["id" => 3, "text" => 'Menyambut tamu dan menunjukkan tempat penginapan masing-masing.'],
                            ["id" => 4, "text" => 'Menjadi sekretaris yang bertugas mengetik nama tamu yang telah hadir.'],
                            ["id" => 5, "text" => 'Menjadi asisten utama koki untuk khusus tamu VIP.'],
                            ["id" => 6, "text" => 'Menjadi perawat di pos kesehatan, terutama untuk penyakit gawat darurat (jantung, kecelakaan, dsb).'],
                            ["id" => 7, "text" => 'Petugas pengatur lalu lintas mobil-mobil jemputan.'],
                            ["id" => 8, "text" => 'Menjaga disel pembangkit listrik yang sering mogok.'],
                            ["id" => 9, "text" => 'Juru bayar rekening pesta.'],
                            ["id" => 10, "text" => 'Bekerja di laboratorium bahan makanan.'],
                            ["id" => 11, "text" => 'Menjadi pengarah acara sambil mengimbau orang-orang dermawan untuk membantu  proyek KLH.'],
                            ["id" => 12, "text" => 'Membuat patung besar SELAMAT DATANG dari tanah liat.'],
                        ],

                        'female' => [
                            ["id" => 1, "text" => 'Menjadi pianis/gitaris "Band Musik".'],
                            ["id" => 2, "text" => 'Menjadi asisten pengarang yang membuatkan teks undangan berbentuk puisi yang aduhai.'],
                            ["id" => 3, "text" => 'Menyambut tamu dan menyilahkan mengisi formulir kedatangan dan buku tamu.'],
                            ["id" => 4, "text" => 'Menjadi Sekretaris, yang mencatat dan menyimpan formulir kedatangan untuk keperluan penyidikan.'],
                            ["id" => 5, "text" => 'Menyiapkan hidangan dan mengedarkan makanan di antara bagi para tamu.'],
                            ["id" => 6, "text" => 'Menjadi perawat yang siap di Pos Kesehatan Darurat bagi para tamu.'],
                            ["id" => 7, "text" => 'Menjadi petugas (Polwan) yang mengatur lalu lintas mobil tamu-tamu.'],
                            ["id" => 8, "text" => 'Siap menyekrup di tempat yang tersedia papan-papan nama tamu-tamu yang telah datang.'],
                            ["id" => 9, "text" => 'Menjadi kasir yang membayar semua rekening pesta.'],
                            ["id" => 10, "text" => 'Bekerja di laboratorium penyelidikan sidik jari para tamu.'],
                            ["id" => 11, "text" => 'Menjadi pengarah acara sambil mengimbau orang-orang dermawan untuk membantu proyek KLH.'],
                            ["id" => 12, "text" => 'Bersama-sama membuat patung dari bongkah es.'],
                        ]
                    ]
                ],
                "scoring" => [
                    1 => "musical",
                    2 => "literacy",
                    3 => "social service",
                    4 => "clenical",
                    5 => "practical",
                    6 => "medical",
                    7 => "outdoor",
                    8 => "mechanical",
                    9 => "computational",
                    10 => "scientific",
                    11 => "personal contact",
                    12 => "aesthetic",

                ]
            ],
            [
                'section_id' => $rmib->sections[7]->id,
                'order' => 1,
                'type' => 'ordering',
                'text' => 'Di suatu daerah, terjadi musibah gempa yang diikuti dangan tanah longsor yang melanda daerah pemukiman. Tim Anda diminta membantu.

                Urutkan tugas pilihan Anda.',
                'options' => [
                    'variants' => [

                        'male' => [
                            ["id" => 1, "text" => 'Menulis karangan agar musibah ini mendapat perhatian masyarakat.'],
                            ["id" => 2, "text" => 'Menenangkan mereka yang terkena musibah.'],
                            ["id" => 3, "text" => 'Mengetik surat jalan bagi mereka yang ingin mengungsi ke luar daerah.'],
                            ["id" => 4, "text" => 'Memasang tenda untuk penampungan mereka yang kehilangan tempat tinggal.'],
                            ["id" => 5, "text" => 'Membantu merawat mereka yang luka parah.'],
                            ["id" => 6, "text" => 'Membantu penggalian reruntuhan di lokasi/tempat musibah.'],
                            ["id" => 7, "text" => 'Memasang kabel-kabel lampu darurat agar penggalian dapat berlangsung siang malam.'],
                            ["id" => 8, "text" => 'Menjadi kasir yang menyalurkan uang bantuan.'],
                            ["id" => 9, "text" => 'Membawa berbagai peralatan untuk menyelidiki tempat-tempat yang rawan longsor.'],
                            ["id" => 10, "text" => 'Menghadap para multijutawan untuk meminta dana bantuan.'],
                            ["id" => 11, "text" => 'Membuat gambar/patung untuk dijual oleh pencari dana.'],
                            ["id" => 12, "text" => 'Ikut sebagai pemain band untuk mencari dana kemanusiaan.'],
                        ],

                        'female' => [
                            ["id" => 1, "text" => 'Menulis Pikiran Pembaca agar musibah ini mendapat perhatian masyarakat.'],
                            ["id" => 2, "text" => 'Menenangkan mereka yang kebingungan karena terkena musibah.'],
                            ["id" => 3, "text" => 'Mengetik daftar nama korban yang memerlukan bantuan.'],
                            ["id" => 4, "text" => 'Mengatur tempat-tempat tidur darurat untuk menampung mereka yang kehilangan tempat tinggal.'],
                            ["id" => 5, "text" => 'Merawat mereka yang luka parah.'],
                            ["id" => 6, "text" => 'Siap berada di sekitar reruntuhan lokasi/tempat musibah untuk membantu apapun juga.'],
                            ["id" => 7, "text" => 'Merakit lampu darurat agar penggalian dapat berlangsung siang-malam.'],
                            ["id" => 8, "text" => 'Menjadi kasir yang membagikan uang bantuan kepada yang berhak'],
                            ["id" => 9, "text" => 'Membaca laporan-laporan mengenai kerawanan di daerah-daerah sekitar musibah untuk membantu perencanaan tindak lanjut.'],
                            ["id" => 10, "text" => 'Menghadap para jutawan untuk membahas pemberian bantuan.'],
                            ["id" => 11, "text" => 'Membantu membuat patung peringatan terhadap terjadinya musibah.'],
                            ["id" => 12, "text" => 'Menjadi anggota paduan suara untuk mencari dana kemanusiaan.'],
                        ]
                    ]
                ],
                "scoring" => [
                    1 => "literacy",
                    2 => "social service",
                    3 => "clenical",
                    4 => "practical",
                    5 => "medical",
                    6 => "outdoor",
                    7 => "mechanical",
                    8 => "computational",
                    9 => "scientific",
                    10 => "personal contact",
                    11 => "aesthetic",
                    12 => "musical",

                ]
            ],
        ];

        foreach ($questions as $questionData) {
            // Menggunakan updateOrCreate untuk menghindari duplikasi jika seeder dijalankan lagi
            Question::updateOrCreate(
                [
                    'section_id' => $questionData['section_id'],
                    'order' => $questionData['order'],
                ],
                $questionData
            );
        }
    }
}
