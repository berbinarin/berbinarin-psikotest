<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hasil Tes VAK</title>
    <style>
        /* ===== Body & Typography ===== */
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #333;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 28px;
            font-weight: bold;
            color: #75badb;
            padding-bottom: 5px;
            margin-bottom: -5px;
        }

        /* ===== Chart Container ===== */
        .chart-container {
            display: flex;
            align-items: flex-start;
            margin: 20px 0;
        }

        .chart-left {
            flex: 1;
        }

        .chart-left p.desc {
            max-width: 500px;
            margin-top: 10px;
            line-height: 1.6;
        }

        .chart-right {
            width: 220px;
            min-width: 160px;
        }

        /* ===== Bars ===== */
        .chart {
            margin: 0;
            max-width: 80%;
        }

        .bar {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .bar span {
            margin-left: 10px;
            font-weight: bold;
        }

        .bar1 { background: #3986a3; height: 45px; border-radius: 4px; }
        .bar2 { background: #e9b306; height: 45px; border-radius: 4px; }
        .bar3 { background: #c893fd; height: 45px; border-radius: 4px; }

        /* ===== Legend ===== */
        .legend {
            margin-top: 6px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .legend-swatch {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            flex-shrink: 0;
            border: 1px solid rgba(0,0,0,0.08);
        }

        /* ===== Detail / Subtests ===== */
        .detail {
            margin-top: 20px;
        }

        .detail h3 {
            margin-bottom: -10px;
            font-size: 18px;
        }

        .subtest-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-right: -40px;
        }

        .subtest {
            flex: 0 0 calc(50% - 30px);
            max-width: calc(50% - 30px);
            box-sizing: border-box;
        }

        .subtest h4 {
            color: #75badb;
            font-size: 20px;
            font-weight: bold;
            display: inline-block;
            border-bottom: 4px solid #75badb;
            padding-bottom: 2px;
            margin-bottom: 10px;
        }

        /* ===== Table ===== */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            text-align: left;
            padding: 6px 10px;
            font-size: 14px;
        }

        th {
            color: #555;
        }

        /* ===== Responsive ===== */
        @media (max-width: 900px) {
            .subtest {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        @media (max-width: 700px) {
            .chart-container {
                flex-direction: column;
            }
            .chart-right {
                width: 100%;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <h2 class="section-title">Hasil Tes Psikologi VAK</h2>

    <div class="chart-container">
        <div class="chart-left">
            <div class="chart">
                <!-- Bar chart dinamis -->
                <div class="bar">
                    <div class="bar1" style="width: calc({{ $data['scores']['visual'] ?? 0 }}%); height:45px; background:#3986a3; border-radius:4px;"></div>
                    <span>{{ $data['scores']['visual'] ?? 0 }}</span>
                </div>
                <div class="bar">
                    <div class="bar2" style="width: calc({{ $data['scores']['auditori'] ?? 0 }}%); height:45px; background:#e9b306; border-radius:4px;"></div>
                    <span>{{ $data['scores']['auditori'] ?? 0 }}</span>
                </div>
                <div class="bar">
                    <div class="bar3" style="width: calc({{ $data['scores']['kinestetik'] ?? 0 }}%); height:45px; background:#c893fd; border-radius:4px;"></div>
                    <span>{{ $data['scores']['kinestetik'] ?? 0 }}</span>
                </div>
            </div>
            <p class="desc">Kecenderungan siswa untuk menerima informasi dalam belajar dengan menggunakan indera penglihatan, pendengaran, atau gerakan. Gaya belajar ini mengakses citra visual, audio, dan kinestetik untuk memproses informasi.</p>
        </div>

        <div class="chart-right">
            <div class="legend">
                <div class="legend-item">
                    <div class="legend-swatch" style="background:#3986a3;"></div>
                    <div>Visual</div>
                </div>
                <div class="legend-item">
                    <div class="legend-swatch" style="background:#e9b306;"></div>
                    <div>Auditori</div>
                </div>
                <div class="legend-item">
                    <div class="legend-swatch" style="background:#c893fd;"></div>
                    <div>Kinestetik</div>
                </div>
            </div>
        </div>
    </div>

    <div class="detail">
        <h3>Detail Jawaban:</h3>
        <div class="subtest-container">
            @foreach(['visual','auditori','kinestetik'] as $category)
            <div class="subtest">
                <h4>Subtest {{ ucfirst($category) }}</h4>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data['responses_by_category'][$category] ?? [] as $i => $response)
                        <tr>
                            <td>{{ $i+1 }}.</td>
                            <td>{{ $response->answer['text'] ?? $response->answer['value'] ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" style="text-align:center; color:#aaa;">Tidak ada jawaban</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
