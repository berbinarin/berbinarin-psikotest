<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hasil Tes VAK</title>
    <style>

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
            font-size: 20px;
            font-weight: bold;
            color: #75badb;
            padding-bottom: 5px;
            margin-bottom: -5px;
        }


        .chart-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .chart-table td {
            vertical-align: top;
            padding: 0;
        }

        .bars-table {
            border-collapse: collapse;
            width: 100%;
        }
        .bars-table td {
            padding: 4px 0; 
            font-size: 14px;
            vertical-align: middle;
        }

        .bar {
            display: inline-block;
            height: 45px;
            border-radius: 4px;
            vertical-align: middle;
        }
        .bar + .bar-value {
            padding-left: 6px;
            font-weight: bold;
            vertical-align: middle;
            display: inline-block;
        }

        .bar1 { background:#3986a3; }
        .bar2 { background:#e9b306; }
        .bar3 { background:#c893fd; }

        .legend-table {
            border-collapse: collapse;
            width: 100%;
        }
        .legend-table td {
            padding: 4px 6px; 
            font-size: 14px;
            vertical-align: middle;
            white-space: nowrap;
        }
        .legend-swatch {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            display: inline-block;
            border: 1px solid rgba(0,0,0,0.08);
            margin-right: 6px; 
        }

        .legend-table td:first-child { width: 28px; padding-right:4px; }

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

        @media (max-width: 900px) {
            .subtest {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        @media (max-width: 700px) {
            .chart-table td { display: block; width: 100% !important; }
            .legend-table td { padding-top: 8px; }
        }
    </style>
</head>
<body>
    <h2 class="section-title">Hasil Tes Psikologi VAK</h2>

    @php
        $maxWidth = 400;
        $visualScore = (float) ($data['scores']['visual'] ?? 0);
        $auditoryScore = (float) ($data['scores']['auditori'] ?? 0);
        $kinScore = (float) ($data['scores']['kinestetik'] ?? 0);

        $visualScore = max(0, min(100, $visualScore));
        $auditoryScore = max(0, min(100, $auditoryScore));
        $kinScore = max(0, min(100, $kinScore));

        $visualWidth = ($visualScore / 100) * $maxWidth;
        $auditoryWidth = ($auditoryScore / 100) * $maxWidth;
        $kinWidth = ($kinScore / 100) * $maxWidth;
    @endphp

    <table class="chart-table table-no-border" cellpadding="0" cellspacing="0">
        <tr>
            <!-- Left: bars -->
            <td style="vertical-align: top; width: 50%; padding-right: 10px;">
                <table class="bars-table" cellpadding="0" cellspacing="6">
                    <tr>
                        <td>
                            <div class="bar bar1" style="width: {{ round($visualWidth,2) }}px;"></div>
                        </td>
                        <td class="bar-value">{{ $visualScore }}</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="bar bar2" style="width: {{ round($auditoryWidth,2) }}px;"></div>
                        </td>
                        <td class="bar-value">{{ $auditoryScore }}</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="bar bar3" style="width: {{ round($kinWidth,2) }}px;"></div>
                        </td>
                        <td class="bar-value">{{ $kinScore }}</td>
                    </tr>
                </table>

                <p class="desc" style="margin-top:10px;">
                    Kecenderungan siswa untuk menerima informasi dalam belajar dengan menggunakan indera penglihatan, pendengaran, atau gerakan. Gaya belajar ini mengakses citra visual, audio, dan kinestetik untuk memproses informasi.
                </p>
            </td>

            <!-- Right: legend -->
            <td style="vertical-align: top; width: 50%; padding-left: 20px;">
                <table class="legend-table" cellpadding="0" cellspacing="1">
                    <tr>
                        <td><div class="legend-swatch" style="background:#3986a3;"></div></td>
                        <td>Visual</td>
                    </tr>
                    <tr>
                        <td><div class="legend-swatch" style="background:#e9b306;"></div></td>
                        <td>Auditori</td>
                    </tr>
                    <tr>
                        <td><div class="legend-swatch" style="background:#c893fd;"></div></td>
                        <td>Kinestetik</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

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
                            @php
                                $answerValue = $response->answer['value'];
                                $optionLabel = collect($response->question->options ?? [])->firstWhere('value', (string)$answerValue)['text'] ?? $answerValue;
                            @endphp
                            <td>{{ $response->answer['text'] ?? $response->answer['value'] ?? '-' }} - {{ $optionLabel }}</td>
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
