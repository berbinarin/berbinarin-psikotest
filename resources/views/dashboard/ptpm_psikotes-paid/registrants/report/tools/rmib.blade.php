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
                height: 45px;
                border-radius: 4px;
                vertical-align: middle;
            }
            .bar + .bar-value {
                padding-left: 10px;
                font-weight: bold;
                vertical-align: middle;
                display: inline-block;
            }

            .bar1 {
                background: #3986a3;
            }
            .bar2 {
                background: #e9b306;
            }
            .bar3 {
                background: #c893fd;
            }
            .bar4 {
                background: #549ff0;
            }
            .bar5 {
                background: #ef4444;
            }

            .legend {
                margin-top: 6px;
             }
            .legend-table {
                border-collapse: collapse;
                width: 100%;
            }
            .legend-table td {
                padding: 6px 6px;
                font-size: 14px;
                vertical-align: middle;
                white-space: nowrap;
            }
            .legend-swatch {
                width: 14px;
                height: 14px;
                border-radius: 50%;
                display: inline-block;
                border: 1px solid rgba(0, 0, 0, 0.08);
                margin-right: 8px;
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
                .chart-table td { display: block; width: 100% !important; }
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
        <h2 class="section-title">Hasil Tes Psikologi RMIB</h2>
        <p>
            Berikut merupakan 3 peringkat kategori dengan nilai terendah, yaitu
            <b>Outdoor, Mechanical, Scientific</b>
            dan
            <b>Computational</b>.
        </p>
        <table class="chart-table table-no-border" cellpadding="0" cellspacing="0">
            <tr>
                <!-- Left: bars -->
                <td style="vertical-align: top; width: 65%; padding-right: 10px;">
                    <table class="bars-table" cellpadding="0" cellspacing="6">
                        <tr>
                            <td>
                                <div class="bar bar1" style="width:200px;"></div>
                            </td>
                            <td class="bar-value">20</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="bar bar2" style="width:400px;"></div>
                            </td>
                            <td class="bar-value">40</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="bar bar3" style="width:100px;"></div>
                            </td>
                            <td class="bar-value">10</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="bar bar4" style="width:100px;"></div>
                            </td>
                            <td class="bar-value">10</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="bar bar5" style="width:100px;"></div>
                            </td>
                            <td class="bar-value">10</td>
                        </tr>
                    </table>
                </td>

                <!-- Right: legend -->
                <td style="vertical-align: top; width: 35%; padding-left: 20px;">
                    <table class="legend-table" cellpadding="0" cellspacing="6">
                        <tr>
                            <td><div class="legend-swatch bar1"></div></td>
                            <td>1 = sangat tidak sesuai</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch bar2"></div></td>
                            <td>2 = tidak sesuai</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch bar3"></div></td>
                            <td>3 = ragu-ragu</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch bar4"></div></td>
                            <td>4 = sesuai</td>
                        </tr>
                        <tr>
                            <td><div class="legend-swatch bar5"></div></td>
                            <td>5 = sangat sesuai</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="detail">
            <h3>Detail Jawaban:</h3>
            <div class="subtest-container">
                @php
                    $subtestTitles = $attempt->responses->pluck("question.section.title")->unique();
                @endphp

                @foreach($subtestTitles as $subtest)
                    <div class="subtest">
                        <h4>Subtest {{ $subtest }}</h4>
                        <table>
                            <thead>
                                <tr>
                                    <th>Pernyataan</th>
                                    <th>Kategori</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attempt->responses->where("question.section.title", $subtest) as $response)
                                    @php
                                        $options = collect($response->question->options["variants"]["male"] ?? []);
                                        $categories = $response->question->scoring ?? [];
                                    @endphp

                                    @forelse ($response->answer["ranked_ids"] ?? [] as $item)
                                        <tr>
                                            <td>{{ $options->where("id", $item)->first()["text"] ?? '-' }}</td>
                                            <td>{{ isset($categories[$item]) ? \Str::title($categories[$item]) : '-' }}</td>
                                            <td>{{ $item ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="empty-data">Jawaban Tidak Tersedia</td>
                                        </tr>
                                    @endforelse
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
