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
                margin-bottom: 10px;
            }

            .bar-box {
                height: 30px;
                border-radius: 4px;
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

            .legend-swatch {
                width: 14px;
                height: 14px;
                border-radius: 50%;
                border: 1px solid rgba(0, 0, 0, 0.08);
                display: inline-block;
                vertical-align: middle;
                margin-right: 8px;
            }

            .legend-table {
                border-collapse: collapse;
                margin-top: 0;
            }
            .legend-table td {
                padding: 4px 6px;
                font-size: 14px;
                vertical-align: middle;
                white-space: nowrap;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 20px;
            }
            th,
            td {
                border-bottom: 1px solid #ddd;
                padding: 6px 10px;
                font-size: 14px;
                text-align: left;
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
        <h2 class="section-title">Hasil Tes Psikologi BDI</h2>

        <table class="table-no-border" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 20px">
            <tr>
                <!-- CHART KIRI -->
                <td width="70%" valign="top">
                    @php
                        $categories = [
                            "0" => $data["answer_distribution"]["A"] ?? 0,
                            "1" => $data["answer_distribution"]["B"] ?? 0,
                            "2" => $data["answer_distribution"]["C"] ?? 0,
                            "3" => $data["answer_distribution"]["D"] ?? 0,
                        ];
                        $maxScore = max($categories) ?: 1;
                    @endphp

                    <table cellpadding="4" cellspacing="0" width="100%">
                        @foreach ($categories as $name => $score)
                            <tr>
                                <td width="80%">
                                    <div class="bar-box bar-{{ $name }}" style="width: {{ ($score / $maxScore) * 100 }}%"></div>
                                </td>
                                <td width="20%" style="font-weight: bold">
                                    {{ $score }}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <p style="margin-top: 10px">
                        Total skor yang didapatkan adalah
                        <b>{{ $data["total_score"] }} poin</b>
                    </p>

                    <p>
                        Kesimpulan:
                        <b>{{ $data["description"] }}</b>
                    </p>
                </td>

                <!-- LEGEND KANAN -->
                <td width="30%" valign="top" style="padding-left: 20px; padding-top: 50px">
                    <table class="legend-table" cellspacing="0">
                        <tr>
                            <td><div class="legend-swatch bar-0"></div>0</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch bar-1"></div>1</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch bar-2"></div>2</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch bar-3"></div>3</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

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
