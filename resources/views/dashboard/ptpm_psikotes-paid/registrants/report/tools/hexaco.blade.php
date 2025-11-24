@php
    use Illuminate\Support\Str;
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
                font-size: 20px;
                font-weight: bold;
                color: #75badb;
                margin-bottom: 10px;
            }

            .title-chart {
                font-weight: bold;
                color: #75badb;
                display: inline-block;
                border-bottom: 3px solid #75badb;
                padding-bottom: 5px;
                margin-bottom: 10px;
            }

            /* chart table layout */
            .chart-table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            .chart-table td {
                vertical-align: top;
                padding: 0;
            }

            .bars-table {
                border-collapse: collapse;
                width: 100%;
            }
            .bars-table td {
                padding: 6px 0;
                font-size: 14px;
                vertical-align: middle;
            }

            .bar {
                display: inline-block;
                height: 30px;
                border-radius: 4px;
                vertical-align: middle;
            }
            .bar span {
                margin-left: 10px;
                font-weight: bold;
                font-size: 14px;
                min-width: 30px;
                display: inline-block;
                vertical-align: middle;
            }

            .bar1 { background: #3986a3; }
            .bar2 { background: #e9b306; }
            .bar3 { background: #c893fd; }
            .bar4 { background: #549ff0; }
            .bar5 { background: #ef4444; }

            .legend-table {
                border-collapse: collapse;
                margin-left: 20px;
                margin-top: 30px;
            }
            .legend-table td {
                padding: 4px 6px;
                font-size: 14px;
                vertical-align: middle;
                white-space: nowrap;
            }
            .legend-swatch {
                width: 14px;
                height: 14px;
                border-radius: 50%;
                border: 1px solid rgba(0,0,0,0.08);
                display: inline-block;
                vertical-align: middle;
                margin-right: 8px;
            }

            table.detail-table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 30px;
            }
            table.detail-table th, table.detail-table td {
                border-bottom: 1px solid #ddd;
                text-align: left;
                padding: 6px 10px;
                font-size: 14px;
            }
            table.detail-table th { color: #555; background: #f8f8f8; }

            .table-no-border td,
            .table-no-border th {
                border-bottom: none;
            }
        </style>
    </head>
    <body>
        <h2>Hasil Tes Psikologi HEXACO</h2>

        @foreach ($categories as $category)
            @php
                $catData = $data[$category];
                $distribution = $catData['answer_distribution'] ?? [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
                $totalScore = $catData['total_score'] ?? 0;
                $avg = round($catData['total_score'] / max($catData['question_count'] ?? 1, 1), 2);
                $average = $catData['average'] ?? '-';
                $description = $catData['description'] ?? '';
                $maxWidth = 300; // lebar maksimum bar (px)
                $maxValue = max($distribution) ?: 1;
            @endphp

            <h4 class="title-chart">{{ Str::title(str_replace('_', ' ', $category)) }}</h4>

            <table class="chart-table table-no-border" cellpadding="0" cellspacing="0">
                <tr>
                    <!-- Left: bars -->
                    <td style="width:65%; padding-right:10px;">
                        <table class="bars-table" cellpadding="0" cellspacing="0">
                            @foreach ($distribution as $key => $val)
                                @php
                                    $width = $maxValue > 0 ? ($val / $maxValue) * $maxWidth : 0;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="bar bar{{ $key }}" style="width: {{ $width }}px;"></div>
                                        <span>{{ $val }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <p style="margin-top:10px;">Total poin pada {{ Str::title($category) }}: <b>{{ $totalScore }}</b></p>
                        <p>Rata-rata poin per soal: <b>{{ $avg }}</b></p>
                        <p>Rata-rata: <b>{{ $average }}</b></p>
                        <p>Deskripsi: <b>{{ $description }}</b></p>
                    </td>

                    <!-- Right: legend -->
                    <td style="width:35%; padding-left:10px;">
                        <table class="legend-table" cellpadding="0" cellspacing="0">
                            <tr>
                                <td><div class="legend-swatch bar1"></div></td>
                                <td>1 = Sangat tidak sesuai</td>
                            </tr>
                            <tr>
                                <td><div class="legend-swatch bar2"></div></td>
                                <td>2 = Tidak sesuai</td>
                            </tr>
                            <tr>
                                <td><div class="legend-swatch bar3"></div></td>
                                <td>3 = Ragu-ragu</td>
                            </tr>
                            <tr>
                                <td><div class="legend-swatch bar4"></div></td>
                                <td>4 = Sesuai</td>
                            </tr>
                            <tr>
                                <td><div class="legend-swatch bar5"></div></td>
                                <td>5 = Sangat sesuai</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        @endforeach

        <h4 class="title-chart">Detail Jawaban</h4>
        <table class="detail-table">
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
                    @if (isset($response->question) && ($response->question->scoring["scale"] ?? false))
                        <tr>
                            <td>{{ $response->question->order }}</td>
                            <td>{{ $response->question->text }}</td>
                            <td>{{ $response->answer["value"] ?? '' }}</td>
                            <td>{{ collect($response->question->options)->firstWhere("value", $response->answer["value"])["text"] ?? "N/A" }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </body>
</html>
