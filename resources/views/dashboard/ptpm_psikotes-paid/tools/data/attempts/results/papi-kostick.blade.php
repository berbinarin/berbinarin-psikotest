<div class="flex w-full flex-col gap-5 md:flex-row">
    <div class="flex w-full flex-col gap-6 md:w-2/3">
        <div class="flex h-[389px] flex-col gap-6 md:flex-row">
            <div class="flex h-full w-full flex-col justify-center rounded-xl bg-[#236A7B] p-6 text-white md:w-1/2">
                <div>
                    <p class="mb-2 text-[14px] font-semibold">Nama</p>
                    <h1 class="mb-2 text-[20px] font-bold">{{ $attempt->user->name }}</h1>
                    <p class="mb-2 text-[14px] font-semibold">Email</p>
                    <p class="mb-2 text-[20px]">{{ $attempt->user->email ?? "-" }}</p>
                    <p class="mb-2 text-[14px] font-semibold">Tanggal Pengerjaan</p>
                    <p class="mb-2 text-[20px]">{{ \Carbon\Carbon::parse($attempt->created_at)->format("d F Y") }}</p>
                    <p class="mb-2 text-[14px] font-semibold">Desc</p>
                    <p class="text-[20px]">{{ $attempt->user->description ?? "-" }}</p>
                    <p class="mb-2 text-[14px] font-semibold">Status</p>
                    <p>{{ $attempt->status ?? "Finished" }}</p>
                </div>
            </div>
            <div class="flex h-full w-full flex-col items-center justify-between rounded-xl bg-[#F7FAFC] p-6 md:w-1/2">
                <h2 class="mb-2 text-base font-semibold text-[#236A7B]">Radar</h2>
                <div id="chart-container" class="flex min-h-0 w-full flex-1 justify-center">
                    <div id="chart" class="h-full w-full"></div>
                </div>
                <div class="mt-2 flex items-center gap-2">
                    <span class="inline-block h-3 w-3 rounded-full bg-[#236A7B]"></span>
                    <span class="text-xs text-[#236A7B]">Skor Kepribadian</span>
                </div>
            </div>
        </div>
        <div class="mt-4 rounded-lg bg-white p-6 shadow-sm" style="height: 450px">
            <h2 class="mb-4 text-xl font-bold text-[#75BADB]">Rincian Jawaban</h2>
            <div class="flex h-[calc(100%-40px)] flex-col">
                <div class="flex-1 overflow-y-auto pr-2">
                    @php
                        $priorityOrder = ["X", "O", "B", "S"];
                        $priorityItems = [];
                        $otherItems = [];

                        foreach ($priorityOrder as $code) {
                            foreach ($data as $item) {
                                if ($item["sub_code"] === $code) {
                                    $priorityItems[] = $item;
                                    break;
                                }
                            }
                        }

                        foreach ($data->groupBy("main_category") as $mainCategory => $details) {
                            foreach ($details as $item) {
                                if (! in_array($item["sub_code"], $priorityOrder)) {
                                    if (! isset($otherItems[$mainCategory])) {
                                        $otherItems[$mainCategory] = [];
                                    }
                                    $otherItems[$mainCategory][] = $item;
                                }
                            }
                        }
                    @endphp

                    @foreach ($priorityItems as $item)
                        <div class="mb-3">
                            <span class="font-bold text-[#236A7B]">{{ $item["sub_code"] }} ({{ $item["sub_name"] }}) = {{ $item["score"] }} Poin</span>
                            <span class="text-gray-700">- {{ $item["description"] }}</span>
                        </div>
                    @endforeach

                    @foreach ($otherItems as $mainCategory => $details)
                        <div class="mb-4 mt-6">
                            <p class="text-lg font-bold text-gray-500">{{ $mainCategory }}</p>
                            <div class="mt-2">
                                @foreach ($details as $item)
                                    <div class="mb-3">
                                        <span class="font-bold text-[#236A7B]">{{ $item["sub_code"] }} ({{ $item["sub_name"] }}) {{ $item["score"] }}</span>
                                        <span class="text-gray-700">- {{ $item["description"] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Daftar Jawaban User --}}
    <div class="w-full self-start rounded-lg bg-white p-6 shadow-md md:w-1/3" style="height: 120vh; display: flex; flex-direction: column">
        <h3 class="mb-4 text-lg font-bold">Jawaban</h3>
        <div class="flex-1 overflow-y-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 text-left">
                        <th class="pb-2 pr-3 font-semibold text-gray-700">No</th>
                        <th class="pb-2 font-semibold text-gray-700">Choice</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($attempt->responses->sortBy("question.order") as $response)
                        <tr>
                            <td class="py-3 pr-3 text-gray-700">{{ $loop->iteration }}.</td>
                            <td class="py-3 pr-3 font-medium text-[#236A7B]">
                                {{ strtoupper($response->answer["choice"]) }}
                            </td>
                            <td class="py-3 text-gray-600">
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

    var options = {
        chart: {
            height: '100%',
            type: 'radar',
            parentHeightOffset: 0,
            toolbar: {
                show: false,
            },
        },
        xaxis: {
            categories: categories,
            tooltip: {
                enabled: false,
            },
        },
        yaxis: {
            min: 0,
            max: 8,
            tickAmount: 4,
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
            offsetX: 0,
            offsetY: 0,
            style: {
                colors: ['#236A7B'],
                fontWeight: 600,
                fontSize: '14px',
            },
            background: {
                enabled: false,
            },
            formatter: function (val, { dataPointIndex }) {
                return originalScores[dataPointIndex];
            },
        },
        plotOptions: {
            radar: {
                size: 120,
                polygons: {
                    strokeColors: 'gray',
                    connectorColors: 'gray',
                    fill: {
                        colors: ['#DFE1E8', '#e9f7fb'],
                    },
                },
            },
        },
        fill: {
            opacity: 0.6,
            colors: ['#75BADB'],
            type: 'solid',
        },
        stroke: {
            width: 2,
            colors: ['#75BADB'],
        },
        markers: {
            size: 5,
            colors: ['#75BADB'],
            strokeWidth: 0,
            hover: {
                size: 6,
            },
        },
        responsive: [
            {
                breakpoint: 768,
                options: {
                    chart: {
                        height: '100%',
                    },
                    plotOptions: {
                        radar: {
                            size: 100,
                        },
                    },
                },
            },
        ],
    };

    var chart = new ApexCharts(document.querySelector('#chart'), options);
    chart.render();

    window.addEventListener('resize', function () {
        chart.updateOptions({
            chart: {
                height: '100%',
            },
        });
    });
</script>
