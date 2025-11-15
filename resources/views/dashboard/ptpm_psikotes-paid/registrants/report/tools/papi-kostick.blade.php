<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hasil Tes Psikologi</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #75badb;
            padding-bottom: 5px;
            margin-bottom: 15px;
            margin-top: 40px;
        }
        .section-subtitle {
            font-size: 18px;
            font-weight: bold;
            color: #75badb;
            padding-bottom: 5px;
            margin-bottom: 15px;
            margin-top: 40px;
        }
        #chart {
            max-width: 350px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th,
        table td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        table th {
            color: #9e9e9e;
            font-weight: bold;
        }
        table td {
            color: #000000;
        }
        .td-pertama { width: 20%; }
    </style>
</head>
<body>
    <h2 class="section-title">Hasil Tes Psikologi Papi Kostick</h2>

    <!-- Radar Chart -->
    <div id="chart"></div>

    <!-- Rincian Jawaban -->
    <h2 class="section-subtitle">Rincian Jawaban</h2>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Pernyataan</th>
                    <th>Kategori</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $priorityOrder = ["X","O","B","S"];
                    $groupedPriority = [];
                    $otherItems = [];

                    foreach($data as $item){
                        if(in_array($item['sub_code'], $priorityOrder)){
                            $groupedPriority[$item['main_category']][] = $item;
                        } else {
                            $otherItems[$item['main_category']][] = $item;
                        }
                    }
                    foreach($groupedPriority as &$items){
                        usort($items, fn($a,$b) => array_search($a['sub_code'],$priorityOrder) - array_search($b['sub_code'],$priorityOrder));
                    }

                    $allItems = array_merge($groupedPriority, $otherItems);
                @endphp

                @foreach($allItems as $mainCategory => $items)
                    @foreach($items as $item)
                        <tr>
                            <td class="td-pertama">{{ $item['sub_code'] }} ({{ $item['sub_name'] }})</td>
                            <td>{{ $mainCategory }}</td>
                            <td>{{ $item['description'] }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <h2 class="section-subtitle">Rincian Jawaban</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attempt->responses->sortBy('question.order') as $response)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>
                            @php
                                $choiceKey = $response->answer['choice'];
                                $optionText = '';
                                foreach($response->question->options as $option){
                                    if($option['key'] == $choiceKey){
                                        $optionText = $option['text'];
                                        break;
                                    }
                                }
                            @endphp
                            {{ $optionText }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

<script>
    // Chart Radar Dinamis
    const data = @json($data);
    const categories = data.map(item => item.sub_code);
    const scores = data.map(item => item.score);

    const plottedScores = scores.map((score, i) => {
        const cat = categories[i];
        return ['K','Z'].includes(cat) ? 9 - score : score;
    });

    var options = {
        chart: { type: 'radar', height: 400, toolbar: { show: false } },
        xaxis: { categories: categories, tooltip: { enabled: false } },
        yaxis: { min: 0, max: 8, tickAmount: 4, show: false },
        series: [{ name: 'Score', data: plottedScores }],
        dataLabels: { enabled: true, style: { colors: ['#236A7B'], fontWeight: 600, fontSize: '14px' }, background: { enabled: false } },
        plotOptions: {
            radar: {
                size: 150,
                polygons: { strokeColors: 'gray', connectorColors: 'gray', fill: { colors: ['#DFE1E8','#e9f7fb'] } }
            }
        },
        fill: { opacity: 0.6, colors: ['#75BADB'], type: 'solid' },
        stroke: { width: 2, colors: ['#75BADB'] },
        markers: { size: 5, colors: ['#75BADB'], strokeWidth: 0, hover: { size: 6 } },
    };

    var chart = new ApexCharts(document.querySelector('#chart'), options);
    chart.render();
</script>
</html>
