<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background-color: #fff;
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
            font-size: 18px;
            font-weight: bold;
            color: #34495e;
            border-bottom: 2px solid #34495e;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #eee;
        }
        .info-table td:first-child {
            width: 35%;
            font-weight: bold;
            color: #555;
        }
        .test-detail-list {
            list-style: none;
            padding: 0;
        }
        .test-detail-list li {
            margin-bottom: 8px;
        }
        .test-detail-list li strong {
            color: #34495e;
        }
        .testimonial-item {
            background-color: #f9f9f9;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .testimonial-question {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }
        .testimonial-answer {
            font-style: italic;
            color: #666;
        }
        .reason-box {
            background-color: #f0f4f7;
            border: 1px solid #dcdcdc;
            padding: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Laporan Data Pendaftar dan Hasil Tes Psikologi</h1>
            <p><strong>Nama Pendaftar:</strong> {{ $registrant->user->name }} | <strong>Tanggal Laporan:</strong> {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
        </div>

        <div class="section">
            <h2 class="section-title">1. Data Diri Pendaftar</h2>
            <table class="info-table">
                <tr>
                    <td>Nama Lengkap</td>
                    <td>{{ $registrant->user->name }}</td>
                    <td>Jenis Kelamin</td>
                    <td>{{ $registrant->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>{{ $registrant->age }} tahun</td>
                    <td>No. Telepon</td>
                    <td>{{ $registrant->phone_number }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $registrant->user->email }}</td>
                    <td>Domisili</td>
                    <td>{{ $registrant->domicile }}</td>
                </tr>
                <tr>
                    <td>Layanan Psikotes</td>
                    <td>{{ $registrant->psikotes_service }}</td>
                    <td>Tanggal Tes</td>
                    <td>{{ \Carbon\Carbon::parse($registrant->schedule)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Waktu Tes</td>
                    <td>{{ \Carbon\Carbon::parse($registrant->schedule)->format('H:i') }}</td>
                    <td>Nama Pengguna</td>
                    <td>{{ $registrant->user->username }}</td>
                </tr>
                <tr>
                    <td>Kata Sandi</td>
                    <td>berbinar</td>
                    <td>Kode Voucher</td>
                    <td>{{ $registrant->voucher_code ? $registrant->voucher_code : '-' }}</td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>{{ $registrant->discount_percentage ? $registrant->discount_percentage . '%' : '-' }}</td>
                    <td>Bukti Kartu Pelajar</td>
                    <td>
                        @if($registrant->student_card)
                            <a href="{{ url('storage/' . $registrant->student_card) }}" target="_blank">Lihat Bukti</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Alasan Pendaftaran</td>
                    <td colspan="3">
                        <div class="reason-box">{{ $registrant->reason }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2 class="section-title">2. Detail Tes dan Pembayaran</h2>
            <ul class="test-detail-list">
                <li><strong>Kategori Psikotes:</strong> {{ $registrant->testType->testCategory->name }}</li>
                <li><strong>Jenis Psikotes:</strong> {{ $registrant->testType->name }}</li>
                <li><strong>Harga Asli:</strong> {{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}</li>
                <li><strong>Harga Setelah Diskon:</strong> {{ $registrant->discount_percentage ? ("Rp" . number_format($registrant->testType->price - ($registrant->testType->price * $registrant->discount_percentage/100), 0, ",", ".")) : '-' }}</li>
            </ul>
        </div>

        <div class="section">
            <h2 class="section-title">3. Hasil Tes Psikologi</h2>
            <div style="background-color: #f0f4f7; padding: 20px; border-radius: 8px;">
                @if (View::exists("dashboard.ptpm_psikotes-paid.tools.data.attempts.results." . \Illuminate\Support\Str::slug($tool->name)))
                    @include("dashboard.ptpm_psikotes-paid.tools.data.attempts.results." . \Illuminate\Support\Str::slug($tool->name))
                @else
                    <p style="text-align: center; color: #7f8c8d;">Hasil tes untuk alat psikotes {{ $tool->name }} belum tersedia.</p>
                @endif
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">4. Testimoni Pendaftar</h2>
            @foreach ($registrant->user->testimonials as $testimoni)
                <div class="testimonial-item">
                    <p class="testimonial-question">{{ $testimoni->question }}</p>
                    <p class="testimonial-answer">{{ $testimoni->answer }}</p>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
