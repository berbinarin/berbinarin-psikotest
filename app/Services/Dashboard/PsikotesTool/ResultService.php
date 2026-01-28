<?php

namespace App\Services\Dashboard\PsikotesTool;

use App\Models\Attempt;
use App\Models\Tool;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ResultService
{
    public function resultData(Tool $tool, Attempt $attempt)
    {
        $methodName = Str::camel(strtolower($tool->name));
        return $this->{$methodName}($attempt);
    }

    /**
     * Beri nama  Method / Function di bawah ini dengan bentuk camel case dari data yang ada di PsikotesTool->namespace
     * Contoh : 'DASS-42' -> 'dass42', 'Papi Kostick' -> 'papiKostick'
     *  */

    private function papiKostick(Attempt $attempt)
    {
        // 1. Load semua response beserta pertanyaan terkait
        $attempt->load('responses.question', 'user');

        // 2. Inisialisasi papan skor untuk 20 kategori
        $categories = ['F', 'W', 'N', 'G', 'A', 'L', 'P', 'I', 'T', 'V', 'O', 'B', 'S', 'X', 'C', 'D', 'R', 'Z', 'E', 'K',];

        $scores = collect($categories)->mapWithKeys(fn($key) => [$key => 0]);

        // 3. Lakukan iterasi pada setiap jawaban user untuk menghitung skor mentah
        foreach ($attempt->responses as $response) {
            if (!isset($response->question) || !isset($response->question->scoring)) {
                continue;
            }

            if (!isset($response->answer['choice'])) {
                continue;
            }

            $userChoice = $response->answer['choice']; // 'A' atau 'B'
            $category = $response->question->scoring[$userChoice] ?? null;

            if ($category && $scores->has($category)) {
                // --- PERBAIKAN UTAMA ADA DI SINI ---
                // Pola yang Benar: Get, Modify, Put.

                // 1. Get: Ambil skor saat ini
                $currentScore = $scores->get($category);

                // 2. Modify: Tambah nilainya
                $newScore = $currentScore + 1;

                // 3. Put: Simpan kembali skor yang baru ke dalam collection
                $scores->put($category, $newScore);
                // --- AKHIR PERBAIKAN ---
            }
        }

        // 4. Definisikan deskripsi, nama, dan kategori utama untuk setiap skor
        $descriptionMapping = $this->getPapiKostickDescriptionMapping();
        $finalResult = collect();

        foreach ($scores as $category => $score) {
            $mapping = $descriptionMapping[$category];
            $description = 'Deskripsi tidak ditemukan.';

            foreach ($mapping['ranges'] as $range => $desc) {
                // Cek apakah range mengandung tanda hubung '-'
                if (strpos($range, '-') !== false) {
                    // Jika iya, pecah menjadi nilai min dan max
                    list($min, $max) = explode('-', $range);
                } else {
                    // Jika tidak, berarti itu angka tunggal. Set min dan max ke nilai yang sama.
                    $min = $range;
                    $max = $range;
                }

                // Lakukan perbandingan (sekarang aman untuk semua format)
                if ($score >= $min && $score <= $max) {
                    $description = $desc;
                    break;
                }
            }

            $finalResult->push([
                'main_category' => $mapping['main_category'],
                'sub_code' => $category,
                'sub_name' => $mapping['sub_name'],
                'score' => $score,
                'description' => $description,
            ]);
        }

        return $finalResult;
    }

    /**
     * Helper method untuk menyimpan data deskripsi Papi Kostick.
     * Idealnya, data ini bisa disimpan di database atau file config.
     */
    private function getPapiKostickDescriptionMapping()
    {
        return [
            'F' => [
                'main_category' => 'Followership',
                'sub_name' => 'Need to support authority',
                'ranges' => [
                    '0-3' => 'Otonom, dapat bekerja sendiri tanpa campur tangan orang lain, motivasi timbul karena pekerjaan itu sendiri, bukan karena pujian dari otoritas. Mempertanyakan otoritas, cenderung tidak puas terhadap atasan, loyalitas lebih didasari kepentingan pribadi.',
                    '4-6' => 'Loyal pada Perusahaan.',
                    '7' => 'Loyal pada pribadi atasan.',
                    '8-9' => 'Loyal, berusaha dekat dengan pribadi atasan, ingin menyenangkan atasan, sadar akan harapan atasan akan dirinya. Terlalu memperhatikan cara menyenangkan atasan, tidak berani berpendirian lain, tidak mandiri.'
                ]
            ],
            'W' => [
                'main_category' => 'Followership',
                'sub_name' => 'Need for rules and supervision',
                'ranges' => [
                    '0-3' => 'Hanya butuh gambaran tentang kerangka tugas secara garis besar, berpatokan pada tujuan, dapat bekerja dalam suasana yang kurang berstruktur, berinisiatif, mandiri. Tidak patuh, cenderung mengabaikan atau tidak paham pentingnya peraturan atau prosedur, suka membuat peraturan sendiri yang bisa bertentangan dengan yang telah ada.',
                    '4-5' => 'Perlu pengarahan awal dan tolok ukur keberhasilan.',
                    '6-7' => 'Membutuhkan uraian rinci mengenai tugas, dan batasan tanggung jawab serta wewenang.',
                    '8-9' => 'Patuh pada kebijaksanaan, peraturan dan struktur organisasi. Ingin segala sesuatunya diuraikan secara rinci, kurang memiliki inisiatif, tdk fleksibel, terlalu tergantung pada organisasi, berharap \'disuapi\'.'
                ]
            ],
            'N' => [
                'main_category' => 'Work Direction',
                'sub_name' => 'Need to finish task',
                'ranges' => [
                    '0-2' => 'Tidak terlalu merasa perlu untuk menuntaskan sendiri tugas-tugasnya, senang menangani beberapa pekerjaan sekaligus, mudah mendelegasikan tugas. Komitmen rendah, cenderung meninggalkan tugas sebelum tuntas, konsentrasi mudah buyar, mungkin suka berpindah pekerjaan.',
                    '3-5' => 'Cukup memiliki komitmen untuk menuntaskan tugas, akan tetapi jika memungkinkan akan mendelegasikan sebagian dari pekerjaannya kepada orang lain.',
                    '6-7' => 'Komitmen tinggi, lebih suka menangani pekerjaan satu demi satu, akan tetapi masih dapat mengubah prioritas jika terpaksa.',
                    '8-9' => 'Memiliki komitmen yg sangat tinggi terhadap tugas, sangat ingin menyelesaikan tugas, tekun dan tuntas dalam menangani pekerjaan satu demi satu hingga tuntas. Perhatian terpaku pada satu tugas, sulit untuk menangani beberapa pekerjaan sekaligus, sulit di interupsi, tidak melihat masalah sampingan.'
                ]
            ],
            'G' => [
                'main_category' => 'Work Direction',
                'sub_name' => 'Hard intense worked',
                'ranges' => [
                    '0-2' => 'Santai, kerja adalah sesuatu yang menyenangkan-bukan beban yang membutuhkan usaha besar. Mungkin termotivasi untuk mencari cara atau sistem yang dapat mempermudah dirinya dalam menyelesaikan pekerjaan, akan berusaha menghindari kerja keras, sehingga dapat memberi kesan malas.',
                    '3-4' => 'Bekerja keras sesuai tuntutan, menyalurkan usahanya untuk hal-hal yang bermanfaat atau menguntungkan.',
                    '5-7' => 'Bekerja keras, tetapi jelas tujuan yg ingin dicapainya.',
                    '8-9' => 'Ingin tampil sebagai pekerja keras, sangat suka bila orang lain memandangnya sbg pekerja keras. Cenderung menciptakan pekerjaan yang tidak perlu agar terlihat tetap sibuk, kadang kala tanpa tujuan yang jelas.'
                ]
            ],
            'A' => [
                'main_category' => 'Work Direction',
                'sub_name' => 'Need to achieve',
                'ranges' => [
                    '0-4' => 'Tidak kompetitif, mapan, puas. Tidak terdorong untuk menghasilkan prestasi,tidak berusaha untuk mencapai sukses, membutuhkan dorongan dari luar diri, tidak berinisiatif, tidak memanfaatkan kemampuan diri secara optimal, ragu akan tujuan diri, misalnya sebagai akibat promosi atau perubahan struktur jabatan.',
                    '5-7' => 'Tahu akan tujuan yang ingin dicapainya dan dapat merumuskannya, realistis akan kemampuan diri, dan berusaha untuk mencapai target.',
                    '8-9' => 'Sangat berambisi untuk berprestasi dan menjadi yang terbaik, menyukai tantangan, cenderung mengejar kesempurnaan, menetapkan target yang tinggi, \'self-starter\', merumuskan kerja dengan baik. Tidak realistis akan kemampuannya, sulit dipuaskan, mudah kecewa, harapan yang tinggi mungkin mengganggu orang lain.'
                ]
            ],
            'L' => [
                'main_category' => 'Leadership',
                'sub_name' => 'Leadership role',
                'ranges' => [
                    '0-1' => 'Puas dengan peran sebagai bawahan, memberikan kesempatan pada orang lain untuk memimpin, tidak dominan. Tidak percaya diri. Sama sekali tidak berminat untuk berperan sebagai pemimpin. Bersikap pasif dalam kelompok.',
                    '2-3' => 'Tidak percaya diri dan tidak ingin memimpin atau mengawasi orang lain.',
                    '4' => 'Kurang percaya diri dan kurang berminat untuk menjadi pemimpin.',
                    '5' => 'Cukup percaya diri, tidak secara aktif mencari posisi kepemimpinan akan tetapi juga tidak akan menghindarinya.',
                    '6-7' => 'Percaya diri dan ingin berperan sebagai pemimpin.',
                    '8-9' => 'Sangat percaya diri untuk berperan sebagai atasan dan sangat mengharapkan posisi tersebut. Lebih mementingkan citra dan status kepemimpinan dari pada efektifitas kelompok, mungkin akan tampil angkuh atau terlalu percaya diri.'
                ]
            ],
            'P' => [
                'main_category' => 'Leadership',
                'sub_name' => 'Need to control others',
                'ranges' => [
                    '0-1' => 'Permisif, akan memberikan kesempatan pada orang lain untuk memimpin. Tidak mau mengontrol orang lain dan tidak mau mempertanggung jawabkan hasil kerja bawahannya.',
                    '2-3' => 'Enggan mengontrol org lain dan tidak mau mempertanggung jawabkan hasil kerja bawahannya, lebih memberi kebebasan kepada bawahan untuk memilih cara sendiri dalam penyelesaian tugas dan meminta bawahan untuk mempertanggungjawabkan hasilnya masing-masing.',
                    '4' => 'Cenderung enggan melakukan fungsi pengarahan, pengendalian dan pengawasan, kurang aktif memanfaatkan kapasitas bawahan secara optimal, cenderung bekerja sendiri dalam mencapai tujuan kelompok.',
                    '5' => 'Bertanggung jawab, akan melakukan fungsi pengarahan, pengendalian dan pengawasan, tapi tidak mendominasi.',
                    '6-7' => 'Dominan dan bertanggung jawab, akan melakukan fungsi pengarahan, pengendalian dan pengawasan.',
                    '8-9' => 'Sangat dominan, sangat mempengaruhi dan mengawasi orang lain, bertanggung jawab atas tindakan dan hasil kerja bawahan. Posesif, tidak ingin berada di bawah pimpinan org lain, cemas bila tidak berada di posisi pemimpin, mungkin sulit untuk bekerja sama dengan rekan yang sejajar kedudukannya.'
                ]
            ],
            'I' => [
                'main_category' => 'Leadership',
                'sub_name' => 'Ease in decision making',
                'ranges' => [
                    '0-1' => 'Sangat berhati-hati, memikirkan langkah-langkahnya secara bersungguh-sungguh. Lamban dalam mengambil keputusan, terlalu lama merenung, cenderung menghindar mengambil keputusan.',
                    '2-3' => 'Enggan mengambil keputusan.',
                    '4-5' => 'Berhati - hati dalam pengambilan keputusan.',
                    '6-7' => 'Cukup percaya diri dalam pengambilan keputusan, mau mengambil resiko, dapat memutuskan dengan cepat, mengikuti alur logika.',
                    '8-9' => 'Sangat yakin dalam mengambil keputusan, cepat tanggap terhadap situasi, berani mengambil resiko, mau memanfaatkan kesempatan. Impulsif, dapat membuat keputusan yang tidak praktis, cenderung lebih mementingkan kecepatan daripada akurasi, tidak sabar, cenderung meloncat pada keputusan.'
                ]
            ],
            'T' => [
                'main_category' => 'Activity',
                'sub_name' => 'Pace',
                'ranges' => [
                    '0-3' => 'Santai. Kurang peduli akan waktu, kurang memiliki rasa urgensi, membuang-buang waktu, bukan pekerja yang tepat waktu.',
                    '4-6' => 'Cukup aktif dalam segi mental, dapat menyesuaikan tempo kerjanya dengan tuntutan pekerjaan atau lingkungan.',
                    '7-9' => 'Cekatan, selalu siaga, bekerja cepat, ingin segera menyelesaikan tugas. Negatifnya: Tegang, cemas, impulsif, mungkin ceroboh, banyak gerakan yang tidak perlu.'
                ]
            ],
            'V' => [
                'main_category' => 'Activity',
                'sub_name' => 'Vigorous type',
                'ranges' => [
                    '0-2' => 'Cocok untuk pekerjaan \'di belakang meja\'. Cenderung lamban, tidak tanggap, mudah lelah, daya tahan lemah.',
                    '3-6' => 'Dapat bekerja di belakang meja dan senang jika sesekali harus terjun ke lapangan atau melaksanakan tugas-tugas yang bersifat mobile.',
                    '7-9' => 'Menyukai aktifitas fisik ( a.l. : olah raga), enerjik, memiliki stamina untuk menangani tugas-tugas berat, tidak mudah lelah. Tidak betah duduk lama, kurang dapat konsentrasi \'di belakang meja\'.'
                ]
            ],
            'O' => [
                'main_category' => 'Social Nature',
                'sub_name' => 'Need for closeness and affection',
                'ranges' => [
                    '0-2' => 'Menjaga jarak, lebih memperhatikan hal-hal kedinasan, tidak mudah dipengaruhi oleh individu tertentu, objektif dan analitis. Tampil dingin, tidak acuh, tidak ramah, suka berahasia, mungkin tidak sadar akan perasaan orang lain & mungkin sulit menyesuaikan diri.',
                    '3-5' => 'Tidak mencari atau menghindari hubungan antar pribadi di lingkungan kerja, masih mampu menjaga jarak.',
                    '6-9' => 'Peka akan kebutuhan org lain, sangat memikirkan hal-hal yang dibutuhkan orang lain, suka menjalin hubungan persahabatan yang hangat dan tulus. Sangat perasa, mudah tersinggung, cenderung subjektif, dapat terlibat terlalu dlam atau intim dengan individu tertentu dalam pekerjaan, sangat tergantung pada individu tertentu.'
                ]
            ],
            'B' => [
                'main_category' => 'Social Nature',
                'sub_name' => 'Need to belong to groups',
                'ranges' => [
                    '0-2' => 'Mandiri (dari segi emosi), tidak mudah dipengaruhi oleh tekanan kelompok. Penyendiri, kurang peka akan sikap dan kebutuhan kelompok, mungkin sulit menyesuaikan diri.',
                    '3-5' => 'Selektif dalam bergabung dengan kelompok, hanya mau berhubungan dengan kelompok di lingkungan kerja apabila bernilai dan sesuai minat, tidak terlalu mudah dipengaruhi.',
                    '6-9' => 'Suka bergabung dalam kelompok, sadar akan sikap dan kebutuhan kelompok, suka bekerja sama, ingin menjadi bagian dari kelompok, ingin disukai dan diakui oleh lingkungan. Sangat tergantung pada kelompok, lebih memperhatikan kebutuhan kelompok daripada pekerjaan.'
                ]
            ],
            'S' => [
                'main_category' => 'Social Nature',
                'sub_name' => 'Social extension',
                'ranges' => [
                    '0-2' => 'Dapat bekerja sendiri, tidak membutuhkan kehadiran orang lain. Menarik diri, kaku dalam bergaul, canggung dalam situasi sosial, lebih memperhatikan hal - hal lain daripada manusia.',
                    '3-4' => 'Kurang percaya diri dan kurang aktif dlm menjalin hubungan sosial.',
                    '5-9' => 'Percaya diri dan sangat senang bergaul, menyukai interaksi sosial, bisa menciptakan suasana yang menyenangkan, mempunyai inisiatif dan mampu menjalin hubungan dan komunikasi, memperhatikan org lain. Mungkin membuang-buang waktu untuk aktifitas sosial, kurang peduli akan penyelesaian tugas.'
                ]
            ],
            'X' => [
                'main_category' => 'Social Nature',
                'sub_name' => 'Need to be noticed',
                'ranges' => [
                    '0-1' => 'Sederhana, rendah hati, tulus, tidak sombong dan tidak suka menampilkan diri. Terlalu sederhana, cenderung merendahkan kapasitas diri, tidak percaya diri, cenderung menarik diri dan pemalu.',
                    '2-3' => 'Sederhana, cenderung diam, cenderung pemalu, tidak suka menonjolkan diri.',
                    '4-5' => 'Mengharapkan pengakuan lingkungan dan tidak mau diabaikan tetapi tidak mencari-cari perhatian.',
                    '6-9' => 'Bangga akan diri dan gayanya sendiri, senang menjadi pusat perhatian, mengharapkan penghargaan dari lingkungan. Mencari-cari perhatian dan suka menyombongkan diri.'
                ]
            ],
            'C' => [
                'main_category' => 'Work Style',
                'sub_name' => 'Organized type',
                'ranges' => [
                    '0-2' => 'Lebih mementingkan fleksibilitas daripada struktur, pendekatan kerja lebih ditentukan oleh situasi daripada oleh perencanaan sebelumnya, mudah beradaptasi. Tidak mempedulikan keteraturan atau kerapihan, ceroboh.',
                    '3-4' => 'Fleksibel tapi masih cukup memperhatikan keteraturan atau sistematika kerja.',
                    '5-6' => 'Memperhatikan keteraturan dan sistematika kerja, tapi cukup fleksibel.',
                    '7-9' => 'Sistematis, bermetoda, berstruktur, rapi dan teratur, dapat menata tugas dengan baik. Cenderung kaku, tidak fleksibel.'
                ]
            ],
            'D' => [
                'main_category' => 'Work Style',
                'sub_name' => 'Interest in working with details',
                'ranges' => [
                    '0-1' => 'Melihat pekerjaan secara makro, membedakan hal penting dari yang kurang penting, mendelegasikan detil pada orang lain, generalis. Menghindari detail, konsekuensinya mungkin bertindak tanpa data yang cukup atau akurat, bertindak ceroboh pada hal yang butuh kecermatan. Dapat mengabaikan proses yang vital dalam evaluasi data.',
                    '2-3' => 'Cukup peduli akan akurasi dan kelengkapan data.',
                    '4-6' => 'Tertarik untuk menangani sendiri detail.',
                    '7-9' => 'Sangat menyukai detail, sangat peduli akan akurasi dan kelengkapan data. Cenderung terlalu terlibat dengan detail sehingga melupakan tujuan utama.'
                ]
            ],
            'R' => [
                'main_category' => 'Work Style',
                'sub_name' => 'Theoretical type',
                'ranges' => [
                    '0-3' => 'Tipe pelaksana, praktis - pragmatis, mengandalkan pengalaman masa lalu dan intuisi. Bekerja tanpa perencanaan, mengandalkan perasaan.',
                    '4-5' => 'Pertimbangan mencakup aspek teoritis (konsep atau pemikiran baru) dan aspek praktis (pengalaman) secara berimbang.',
                    '6-7' => 'Suka memikirkan suatu masalah secara mendalam, merujuk pada teori dan konsep.',
                    '8-9' => 'Tipe pemikir, sangat berminat pada gagasan, konsep, teori,mencari alternatif baru, menyukai perencanaan. Mungkin sulit dimengerti oleh orang lain, terlalu teoritis dan tidak praktis, mengawang-awang dan berbelit-belit.'
                ]
            ],
            'Z' => [
                'main_category' => 'Temprament',
                'sub_name' => 'Need for change',
                'ranges' => [
                    '0-1' => 'Mudah beradaptasi dengan pekerjaan rutin tanpa merasa bosan, tidak membutuhkan variasi, menyukai lingkungan stabil dan tidak berubah. Konservatif, menolak perubahan, sulit menerima hal-hal baru, tidak dapat beradaptasi dengan situasi yang berbeda-beda.',
                    '2-3' => 'Enggan berubah, tidak siap untuk beradaptasi, hanya mau menerima perubahan jika alasannya jelas dan meyakinkan.',
                    '4-5' => 'Mudah beradaptasi, cukup menyukai perubahan.',
                    '6-7' => 'Antusias terhadap perubahan dan akan mencari hal-hal baru, tetapi masih selektif (menilai kemanfaatannya ).',
                    '8-9' => 'Sangat menyukai perubahan, gagasan baru atau variasi, aktif mencari perubahan, antusias dengan hal-hal baru, fleksibel dalam berpikir, mudah beradaptasi pada situasi yang berbeda-beda. Gelisah, frustasi, mudah bosan, sangat membutuhkan variasi, tidak menyukai tugas atau situasi yang rutin-monoton.'
                ]
            ],
            'E' => [
                'main_category' => 'Temprament',
                'sub_name' => 'Emotional resistant',
                'ranges' => [
                    '0-1' => 'Sangat terbuka, terus terang, mudah terbaca (dari air muka, tindakan, perkataan, sikap). Tidak dapat mengendalikan emosi, cepat bereaksi, kurang mengindahkan atau tidak mempunyai \'nilai\' yang mengharuskannya menahan emosi.',
                    '2-3' => 'Terbuka, mudah mengungkap pendapat atau perasaannya mengenai suatu hal kepada org lain.',
                    '4-6' => 'Mampu mengungkap atau menyimpan perasaan, dapat mengendalikan emosi.',
                    '7-9' => 'Mampu menyimpan pendapat atau perasaannya, tenang, dapat mengendalikan emosi, menjaga jarak. Tampil pasif dan tidak acuh, mungkin sulit mengungkapkan emosi atau perasaan atau pandangan.'
                ]
            ],
            'K' => [
                'main_category' => 'Temprament',
                'sub_name' => 'Need to be forceful',
                'ranges' => [
                    '0-1' => 'Sabar, tidak menyukai konflik. Mengelak atau menghindar dari konflik, pasif, menekan atau menyembunyikan perasaan sesungguhnya, menghindari konfrontasi, lari dari konflik, tidak mau mengakui adanya konflik.',
                    '2-3' => 'Lebih suka menghindari konflik, akan mencari rasionalisasi untuk dapat menerima situasi dan melihat permasalahan dari sudut pandang orang lain.',
                    '4-5' => 'Tidak mencari atau menghindari konflik. Mau mendengarkan pandangan orang lain tetapi dapat menjadi keras kepala saat mempertahankan pandangannya.',
                    '6-7' => 'Akan menghadapi konflik, mengungkapkan serta memaksakan pandangan dengan cara positif.',
                    '8-9' => 'Terbuka, jujur, terus terang, asertif, agresif, reaktif, mudah tersinggung, mudah meledak, curiga, berprasangka, suka berkelahi atau berkonfrontasi, berpikir negatif.'
                ]
            ],
        ];
    }

    private function baum(Attempt $attempt)
    {
        $attempt->load('responses.question', 'user');

        $results = collect();

        foreach ($attempt->responses as $response) {
            if (!isset($response->question)) {
                continue;
            }

            $imagePath = $response->answer['file_path'] ?? null;
            $userName = $attempt->user->name ?? '-';

            $results->push([
                'question_id' => $response->question->id,
                'image' => $imagePath,
                'order' => $response->question->order,
                'user_name' => $userName,
            ]);
        }

        return $results->sortBy('order')->values();
    }

    private function dap(Attempt $attempt)
    {
        $attempt->load('responses.question', 'user');

        $dapImages = collect();

        foreach ($attempt->responses as $response) {
            if ($response->question && $response->question->type === 'image_upload') {
                if (isset($response->answer['image_path'])) {
                    $dapImages->push([
                        'question_id' => $response->question->id,
                        'question_text' => $response->question->text,
                        'image_url' => asset('storage/' . $response->answer['image_path']),
                        'response_id' => $response->id,
                        'submitted_at' => $response->created_at,
                    ]);
                }
            }
        }

        return $dapImages;
    }

    private function htp(Attempt $attempt)
    {
        $attempt->load('responses.question', 'user');

        $results = collect();

        foreach ($attempt->responses as $response) {
            if (!isset($response->question)) {
                continue;
            }

            $imagePath = $response->answer['file_path'] ?? null;
            $userName = $attempt->user->name ?? '-';

            $results->push([
                'question_id' => $response->question->id,
                'image' => $imagePath,
                'order' => $response->question->order,
                'user_name' => $userName,
            ]);
        }

        return $results->sortBy('order')->values();
    }

    private function ssct(Attempt $attempt)
    {
        $attempt->load('responses.question');

        $results = collect();

        foreach ($attempt->responses as $response) {
            if (!isset($response->question)) {
                continue;
            }

            $questionText = $response->question->text;

            $answerContent = $response->answer['value'];

            $results->push([
                'question_id' => $response->question->id,
                'question' => $questionText,
                'answer' => $answerContent,
                'order' => $response->question->order,
            ]);
        }

        return $results->sortBy('order')->values();
    }

    private function hexacoDescriptionMapping()
    {
        return [
            "honesty_humility" => [
                "label" => "Honesty-Humility",
                "description" => [
                    "low" => "Individu dengan skor yang sangat rendah lebih suka menyanjung atau memanipulasi orang lain demi mendapatkan apa yang diinginkan, cenderung melanggar aturan demi keuntungan pribadi, sangat termotivasi oleh kepentingan materi, serta memiliki rasa penting diri yang berlebihan.",
                    "high" => "Orang dengan skor yang sangat tinggi pada dimensi Honesty–Humility cenderung menghindari manipulasi untuk keuntungan pribadi, tidak mudah tergoda untuk melanggar aturan, tidak tertarik pada kekayaan berlebih maupun kemewahan, serta tidak merasa berhak atas status sosial yang lebih tinggi dari orang lain."
                ],
                "sub_categories" => [
                    "sincerity" => [
                        "label" => "Sincerity",
                        "description" => [
                            "low" => "Ini menilai kecenderungan seseorang untuk bersikap tulus dalam hubungan interpersonal. Individu dengan skor rendah biasanya akan memuji secara berlebihan atau berpura-pura menyukai orang lain demi memperoleh keuntungan tertentu.",
                            "high" => "Ini menilai kecenderungan seseorang untuk bersikap tulus dalam hubungan interpersonal. Individu skor tinggi cenderung enggan memanipulasi orang lain."
                        ]
                    ],
                    "fairness" => [
                        "label" => "Fairness",
                        "description" => [
                            "low" => "Ini menilai kecenderungan untuk menghindari kecurangan dan korupsi. Individu dengan skor rendah bersedia mendapatkan keuntungan dengan cara curang atau bahkan mencuri.",
                            "high" => "Ini menilai kecenderungan untuk menghindari kecurangan dan korupsi. Individu dengan skor tinggi menolak untuk mengambil keuntungan dengan merugikan orang lain maupun masyarakat secara keseluruhan."
                        ]
                    ],
                    "greed_avoidance" => [
                        "label" => "Greed Avoidance",
                        "description" => [
                            "low" => "Ini menilai kecenderungan untuk tidak terlalu tertarik pada kekayaan berlimpah, barang mewah, atau simbol status sosial. Individu dengan skor rendah cenderung ingin menikmati serta memamerkan kekayaan dan hak istimewa.",
                            "high" => "Ini menilai kecenderungan untuk tidak terlalu tertarik pada kekayaan berlimpah, barang mewah, atau simbol status sosial. Individu dengan skor tinggi tidak terlalu termotivasi oleh faktor finansial maupun status sosial."
                        ]
                    ],
                    "modesty" => [
                        "label" => "Modesty",
                        "description" => [
                            "low" => "Ini menilai kecenderungan untuk bersikap rendah hati dan tidak berlebihan dalam menampilkan diri. Individu dengan skor rendah biasanya memandang diri mereka lebih unggul dan merasa berhak atas perlakuan khusus yang tidak dimiliki orang lain.",
                            "high" => "Ini menilai kecenderungan untuk bersikap rendah hati dan tidak berlebihan dalam menampilkan diri. Individu dengan skor tinggi melihat dirinya sebagai orang biasa tanpa klaim atas perlakuan istimewa."
                        ]
                    ],
                ]
            ],
            "emotionality" => [
                "label" => "Emotionality",
                "description" => [
                    "low" => "Orang dengan skor sangat rendah tidak mudah terhalang oleh ancaman fisik, jarang merasa cemas meskipun berada dalam situasi yang penuh tekanan, tidak merasa perlu berbagi masalah dengan orang lain, dan cenderung bersikap dingin atau terlepas secara emosional dari orang lain.",
                    "high" => "Individu dengan skor sangat tinggi pada dimensi Emotionality biasanya mudah merasakan ketakutan terhadap bahaya fisik, mengalami kecemasan ketika menghadapi tekanan hidup, membutuhkan dukungan emosional dari orang lain, serta menunjukkan empati dan ikatan sentimental yang kuat terhadap sesama."
                ],
                "sub_categories" => [
                    "fearfulness" => [
                        "label" => "Fearfulness",
                        "description" => [
                            "low" => "Ini menggambarkan kecenderungan seseorang dalam merasakan rasa takut. Individu dengan skor rendah cenderung tidak banyak merasa takut terhadap bahaya atau cedera, mereka relatif tangguh, berani, serta kurang peka terhadap rasa sakit fisik.",
                            "high" => "Ini menggambarkan kecenderungan seseorang dalam merasakan rasa takut. Individu dengan skor tinggi sangat cenderung untuk menghindari bahaya fisik dan lebih rentan terhadap rasa takut."
                        ]
                    ],
                    "anxiety" => [
                        "label" => "Anxiety",
                        "description" => [
                            "low" => "Ini menilai kecenderungan untuk merasa khawatir dalam berbagai situasi. Individu dengan skor rendah biasanya tidak mudah merasa tertekan ketika menghadapi kesulitan.",
                            "high" => "Ini menilai kecenderungan untuk merasa khawatir dalam berbagai situasi. Individu dengan skor tinggi cenderung larut dalam kekhawatiran bahkan terhadap masalah yang relatif kecil."
                        ]
                    ],
                    "dependence" => [
                        "label" => "Dependence",
                        "description" => [
                            "low" => "Ini menggambarkan kebutuhan seseorang akan dukungan emosional dari orang lain. Individu dengan skor rendah merasa cukup percaya diri dan mampu menghadapi masalah tanpa bantuan atau nasihat orang lain.",
                            "high" => "Ini menggambarkan kebutuhan seseorang akan dukungan emosional dari orang lain. Individu dengan skor tinggi lebih suka berbagi kesulitan mereka dengan orang-orang yang dapat memberikan dorongan dan kenyamanan."
                        ]
                    ],
                    "sentimentality" => [
                        "label" => "Sentimentality",
                        "description" => [
                            "low" => "Ini menilai kecenderungan untuk merasakan ikatan emosional yang kuat dengan orang lain. Individu dengan skor rendah biasanya kurang terpengaruh secara emosional ketika berpisah atau menghadapi masalah orang lain.",
                            "high" => "Ini menilai kecenderungan untuk merasakan ikatan emosional yang kuat dengan orang lain. Individu dengan skor tinggi menunjukkan keterikatan emosional yang mendalam serta memiliki kepekaan empatik terhadap perasaan orang lain."
                        ]
                    ],
                ]
            ],
            "extraversion" => [
                "label" => "Extraversion",
                "description" => [
                    "low" => "Individu dengan skor sangat rendah cenderung merasa dirinya tidak populer, merasa canggung ketika menjadi pusat perhatian, kurang tertarik pada kegiatan sosial, serta lebih jarang mengalami semangat atau optimisme dibandingkan orang lain.",
                    "high" => "Mereka yang memiliki skor sangat tinggi pada dimensi Extraversion umumnya memiliki pandangan positif terhadap diri sendiri, percaya diri ketika memimpin atau berbicara di depan umum, menikmati interaksi sosial, serta merasakan antusiasme dan energi positif dalam kehidupan sehari-hari."
                ],
                "sub_categories" => [
                    "social_self_esteem" => [
                        "label" => "Social Self-Esteem",
                        "description" => [
                            "low" => "Ini menilai kecenderungan seseorang untuk memiliki pandangan positif terhadap diri sendiri, khususnya dalam konteks sosial. Individu dengan skor rendah cenderung merasa tidak berharga, memiliki pandangan negatif terhadap diri, dan melihat dirinya sebagai sosok yang kurang disukai.",
                            "high" => "Ini menilai kecenderungan seseorang untuk memiliki pandangan positif terhadap diri sendiri, khususnya dalam konteks sosial. Individu dengan skor tinggi umumnya merasa puas dengan dirinya sendiri, memiliki rasa percaya diri, serta menganggap diri mereka memiliki kualitas yang menyenangkan di mata orang lain."
                        ]
                    ],
                    "social_boldness" => [
                        "label" => "Social Boldness",
                        "description" => [
                            "low" => "Ini menggambarkan kenyamanan dan rasa percaya diri dalam berbagai situasi sosial. Individu dengan skor rendah biasanya merasa pemalu, canggung, atau kurang nyaman ketika harus memimpin maupun berbicara di depan umum.",
                            "high" => "Ini menggambarkan kenyamanan dan rasa percaya diri dalam berbagai situasi sosial. Individu dengan skor tinggi cenderung percaya diri, berani mendekati orang asing, serta tidak ragu untuk berbicara di dalam kelompok."
                        ]
                    ],
                    "sociability" => [
                        "label" => "Sociability",
                        "description" => [
                            "low" => "Ini mengukur kecenderungan untuk menikmati percakapan, interaksi sosial, dan kegiatan bersama. Individu dengan skor rendah lebih menyukai aktivitas soliter dan jarang mencari interaksi sosial.",
                            "high" => "Ini mengukur kecenderungan untuk menikmati percakapan, interaksi sosial, dan kegiatan bersama. Individu dengan skor tinggi sangat menikmati berbincang, berkunjung, maupun menghadiri acara sosial, serta merasa lebih bersemangat saat bersama orang lain."
                        ]
                    ],
                    "liveliness" => [
                        "label" => "Liveliness",
                        "description" => [
                            "low" => "Ini menilai tingkat antusiasme dan energi yang dimiliki seseorang dalam kehidupan sehari-hari. Individu dengan skor rendah biasanya tidak terlalu ceria atau dinamis, serta cenderung lebih datar dalam suasana hati.",
                            "high" => "Ini menilai tingkat antusiasme dan energi yang dimiliki seseorang dalam kehidupan sehari-hari. Individu dengan skor tinggi cenderung penuh optimisme, semangat, dan mudah merasakan kegembiraan dalam berbagai situasi."
                        ]
                    ],
                ]
            ],
            "agreeableness" => [
                "label" => "Agreeableness",
                "description" => [
                    "low" => "Mereka yang memiliki skor sangat rendah cenderung menyimpan dendam terhadap orang yang pernah menyakiti, kritis terhadap kelemahan orang lain, keras kepala mempertahankan sudut pandangnya, dan lebih mudah marah ketika merasa diperlakukan tidak adil.",
                    "high" => "Orang dengan skor yang sangat tinggi pada dimensi Agreeableness mudah memaafkan kesalahan orang lain, cenderung lunak dalam menilai, bersedia berkompromi dan bekerja sama, serta mampu mengendalikan emosi terutama amarah."
                ],
                "sub_categories" => [
                    "forgiveness" => [
                        "label" => "Forgivingness",
                        "description" => [
                            "low" => "Ini menilai kesediaan seseorang untuk kembali mempercayai dan menyukai orang lain, meskipun pernah disakiti. Individu dengan skor rendah cenderung menyimpan dendam terhadap mereka yang telah menyinggung atau merugikan dirinya.",
                            "high" => "Ini menilai kesediaan seseorang untuk kembali mempercayai dan menyukai orang lain, meskipun pernah disakiti. Individu dengan skor tinggi biasanya lebih mudah memaafkan, siap untuk kembali membangun kepercayaan, serta berusaha menjalin hubungan baik setelah diperlakukan tidak adil."
                        ]
                    ],
                    "gentleness" => [
                        "label" => "Gentleness",
                        "description" => [
                            "low" => "Ini menggambarkan kecenderungan untuk bersikap lembut, ramah, dan penuh toleransi dalam memperlakukan orang lain. Individu dengan skor rendah cenderung lebih kritis, sering menilai kekurangan orang lain, dan tidak segan mengungkapkan ketidaksetujuan.",
                            "high" => "Ini menggambarkan kecenderungan untuk bersikap lembut, ramah, dan penuh toleransi dalam memperlakukan orang lain. Individu dengan skor tinggi lebih lunak dalam menilai, enggan menghakimi secara keras, serta lebih bersikap toleran."
                        ]
                    ],
                    "flexibility" => [
                        "label" => "Flexibility",
                        "description" => [
                            "low" => "Ini menilai kesediaan seseorang untuk berkompromi dan bekerja sama dengan orang lain. Individu dengan skor rendah biasanya keras kepala, sulit mengalah, dan cenderung suka berdebat untuk mempertahankan pendapatnya.",
                            "high" => "Ini menilai kesediaan seseorang untuk berkompromi dan bekerja sama dengan orang lain. Individu dengan skor tinggi lebih mudah berkompromi, berusaha menghindari konflik, dan bersedia menyesuaikan diri bahkan terhadap pendapat yang dianggap tidak sepenuhnya masuk akal."
                        ]
                    ],
                    "patience" => [
                        "label" => "Patience",
                        "description" => [
                            "low" => "Ini menggambarkan sejauh mana seseorang mampu tetap tenang tanpa mudah marah. Individu dengan skor rendah cenderung cepat tersulut emosi dan mudah kehilangan kendali atas amarahnya.",
                            "high" => "Ini menggambarkan sejauh mana seseorang mampu tetap tenang tanpa mudah marah. Individu dengan skor tinggi memiliki ambang kesabaran yang tinggi, lebih mampu mengendalikan diri, dan jarang mengekspresikan kemarahan secara terbuka."
                        ]
                    ],
                ]
            ],
            "conscientiousness" => [
                "label" => "Conscientiousness",
                "description" => [
                    "low" => "Orang dengan skor yang sangat rendah cenderung tidak peduli pada keteraturan atau jadwal, menghindari tugas yang menantang, merasa cukup meskipun pekerjaannya mengandung kesalahan, serta sering membuat keputusan secara impulsif tanpa banyak pertimbangan.",
                    "high" => "Individu dengan skor sangat tinggi pada dimensi Conscientiousness umumnya teratur dalam mengelola waktu dan lingkungan, bekerja dengan disiplin untuk mencapai tujuan, berusaha teliti dan sempurna dalam menyelesaikan tugas, serta berhati-hati dalam membuat keputusan."
                ],
                "sub_categories" => [
                    "organization" => [
                        "label" => "Organization",
                        "description" => [
                            "low" => "Ini menilai kecenderungan seseorang untuk mencari dan menjaga keteraturan, khususnya dalam lingkungan fisik maupun cara bekerja. Individu dengan skor rendah cenderung berantakan, tidak teratur, dan menjalani aktivitas dengan cara yang sembarangan.",
                            "high" => "Ini menilai kecenderungan seseorang untuk mencari dan menjaga keteraturan, khususnya dalam lingkungan fisik maupun cara bekerja. Individu dengan skor tinggi lebih suka menjaga kebersihan, kerapihan, serta mengutamakan pendekatan yang terstruktur dalam menyelesaikan tugas."
                        ]
                    ],
                    "diligence" => [
                        "label" => "Diligence",
                        "description" => [
                            "low" => "Ini menggambarkan dorongan seseorang untuk bekerja keras dan berkomitmen pada pekerjaannya. Individu dengan skor rendah biasanya kurang memiliki disiplin diri, mudah menunda pekerjaan, dan tidak begitu termotivasi untuk mencapai tujuan.",
                            "high" => "Ini menggambarkan dorongan seseorang untuk bekerja keras dan berkomitmen pada pekerjaannya. Individu dengan skor tinggi memiliki etos kerja yang kuat, rajin, dan bersedia mengerahkan usaha lebih demi mencapai hasil yang diinginkan."
                        ]
                    ],
                    "perfectionism" => [
                        "label" => "Perfectionism",
                        "description" => [
                            "low" => "Ini menilai kecenderungan seseorang untuk teliti, cermat, dan memperhatikan detail. Individu dengan skor rendah cenderung mengabaikan kesalahan kecil, kurang memperhatikan detail, dan cepat merasa puas meskipun pekerjaannya tidak sempurna.",
                            "high" => "Ini menilai kecenderungan seseorang untuk teliti, cermat, dan memperhatikan detail. Individu dengan skor tinggi lebih hati-hati, memeriksa kembali pekerjaannya secara menyeluruh, dan berusaha mencari perbaikan sekecil apapun."
                        ]
                    ],
                    "prudence" => [
                        "label" => "Prudence",
                        "description" => [
                            "low" => "Ini menilai sejauh mana seseorang mempertimbangkan dengan matang sebelum bertindak serta mampu menahan dorongan impulsif. Individu dengan skor rendah biasanya bertindak secara spontan, mengikuti dorongan hati tanpa mempertimbangkan konsekuensinya.",
                            "high" => "Ini menilai sejauh mana seseorang mempertimbangkan dengan matang sebelum bertindak serta mampu menahan dorongan impulsif. Individu dengan skor tinggi lebih cermat dalam menimbang pilihan, berhati-hati, dan mampu mengendalikan diri agar tidak mengambil keputusan secara gegabah."
                        ]
                    ],
                ]
            ],
            "openness_to_experience" => [
                "label" => "Openness to Experience",
                "description" => [
                    "low" => "Individu dengan skor sangat rendah cenderung kurang terkesan oleh karya seni, memiliki rasa ingin tahu intelektual yang rendah, menghindari aktivitas kreatif, serta tidak tertarik pada gagasan yang dianggap aneh atau tidak konvensional.",
                    "high" => "Mereka yang memiliki skor sangat tinggi pada dimensi Openness to Experience biasanya mudah terhanyut dalam keindahan seni maupun alam, memiliki rasa ingin tahu yang besar terhadap berbagai bidang pengetahuan, bebas menggunakan imajinasi dalam kehidupan sehari-hari, dan tertarik pada ide atau orang yang tidak biasa."
                ],
                "sub_categories" => [
                    "aesthetic_appreciation" => [
                        "label" => "Aesthetic Appreciation",
                        "description" => [
                            "low" => "Ini menilai sejauh mana seseorang mampu menikmati keindahan seni maupun alam. Individu dengan skor rendah cenderung tidak mudah terpesona oleh karya seni atau keindahan alam, dan kurang memiliki ketertarikan pada pengalaman estetis.",
                            "high" => "Ini menilai sejauh mana seseorang mampu menikmati keindahan seni maupun alam. Individu  dengan skor tinggi memiliki kepekaan yang besar terhadap keindahan, menikmati beragam bentuk seni, serta mudah terhanyut oleh pesona alam maupun karya artistik."
                        ]
                    ],
                    "inquisitiveness" => [
                        "label" => "Inquisitiveness",
                        "description" => [
                            "low" => "Ini menggambarkan dorongan untuk mencari informasi dan pengalaman baru mengenai dunia alam maupun sosial. Individu dengan skor rendah biasanya kurang memiliki rasa ingin tahu terhadap ilmu pengetahuan atau fenomena sosial, serta tidak begitu tertarik menjelajahi hal-hal baru.",
                            "high" => "Ini menggambarkan dorongan untuk mencari informasi dan pengalaman baru mengenai dunia alam maupun sosial. Individu dengan skor tinggi gemar membaca, terbuka pada wawasan baru, serta memiliki ketertarikan untuk bepergian dan mengeksplorasi berbagai pengetahuan maupun budaya."
                        ]
                    ],
                    "creativity " => [
                        "label" => "Creativity ",
                        "description" => [
                            "low" => "Ini menilai kecenderungan seseorang untuk berpikir inovatif, bereksperimen, dan menghasilkan ide-ide baru. Individu dengan skor rendah biasanya kurang memiliki dorongan untuk berkreasi atau berpikir orisinal, lebih suka mengikuti pola yang sudah ada.",
                            "high" => "Ini menilai kecenderungan seseorang untuk berpikir inovatif, bereksperimen, dan menghasilkan ide-ide baru. Individu dengan skor tinggi gemar mencari solusi alternatif, mengekspresikan dirinya melalui seni atau karya kreatif, serta berani bereksperimen dengan gagasan baru."
                        ]
                    ],
                    "unconventionality " => [
                        "label" => "Unconventionality ",
                        "description" => [
                            "low" => "Ini menggambarkan penerimaan seseorang terhadap hal-hal yang tidak biasa atau berbeda dari norma. Individu dengan skor rendah biasanya menghindari orang-orang atau ide-ide yang dianggap eksentrik dan lebih nyaman dengan sesuatu yang umum atau sesuai aturan.",
                            "high" => "Ini menggambarkan penerimaan seseorang terhadap hal-hal yang tidak biasa atau berbeda dari norma. Individu dengan skor tinggi lebih terbuka pada pemikiran yang unik, berani menerima ide-ide yang tidak biasa, bahkan yang dianggap aneh atau radikal."
                        ]
                    ],
                ]
            ],
            "altruism" => [
                "label" => "Altruism",
                "is_independent" => true,
                "description" => [
                    "low" => "Skala ini mengukur kecenderungan seseorang untuk bersikap simpatik dan berhati lembut terhadap orang lain. Orang dengan skor rendah biasanya tidak terlalu terganggu dengan kemungkinan menyakiti orang lain dan dapat dipandang sebagai pribadi yang keras hati.",
                    "high" => "Skala ini mengukur kecenderungan seseorang untuk bersikap simpatik dan berhati lembut terhadap orang lain. Orang dengan skor tinggi berusaha menghindari tindakan yang dapat merugikan atau melukai, serta menunjukkan kemurahan hati dan kepedulian, terutama kepada mereka yang lemah atau membutuhkan bantuan."
                ]
            ],
        ];
    }

    private function getHexacoDescription(string $category, float $average, string $subCategory = null): ?string
    {
        $map = $this->hexacoDescriptionMapping()[$category] ?? null;
        if (!$map) return null;

        if ($subCategory && isset($map['sub_categories'][$subCategory])) {
            $subMap = $map['sub_categories'][$subCategory];
            return $average < 3.5 ? $subMap['description']['low'] : $subMap['description']['high'];
        }

        // fallback ke kategori utama
        return $average < 3.5 ? $map['description']['low'] : $map['description']['high'];
    }

    private function hexaco(Attempt $attempt)
    {
        $attempt->load('responses.question');

        $categories = [
            "honesty_humility",
            "emotionality",
            "extraversion",
            "agreeableness",
            "conscientiousness",
            "openness_to_experience",
            "altruism"
        ];

        // inisialisasi hasil (kategori + sub-kategori)
        $results = collect($categories)->mapWithKeys(function ($category) {
            return [$category => [
                'total_score' => 0,
                'question_count' => 0,
                'answer_distribution' => [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0],
                'average' => 0,
                'sub_categories' => []
            ]];
        });

        // Loop setiap response
        foreach ($attempt->responses as $response) {
            if (!isset($response->question) || !isset($response->question->scoring['scale'])) {
                continue;
            }

            // normalisasi nama biar aman (kalau di DB ada tanda "-")
            $scale = str_replace('-', '_', $response->question->scoring['scale']);
            $subScale = isset($response->question->scoring['sub_scale'])
                ? str_replace('-', '_', $response->question->scoring['sub_scale'])
                : null;

            $value = (int) $response->answer['value'];
            $isReversed = (bool) ($response->question->scoring['reverse_scored'] ?? false);

            if (!$results->has($scale)) {
                continue; // skip kalau kategori tidak dikenal
            }

            $scoredValue = $isReversed ? (6 - $value) : $value;

            // Ambil kategori
            $categoryData = $results->get($scale);

            // Update
            $categoryData['total_score'] += $scoredValue;
            $categoryData['question_count']++;

            if (isset($categoryData['answer_distribution'][$value])) {
                $categoryData['answer_distribution'][$value]++;
            }

            // Simpan kembali ke collection
            $results->put($scale, $categoryData);

            $subCategories = $categoryData['sub_categories'];

            if ($subScale) {
                if (!isset($subCategories[$subScale])) {
                    $subCategories[$subScale] = [
                        'total_score' => 0,
                        'question_count' => 0,
                        'average' => 0,
                        'answer_distribution' => [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0],
                    ];
                }

                $subCategories[$subScale]['total_score'] += $scoredValue;
                $subCategories[$subScale]['question_count']++;
                if (isset($subCategories[$subScale]['answer_distribution'][$value])) {
                    $subCategories[$subScale]['answer_distribution'][$value]++;
                }

                // Simpan kembali ke categoryData
                $categoryData['sub_categories'] = $subCategories;
            }

            // Simpan categoryData ke results
            $results->put($scale, $categoryData);
        }

        // Hitung rata-rata per sub-kategori & kategori
        $results = $results->map(function ($data) {
            if ($data['question_count'] > 0) {
                $data['average'] = round($data['total_score'] / $data['question_count'], 2);
            }

            $data['sub_categories'] = collect($data['sub_categories'])->map(function ($subData) {
                if ($subData['question_count'] > 0) {
                    $subData['average'] = round($subData['total_score'] / $subData['question_count'], 2);
                }
                return $subData;
            })->toArray();

            return $data;
        });

        // Tambahkan deskripsi berdasarkan rata-rata
        $results = $results->map(function ($data, $category) {
            if ($data['question_count'] > 0) {
                $data['average'] = round($data['total_score'] / $data['question_count'], 2);
                $data['description'] = $this->getHexacoDescription($category, $data['average']);
            }

            $data['sub_categories'] = collect($data['sub_categories'])->map(function ($subData, $subScale) use ($category) {
                if ($subData['question_count'] > 0) {
                    $subData['average'] = round($subData['total_score'] / $subData['question_count'], 2);
                    $subData['description'] = $this->getHexacoDescription($category, $subData['average'], $subScale);
                }
                return $subData;
            })->toArray();

            return $data;
        });

        return $results;
    }

    private function ocean(Attempt $attempt)
    {
        $attempt->load('responses.question');

        $categories = [
            "extraversion",
            "agreeableness",
            "neuroticism",
            "conscientiousness",
            "openness",
        ];

        $results = collect($categories)->mapWithKeys(function ($category) {
            return [$category => [
                'total_score' => 0,
                'question_count' => 0,
                'answer_distribution' => [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0],
            ]];
        });

        foreach ($attempt->responses as $response) {
            if (!isset($response->question) || !isset($response->question->scoring['scale'])) {
                continue;
            }

            $scale = $response->question->scoring['scale'];
            $value = (int) $response->answer['value'];
            $isReversed = (bool) ($response->question->scoring['reverse_scored'] ?? false);

            if ($results->has($scale)) {
                $categoryData = $results[$scale];

                $scoredValue = $isReversed ? (6 - $value) : $value;
                $categoryData['total_score'] += $scoredValue;
                $categoryData['question_count']++;

                if (isset($categoryData['answer_distribution'][$value])) {
                    $categoryData['answer_distribution'][$value]++;
                }

                $results->put($scale, $categoryData);
            }
        }

        return $results;
    }

    private function bdi(Attempt $attempt)
    {
        // 1. Load semua response + pertanyaan
        $attempt->load('responses.question', 'user');

        $totalScore = 0;

        $answerDistribution = [
            'A' => 0,
            'B' => 0,
            'C' => 0,
            'D' => 0,
        ];

        // 2. Iterasi setiap jawaban
        foreach ($attempt->responses as $response) {
            if (!isset($response->question) || !isset($response->question->scoring)) {
                continue;
            }

            $userChoice = $response->answer['choice'] ?? null;

            if ($userChoice && isset($response->question->scoring[$userChoice])) {
                $score = (int) $response->question->scoring[$userChoice];
                $totalScore += $score;

                // Tambahkan ke distribusi jawaban
                if (isset($answerDistribution[$userChoice])) {
                    $answerDistribution[$userChoice]++;
                }
            }
        }

        // 3. Tentukan deskripsi berdasarkan total skor
        $description = $this->getBdiDescription($totalScore);

        return [
            'total_score' => $totalScore,
            'description' => $description,
            'answer_distribution' => $answerDistribution,
        ];
    }

    private function getBdiDescription(int $score): string
    {
        // Range skor BDI (contoh, bisa disesuaikan dengan teori aslinya)
        if ($score >= 0 && $score <= 10) {
            return "Naik turunnya kondisi subjek masih dianggap normal/Sehat secara psikologis";
        } elseif ($score >= 11 && $score <= 16) {
            return "Gangguan mood ringan/Perlu meluangkan waktu untuk bertemu dengan psikolog";
        } elseif ($score >= 17 && $score <= 20) {
            return "Depresi klinis borderline/Perlu meluangkan waktu untuk bertemu dengan psikolog";
        } elseif ($score >= 21 && $score <= 30) {
            return "Depresi sedang/Perlu meluangkan waktu untuk bertemu dengan psikolog";
        } elseif ($score >= 31 && $score <= 40) {
            return "Depresi berat/Perlu meluangkan waktu untuk bertemu dengan psikolog";
        } elseif ($score > 40) {
            return "Depresi ekstrim/Perlu meluangkan waktu untuk bertemu dengan psikolog";
        }

        return "Deskripsi tidak ditemukan.";
    }

    private function dass42(Attempt $attempt)
    {
        $attempt->load('responses.question', 'user');

        $categoriesPoint = collect([
            "depression",
            "anxiety",
            "stress"
        ])->mapWithKeys(fn($key) => [$key => 0]);

        foreach ($attempt->responses as $response) {
            if ($response->question && isset($response->question->scoring['scale']) && isset($response->answer['value'])) {
                $scale = $response->question->scoring['scale'];
                $value = (int) $response->answer['value'];

                if ($categoriesPoint->has($scale)) {
                    $categoriesPoint[$scale] += $value;
                }
            }
        }

        $finalResults = $categoriesPoint->map(function ($score, $category) {
            return $this->getDassCategoryResult($category, $score) + ['score' => $score];
        });

        return $finalResults->sortBy('name');
    }

    private function getDassCategoryResult(string $category, int $score): array
    {
        $resultsMapping = [
            "depression" => [
                ['threshold' => 28, 'result' => 'Extremely Serve'],
                ['threshold' => 21, 'result' => 'Serve'],
                ['threshold' => 14, 'result' => 'Moderate'],
                ['threshold' => 10, 'result' => 'Mild'],
                ['threshold' => -1, 'result' => 'Normal'], // Changed to -1 as >0 means score 1 and above is mild. If 0, it's normal.
            ],
            "anxiety" => [
                ['threshold' => 20, 'result' => 'Extremely Serve'],
                ['threshold' => 15, 'result' => 'Serve'],
                ['threshold' => 10, 'result' => 'Moderate'],
                ['threshold' => 8, 'result' => 'Mild'],
                ['threshold' => 0, 'result' => 'Normal'], // Changed to 0 as >1 means score 2 and above is mild. If 0 or 1, it's normal.
            ],
            "stress" => [
                ['threshold' => 34, 'result' => 'Extremely Serve'],
                ['threshold' => 26, 'result' => 'Serve'],
                ['threshold' => 19, 'result' => 'Moderate'],
                ['threshold' => 15, 'result' => 'Mild'],
                ['threshold' => 0, 'result' => 'Normal'], // Changed to 0 as >1 means score 2 and above is mild. If 0 or 1, it's normal.
            ],
        ];

        $categoryResults = $resultsMapping[$category] ?? [];

        foreach ($categoryResults as $range) {
            if ($score > $range['threshold']) {
                return [
                    'description' => $range['result'],
                    'name' => ucfirst($category),
                    'category' => $category,
                ];
            }
        }

        return [
            'description' => 'Normal', // Default to Normal if no other threshold is met
            'name' => ucfirst($category),
            'category' => $category,
        ];
    }

    private function vak(Attempt $attempt)
    {
        $attempt->load('responses.question');

        $scores = [
            'visual' => 0,
            'auditori' => 0,
            'kinestetik' => 0,
        ];

        foreach ($attempt->responses as $response) {
            if (!isset($response->question) || !isset($response->question->scoring['scale'])) continue;
            $scale = $response->question->scoring['scale'];
            $value = (int) $response->answer['value'];
            if (isset($scores[$scale])) {
                $scores[$scale] += $value;
            }
        }

        $first = ($scores['visual'] >= $scores['auditori']) ? 'visual' : 'auditori';

        $winner = ($scores[$first] >= $scores['kinestetik']) ? $first : 'kinestetik';

        $descriptions = [
            'visual' => 'Kecenderungan siswa untuk menerima informasi dalam belajar dengan menggunakan indera penglihatan. Gaya belajar ini mengakses citra visual seperti warna, gambar dan video.',
            'auditori' => 'Kecenderungan siswa untuk menerima informasi dalam belajar dengan melibatkan indera pendengaran.',
            'kinestetik' => 'Kecenderungan siswa untuk menerima informasi dalam belajar dengan melibatkan gerakan /psikomotorik.',
        ];

        $responsesByCategory = [
            'visual' => [],
            'auditori' => [],
            'kinestetik' => [],
        ];

        foreach ($attempt->responses as $response) {
            if (isset($response->question->scoring['scale'])) {
                $scale = $response->question->scoring['scale'];
                if (isset($responsesByCategory[$scale])) {
                    $responsesByCategory[$scale][] = $response;
                }
            }
        }

        return [
            'scores' => $scores,
            'selected_category' => $winner,
            'description' => $descriptions[$winner],
            'responses_by_category' => $responsesByCategory,
            'all_descriptions' => $descriptions,
        ];
    }

    private function cfit(Attempt $attempt)
    {
        $attempt->load('responses.question.section', 'user.profile');

        $totalScore = 0;
        $totalQuestions = 0;

        foreach ($attempt->responses as $response) {
            $question = $response->question;
            if (!$question || !$question->section) {
                continue;
            }

            $sectionTitle = $question->section->title ?? '';
            if (Str::startsWith($sectionTitle, 'Contoh')) {
                continue; // abaikan section contoh
            }

            $scoring = $question->scoring ?? null;
            if (!$scoring) {
                continue;
            }

            if (in_array($question->type, ['multiple_select', 'image_multiple_select'], true)) {
                $scores = $scoring['scores'] ?? null;
                $choices = $response->answer['choices'] ?? [];
                if (!$scores || !is_array($choices)) {
                    continue;
                }

                $correctKeys = array_keys(array_filter($scores, fn($value) => (int) $value === 1));
                sort($correctKeys);
                $selected = $choices;
                sort($selected);

                $totalQuestions++;
                if ($selected === $correctKeys) {
                    $totalScore++;
                }
                continue;
            }

            $correctAnswer = $scoring['correct_answer'] ?? null;
            $userAnswer = $response->answer['choice'] ?? null;
            if ($correctAnswer === null || $userAnswer === null) {
                continue;
            }

            $totalQuestions++;
            if ($userAnswer === $correctAnswer) {
                $totalScore++;
            }
        }

        $profile = $attempt->user?->profile;
        $ageYears = $profile?->age;
        $ageMonths = null;
        if ($profile?->date_of_birth) {
            $dob = Carbon::parse($profile->date_of_birth);
            $refDate = $attempt->created_at ?? now();
            $ageYears = $dob->diffInYears($refDate);
            $ageMonths = $dob->diffInMonths($refDate) - ($ageYears * 12);
        }

        $iq = is_int($ageYears) ? $this->cfitScoreToIq($totalScore, $ageYears, $ageMonths) : null;
        $iqCategory = $iq !== null ? $this->cfitIqCategory($iq) : null;
        $iqClassification = $iq !== null ? $this->cfitIqClassification($iq) : null;
        $iqMessage = $iq !== null ? null : 'IQ tidak dapat dihitung karena data usia belum lengkap atau skor tidak ditemukan di tabel.';

        return [
            'total_score' => $totalScore,
            'total_questions' => $totalQuestions,
            'iq' => $iq,
            'iq_category' => $iqCategory,
            'iq_classification' => $iqClassification,
            'iq_message' => $iqMessage,
        ];
    }

    private function cfitScoreToIq(int $totalScore, int $age, ?int $ageMonths = null)
    {
        $path = storage_path('app/cfit_score.json');
        if (!is_file($path)) {
            return null;
        }

        $raw = json_decode(file_get_contents($path), true);
        if (!is_array($raw)) {
            return null;
        }

        $ageKey = $this->cfitAgeKey($age, $ageMonths);
        if (!$ageKey || !isset($raw[$ageKey]) || !is_array($raw[$ageKey])) {
            return null;
        }

        $scoreKey = (string) $totalScore;
        if (!array_key_exists($scoreKey, $raw[$ageKey])) {
            return null;
        }

        $value = $raw[$ageKey][$scoreKey];
        return is_int($value) ? $value : (is_numeric($value) ? (int) $value : null);
    }

    private function cfitAgeKey(int $age, ?int $ageMonths = null): ?string
    {
        if ($age >= 17) {
            return '17_plus';
        }
        if ($age === 16) {
            return '16';
        }
        if ($age === 15) {
            return '15';
        }
        if ($age === 14) {
            return '14';
        }
        if ($age <= 13) {
            if ($ageMonths !== null) {
                return $ageMonths <= 4 ? '13_0_13_4' : '13_5_13_11';
            }
            return '13_5_13_11';
        }

        return null;
    }

    private function cfitIqCategory(int $iq)
    {
        if ($iq >= 130) {
            return 'Sangat Tinggi';
        } elseif ($iq >= 120) {
            return 'Tinggi';
        } elseif ($iq >= 110) {
            return 'Di Atas Rata-Rata';
        } elseif ($iq >= 90) {
            return 'Rata-Rata';
        } elseif ($iq >= 80) {
            return 'Di Bawah Rata-Rata';
        } elseif ($iq >= 70) {
            return 'Rendah';
        } else {
            return 'Sangat Rendah';
        }
    }

    private function cfitIqClassification(int $iq)
    {
        $classification = null;
        $clinical = null;

        if ($iq >= 170) {
            $classification = 'Genius';
        } elseif ($iq >= 140) {
            $classification = 'Very Superior';
        } elseif ($iq >= 120) {
            $classification = 'Superior';
        } elseif ($iq >= 110) {
            $classification = 'High Average';
        } elseif ($iq >= 90) {
            $classification = 'Average';
        } elseif ($iq >= 84) {
            $classification = 'Low Average';
        } elseif ($iq >= 80) {
            $classification = 'Low Average';
        } elseif ($iq >= 70) {
            $classification = 'Borderline';
            $clinical = 'Borderline Mental Retardation';
        } elseif ($iq >= 68) {
            $classification = 'Borderline';
            $clinical = 'Borderline Mental Retardation';
        } elseif ($iq >= 52) {
            $classification = 'Mentally - Defective';
            $clinical = 'Mild Mental Retardation';
        } elseif ($iq >= 36) {
            $classification = 'Mentally - Defective';
            $clinical = 'Moderate Mental Retardation';
        } elseif ($iq >= 30) {
            $classification = 'Mentally - Defective';
            $clinical = 'Severe Mental Retardation';
        } elseif ($iq >= 20) {
            $classification = 'Mentally - Defective';
            $clinical = 'Severe Mental Retardation';
        } else {
            $classification = 'Mentally - Defective';
            $clinical = 'Profound Mental Retardation';
        }

        return [
            'classification' => $classification,
            'clinical_classification' => $clinical,
        ];
    }

    private function epi(Attempt $attempt)
    {
        $attempt->load('responses.question');

        $categories = [
            "extroversion",
            "neuroticism",
            "lie",
        ];

        $results = collect($categories)->mapWithKeys(function ($category) {
            return [$category => [
                'total_score' => 0,
                'question_count' => 0,
                'correct_count' => 0,
                'answer_distribution' => [
                    'true' => 0,
                    'false' => 0,
                ],
                'result' => null,
            ]];
        });

        foreach ($attempt->responses as $response) {
            // Pastikan pertanyaan dan kunci tersedia
            if (!isset($response->question) || !isset($response->question->scoring['scale'])) {
                continue;
            }

            $scale = strtolower($response->question->scoring['scale']);
            $correctAnswer = $response->question->scoring['correct_answer'];
            $userAnswer = $response->answer['value']; // biasanya true / false

            if ($results->has($scale)) {
                $categoryData = $results[$scale];

                // Hitung jumlah pertanyaan kategori ini
                $categoryData['question_count']++;

                // Catat distribusi jawaban
                if ($userAnswer === true) {
                    $categoryData['answer_distribution']['true']++;
                } elseif ($userAnswer === false) {
                    $categoryData['answer_distribution']['false']++;
                }

                if ($userAnswer === $correctAnswer) {
                    $categoryData['total_score']++;
                    $categoryData['correct_count']++;
                }

                $results->put($scale, $categoryData);
            }
        }

        $results = $results->map(function ($data, $category) {
            $score = $data['total_score'];
            $result = null;

            switch ($category) {
                case 'lie':
                    if ($score >= 5) $result = 'Taking';
                    elseif ($score == 4) $result = 'Mean';
                    else $result = 'Saint';
                    break;

                case 'extroversion':
                    if ($score >= 14) $result = 'Extraversi';
                    elseif ($score == 13) $result = 'Mean';
                    else $result = 'Introversi';
                    break;

                case 'neuroticism':
                    if ($score >= 14) $result = 'Neurotisisme';
                    elseif ($score >= 10 && $score <= 13) $result = 'Mean';
                    else $result = 'Stabilitas';
                    break;
            }

            $data['result'] = $result;
            return $data;
        });

        return $results;
    }

    private function tesEsai(Attempt $attempt)
    {
        $attempt->load('responses.question', 'user');

        $essayAnswers = collect();

        foreach ($attempt->responses as $response) {
            if ($response->question && isset($response->question->type) && $response->question->type === 'essay') {
                if (isset($response->answer['text'])) {
                    $essayAnswers->push([
                        'question_id' => $response->question->id,
                        'question_text' => $response->question->text,
                        'answer_text' => $response->answer['text'],
                        'response_id' => $response->id,
                        'submitted_at' => $response->created_at,
                    ]);
                }
            }
        }

        return $essayAnswers;
    }

    private function rmib(Attempt $attempt)
    {
        $categoriesPoint = collect([
            "outdoor",
            "mechanical",
            "computational",
            "scientific",
            "personal contact",
            "aesthetic",
            "musical",
            "literacy",
            "social service",
            "clerical",
            "practical",
            "medical"
        ])->mapWithKeys(fn($key) => [$key => 0]);

        // Define all category descriptions
        $allCategoryDescriptions = [
            'outdoor' => 'Pekerjaan yang aktivitasnya dilakukan diluar atau udara terbuka, atau pekerjaan yang tidak berhubungan dengan hal-hal yang rutin sifatnya. Contoh: petani, penjaga hutan, guru olah raga, juru ukur, tukang kebun, dan lainnya.',
            'mechanical' => 'Pekerjaan yang berhubungan dengan atau menggunakan mesin-mesin, alat-alat dan daya mekanik. Contoh: insinyur sipil, petugas pompa bensin, montir radio, ahli reparasi jam, dan lainnya.',
            'computational' => 'Pekerjaan yang berhubungan dengan angka-angka. Contoh: akuntan, ahli statistik, auditor, kasir, guru ilmu pasti, pegawai pajak, dan lainnya.',
            'scientific' => 'Pekerjaan yang berhubungan dengan keaktifan dalam hal analisa dan penyelidikan, eksperimen, kimia dan ilmu pengetahuan pada umumnya. Contoh: ilmuwan, ahli botani, ahli pertanian, asisten laboratorium, ahli biologi, dan lainnya.',
            'personal contact' => 'Pekerjaan yang berhubungan dengan manusia, diskusi, membujuk, dan bergaul dengan orang lain. Pada dasarnya adalah suatu pekerjaan yang membutuhkan kontak dengan orang lain. Contoh: manager bidang penjualan, penyiar radio, salesman, petugas humas, agen biro iklan, dan lainnya.',
            'aesthetic' => 'Pekerjaan yang berhubungan dengan hal-hal yang bersifat seni dan menciptakan sesuatu. Contoh: seniman, artis komersil, fotografer, penata panggung, guru kesenian, perancang pakaian, dan lainnya.',
            'musical' => 'Pekerjaan yang berhubungan dengan minat memainkan alat-alat musik atau untuk mendengarkan orang lain bernyanyi atau membaca sesuatu yang berhubungan dengan musik, termasuk penghargaan terhadap musik. Contoh: musisi, pianis konser, komponis, guru musik, pemain organ, pemimpin band, dan lainnya.',
            'literacy' => 'Pekerjaan yang berhubungan dengan buku-buku, kegiatan membaca, dan mengarang. Contoh: wartawan, pengarang, penulis drama, penyair, ahli sejarah, ahli perpustakaan, kritikus, dan lainnya.',
            'social service' => 'Pekerjaan yang berhubungan dengan minat terhadap kesejahteraan penduduk, dengan keinginan untuk menolong dan membimbing/menasehati tentang problem dan kesulitan mereka. Berhubungan dengan keinginan untuk mengerti orang lain, dan mempunyai ide yang besar atau kuat tentang pelayanan. Contoh: guru SD, psikolog, pekerja sosial, organisator kepramukaan, pejabat klub remaja, petugas kesejahteraan social, dan lainnya.',
            'clerical' => 'Pekerjaan yang berhubungan dengan minat terhadap tugas-tugas rutin yang menuntut ketepatan. Contoh: manager bank, petugas arsip, pegawai kantor, juru ketik, pegawai pos, sekertaris pribadi, dan lainnya.',
            'practical' => 'Pekerjaan yang berhubungan dengan minat terhadap pekerjaan yang praktis, karya pertukangan dan yang memerlukan keterampilan. Contoh: tukang kayu, penjahit, juru masak, penata rambut, tukang ledeng, ahli sepatu, ahli bangunan, dan lainnya.',
            'medical' => 'Pekerjaan yang berhubungan dengan minat terhadap pengobatan, mengurangi akibat dari pada penyakit, penyembuhan, dan didalam bidang medis serta hal-hal biologis pada umumnya. Contoh: dokter, ahli bedah, apoteker, mantri kesehatan, ahli kaca mata, perawat orang tua, perawat pusat rehabilitasi, suster, dan lainnya.',
        ];

        foreach ($attempt->responses as $response) {
            $scoring = $response->question->scoring ?? null;
            if (!$scoring || !isset($response->answer['ranked_ids'])) continue;

            foreach ($response->answer['ranked_ids'] as $rank => $id) {
                $category = $scoring[$id] ?? null;
                if ($category && isset($categoriesPoint[$category])) {
                    $categoriesPoint[$category] += $rank + 1;
                }
            }
        }

        $sorted = $categoriesPoint->sort();
        $threshold = $sorted->take(3)->last();
        $lowestCategories = $sorted->filter(fn($value) => $value <= $threshold);

        // Get descriptions for the lowest categories
        $lowestCategoryDescriptions = [];
        foreach ($lowestCategories->keys() as $categoryName) {
            if (isset($allCategoryDescriptions[$categoryName])) {
                $lowestCategoryDescriptions[$categoryName] = $allCategoryDescriptions[$categoryName];
            }
        }

        return [
            'categories' => $lowestCategories, // This is what you're currently returning
            'descriptions' => $lowestCategoryDescriptions, // Add the descriptions here
        ];
    }

    private function biodataPerusahaan(Attempt $attempt)
    {
        $attempt->load(['responses', 'tool.questions']);

        $responses = $attempt->responses;
        $questions = $attempt->tool->questions;

        $formResponses = $responses->flatMap(function ($response) {
            if (!isset($response->answer['text'])) {
                return $response->answer;
            }
        });

        $essayResponses = $responses
            ->filter(function ($response) {
                return isset($response->answer['text']);
            })->map(function ($response) {
                return $response->answer;
            });

        return (object) ['responses' => (object) ['form' => $formResponses, 'essay' => $essayResponses], 'questions' => $questions];
    }

    private function biodataPendidikan(Attempt $attempt)
    {
        $attempt->load(['responses', 'tool.questions']);

        $responses = $attempt->responses;
        $questions = $attempt->tool->questions;

        $formResponses = $responses->flatMap(function ($response) {
            if (!isset($response->answer['text'])) {
                return $response->answer;
            }
        });

        $essayResponses = $responses
            ->filter(function ($response) {
                return isset($response->answer['text']);
            })->map(function ($response) {
                return $response->answer;
            });

        return (object) ['responses' => (object) ['form' => $formResponses, 'essay' => $essayResponses], 'questions' => $questions];
    }

    private function biodataKomunitas(Attempt $attempt)
    {
        $attempt->load(['responses', 'tool.questions']);

        $responses = $attempt->responses;
        $questions = $attempt->tool->questions;

        $formResponses = $responses->flatMap(function ($response) {
            if (!isset($response->answer['text'])) {
                return $response->answer;
            }
        });

        $essayResponses = $responses
            ->filter(function ($response) {
                return isset($response->answer['text']);
            })->map(function ($response) {
                return $response->answer;
            });

        return (object) ['responses' => (object) ['form' => $formResponses, 'essay' => $essayResponses], 'questions' => $questions];
    }

    private function biodataIndividual(Attempt $attempt)
    {
        $attempt->load(['responses', 'tool.questions']);

        $responses = $attempt->responses;
        $questions = $attempt->tool->questions;

        $formResponses = $responses->flatMap(function ($response) {
            if (!isset($response->answer['text'])) {
                return $response->answer;
            }
        });

        $essayResponses = $responses
            ->filter(function ($response) {
                return isset($response->answer['text']);
            })->map(function ($response) {
                return $response->answer;
            });

        return (object) ['responses' => (object) ['form' => $formResponses, 'essay' => $essayResponses], 'questions' => $questions];
    }

    private function biodataKlinis(Attempt $attempt)
    {
        $attempt->load(['responses', 'tool.questions']);

        $responses = $attempt->responses;
        $questions = $attempt->tool->questions;

        $formResponses = $responses->flatMap(function ($response) {
            if (!isset($response->answer['text'])) {
                return $response->answer;
            }
        });

        $essayResponses = $responses
            ->filter(function ($response) {
                return isset($response->answer['text']);
            })->map(function ($response) {
                return $response->answer;
            });

        return (object) ['responses' => (object) ['form' => $formResponses, 'essay' => $essayResponses], 'questions' => $questions];
    }

    private function d4Bagian1(Attempt $attempt)
    {
        // 1. Load semua response + question
        $attempt->load('responses.question', 'user');

        // 2. Filter hanya pertanyaan multiple choice
        $multipleChoiceResponses = $attempt->responses
            ->filter(fn($r) => $r->question && $r->question->type === 'multiple_choice')
            ->values();

        // 3. Lewati dua soal pertama (contoh latihan)
        $responsesToScore = $multipleChoiceResponses->slice(2);

        $totalQuestions = $responsesToScore->count();
        $correctCount = 0;
        $wrongCount = 0;

        // 4. Hitung benar/salah
        foreach ($responsesToScore as $response) {
            $question = $response->question;
            $userChoice = $response->answer['choice'] ?? null;
            $correctAnswer = $question->scoring['correct_answer'] ?? null;

            if ($userChoice && $correctAnswer) {
                if ($userChoice === $correctAnswer) {
                    $correctCount++;
                } else {
                    $wrongCount++;
                }
            }
        }

        // 5. Hitung persentase benar
        $percentage = $totalQuestions > 0
            ? round(($correctCount / $totalQuestions) * 100, 2)
            : 0;

        // 6. Ambil jenis kelamin user
        $gender = strtolower($attempt->user->profile->gender ?? 'unknown');

        // 7. Dapatkan kategori + deskripsi hasil
        $result = $this->getD4Description($correctCount, $gender);

        // 8. Kembalikan hasil lengkap
        return [
            'total_questions' => $totalQuestions,
            'correct' => $correctCount,
            'wrong' => $wrongCount,
            'percentage' => $percentage,
            'gender' => $gender,
            'percentile' => $result['percentile'],
            'category' => $result['category'],
        ];
    }

    private function d4Bagian2(Attempt $attempt)
    {
        // 1. Load semua response + question
        $attempt->load('responses.question', 'user');

        // 2. Filter hanya pertanyaan multiple choice
        $multipleChoiceResponses = $attempt->responses
            ->filter(fn($r) => $r->question && $r->question->type === 'multiple_choice')
            ->values();

        // 3. Inisialisasi responses to score (semua soal)
        $responsesToScore = $multipleChoiceResponses;

        $totalQuestions = $responsesToScore->count();
        $correctCount = 0;
        $wrongCount = 0;

        // 4. Hitung benar/salah
        foreach ($responsesToScore as $response) {
            $question = $response->question;
            $userChoice = $response->answer['choice'] ?? null;
            $correctAnswer = $question->scoring['correct_answer'] ?? null;

            if ($userChoice && $correctAnswer) {
                if ($userChoice === $correctAnswer) {
                    $correctCount++;
                } else {
                    $wrongCount++;
                }
            }
        }

        // 5. Hitung persentase benar
        $percentage = $totalQuestions > 0
            ? round(($correctCount / $totalQuestions) * 100, 2)
            : 0;

        // 6. Ambil jenis kelamin user
        $gender = strtolower($attempt->user->gender ?? 'unknown');

        // 7. Dapatkan kategori + deskripsi hasil
        $result = $this->getD4Description($correctCount, $gender);

        // 8. Kembalikan hasil lengkap
        return [
            'total_questions' => $totalQuestions,
            'correct' => $correctCount,
            'wrong' => $wrongCount,
            'percentage' => $percentage,
            'gender' => $gender,
            'percentile' => $result['percentile'],
            'category' => $result['category'],
        ];
    }

    private function getD4Description($correctCount, $gender)
    {
        $gender = strtolower($gender ?? 'male');

        $norms = [
            'male' => [
                ['min' => 0,  'max' => 34, 'percentile' => 'P1'],
                ['min' => 35, 'max' => 38, 'percentile' => 'P3'],
                ['min' => 39, 'max' => 42, 'percentile' => 'P5'],
                ['min' => 43, 'max' => 45, 'percentile' => 'P10'],
                ['min' => 46, 'max' => 47, 'percentile' => 'P15'],
                ['min' => 48, 'max' => 49, 'percentile' => 'P20'],
                ['min' => 50, 'max' => 50, 'percentile' => 'P25'],
                ['min' => 51, 'max' => 52, 'percentile' => 'P30'],
                ['min' => 53, 'max' => 53, 'percentile' => 'P35'],
                ['min' => 54, 'max' => 54, 'percentile' => 'P40'],
                ['min' => 55, 'max' => 56, 'percentile' => 'P45'],
                ['min' => 57, 'max' => 57, 'percentile' => 'P50'],
                ['min' => 58, 'max' => 59, 'percentile' => 'P55'],
                ['min' => 60, 'max' => 60, 'percentile' => 'P60'],
                ['min' => 61, 'max' => 61, 'percentile' => 'P65'],
                ['min' => 62, 'max' => 63, 'percentile' => 'P70'],
                ['min' => 64, 'max' => 65, 'percentile' => 'P75'],
                ['min' => 66, 'max' => 67, 'percentile' => 'P80'],
                ['min' => 68, 'max' => 70, 'percentile' => 'P85'],
                ['min' => 71, 'max' => 74, 'percentile' => 'P90'],
                ['min' => 75, 'max' => 80, 'percentile' => 'P95'],
                ['min' => 81, 'max' => 91, 'percentile' => 'P97'],
                ['min' => 92, 'max' => 100, 'percentile' => 'P99'],
            ],
            'female' => [
                ['min' => 0,  'max' => 42, 'percentile' => 'P1'],
                ['min' => 43, 'max' => 46, 'percentile' => 'P3'],
                ['min' => 47, 'max' => 49, 'percentile' => 'P5'],
                ['min' => 50, 'max' => 52, 'percentile' => 'P10'],
                ['min' => 53, 'max' => 54, 'percentile' => 'P15'],
                ['min' => 55, 'max' => 56, 'percentile' => 'P20'],
                ['min' => 57, 'max' => 57, 'percentile' => 'P25'],
                ['min' => 58, 'max' => 59, 'percentile' => 'P30'],
                ['min' => 60, 'max' => 60, 'percentile' => 'P35'],
                ['min' => 61, 'max' => 61, 'percentile' => 'P40'],
                ['min' => 62, 'max' => 63, 'percentile' => 'P45'],
                ['min' => 64, 'max' => 64, 'percentile' => 'P50'],
                ['min' => 65, 'max' => 65, 'percentile' => 'P55'],
                ['min' => 66, 'max' => 67, 'percentile' => 'P60'],
                ['min' => 68, 'max' => 69, 'percentile' => 'P65'],
                ['min' => 70, 'max' => 70, 'percentile' => 'P70'],
                ['min' => 71, 'max' => 72, 'percentile' => 'P75'],
                ['min' => 73, 'max' => 74, 'percentile' => 'P80'],
                ['min' => 75, 'max' => 76, 'percentile' => 'P85'],
                ['min' => 77, 'max' => 80, 'percentile' => 'P90'],
                ['min' => 81, 'max' => 84, 'percentile' => 'P95'],
                ['min' => 85, 'max' => 92, 'percentile' => 'P97'],
                ['min' => 93, 'max' => 100, 'percentile' => 'P99'],
            ],
        ];

        $rules = $norms[$gender] ?? $norms['male'];

        $percentile = collect($rules)->first(function ($rule) use ($correctCount) {
            return $correctCount >= $rule['min'] && $correctCount <= $rule['max'];
        })['percentile'] ?? 'Tidak Diketahui';

        $categoryGroups = [
            'P1' => 'Sangat Rendah',
            'P3' => 'Rendah',
            'P5' => 'Rendah',
            'P10' => 'Rendah',
            'P15' => 'Rendah',
            'P20' => 'Rendah',
            'P25' => 'Cukup Rendah',
            'P30' => 'Cukup Rendah',
            'P35' => 'Cukup Rendah',
            'P40' => 'Cukup Rendah',
            'P45' => 'Sedang',
            'P50' => 'Sedang',
            'P55' => 'Sedang',
            'P60' => 'Sedang',
            'P65' => 'Cukup Tinggi',
            'P70' => 'Cukup Tinggi',
            'P75' => 'Cukup Tinggi',
            'P80' => 'Cukup Tinggi',
            'P85' => 'Sangat Tinggi',
            'P90' => 'Sangat Tinggi',
            'P95' => 'Sangat Tinggi',
            'P97' => 'Sangat Tinggi',
            'P99' => 'Sangat Tinggi',
        ];

        $category = $categoryGroups[$percentile] ?? 'Tidak Diketahui';

        return [
            'correct_count' => $correctCount,
            'category' => $category,     // Rendah, Sedang, Baik, Sangat Baik
            'percentile' => $percentile, // P1, P2, ..., P10
        ];
    }

    private function ist(Attempt $attempt)
    {
        $attempt->load('responses.question', 'tool.sections.questions');

        $sections = $attempt->tool->sections()
            ->where('title', 'like', 'Subtes%')
            ->orderBy('order')
            ->take(9)
            ->get();

        $result = [];

        foreach ($sections as $section) {
            $questions = [];
            $benarCount = 0;

            foreach ($section->questions as $question) {
                $response = $attempt->responses->firstWhere('question_id', $question->id);

                $userAnswer = null;
                if ($response) {
                    if (isset($response->answer['value'])) {
                        $userAnswer = $response->answer['value'];
                    } elseif (isset($response->answer['choice'])) {
                        $userAnswer = $response->answer['choice'];
                    }
                }

                $scoring = $question->scoring ?? [];

                // Subtes 4: cocokkan jawaban dengan semua poin_1 dan poin_2 (case-insensitive, trim)
                if (str_contains($section->title, 'Subtes 4')) {
                    $poin1 = isset($scoring['poin_1']) ? (is_array($scoring['poin_1']) ? $scoring['poin_1'] : [$scoring['poin_1']]) : [];
                    $poin2 = isset($scoring['poin_2']) ? (is_array($scoring['poin_2']) ? $scoring['poin_2'] : [$scoring['poin_2']]) : [];
                    $allKeys = array_merge($poin1, $poin2);

                    // Normalisasi jawaban user
                    $jawabanUser = trim(mb_strtolower($userAnswer ?? ''));

                    // Cocokkan dengan semua kunci (case-insensitive, trim)
                    $isBenar = false;
                    foreach ($allKeys as $kunci) {
                        if (trim(mb_strtolower($kunci)) === $jawabanUser && $jawabanUser !== '') {
                            $isBenar = true;
                            break;
                        }
                    }
                    if ($isBenar) $benarCount++;

                    $questions[] = [
                        'poin_1' => $poin1,
                        'poin_2' => $poin2,
                        'user_answer' => $userAnswer,
                    ];
                } else {
                    $isBenar = isset($scoring['correct_answer']) && $userAnswer === $scoring['correct_answer'];
                    if ($isBenar) $benarCount++;

                    $questions[] = [
                        'correct_answer' => $scoring['correct_answer'] ?? null,
                        'user_answer' => $userAnswer,
                    ];
                }
            }
            $result[] = [
                'subtest' => $section->title,
                'questions' => $questions,
                'benar_count' => $benarCount,
            ];
        }

        return $result;
    }
}
