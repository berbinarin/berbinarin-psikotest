<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        /* General */
        body {
            font-family: 'Arial', sans-serif;
            margin: 40px;
            color: #333;
            background-color: #f7f9fc;
        }

        h2.section-title {
            font-size: 28px;
            font-weight: bold;
            color: #75BADB;
            margin-bottom: 25px;
        }

        /* Chart Container */
        .chart-container {
            display: flex;
            align-items: flex-start;
            gap: 40px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .chart-left, .chart-right {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .chart-left {
            flex: 1 1 60%;
        }

        .chart-right {
            flex: 0 0 220px;
        }

        /* Bar Chart */
        .chart {
            margin-bottom: 20px;
        }

        .bar {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .bar div {
            height: 30px;
            border-radius: 6px;
        }

        .bar span {
            margin-left: 12px;
            font-weight: bold;
            min-width: 30px;
        }

        /* Legend */
        .legend {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .legend-swatch {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            flex-shrink: 0;
            border: 1px solid rgba(0,0,0,0.1);
        }

        /* Score Summary */
        .score-summary span {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .score-summary b {
            color: #444;
        }

        /* Detail Jawaban */
        .detail {
            margin-top: 40px;
        }

        .subtest-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .subtest {
            flex: 1 1 calc(50% - 20px);
            background-color: #fff;
            padding: 16px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .subtest h4 {
            color: #3993d2;
            font-size: 16px;
            margin-bottom: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 8px 10px;
            font-size: 14px;
        }

        th {
            color: #555;
            border-bottom: 2px solid #eee;
        }

        td {
            border-bottom: 1px solid #eee;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .chart-container {
                flex-direction: column;
            }
            .chart-left, .chart-right {
                width: 100%;
            }
            .subtest {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <h2 class="section-title">Hasil Tes Psikologi DASS-42</h2>

    {{-- Ringkasan skor --}}
    @php
        $categories = ['depression', 'anxiety', 'stress'];
        $highest = collect($data)->sortByDesc('score')->first();
        $colors = [
            'depression' => '#3986a3',
            'anxiety' => '#e9b306',
            'stress' => '#c893fd',
        ];
    @endphp

    <div class="chart-container">
        <div class="chart-left">
            <div class="chart">
                @foreach ($categories as $key)
                    @php
                        $score = $data[$key]['score'] ?? 0;
                    @endphp
                    <div class="bar">
                        <div style="background-color: {{ $colors[$key] }}; width: {{ $score * 5 }}px;"></div>
                        <span>{{ $score }}</span>
                    </div>
                @endforeach
            </div>

            <div class="score-summary">
                @foreach ($categories as $key)
                    <span>Total poin pada {{ ucfirst($key) }}:
                        <b>{{ $data[$key]['score'] ?? '-' }} poin @if(isset($data[$key]['description'])) - {{ $data[$key]['description'] }} @endif</b>
                    </span>
                @endforeach
            </div>
        </div>

        <div class="chart-right">
            <div class="legend">
                @foreach ($categories as $key)
                    <div class="legend-item">
                        <div class="legend-swatch" style="background-color: {{ $colors[$key] }}"></div>
                        <div>{{ ucfirst($key) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Detail Jawaban --}}
    <div class="detail">
        <h3>Detail Jawaban:</h3>
        <div class="subtest-container">
            @foreach ($attempt->responses->groupBy('question.subtest') as $subtestName => $responses)
                <div class="subtest">
                    <h4>{{ $subtestName }}</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Pernyataan</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($responses as $response)
                                <tr>
                                    <td>{{ $response->question->text }}</td>
                                    <td>{{ $response->question->scoring['scale'] ?? '-' }}</td>
                                    <td>{{ $response->answer['value'] ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
