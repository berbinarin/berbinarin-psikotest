<div class="flex w-full flex-col gap-5 md:flex-row">
    {{-- Kolom Kiri: Detail Hasil & Deskripsi --}}
    <div class="w-full rounded-lg bg-white p-6 shadow-md md:w-2/3">
        <h2 class="mb-1 text-xl font-bold text-gray-900">Name: {{ $session->user->name }}</h2>
        <p class="text-sm text-gray-600">Berikut adalah rincian jawaban dan kepribadian berdasarkan tes Papi Kostick.</p>

        <div id="chart-container">
            <div id="chart" class="mt-8 rounded-lg border-2 border-slate-300 p-4"></div>
        </div>

        @foreach ($data->groupBy("main_category") as $mainCategory => $details)
            <div class="mt-8">
                <p class="text-lg font-bold text-gray-500">{{ $mainCategory }}</p>
                <div class="mt-3 border-l-4 border-blue-500 pl-4">
                    @foreach ($details as $item)
                        <div class="mb-5">
                            <p class="text-base font-bold text-gray-800">{{ $item["sub_code"] }} ({{ $item["sub_name"] }}) {{ $item["score"] }}</p>
                            <p class="text-base font-normal text-gray-600">{{ $item["description"] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- Kolom Kanan: Daftar Jawaban User --}}
    <div class="w-full self-start rounded-lg bg-white p-6 shadow-md md:w-1/3">
        <h3 class="mb-4 text-lg font-bold">Jawaban</h3>
        <ul class="max-h-[600px] space-y-3 overflow-y-auto pr-2">
            @foreach ($session->responses->sortBy("question.order") as $response)
                <li class="flex items-start text-sm">
                    <span class="mr-3 w-6 font-semibold text-gray-700">{{ $loop->iteration }}.</span>
                    <span class="flex-1 text-gray-600">
                        {{--
                            
                        --}}
                        {{-- Menampilkan teks jawaban yang dipilih user --}}
                        @php
                            $userChoice = $response->answer["choice"];
                            $optionText = "";
                            foreach ($response->question->options as $option) {
                                if ($option["key"] == $userChoice) {
                                    $optionText = $option["text"];
                                    break;
                                }
                            }
                        @endphp

                        {{ $optionText }}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const data = @json($data);

    const categories = data.map((item) => {
        return item.sub_code;
    });

    const originalScores = data.map((item) => {
        return item.score;
    });

    const plottedScores = originalScores.map((score, index) => {
        const category = categories[index];
        if (category === 'K' || category === 'Z') {
            return 9 - score;
        }
        return score;
    });

    console.log(categories);
    console.log(originalScores);

    var options = {
        chart: {
            height: 600,
            type: 'radar',
        },
        title: {
            text: 'Basic Radar Chart',
        },
        xaxis: {
            categories: categories,
            tooltip: {
                enabled: true,
            },
        },
        yaxis: {
            min: 0,
            max: 9,
            tickAmount: 9,
            show: false,
        },
        series: [
            {
                name: 'Score',
                data: plottedScores,
            },
        ],
        dataLabels: {
            enabled: true,
            offsetX: -10,
            offsetY: -10,
            formatter: function (val, {dataPointIndex}) {
                return originalScores[dataPointIndex];
            }
        },
    };

    var chart = new ApexCharts(document.querySelector('#chart'), options);
    chart.render();
</script>
