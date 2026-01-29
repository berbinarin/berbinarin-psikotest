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
            border-collapse: collapse;
            margin: 20px 0;
        }
        .chart-table td {
            vertical-align: top;
            padding: 0;
        }

        .cfit-chart {
            height: 220px;
            display: flex;
            align-items: flex-end;
            gap: 24px;
            padding: 10px 0 0 10px;
            box-sizing: border-box;
        }

        .cfit-bar {
            width: 32px;
            border-radius: 4px 4px 0 0;
            display: inline-block;
        }

        .cfit-bar-label {
            text-align: center;
            font-size: 12px;
            margin-top: 4px;
        }

        .sub1 { background: #7aa3b3; }
        .sub2 { background: #f2d16a; }
        .sub3 { background: #7b7fdf; }
        .sub4 { background: #e69ce7; }

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

        .subtest h4 {
            color: #75badb;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            border-bottom: 3px solid #75badb;
            padding-bottom: 2px;
            margin-bottom: 8px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            text-align: left;
            padding: 6px 10px;
            font-size: 13px;
        }

        th {
            color: #555;
        }

        .summary-box {
            padding: 16px 18px;
            margin-left: 20px;
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

        @media (max-width: 900px) {
            .subtest {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    

    <h2 class="section-title">Hasil Tes Psikologi CFIT</h2>
    <p>Berikut merupakan hasil dari tiap subtes.</p>
    <table class="chart-table" cellpadding="0" cellspacing="0">
        <tr>
            <!-- Left: bar chart -->
            <td style="vertical-align: top; width: 45%; padding-right: 20px;">
                <div class="cfit-chart">
                   

                </div>
            </td>

            <!-- Center: legend -->
            <td>
                <div style="margin-top: 8px; font-size: 13px;">
                    <br><span style="display:inline-block;width:12px;height:12px;border-radius:2px;background:#7aa3b3;margin:0 4px 0 12px;"></span> Subtes 1 
                    <br><span style="display:inline-block;width:12px;height:12px;border-radius:2px;background:#f2d16a;margin:0 4px 0 12px;"></span> Subtes 2
                    <br><span style="display:inline-block;width:12px;height:12px;border-radius:2px;background:#7b7fdf;margin:0 4px 0 12px;"></span> Subtes 3
                    <br><span style="display:inline-block;width:12px;height:12px;border-radius:2px;background:#e69ce7;margin:0 4px 0 12px;"></span> Subtes 4
                </div>
            </td>

            <!-- Right: description -->
            <td style="vertical-align: top; width: 40%;">
                <div class="summary-box">
                    
                    <div class="summary-label">IQ</div>
                    <div class="summary-value">70</div>

                    <div class="summary-label">Kategori</div>
                    <div class="summary-value">Rendah</div>

                    <div class="summary-label">Klasifikasi</div>
                    <div class="summary-value">
                        Mentally oke 
                    </div>

                    {{-- @if (!empty($data['iq_message']))
                        <div style="margin-top:6px; font-size:11px; line-height:1.4;">
                            {{ $data['iq_message'] }}
                        </div>
                    @endif --}}
                </div>
            </td>
        </tr>
    </table>

    <div class="detail">
        <h3>Detail Jawaban:</h3>
        <div class="subtest-container">
            @foreach ([1,2,3,4] as $i)
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
                                <td colspan="3" style="text-align:center; color:#aaa;">Tidak ada jawaban</td>
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

