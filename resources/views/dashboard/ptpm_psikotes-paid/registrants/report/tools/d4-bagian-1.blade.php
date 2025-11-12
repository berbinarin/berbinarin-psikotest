<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            body { font-family: Arial, sans-serif; margin: 40px; color: #333; }
            h2 { font-size: 20px; margin-bottom: 10px; }
            .chart-container { display: flex; align-items: flex-start; margin: 20px 0; }
            .chart-left p { max-width: 500px; }
            .chart-right { width: 220px; min-width: 160px; }
            .chart { margin: 0; max-width: 80%; }
            .bar { display: flex; align-items: center; margin-bottom: 10px; }
            .bar span { margin-left: 10px; font-weight: bold; }
            .bar1 { background: #549FF0; width: 200px; height: 45px; border-radius: 4px; }
            .bar2 { background: #EF4444; width: 400px; height: 45px; border-radius: 4px; }
            .legend { margin-top: 6px; }
            .legend-item { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; font-size: 14px; }
            .legend-swatch { width: 14px; height: 14px; border-radius: 50%; flex-shrink: 0; border: 1px solid rgba(0,0,0,0.08); }
            .desc { margin: 20px 0 0 0; line-height: 1.6; }
            .detail { margin-top: 20px; }
            .detail h3 { margin-bottom: -10px; font-size: 18px; }
            .subtest-container { display: flex; flex-wrap: wrap; gap: 20px; margin-right: -40px; }
            .subtest { flex: 0 0 calc(50% - 30px); max-width: calc(50% - 30px); box-sizing: border-box; }
            @media (max-width: 900px) { .subtest { flex: 0 0 100%; max-width: 100%; } }
            .subtest h4 { color: #3993d2; margin-bottom: 10px; font-size: 16px; }
            table { border-collapse: collapse; width: 100%; }
            th, td { border-bottom: 1px solid #ddd; text-align: left; padding: 6px 10px; font-size: 14px; }
            th { color: #555; }
            @media (max-width: 700px) { .chart-container { flex-direction: column; } .chart-right { width: 100%; } }
            .section-title { font-size: 28px; font-weight: bold; color: #75badb; padding-bottom: 5px; margin-bottom: -5px; }
            .subtest h4 { font-weight: bold; color: #75badb; display: inline-block; border-bottom: 3px solid #75badb; padding-bottom: 5px; margin-bottom: 15px; }
            .title-chart { font-weight: bold; color: #75badb; display: inline-block; border-bottom: 3px solid #75badb; padding-bottom: 5px; margin-bottom: 15px; }
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Psikologi D4-Bagian 1</h2>

        <div class="chart-container">
            <div class="chart-left">
                <div class="chart">
                    <div class="bar">
                        <div class="bar1"></div>
                        <span>{{ $data['correct'] ?? 0 }}</span>
                    </div>
                    <div class="bar">
                        <div class="bar2"></div>
                        <span>{{ $data['wrong'] ?? 0 }}</span>
                    </div>
                </div>
                <span>
                    Total poin benar:
                    <b>{{ $data['correct'] ?? 0 }} poin</b>
                </span>
                <br />
                <span>
                    Total poin salah:
                    <b>{{ $data['wrong'] ?? 0 }} poin</b>
                </span>
                <br />
                <span>
                    Kategori:
                    <b>{{ $data['category'] ?? '-' }}</b>
                </span>
            </div>

            <div class="chart-right">
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-swatch bar1"></div>
                        <div>Benar</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar2"></div>
                        <div>Salah</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch" style="background:#808080;"></div>
                        <div>Tak Terjawab</div>
                    </div>
                </div>
            </div>
        </div>

        <div>
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
                    @foreach($attempt->responses->slice(2) as $i => $response)
                        @php
                            $answerKey = $response->question->scoring['correct_answer'] ?? null;
                            $optionTextKey = '';
                            foreach ($response->question->options as $option) {
                                if ($option['key'] == $answerKey) { $optionTextKey = $option['text']; break; }
                            }

                            $userChoice = $response->answer['choice'] ?? null;
                            $optionText = '';
                            foreach ($response->question->options as $option) {
                                if ($option['key'] == $userChoice) { $optionText = $option['text']; break; }
                            }
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $response->question->text ?? '-' }}</td>
                            <td>{{ $answerKey }}. {{ $optionTextKey }}</td>
                            <td>{{ $userChoice }}. {{ $optionText }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
