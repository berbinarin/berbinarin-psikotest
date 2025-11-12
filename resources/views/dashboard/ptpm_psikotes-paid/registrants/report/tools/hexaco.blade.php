@php
    $categories = array_keys($data->toArray());
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
                font-size: 28px;
                font-weight: bold;
                color: #75badb;
                margin-bottom: 10px;
            }

            .chart-container {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                margin: 20px 0;
                flex-wrap: wrap;
            }

            .chart-left {
                flex: 1;
                min-width: 400px;
            }

            .chart {
                margin: 10px 0;
            }

            .bar {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }

            .bar div {
                height: 30px;
                border-radius: 4px;
            }

            .bar span {
                margin-left: 10px;
                font-weight: bold;
                font-size: 14px;
                min-width: 30px;
            }

            .bar1 { background: #3986a3; }
            .bar2 { background: #e9b306; }
            .bar3 { background: #c893fd; }
            .bar4 { background: #549ff0; }
            .bar5 { background: #ef4444; }

            .legend {
                margin-top: 6px;
            }

            .legend-item {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 8px;
                font-size: 14px;
            }

            .legend-swatch {
                width: 14px;
                height: 14px;
                border-radius: 50%;
                border: 1px solid rgba(0,0,0,0.08);
            }

            .title-chart {
                font-weight: bold;
                color: #75badb;
                display: inline-block;
                border-bottom: 3px solid #75badb;
                padding-bottom: 5px;
                margin-bottom: 10px;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 30px;
            }

            th, td {
                border-bottom: 1px solid #ddd;
                text-align: left;
                padding: 6px 10px;
                font-size: 14px;
            }

            th {
                color: #555;
                background: #f8f8f8;
            }
        </style>
    </head>
    <body>
        <h2>Hasil Tes Psikologi HEXACO</h2>

        @foreach ($categories as $category)
            @php
                $catData = $data[$category];
                $distribution = $catData['answer_distribution'] ?? [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
                $totalScore = $catData['total_score'];
                $avg = round($catData['total_score'] / max($catData['question_count'], 1), 2);
                $average = $catData['average'] ?? '-';
                $description = $catData['description'] ?? '';
                $maxWidth = 300; // lebar maksimum bar
                $maxValue = max($distribution);
            @endphp

            <h4 class="title-chart">{{ Str::title(str_replace('_', ' ', $category)) }}</h4>
            <div class="chart-container">
                <div class="chart-left">
                    <div class="chart">
                        @foreach ($distribution as $key => $val)
                            @php
                                $width = $maxValue > 0 ? ($val / $maxValue) * $maxWidth : 0;
                            @endphp
                            <div class="bar">
                                <div class="bar{{ $key }}" style="width: {{ $width }}px;"></div>
                                <span>{{ $val }}</span>
                            </div>
                        @endforeach
                    </div>

                    <p>Total poin pada {{ Str::title($category) }}: <b>{{ $totalScore }}</b></p>
                    <p>Rata-rata poin per soal: <b>{{ $avg }}</b></p>
                    <p>Rata-rata: <b>{{ $average }}</b></p>
                    <p>Deskripsi: <b>{{ $description }}</b></p>
                </div>

                <div class="chart-right">
                    <div class="legend">
                        <div class="legend-item">
                            <div class="legend-swatch bar1"></div>
                            <div>1 = Sangat tidak sesuai</div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-swatch bar2"></div>
                            <div>2 = Tidak sesuai</div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-swatch bar3"></div>
                            <div>3 = Ragu-ragu</div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-swatch bar4"></div>
                            <div>4 = Sesuai</div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-swatch bar5"></div>
                            <div>5 = Sangat sesuai</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <h4 class="title-chart">Detail Jawaban</h4>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pernyataan</th>
                    <th>Poin</th>
                    <th>Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attempt->responses as $response)
                    @if (isset($response->question) && $response->question->scoring["scale"])
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
    </body>
</html>
