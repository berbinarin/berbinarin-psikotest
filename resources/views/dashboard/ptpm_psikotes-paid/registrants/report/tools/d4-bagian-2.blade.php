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

            .section-title {
                font-size: 20px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }

            .bar-box {
                height: 45px;
                border-radius: 4px;
            }
            .bar1 {
                background: #549ff0;
                width: 200px;
            }
            .bar2 {
                background: #ef4444;
                width: 400px;
            }

            .legend-swatch {
                width: 14px;
                height: 14px;
                border-radius: 50%;
                border: 1px solid rgba(0, 0, 0, 0.08);
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border-bottom: 1px solid #ddd;
                padding: 6px 10px;
                font-size: 14px;
            }

            th {
                color: #555;
            }

            .table-no-border td,
            .table-no-border th {
                border-bottom: none;
            }
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Psikologi D4-Bagian 2</h2>

        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 20px" class="table-no-border">
            <tr>
                <!-- KIRI BAR CHART -->
                <td width="70%" valign="top">
                    <table cellpadding="6" cellspacing="0">
                        <tr>
                            <td width="65%">
                                <div class="bar-box bar1"></div>
                            </td>
                            <td width="35%" style="font-weight: bold">
                                {{ $data["correct"] ?? 0 }}
                            </td>
                        </tr>

                        <tr>
                            <td width="65%">
                                <div class="bar-box bar2"></div>
                            </td>
                            <td width="35%" style="font-weight: bold">
                                {{ $data["wrong"] ?? 0 }}
                            </td>
                        </tr>
                    </table>

                    <p style="margin-top: 10px">
                        Total poin benar:
                        <b>{{ $data["correct"] ?? 0 }} poin</b>
                    </p>
                    <p>
                        Total poin salah:
                        <b>{{ $data["wrong"] ?? 0 }} poin</b>
                    </p>
                    <p>
                        Kategori:
                        <b>{{ $data["category"] ?? "-" }}</b>
                    </p>
                    <p>
                        Persentil:
                        <b>{{ $data["percentile"] ?? "-" }}</b>
                    </p>
                </td>

                <!-- KANAN LEGEND -->
                <td width="30%" valign="top" style="padding-left: 20px">
                    <table cellpadding="6" cellspacing="0">
                        <tr>
                            <td><div class="legend-swatch bar1"></div></td>
                            <td>Benar</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch bar2"></div></td>
                            <td>Salah</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch" style="background: #808080"></div></td>
                            <td>Tak Terjawab</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kunci Jawaban</th>
                        <th>Jawaban Pengguna</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attempt->responses as $i => $response)
                        @php
                            $answerKey = $response->question->scoring["correct_answer"] ?? null;
                            $optionTextKey = "";
                            foreach ($response->question->options as $option) {
                                if ($option["key"] == $answerKey) {
                                    $optionTextKey = $option["text"];
                                    break;
                                }
                            }

                            $userChoice = $response->answer["choice"] ?? null;
                            $optionText = "";
                            foreach ($response->question->options as $option) {
                                if ($option["key"] == $userChoice) {
                                    $optionText = $option["text"];
                                    break;
                                }
                            }
                        @endphp

                        <tr>
                            <td>{{ $i + 1 }}.</td>
                            <td>{{ $answerKey }}. {{ $optionTextKey }}</td>
                            <td>{{ $userChoice }}. {{ $optionText }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
