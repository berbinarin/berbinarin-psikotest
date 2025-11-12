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

            .subtest h4 {
                font-weight: bold;
                color: #75badb;
                display: inline-block;
                border-bottom: 3px solid #75badb;
                padding-bottom: 5px;
                margin-bottom: 15px;
            }

        </style>
    </head>
    <body>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama tes</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($checkpoints as $index => $checkpoint)
                        <tr>
                            <td>{{ $index + 1 }}.</td>
                            <td>{{ $checkpoint->attempt->tool->name ?? 'Tidak diketahui' }}</td>
                            <td>{{ $checkpoint->question['text'] ?? '-' }}</td>
                            @php
                                $answerData = json_decode($checkpoint->answer, true);
                                $answerText = '-';

                                if (isset($answerData['value'])) {
                                    // Jawaban tipe isian bebas (value)
                                    $answerText = $answerData['value'];
                                } elseif (isset($answerData['choice'])) {
                                    // Jawaban tipe pilihan ganda
                                    $choiceKey = $answerData['choice'];
                                    $answerText = $choiceKey; // tampilkan key (misal "B")

                                    // Jika ingin tampilkan teks opsinya juga
                                    $question = $checkpoint->question;
                                    if ($question && isset($question->options)) {
                                        $options = is_array($question->options) ? $question->options : json_decode($question->options, true);
                                        foreach ($options as $opt) {
                                            if ($opt['key'] === $choiceKey) {
                                                $answerText = "{$opt['text']}";
                                                break;
                                            }
                                        }
                                    }
                                }
                            @endphp

                            <td>{{ $answerText }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center; color:#999;">Belum ada data checkpoint untuk user ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
</html>
