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
            .score-summary b {
                color: #444;
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
            .bar-0 {
                background: #549ff0;
            }
            .bar-1 {
                background: #ffe066;
            }
            .bar-2 {
                background: #a685e2;
            }
            .bar-3 {
                background: #ff6b6b;
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
            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 20px;
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
            .section-title {
                font-size: 20px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Psikologi BDI</h2>

        <div class="chart-container">
            <div class="chart-left">
                <div class="chart">
                    @php
                        $categories = [
                            "0" => $data["answer_distribution"]["A"] ?? 0,
                            "1" => $data["answer_distribution"]["B"] ?? 0,
                            "2" => $data["answer_distribution"]["C"] ?? 0,
                            "3" => $data["answer_distribution"]["D"] ?? 0,
                        ];
                        $maxScore = max($categories); // untuk proporsional bar
                    @endphp

                    @foreach ($categories as $name => $score)
                        <div class="bar">
                            <div class="bar-{{ strtolower($name) }}" style="width: {{ ($score / $maxScore) * 100 }}%; height: 30px; border-radius: 4px"></div>
                            <span>{{ $score }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="score-summary">
                    <p>
                        Total skor yang didapatkan adalah
                        <b>{{ $data["total_score"] }} poin</b>
                    </p>
                    <p>
                        Kesimpulan:
                        <b>{{ $data["description"] }}</b>
                    </p>
                </div>
            </div>

            <div class="chart-right">
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-swatch bar-0" style="background: #549ff0"></div>
                        <div>0</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar-1" style="background: #ffe066"></div>
                        <div>1</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar-2" style="background: #a685e2"></div>
                        <div>2</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar-3" style="background: #ff6b6b"></div>
                        <div>3</div>
                    </div>
                </div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Poin</th>
                    <th>Jawaban Pengguna</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attempt->responses as $response)
                    @if (isset($response->question) && $response->question->type === "multiple_choice")
                        <tr class="border-b">
                            <td class="p-2 text-center">{{ $response->question->order }}.</td>
                            @php
                                $userChoice = $response->answer["choice"];
                                $optionText = "";
                                foreach ($response->question->options as $option) {
                                    if ($option["key"] == $userChoice) {
                                        $optionText = $option["text"];
                                        break;
                                    }
                                }
                                $scoringPoin = $response->question->scoring[$userChoice] ?? "";
                            @endphp

                            <td class="p-2 text-center">{{ $scoringPoin }}</td>
                            <td class="p-2">{{ $optionText }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </body>
</html>
