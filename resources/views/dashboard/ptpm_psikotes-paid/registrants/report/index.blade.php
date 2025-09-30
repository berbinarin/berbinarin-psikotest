<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laporan Pendaftar</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                color: #333;
                line-height: 1.6;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                background-color: #FAFAFA;
                padding: 20px;
                border-radius: 8px;
            }
            .header {
                text-align: center;
                margin-bottom: 20px;
            }
            .header h1 {
                color: #2c3e50;
                font-size: 24px;
                margin: 0;
            }
            .header p {
                color: #7f8c8d;
                font-size: 14px;
                margin: 5px 0 0;
            }
            .section {
                margin-bottom: 30px;
            }
            .section-title {
                font-size: 28px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }

            .info-grid {
                column-count: 2;
                column-gap: 40px;
            }

            .info-item {
                display: flex;
                flex-direction: column;
                padding: 8px 0;
                margin: 0 0 12px;
                break-inside: avoid;
                -webkit-column-break-inside: avoid;
                page-break-inside: avoid;
            }

            .label {
                color: #555;
                font-size: 16px;
                font-weight: bold;
                margin: 0 0 4px 0;
            }

            .value {
                color: #333;
                font-size: 16px;
                margin: 0;
            }

            .value img {
                max-width: 40%;
                height: auto;
                display: block;
                border-radius: 4px;
            }

            @media (max-width: 768px) {
                .info-grid {
                    column-count: 1;
                }
            }

            .testimoni-grid {
                display: grid;
                grid-template-columns: 1fr 1fr; /* bagi jadi 2 kolom */
                gap: 20px 40px; /* jarak antar item */
            }

            .testimoni-item {
                margin-bottom: -25px;
                break-inside: avoid;
            }

            .testimoni-question {
                font-size: 16px;
                color: #9E9E9E;
                margin-bottom: -15px;
            }

            .testimoni-answer {
                font-size: 16px;
                color: #333;
                font-weight: bold;
            }

            /* responsif biar di HP jadi 1 kolom */
            @media (max-width: 768px) {
                .testimoni-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Laporan Data Pendaftar dan Hasil Tes Psikologi</h1>
                <p>
                    <strong>Nama Pendaftar:</strong>
                    {{ $registrant->user->name }} |
                    <strong>Tanggal Laporan:</strong>
                    {{ \Carbon\Carbon::now()->format("d F Y") }}
                </p>
                <a href="{{ route("dashboard.registrants.report.export", $registrant->id) }}" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3"><span class="leading-none">Export</span></a>
            </div>

            <!-- Data Diri -->
            <div class="section">
                <h2 class="section-title">Data Diri Pendaftar</h2>
                <div class="info-grid">
                    <!-- bagian kanan -->
                    <div class="info-item">
                        <p class="label">Nama Lengkap</p>
                        <p class="value">{{ $registrant->user->name }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Umur</p>
                        <p class="value">{{ $registrant->age }} tahun</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Email</p>
                        <p class="value">{{ $registrant->user->email }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Layanan Psikotes</p>
                        <p class="value">{{ $registrant->psikotes_service }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Waktu Tes</p>
                        <p class="value">{{ \Carbon\Carbon::parse($registrant->schedule)->format("H:i") }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Kata Sandi</p>
                        <p class="value">berbinar</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Diskon</p>
                        <p class="value">{{ $registrant->discount_percentage ? $registrant->discount_percentage . "%" : "-" }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Alasan Pendaftaran</p>
                        <p class="value">{{ $registrant->reason }}</p>
                    </div>
                    <!-- bagian kanan -->
                    <div class="info-item">
                        <p class="label">Jenis Kelamin</p>
                        <p class="value">{{ $registrant->gender == "male" ? "Laki-laki" : "Perempuan" }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">No. Telepon</p>
                        <p class="value">{{ $registrant->phone_number }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Domisili</p>
                        <p class="value">{{ $registrant->domicile }}</p>
                    </div>

                    <div class="info-item">
                        <p class="label">Tanggal Tes</p>
                        <p class="value">{{ \Carbon\Carbon::parse($registrant->schedule)->format("d F Y") }}</p>
                    </div>

                    <div class="info-item">
                        <p class="label">Nama Pengguna</p>
                        <p class="value">{{ $registrant->user->username }}</p>
                    </div>

                    <div class="info-item">
                        <p class="label">Kode Voucher</p>
                        <p class="value">{{ $registrant->voucher_code ? $registrant->voucher_code : "-" }}</p>
                    </div>

                    <div class="info-item">
                        <p class="label">Bukti Kartu Pelajar</p>
                        <p class="value">
                            @if ($registrant->student_card)
                                <!-- <a href="{{ asset("storage/" . $registrant->student_card) }}" target="_blank">Lihat Bukti</a> -->
                                <img src="{{ asset("storage/" . $registrant->student_card) }}" alt="" />
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Detail Tes -->
            <div class="section">
                <h2 class="section-title">Detail Tes dan Pembayaran</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <p class="label">Kategori Psikotes</p>
                        <p class="value">{{ $registrant->testType->testCategory->name }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Harga Asli</p>
                        <p class="value">{{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Jenis Psikotes</p>
                        <p class="value">{{ $registrant->testType->name }}</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Harga Setelah Diskon</p>
                        <p class="value">{{ $registrant->discount_percentage ? "Rp" . number_format($registrant->testType->price - ($registrant->testType->price * $registrant->discount_percentage) / 100, 0, ",", ".") : "-" }}</p>
                    </div>
                </div>
            </div>

            <!-- Hasil Tes -->
            <div class="section">
                <div>
                    @if(!empty($testResults) && count($testResults))
                        @foreach ($testResults as $result)
                            @php
                                // buat slug dari nama tool untuk mencocokkan nama file blade di folder tools
                                $toolView = "dashboard.ptpm_psikotes-paid.registrants.report.tools." . \Illuminate\Support\Str::slug($result['tool']->name);
                            @endphp

                            @if (View::exists($toolView))
                                @include($toolView, ["tool" => $result["tool"], "attempt" => $result["attempt"], "data" => $result["data"]])
                            @else
                                <p style="text-align: center; color: #7f8c8d">Hasil tes untuk alat psikotes {{ $result["tool"]->name }} belum tersedia.</p>
                            @endif

                            <br />
                        @endforeach
                    @else
                        <p style="text-align: center; color: #7f8c8d">Belum ada hasil tes untuk pendaftar ini.</p>
                    @endif
                </div>
            </div>



            <!-- Hasil Tes buat debuging -->
            <!-- <div class="section">
                <h2 class="section-title">Hasil Tes Psikologi</h2>
                <div>
                    @php
                        $debugTool = request()->get('debug_tool', null); // nama file blade tanpa .blade.php
                        $debugAttemptIndex = (int) request()->get('debug_attempt', 0);
                        $firstResult = (!empty($testResults) && count($testResults)) ? $testResults[0] : null;
                    @endphp

                    @if ($debugTool)
                        @php
                            $toolViewDebug = "dashboard.ptpm_psikotes-paid.registrants.report.tools." . $debugTool;
                            // pilih attempt sesuai index kalau ada
                            $chosen = null;
                            if (!empty($testResults) && count($testResults)) {
                                $all = $testResults;
                                $chosen = $all[$debugAttemptIndex] ?? $all[0];
                            }
                            $attemptForDebug = $chosen['attempt'] ?? null;
                            $dataForDebug = $chosen['data'] ?? null;
                            $responseForDebug = ($dataForDebug && $dataForDebug instanceof \Illuminate\Support\Collection && $dataForDebug->count()) ? $dataForDebug->first() : ($dataForDebug ?? null);
                        @endphp

                        @if (\View::exists($toolViewDebug))
                            @include($toolViewDebug, [
                                'tool' => $chosen['tool'] ?? null,
                                'attempt' => $attemptForDebug,
                                'data' => $dataForDebug,
                                'responses' => $dataForDebug,
                                'response' => $responseForDebug,
                            ])
                        @else
                            <p style="text-align:center; color:#7f8c8d">Debug view "{{ $debugTool }}" tidak ditemukan.</p>
                        @endif
                    @else
                        {{-- kode normal (tetap ada) --}}
                        @if(!empty($testResults) && count($testResults))
                            @foreach ($testResults as $result)
                                @php
                                    $toolView = "dashboard.ptpm_psikotes-paid.registrants.report.tools." . \Illuminate\Support\Str::slug($result['tool']->name);
                                @endphp

                                @if (View::exists($toolView))
                                    @include($toolView, ["tool" => $result["tool"], "attempt" => $result["attempt"], "data" => $result["data"]])
                                @else
                                    <p style="text-align: center; color: #7f8c8d">Hasil tes untuk alat psikotes {{ $result["tool"]->name }} belum tersedia.</p>
                                @endif

                                <br />
                            @endforeach
                        @else
                            <p style="text-align: center; color: #7f8c8d">Belum ada hasil tes untuk pendaftar ini.</p>
                        @endif
                    @endif
                </div>
            </div> -->

            <!-- Testimoni -->
            <div class="section">
                <h2 class="section-title">Testimoni Pendaftar</h2>
                <div class="testimoni-grid">
                    @foreach ($registrant->user->testimonials as $testimoni)
                        <div class="testimoni-item">
                            <p class="testimoni-question">{{ $testimoni->question }}</p>
                            <p class="testimoni-answer">{{ $testimoni->answer }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
