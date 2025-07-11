<?php

namespace App\Services\PsikotesTool;

use App\Models\Session;
use App\Models\Tool;
use Illuminate\Support\Str;

class PsikotesToolResultService
{
    public function resultData(Tool $tool, Session $psikotesSession)
    {
        $methodName = Str::camel($tool->name);
        return $this->{$methodName}($psikotesSession);
    }

    /**
     * Beri nama  Method / Function di bawah ini dengan bentuk camel case dari data yang ada di PsikotesTool->namespace
     * Contoh : 'DASS-42' -> 'dass42', 'Papi Kostick' -> 'papiKostick'
     *  */

    private function papiKostick(Session $psikotesSession)
    {
        // 1. Load semua response beserta pertanyaan terkait
        $psikotesSession->load('responses.question', 'user');

        // 2. Inisialisasi papan skor untuk 20 kategori
        $categories = ['F', 'W', 'N', 'G', 'A', 'L', 'P', 'I', 'T', 'V', 'O', 'B', 'S', 'X', 'C', 'D', 'R', 'Z', 'E', 'K',];


        $scores = collect($categories)->mapWithKeys(fn($key) => [$key => 0]);

        // 3. Lakukan iterasi pada setiap jawaban user untuk menghitung skor mentah
        foreach ($psikotesSession->responses as $response) {
            if (!isset($response->question) || !isset($response->question->scoring)) {
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

        // 5. Kelompokkan hasil berdasarkan Kategori Utama untuk ditampilkan di view
        return $finalResult->groupBy('main_category');
    }

    /**
     * Helper method untuk menyimpan data deskripsi Papi Kostick.
     * Idealnya, data ini bisa disimpan di database atau file config.
     */
    private function getPapiKostickDescriptionMapping()
    {
        // ... (isi method ini sama seperti sebelumnya, tidak perlu diubah) ...
        return [
            'F' => [
                'main_category' => 'Followership',
                'sub_name' => 'Loyalty to Superior',
                'ranges' => [
                    '0-3' => 'Otonom, dapat bekerja sendiri tanpa campur tangan orang lain, motivasi timbul karena pekerjaan itu sendiri, bukan karena pujian dari otoritas. Mempertanyakan otoritas, cenderung tidak puas terhadap atasan, loyalitas lebih didasari kepentingan pribadi.',
                    '4-6' => 'Loyal pada Perusahaan.',
                    '7' => 'Loyal pada pribadi atasan.',
                    '8-9' => 'Loyal, berusaha dekat dengan pribadi atasan, ingin menyenangkan atasan, sadar akan harapan atasan akan dirinya. Terlalu memperhatikan cara menyenangkan atasan, tidak berani berpendirian lain, tidak mandiri.'
                ]
            ],
            'W' => [
                'main_category' => 'Followership',
                'sub_name' => 'Adherence to Rules',
                'ranges' => [
                    '0-3' => 'Hanya butuh gambaran tentang kerangka tugas secara garis besar, berpatokan pada tujuan, dapat bekerja dalam suasana yang kurang berstruktur, berinsiatif, mandiri. Tidak patuh, cenderung mengabaikan atau tidak paham pentingnya peraturan atau prosedur, suka membuat peraturan sendiri yang bisa bertentangan dengan yang telah ada.',
                    '4-5' => 'Perlu pengarahan awal dan tolok ukur keberhasilan.',
                    '6-7' => 'Membutuhkan uraian rinci mengenai tugas, dan batasan tanggung jawab serta wewenang.',
                    '8-9' => 'Patuh pada kebijaksanaan, peraturan dan struktur organisasi. Ingin segala sesuatunya diuraikan secara rinci, kurang memiliki inisiatif, tdk fleksibel, terlalu tergantung pada organisasi, berharap \'disuapi\'.'
                ]
            ],
            'N' => [
                'main_category' => 'Work Direction',
                'sub_name' => 'Need to Finish Task',
                'ranges' => [
                    '0-2' => 'Tidak terlalu merasa perlu untuk menuntaskan sendiri tugas-tugasnya, senang menangani beberapa pekerjaan sekaligus, mudah mendelegasikan tugas. Komitmen rendah, cenderung meninggalkan tugas sebelum tuntas, konsentrasi mudah buyar, mungkin suka berpindah pekerjaan.',
                    '3-5' => 'Cukup memiliki komitmen untuk menuntaskan tugas, akan tetapi jika memungkinkan akan mendelegasikan sebagian dari pekerjaannya kepada orang lain.',
                    '6-7' => 'Komitmen tinggi, lebih suka menangani pekerjaan satu demi satu, akan tetapi masih dapat mengubah prioritas jika terpaksa.',
                    '8-9' => 'Memiliki komitmen yg sangat tinggi terhadap tugas, sangat ingin menyelesaikan tugas, tekun dan tuntas dalam menangani pekerjaan satu demi satu hingga tuntas. Perhatian terpaku pada satu tugas, sulit untuk menangani beberapa pekerjaan sekaligus, sulit di interupsi, tidak melihat masalah sampingan.'
                ]
            ],
            'G' => [
                'main_category' => 'Work Direction',
                'sub_name' => 'Need to be Hard-working',
                'ranges' => [
                    '0-2' => 'Santai, kerja adalah sesuatu yang menyenangkan-bukan beban yang membutuhkan usaha besar. Mungkin termotivasi untuk mencari cara atau sistem yang dapat mempermudah dirinya dalam menyelesaikan pekerjaan, akan berusaha menghindari kerja keras, sehingga dapat memberi kesan malas.',
                    '3-4' => 'Bekerja keras sesuai tuntutan, menyalurkan usahanya untuk hal-hal yang bermanfaat atau menguntungkan.',
                    '5-7' => 'Bekerja keras, tetapi jelas tujuan yg ingin dicapainya.',
                    '8-9' => 'Ingin tampil sebagai pekerja keras, sangat suka bila orang lain memandangnya sbg pekerja keras. Cenderung menciptakan pekerjaan yang tidak perlu agar terlihat tetap sibuk, kadang kala tanpa tujuan yang jelas.'
                ]
            ],
            'A' => [
                'main_category' => 'Work Direction',
                'sub_name' => 'Need to Achieve',
                'ranges' => [
                    '0-4' => 'Tidak kompetitif, mapan, puas. Tidak terdorong untuk menghasilkan prestasi,tidak berusaha untuk mencapai sukses, membutuhkan dorongan dari luar diri, tidak berinisiatif, tidak memanfaatkan kemampuan diri secara optimal, ragu akan tujuan diri, misalnya sebagai akibat promosi atau perubahan struktur jabatan.',
                    '5-7' => 'Tahu akan tujuan yang ingin dicapainya dan dapat merumuskannya, realistis akan kemampuan diri, dan berusaha untuk mencapai target.',
                    '8-9' => 'Sangat berambisi untuk berprestasi dan menjadi yang terbaik, menyukai tantangan, cenderung mengejar kesempurnaan, menetapkan target yang tinggi, \'self-starter\', merumuskan kerja dengan baik. Tidak realistis akan kemampuannya, sulit dipuaskan, mudah kecewa, harapan yang tinggi mungkin mengganggu orang lain.'
                ]
            ],
            'L' => [
                'main_category' => 'Leadership',
                'sub_name' => 'Desire to Lead',
                'ranges' => [
                    '0-1' => 'Puas dengan peran sebagai bawahan, memberikan kesempatan pada orang lain untuk memimpin, tidak dominan. Tidak percaya diri. Sama sekali tidak berminat untuk berperan sebagai pemimpin. Bersikap pasif dalam kelompok.',
                    '2-3' => 'Tidak percaya diri dan tidak ingin memimpin atau mengawasi orang lain.',
                    '4' => 'Kurang percaya diri dan kurang berminat untuk menjadi pemimpin.',
                    '5' => 'Cukup percaya diri, tidak secara aktif mencari posisi kepemimpinan akan tetapi juga tidak akan menghindarinya.',
                    '6-7' => 'Percaya diri dan ingin berperan sebagai pemimpin.',
                    '8-9' => 'Sangat percaya diri untuk berperan sebagai atasan dan sangat mengharapkan posisi tersebut. Lebih mementingkan citra dan status kepemimpinannya dari pada efektifitas kelompok, mungkin akan tampil angkuh atau terlalu percaya diri.'
                ]
            ],
            'P' => [
                'main_category' => 'Leadership',
                'sub_name' => 'Control of Subordinates',
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
                'sub_name' => 'Decision Making',
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
                'sub_name' => 'Pace of Action',
                'ranges' => [
                    '0-3' => 'Santai. Kurang peduli akan waktu, kurang memiliki rasa urgensi, membuang-buang waktu, bukan pekerja yang tepat waktu.',
                    '4-6' => 'Cukup aktif dalam segi mental, dapat menyesuaikan tempo kerjanya dengan tuntutan pekerjaan atau lingkungan.',
                    '7-9' => 'Cekatan, selalu siaga, bekerja cepat, ingin segera menyelesaikan tugas. Negatifnya: Tegang, cemas, impulsif, mungkin ceroboh, banyak gerakan yang tidak perlu.'
                ]
            ],
            'V' => [
                'main_category' => 'Activity',
                'sub_name' => 'Vigour (Physical Activity)',
                'ranges' => [
                    '0-2' => 'Cocok untuk pekerjaan \'di belakang meja\'. Cenderung lamban, tidak tanggap, mudah lelah, daya tahan lemah.',
                    '3-6' => 'Dapat bekerja di belakang meja dan senang jika sesekali harus terjun ke lapangan atau melaksanakan tugas-tugas yang bersifat mobile.',
                    '7-9' => 'Menyukai aktifitas fisik ( a.l. : olah raga), enerjik, memiliki stamina untuk menangani tugas-tugas berat, tidak mudah lelah. Tidak betah duduk lama, kurang dapat konsentrasi \'di belakang meja\'.'
                ]
            ],
            'O' => [
                'main_category' => 'Social Nature',
                'sub_name' => 'Personal Relationships',
                'ranges' => [
                    '0-2' => 'Menjaga jarak, lebih memperhatikan hal-hal kedinasan, tidak mudah dipengaruhi oleh individu tertentu, objektif dan analitis. Tampil dingin, tidak acuh, tidak ramah, suka berahasia, mungkin tidak sadar akan perasaan orang lain & mungkin sulit menyesuaikan diri.',
                    '3-5' => 'Tidak mencari atau menghindari hubungan antar pribadi di lingkungan kerja, masih mampu menjaga jarak.',
                    '6-9' => 'Peka akan kebutuhan org lain, sangat memikirkan hal-hal yang dibutuhkan orang lain, suka menjalin hubungan persahabatan yang hangat dan tulus. Sangat perasa, mudah tersinggung, cenderung subjektif, dapat terlibat terlalu dlam atau intim dengan individu tertentu dalam pekerjaan, sangat tergantung pada individu tertentu.'
                ]
            ],
            'B' => [
                'main_category' => 'Social Nature',
                'sub_name' => 'Need to Belong to Group',
                'ranges' => [
                    '0-2' => 'Mandiri (dari segi emosi), tidak mudah dipengaruhi oleh tekanan kelompok. Penyendiri, kurang peka akan sikap dan kebutuhan kelompok, mungkin sulit menyesuaikan diri.',
                    '3-5' => 'Selektif dalam bergabung dengan kelompok, hanya mau berhubungan dengan kelompok di lingkungan kerja apabila bernilai dan sesuai minat, tidak terlalu mudah dipengaruhi.',
                    '6-9' => 'Suka bergabung dalam kelompok, sadar akan sikap dan kebutuhan kelompok, suka bekerja sama, ingin menjadi bagian dari kelompok, ingin disukai dan diakui oleh lingkungan. Sangat tergantung pada kelompok, lebih memperhatikan kebutuhan kelompok daripada pekerjaan.'
                ]
            ],
            'S' => [
                'main_category' => 'Social Nature',
                'sub_name' => 'Social Interaction',
                'ranges' => [
                    '0-2' => 'Dapat bekerja sendiri, tidak membutuhkan kehadiran orang lain. Menarik diri, kaku dalam bergaul, canggung dalam situasi sosial, lebih memperhatikan hal - hal lain daripada manusia.',
                    '3-4' => 'Kurang percaya diri dan kurang aktif dlm menjalin hubungan sosial.',
                    '5-9' => 'Percaya diri dan sangat senang bergaul, menyukai interaksi sosial, bisa menciptakan suasana yang menyenangkan, mempunyai inisiatif dan mampu menjalin hubungan dan komunikasi, memperhatikan org lain. Mungkin membuang-buang waktu untuk aktifitas sosial, kurang peduli akan penyelesaian tugas.'
                ]
            ],
            'X' => [
                'main_category' => 'Social Nature',
                'sub_name' => 'Need for Recognition',
                'ranges' => [
                    '0-1' => 'Sederhana, rendah hati, tulus, tidak sombong dan tidak suka menampilkan diri. Terlalu sederhana, cenderung merendahkan kapasitas diri, tidak percaya diri, cenderung menarik diri dan pemalu.',
                    '2-3' => 'Sederhana, cenderung diam, cenderung pemalu, tidak suka menonjolkan diri.',
                    '4-5' => 'Mengharapkan pengakuan lingkungan dan tidak mau diabaikan tetapi tidak mencari-cari perhatian.',
                    '6-9' => 'Bangga akan diri dan gayanya sendiri, senang menjadi pusat perhatian, mengharapkan penghargaan dari lingkungan. Mencari-cari perhatian dan suka menyombongkan diri.'
                ]
            ],
            'C' => [
                'main_category' => 'Work Style',
                'sub_name' => 'Systematical Work',
                'ranges' => [
                    '0-2' => 'Lebih mementingkan fleksibilitas daripada struktur, pendekatan kerja lebih ditentukan oleh situasi daripada oleh perencanaan sebelumnya, mudah beradaptasi. Tidak mempedulikan keteraturan atau kerapihan, ceroboh.',
                    '3-4' => 'Fleksibel tapi masih cukup memperhatikan keteraturan atau sistematika kerja.',
                    '5-6' => 'Memperhatikan keteraturan dan sistematika kerja, tapi cukup fleksibel.',
                    '7-9' => 'Sistematis, bermetoda, berstruktur, rapi dan teratur, dapat menata tugas dengan baik. Cenderung kaku, tidak fleksibel.'
                ]
            ],
            'D' => [
                'main_category' => 'Work Style',
                'sub_name' => 'Attention to Detail',
                'ranges' => [
                    '0-1' => 'Melihat pekerjaan secara makro, membedakan hal penting dari yang kurang penting, mendelegasikan detil pada orang lain, generalis. Menghindari detail, konsekuensinya mungkin bertindak tanpa data yang cukup atau akurat, bertindak ceroboh pada hal yang butuh kecermatan. Dapat mengabaikan proses yang vital dalam evaluasi data.',
                    '2-3' => 'Cukup peduli akan akurasi dan kelengkapan data.',
                    '4-6' => 'Tertarik untuk menangani sendiri detail.',
                    '7-9' => 'Sangat menyukai detail, sangat peduli akan akurasi dan kelengkapan data. Cenderung terlalu terlibat dengan detail sehingga melupakan tujuan utama.'
                ]
            ],
            'R' => [
                'main_category' => 'Work Style',
                'sub_name' => 'Theoretical Type',
                'ranges' => [
                    '0-3' => 'Tipe pelaksana, praktis - pragmatis, mengandalkan pengalaman masa lalu dan intuisi. Bekerja tanpa perencanaan, mengandalkan perasaan.',
                    '4-5' => 'Pertimbangan mencakup aspek teoritis (konsep atau pemikiran baru) dan aspek praktis (pengalaman) secara berimbang.',
                    '6-7' => 'Suka memikirkan suatu masalah secara mendalam, merujuk pada teori dan konsep.',
                    '8-9' => 'Tipe pemikir, sangat berminat pada gagasan, konsep, teori,mencari alternatif baru, menyukai perencanaan. Mungkin sulit dimengerti oleh orang lain, terlalu teoritis dan tidak praktis, mengawang-awang dan berbelit-belit.'
                ]
            ],
            'Z' => [
                'main_category' => 'Temprament',
                'sub_name' => 'Need for Change',
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
                'sub_name' => 'Emotional Restraint',
                'ranges' => [
                    '0-1' => 'Sangat terbuka, terus terang, mudah terbaca (dari air muka, tindakan, perkataan, sikap). Tidak dapat mengendalikan emosi, cepat bereaksi, kurang mengindahkan atau tidak mempunyai \'nilai\' yang mengharuskannya menahan emosi.',
                    '2-3' => 'Terbuka, mudah mengungkap pendapat atau perasaannya mengenai suatu hal kepada org lain.',
                    '4-6' => 'Mampu mengungkap atau menyimpan perasaan, dapat mengendalikan emosi.',
                    '7-9' => 'Mampu menyimpan pendapat atau perasaannya, tenang, dapat mengendalikan emosi, menjaga jarak. Tampil pasif dan tidak acuh, mungkin sulit mengungkapkan emosi atau perasaan atau pandangan.'
                ]
            ],
            'K' => [
                'main_category' => 'Temprament',
                'sub_name' => 'Assertiveness',
                'ranges' => [
                    '0-1' => 'Sabar, tidak menyukai konflik. Mengelak atau menghindar dari konflik, pasif, menekan atau menyembunyikan perasaan sesungguhnya, menghindari konfrontasi, lari dari konflik, tidak mau mengakui adanya konflik.',
                    '2-3' => 'Lebih suka menghindari konflik, akan mencari rasionalisasi untuk dapat menerima situasi dan melihat permasalahan dari sudut pandangan orang lain.',
                    '4-5' => 'Tidak mencari atau menghindari konflik. Mau mendengarkan pandangan orang lain tetapi dapat menjadi keras kepala saat mempertahankan pandangannya.',
                    '6-7' => 'Akan menghadapi konflik, mengungkapkan serta memaksakan pandangan dengan cara positif.',
                    '8-9' => 'Terbuka, jujur, terus terang, asertif, agresif, reaktif, mudah tersinggung, mudah meledak, curiga, berprasangka, suka berkelahi atau berkonfrontasi, berpikir negatif.'
                ]
            ],
        ];
    }

    private function ocean(Session $psikotesSession)
    {
        $psikotesSession->load('responses.question');

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

        foreach ($psikotesSession->responses as $response) {
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

    private function dass42(Session $psikotesSession)
    {
        $psikotesSession->load('responses');

        $categoriesPoint = collect([
            "depression",
            "anxiety",
            "stress"
        ])->mapWithKeys(fn($key) => [$key => 0]);

        foreach ($psikotesSession->responses as $response) {
            $categoriesPoint[$response->question->scoring['scale']] += $response->answer['value'];
        }

        return $categoriesPoint->sortDesc();
    }

    private function rmib(Session $psikotesSession)
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
            "clenical",
            "practical",
            "medical"
        ])->mapWithKeys(fn($key) => [$key => 0]);

        foreach ($psikotesSession->responses as $response) {
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

        return $sorted->filter(fn($value) => $value <= $threshold);
    }
}
