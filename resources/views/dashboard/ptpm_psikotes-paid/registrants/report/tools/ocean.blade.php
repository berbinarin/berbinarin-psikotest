@php
    use Illuminate\Support\Str;

    $categories = ["extraversion", "agreeableness", "neuroticism", "conscientiousness", "openness"];
@endphp

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

            .chart-container {
                display: flex;
                align-items: flex-start;
                margin: 20px 0;
            }

            .chart-left p {
                max-width: 500px;
            }

            .chart-right {
                width: 220px;
                min-width: 160px;
            }

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
            .bar1 {
                background: #3986a3;
                width: 200px;
                height: 45px;
                border-radius: 4px;
            }
            .bar2 {
                background: #e9b306;
                width: 400px;
                height: 45px;
                border-radius: 4px;
            }
            .bar3 {
                background: #c893fd;
                width: 100px;
                height: 45px;
                border-radius: 4px;
            }

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
                border: 1px solid rgba(0, 0, 0, 0.08);
            }

            .desc {
                margin: 20px 0 0 0;
                line-height: 1.6;
            }
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

            @media (max-width: 900px) {
                .subtest {
                    flex: 0 0 100%;
                    max-width: 100%;
                }
            }

            .subtest h4 {
                color: #3993d2;
                margin-bottom: 10px;
                font-size: 16px;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th,
            td {
                border-bottom: 1px solid #ddd;
                text-align: left;
                padding: 6px 10px;
                font-size: 14px;
            }
            th {
                color: #555;
            }

            @media (max-width: 700px) {
                .chart-container {
                    flex-direction: column;
                }
                .chart-right {
                    width: 100%;
                }
            }

            .section-title {
                font-size: 28px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Psikologi OCEAN</h2>

        @foreach ($categories as $category)
            @php
                $categoryData = $data[$category];
                $totalQuestions = $categoryData['question_count'] ?: 1;
                $maxScore = $totalQuestions * 5;
                $percentage = $maxScore > 0 ? round(($categoryData['total_score'] / $maxScore) * 100, 2) : 0;
            @endphp

            <div class="chart-container">
                <div class="chart-left">
                    <div class="chart">
                        @for ($i = 1; $i <= 5; $i++)
                            @php
                                $value = $categoryData['answer_distribution'][$i] ?? 0;
                                $width = $value * 40; // ubah multiplier sesuai skala tampilan
                                $colorClass = "bar$i";
                            @endphp
                            <div class="bar">
                                <div class="{{ $colorClass }}" style="width: {{ $width }}px;"></div>
                                <span>{{ $value }}</span>
                            </div>
                        @endfor
                    </div>

                    <p>Total poin pada {{ Str::title($category) }}: <b>{{ $categoryData['total_score'] }} poin</b></p>
                    <p>Rata-rata poin per soal: <b>{{ round($categoryData['total_score'] / $totalQuestions, 2) }}</b></p>
                    <p>Persentase: <b>{{ $percentage }}%</b></p>
                </div>

                <div class="chart-right">
                    <div class="legend">
                        <div class="legend-item"><div class="legend-swatch bar1"></div>1 = Sangat Tidak Sesuai</div>
                        <div class="legend-item"><div class="legend-swatch bar2"></div>2 = Tidak Sesuai</div>
                        <div class="legend-item"><div class="legend-swatch bar3"></div>3 = Ragu-ragu</div>
                        <div class="legend-item"><div class="legend-swatch bar4"></div>4 = Sesuai</div>
                        <div class="legend-item"><div class="legend-swatch bar5"></div>5 = Sangat Sesuai</div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="detail">
            <h3>Detail Jawaban OCEAN:</h3>

            <div class="subtest-container">
                @foreach ($categories as $category)
                    <div class="subtest">
                        <h4>{{ Str::title($category) }}</h4>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Poin</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attempt->responses as $response)
                                    @if (isset($response->question) && $response->question->scoring["scale"] === $category)
                                        <tr>
                                            <td>{{ $response->question->order }}</td>
                                            <td>{{ $response->question->text }}</td>
                                            <td>{{ $response->answer["value"] }}</td>
                                            <td>{{ collect($response->question->options)->firstWhere("value", $response->answer["value"])["text"] ?? "N/A" }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
