<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Jawaban</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #333;
        }
        h2.section-title {
            font-size: 28px;
            font-weight: bold;
            color: #75badb;
            margin-bottom: 20px;
        }
        h3 {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            text-align: left;
            color: #9e9e9e;
        }
        th, td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }
        th {
            font-weight: bold;
        }
        td:first-child {
            width: 50px;
        }
        .empty-data {
            text-align: center;
            padding: 20px 0;
            color: #888;
        }
        .empty-data i {
            font-size: 24px;
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h2 class="section-title">Hasil Tes Psikologi SSCT</h2>
    <h3>Detail Jawaban:</h3>

    @if(empty($data) || $data->isEmpty())
        <div class="empty-data">
            <i class="fas fa-info-circle"></i>
            <p>Jawaban Subtes Tidak Ada</p>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['order'] }}</td>
                        <td>{{ $item['question'] }}</td>
                        <td>
                            @if(empty($item['answer']))
                                <div class="empty-data">
                                    <i class="fas fa-info-circle"></i>
                                    <p>Jawaban Tidak Ada</p>
                                </div>
                            @else
                                {{ $item['answer'] }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
