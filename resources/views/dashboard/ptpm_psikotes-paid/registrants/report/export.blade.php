@php
    usort($testResults, function ($a, $b) {
        $aIsBiodata = stripos($a['tool']->name, 'biodata') !== false;
        $bIsBiodata = stripos($b['tool']->name, 'biodata') !== false;

        if ($aIsBiodata && !$bIsBiodata) return -1;

        if ($bIsBiodata && !$aIsBiodata) return 1;

        return 0;
    });
@endphp

@php
    $path = storage_path('app/public/' . $registrant->student_card);
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $studentCardImage = 'data:image/' . $type . ';base64,' . base64_encode($data);
@endphp

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laporan Pendaftar</title>
        <style>
            @page {
                margin: 0;
                background-color: #FFFFFF;
            }
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                /* padding: 20px; */
                color: #333;
                line-height: 1.6;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                background-color: #FFFFFF;
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
                font-size: 20px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }

            .info-table{
                width: 100%;
                margin-bottom: 20px;
                border: none !important;
                outline: none !important;
                box-shadow: none !important;
            }

            .info-table td {
                border: none !important;
                outline: none !important;
                box-shadow: none !important;
            }
            .info-table td:first-child {
                width: 50%;
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

            .testimoni-item {
                display: block;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 5px 16px;
                margin-bottom: 7px;
                page-break-inside: avoid; /* lebih kompatibel di dompdf daripada break-inside */
            }

            .testimoni-question {
                color: #555;
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 6px;
            }

            .testimoni-answer {
                color: #333;
                font-size: 14px;
                line-height: 1.5;
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
            </div>

            <!-- Data Diri -->
            <div class="section">
                <h2 class="section-title">Data Diri Pendaftar</h2>
                <table class="info-table">
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Nama Lengkap</p>
                                <p class="value">{{ $registrant->user->name }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">Umur</p>
                                <p class="value">{{ $registrant->age }} tahun</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Email</p>
                                <p class="value">{{ $registrant->user->email }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">Layanan Psikotes</p>
                                <p class="value">{{ $registrant->psikotes_service }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Waktu Tes</p>
                                <p class="value">{{ \Carbon\Carbon::parse($registrant->schedule)->format("H:i") }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">Kata Sandi</p>
                                <p class="value">berbinar</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Diskon</p>
                                <p class="value">{{ $registrant->discount_percentage ? $registrant->discount_percentage . "%" : "-" }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">Alasan Pendaftaran</p>
                                <p class="value">{{ $registrant->reason }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Jenis Kelamin</p>
                                <p class="value">{{ $registrant->gender == "male" ? "Laki-laki" : "Perempuan" }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">No. Telepon</p>
                                <p class="value">{{ $registrant->phone_number }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Domisili</p>
                                <p class="value">{{ $registrant->domicile }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">Tanggal Tes</p>
                                <p class="value">{{ \Carbon\Carbon::parse($registrant->schedule)->format("d F Y") }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Nama Pengguna</p>
                                <p class="value">{{ $registrant->user->username }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">Kode Voucher</p>
                                <p class="value">{{ $registrant->voucher_code ? $registrant->voucher_code : "-" }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="info-item">
                                <p class="label">Bukti Kartu Pelajar</p>
                                <p class="value">
                                    <img src="{{ $studentCardImage }}" alt="Bukti Kartu Pelajar" style="max-width: 50%;" />
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Detail Tes -->
            <div class="section">
                <h2 class="section-title">Detail Tes dan Pembayaran</h2>
                <table class="info-table">
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Kategori Psikotes</p>
                                <p class="value">{{ $registrant->testType->testCategory->name }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">Harga Asli</p>
                                <p class="value">{{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="info-item">
                                <p class="label">Jenis Psikotes</p>
                                <p class="value">{{ $registrant->testType->name }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-item">
                                <p class="label">Harga Setelah Diskon</p>
                                <p class="value">{{ $registrant->discount_percentage ? "Rp" . number_format($registrant->testType->price - ($registrant->testType->price * $registrant->discount_percentage) / 100, 0, ",", ".") : "-" }}</p>
                            </div>
                        </td>
                    </tr>
                </table>
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

            <!-- Checkpoint -->
            <div class="section">
                <h2 class="section-title">Checkpoint Pendaftar</h2>
                <div class="testimoni-container">
                    @include('dashboard.ptpm_psikotes-paid.registrants.report.tools.checkpoint')
                </div>
            </div>

            <!-- Testimoni -->
            <div class="section">
                <h2 class="section-title">Testimoni Pendaftar</h2>
                <div class="testimoni-container">
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
