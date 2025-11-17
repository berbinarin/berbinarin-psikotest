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
        .bar {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .bar span {
            margin-left: 10px;
            font-weight: bold;
        }
        .bar-extraversion { background:#549FF0; }
        .bar-neuroticism { background:#FFE066; }
        .bar-lie { background:#A685E2; }
        .legend { margin-top: 6px; }
        .legend-item { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; font-size: 14px; }
        .legend-swatch { width: 14px; height: 14px; border-radius: 50%; flex-shrink: 0; border: 1px solid rgba(0,0,0,0.08); }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border-bottom: 1px solid #ddd; text-align: left; padding: 6px 10px; font-size: 14px; }
        th { color: #555; }
        .section-title { font-size: 20px; font-weight: bold; color: #75badb; padding-bottom: 5px; margin-bottom: -5px; }
    </style>
</head>
<body>

    <h2 class="section-title">Hasil Tes Psikologi EPI</h2>

    <div class="chart-container">
        <div class="chart-left">
            <div class="chart">
                @php
                    $categories = [
                        'Extraversion' => $data['extroversion']['total_score'] ?? 0,
                        'Neuroticism' => $data['neuroticism']['total_score'] ?? 0,
                        'Lie' => $data['lie']['total_score'] ?? 0,
                    ];
                    $maxScore = max($categories); // untuk proporsional bar
                @endphp

                @foreach($categories as $name => $score)
                    <div class="bar">
                        <div class="bar-{{ strtolower($name) }}" style="width: {{ ($score/$maxScore)*100 }}%; height: 30px; border-radius: 4px;"></div>
                        <span>{{ $score }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="chart-right">
            <div class="legend">
                <div class="legend-item">
                    <div class="legend-swatch bar-extraversion" style="background:#549FF0;"></div>
                    <div>Extraversion</div>
                </div>
                <div class="legend-item">
                    <div class="legend-swatch bar-neuroticism" style="background:#FFE066;"></div>
                    <div>Neuroticism</div>
                </div>
                <div class="legend-item">
                    <div class="legend-swatch bar-lie" style="background:#A685E2;"></div>
                    <div>Lie</div>
                </div>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pernyataan</th>
                <th>Jawaban Pengguna</th>
                <th>Poin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attempt->responses as $response)
                @php
                    $userAnswer = $response->answer['value'];
                    $correctAnswer = $response->question->scoring['correct_answer'];

                    $score = ($userAnswer == $correctAnswer) ? 1 : 0;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $response->question->text ?? '-' }}</td>
                    <td>{{ $response->answer['value'] ? 'Ya' : 'Tidak'}}</td>
                    <td>{{ $score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
