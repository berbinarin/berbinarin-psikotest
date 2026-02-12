<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hasil Tes MSDT</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 40px;
            }

            .info-section p {
                margin: 0;
            }

            .info-section p + p {
                margin-top: 4px;
            }

            .info-label {
                font-weight: 600;
            }

            .info-value {
                font-weight: 700;
                margin-left: 4px;
            }

            .section-title {
                font-size: 16px;
                font-weight: 600;
                color: #75badb;
                margin: 20px 0 8px 0;
            }

            .content-text {
                margin: 0 0 8px 0;
                line-height: 1.5;
            }

            .content-list-item {
                margin-bottom: 16px;
            }

            .content-list-title {
                font-weight: 600;
                margin-bottom: 4px;
            }

            .content-list ul {
                margin: 4px 0 0 0;
                padding-left: 20px;
                list-style-type: lower-alpha;
            }

            .content-list ul li {
                margin-bottom: 4px;
                line-height: 1.5;
            }

            .table-header {
                width: 100%;
                margin-top: 20px;
                margin-bottom: 0;
                table-layout: fixed;
            }

            .table-header th {
                padding: 8px;
                text-align: center;
                font-weight: 400;
            }

            .table-header th:first-child {
                width: 6%;
            }

            .table-header th:nth-child(2) {
                width: 74%;
            }

            .table-header th:last-child {
                width: 20%;
            }

            .table-wrapper {
                page-break-inside: avoid;
                margin-bottom: 6px;
            }

            .detail-table {
                width: 100%;
                table-layout: fixed;
                border-collapse: collapse;
            }

            .detail-table td {
                border: 1px solid gray;
                padding: 8px;
            }

            .detail-table td:first-child {
                width: 6%;
            }

            .detail-table td:nth-child(2) {
                width: 74%;
            }

            .detail-table td:last-child {
                width: 20%;
            }

            .center-text {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h2 class="section-title">Hasil Tes Psikologi MSDT</h2>
        <div class="info-section">
            <p>
                <span>Kategori:</span>
                <span class="info-value">{{ $data[0]['description']['type'] }}</span>
            </p>
            <p>
                <span>Status:</span>
                <span class="info-value">{{ $data[0]['description']['status'] }}</span>
            </p>
        </div>

        {{-- Rincian Jawaban --}}
        <div class="content-section">
            <h3>Rincian Jawaban:</h3>
            @foreach ($data[0]['description']['text']['description'] ?? [] as $desc)
                @if(!($loop->last))
                    <p>{{ $desc }}</p>
                @else
                    <p>{!! $desc !!}. Pemimpin tipe ini memiliki sifat-sifat sebagai berikut:</p>
                @endif
            @endforeach

            <div class="content-list">
                @foreach ($data[0]['description']['text']['feature'] ?? [] as $feature)
                    <div class="content-list-item">
                        <p class="content-list-title">{{ $loop->iteration }}) {{ $feature['general'] }}. Hal ini tampak pada sifat-sifatnya sebagai berikut:</p>
                        <ul>
                            @foreach ($feature['characteristic'] ?? [] as $characteristic)
                                <li>{{ $characteristic }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- tabel detail jawaban --}}
        <div class="content-section">
            <h3>Detail Jawaban</h3>
            <table class="table-header">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pernyataan</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
            </table>
            @foreach($attempt->responses->sortBy('question.order') as $response)
                <div class="table-wrapper">
                    <table class="detail-table">
                        <tr>
                            <td rowspan="2" class="center-text">{{ $loop->iteration }}.</td>
                            <td>
                                <span>A.</span>
                                {{ $response->question['options'][0]['text'] }}
                            </td>
                            <td rowspan="2" class="center-text" style="font-weight: bold">{{ collect($response->question['options'])->firstWhere('key', $response->answer['choice'])['key'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>
                                <span>B.</span>
                                {{ $response->question['options'][1]['text'] }}
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach
        </div>
    </body>
</html>