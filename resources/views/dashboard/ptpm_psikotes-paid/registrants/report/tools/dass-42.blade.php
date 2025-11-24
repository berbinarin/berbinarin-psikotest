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

            /* Hapus kelas .bar-box, .bar1, .bar2 karena tidak lagi digunakan seperti kode2 */

            .legend-swatch {
                width: 14px;
                height: 14px;
                border-radius: 50%;
                border: 1px solid rgba(0, 0, 0, 0.08);
            }

            /* Tambahkan style untuk chart bar dalam tabel */
            .bar {
                height: 25px; /* Tinggi bar yang lebih kecil untuk tampilan tabel */
                border-radius: 4px;
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
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Psikologi DASS-42</h2>

        @php
            $categories = ["depression", "anxiety", "stress"];
            $highest = collect($data)
                ->sortByDesc("score")
                ->first();
            $colors = [
                "depression" => "#3986a3",
                "anxiety" => "#e9b306",
                "stress" => "#c893fd",
            ];
            // maksimum bar width bar
            $max_width = 400; 
            // buat atur maksimal skor, biar barnya nyesuain
            $max_score = 50; 
        @endphp

        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 20px">
            <tr>
                <td width="60%" valign="top">
                    <table cellpadding="6" cellspacing="0" style="width: 100%;">
                        @foreach ($categories as $key)
                            @php
                                $score = $data[$key]["score"] ?? 0;
                                $bar_width = ($score / $max_score) * $max_width;
                            @endphp
                            <tr>
                                <td width="5%" style="border-bottom: none;">
                                    <div class="bar" style="background-color: {{ $colors[$key] }}; width: {{ $bar_width }}px"></div>
                                </td>
                                <td width="1px" style="font-weight: bold; border-bottom: none;">
                                    {{ $score }}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="score-summary" style="margin-top: 15px;">
                        @foreach ($categories as $key)
                            <p style="margin: 5px 0;">
                                Total poin pada {{ ucfirst($key) }}:
                                <b>
                                    {{ $data[$key]["score"] ?? "-" }} poin
                                    @if (isset($data[$key]["description"]))
                                        - {{ $data[$key]["description"] }}
                                    @endif
                                </b>
                            </p>
                        @endforeach
                    </div>
                </td>

                <td width="40%" valign="top" style="border: none;">
                    <table cellpadding="6" cellspacing="0" style="width: auto;">
                        @foreach ($categories as $key)
                            <tr>
                                <td style="border: none;"><div class="legend-swatch" style="background-color: {{ $colors[$key] }}"></div></td>
                                <td style="border: none;">{{ ucfirst($key) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
        ---

        {{-- Detail Jawaban --}}
        <div class="detail">
            <h3>Detail Jawaban:</h3>
            <div class="subtest-container">
                @foreach ($attempt->responses->groupBy("question.subtest") as $subtestName => $responses)
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
                                        <td>{{ $response->question->scoring["scale"] ?? "-" }}</td>
                                        <td>{{ $response->answer["value"] ?? "-" }}</td>
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