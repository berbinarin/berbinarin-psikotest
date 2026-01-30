<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hasil Tes CFIT</title>
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

            .section-title {
                font-size: 20px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }

            .chart-table {
                width: 100%;
                margin: 20px 0;
            }
            .chart-table td {
                vertical-align: top;
                padding: 0;
            }

            /* Area chart: pakai inline-block, tanpa flex, friendly untuk PDF */
            .cfit-chart {
                height: 220px;
                padding: 40px 0 0 10px;
                box-sizing: border-box;
            }

            .cfit-bar-wrapper {
                display: inline-block;
                vertical-align: bottom;
                margin-right: 24px;
                text-align: center;
            }

            .cfit-bar-label {
                text-align: center;
                font-size: 12px;
                font-weight: bold;
                margin-bottom: 4px;
            }

            .cfit-bar-container {
                position: relative;
                margin: 0 auto;
                width: 24px;
            }

            .cfit-bar-background {
                width: 24px;
                border-radius: 4px 4px 0 0;
                display: block;
                position: relative;
            }

            .cfit-bar-foreground {
                width: 24px;
                border-radius: 4px 4px 0 0;
                display: block;
                position: absolute;
                bottom: 0;
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
                flex: 1 1 260px;
                box-sizing: border-box;
            }

            .subtest h4 {
                color: #75badb;
                font-size: 16px;
                font-weight: bold;
                display: inline-block;
                margin-bottom: 8px;
            }

            .no-border {
                border: none;
            }

            table {
                width: 100%;
            }

            th,
            td {
                text-align: left;
                padding: 6px 10px;
                font-size: 13px;
            }

            th {
                color: #555;
            }

            .summary-box {
                padding: 16px 0px;
                margin-left: 10px;
            }

            .summary-label {
                font-size: 14px;
                margin-bottom: 2px;
            }

            .summary-value {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 6px;
            }

            .summary-classification {
                height: 40px;   
                line-height: 1.2;
                overflow: hidden;
                display: block;
            }

            @media (max-width: 900px) {
                .subtest {
                    flex: 0 0 100%;
                    max-width: 100%;
                }
            }
        </style>
    </head>
    <body>
        @php
            $subtestTotalQuestions = [17, 7, 18, 13];
            $subtestScores = [12, 4, 13, 10];
            $subtestColors = ["#7aa3b3", "#f2d16a", "#7b7fdf", "#e69ce7"];
            $backgroundColor = "#ff6060";
            $maxScore = 25;
            $maxHeight = 200;
        @endphp

        <h2 class="section-title">Hasil Tes Psikologi CFIT</h2>
        <p>Berikut merupakan hasil dari tiap subtes.</p>
        <table class="chart-table " cellpadding="0" cellspacing="0">
            <tr>
                <!-- Left: bar chart -->
                <td style="vertical-align: top; width: 250px" class="no-border">
                    <div class="cfit-chart">
                        @foreach ($subtestScores as $index => $score)
                            @php
                                $totalQuestions = $subtestTotalQuestions[$index];
                                $totalHeight = ($totalQuestions / $maxScore) * $maxHeight;
                                $scoreHeight = ($score / $maxScore) * $maxHeight;
                                $color = $subtestColors[$index];
                            @endphp

                            <div class="cfit-bar-wrapper">
                                <div class="cfit-bar-label" style="margin-bottom: 4px">{{ $score }}</div>
                                <div class="cfit-bar-container" style="height: {{ round($totalHeight) }}px">
                                    <!-- Background bar: total soal -->
                                    <div class="cfit-bar-background" style="height: {{ round($totalHeight) }}px; background: {{ $backgroundColor }}"></div>
                                    <!-- Foreground bar: jawaban benar -->
                                    <div class="cfit-bar-foreground" style="height: {{ round($scoreHeight) }}px; background: {{ $color }}"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </td>

                <!-- center: Legend -->
                <td style="vertical-align: bottom; width: 150px" class="no-border">
                    <div style="margin-top: 8px; margin-bottom: 30px; font-size: 13px">
                        <br />
                        <span style="display: inline-block; width: 12px; height: 12px; border-radius: 2px; background: #7aa3b3; margin: 0 4px 0 0"></span>
                        Subtes 1
                        <br />
                        <span style="display: inline-block; width: 12px; height: 12px; border-radius: 2px; background: #f2d16a; margin: 0 4px 0 0"></span>
                        Subtes 2
                        <br />
                        <span style="display: inline-block; width: 12px; height: 12px; border-radius: 2px; background: #7b7fdf; margin: 0 4px 0 0"></span>
                        Subtes 3
                        <br />
                        <span style="display: inline-block; width: 12px; height: 12px; border-radius: 2px; background: #e69ce7; margin: 0 4px 0 0"></span>
                        Subtes 4
                    </div>
                </td>

                <!-- Right: summary -->
                <td style="vertical-align: top" class="no-border">
                    <div class="summary-box">
                        <div class="summary-label">IQ</div>
                        <div class="summary-value">70</div>

                        <div class="summary-label">Kategori</div>
                        <div class="summary-value">Rendah</div>

                        <div class="summary-label">Klasifikasi</div>
                        <div class="summary-value summary-classification">Mentally - Defective Profound Mental Retardation

                        {{--
                            @if (!empty($data['iq_message']))
                            <div style="margin-top:6px; font-size:11px; line-height:1.4;">
                            {{ $data['iq_message'] }}
                            </div>
                            @endif
                        --}}
                    </div>
                </td>
            </tr>
        </table>

        <div class="detail">
            <h3>Detail Jawaban:</h3>
            <div class="subtest-container">
                @foreach ([1, 2, 3, 4] as $i)
                    <div class="subtest">
                        <h4>Subtes {{ $i }}</h4>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jawaban</th>
                                    <th>Kunci Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dummyNumbers = range(1, 15);
                                @endphp

                                @forelse ($dummyNumbers as $num)
                                    <tr>
                                        <td>{{ $num }}.</td>
                                        <td>A</td>
                                        <td>B</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center; color: #aaa">Tidak ada jawaban</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
