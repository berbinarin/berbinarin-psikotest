<div class="flex w-full flex-col gap-5 md:flex-row select-text">
    <!-- Kiri: Biodata & Radar -->
    <div class="flex w-full flex-col gap-6 md:w-1/4">
        <!-- Radar -->
        <div class="flex flex-col items-center justify-between rounded-xl bg-[#F7FAFC] p-0 shadow-md" style="height: 250px">
            <div id="chart-container" class="flex min-h-0 w-full flex-1 justify-center">
                <div id="chart" class="h-full w-full"></div>
            </div>
        </div>
        <!-- Biodata -->
        <div class="flex w-full flex-col justify-center rounded-xl bg-[#236A7B] p-6 text-[13px] text-white shadow-md">
            <div>
                <p class="select-text mb-1 text-[12px] font-semibold">Nama</p>
                <h1 class="select-text mb-1 text-[16px] font-bold">{{ $attempt->user->name }}</h1>
                <p class="select-text mb-1 text-[12px] font-semibold">Email</p>
                <p class="select-text mb-1 text-[16px]">{{ $attempt->user->email ?? "-" }}</p>
                <p class="select-text mb-1 text-[12px] font-semibold">Tanggal Pengerjaan</p>
                <p class="select-text mb-1 text-[16px]">{{ \Carbon\Carbon::parse($attempt->created_at)->format("d F Y") }}</p>
                <p class="select-text mb-1 text-[12px] font-semibold">Status</p>
                <p>
                    {{ $attempt->status === 'in_progress' ? 'Dalam Proses Pengerjaan' : ($attempt->status ?? 'Selesai') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Rincian Jawaban -->
    <div class="flex w-full flex-col md:w-1/2">
        <div class="select-text rounded-lg bg-white p-6 shadow-md" style="max-height: 510px; height: 510px; display: flex; flex-direction: column">
            <h2 class="mb-4 text-xl font-bold text-[#75BADB]">Rincian Jawaban</h2>
            <div class="flex-1 overflow-y-auto pr-2 text-[14px]">
                @php
                    $priorityOrder = ["X", "O", "B", "S"];
                    $priorityItems = [];
                    $otherItems = [];

                    // Kelompokkan priority items berdasarkan main_category
                    $groupedPriorityItems = [];
                    foreach ($data as $item) {
                        if (in_array($item["sub_code"], $priorityOrder)) {
                            if (! isset($groupedPriorityItems[$item["main_category"]])) {
                                $groupedPriorityItems[$item["main_category"]] = [];
                            }
                            $groupedPriorityItems[$item["main_category"]][] = $item;
                        }
                    }

                    // Urutkan berdasarkan priorityOrder dalam setiap kategori
                    foreach ($groupedPriorityItems as $mainCategory => &$items) {
                        usort($items, function ($a, $b) use ($priorityOrder) {
                            return array_search($a["sub_code"], $priorityOrder) - array_search($b["sub_code"], $priorityOrder);
                        });
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

                @foreach ($groupedPriorityItems as $mainCategory => $items)
                    <div class="mb-4">
                        <p class="text-lg font-bold text-gray-500">{{ $mainCategory }}</p>
                        <div class="mt-2">
                            @foreach ($items as $item)
                                <div class="mb-3">
                                    <span class="font-bold text-[#236A7B]">{{ $item["sub_code"] }} ({{ $item["sub_name"] }}) = {{ $item["score"] }} Poin</span>
                                    <span class="text-gray-700">- {{ $item["description"] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                @foreach ($otherItems as $mainCategory => $details)
                    <div class="mb-4 mt-6">
                        <p class="text-lg font-bold text-gray-500">{{ $mainCategory }}</p>
                        <div class="mt-2">
                            @foreach ($details as $item)
                                <div class="mb-3">
                                    <span class="font-bold text-[#236A7B]">{{ $item["sub_code"] }} ({{ $item["sub_name"] }}) = {{ $item["score"] }} Poin</span>
                                    <span class="text-gray-700">- {{ $item["description"] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Kanan: Detail Jawaban -->
    <div class="select-text flex w-full flex-col self-start rounded-lg bg-white p-6 shadow-md md:w-1/3" style="max-height: 510px; height: 510px">
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
                                @php
                                    $userChoice = data_get($response->answer, "choice");
                                @endphp
                                {{ $userChoice ? strtoupper($userChoice) : "-" }}
                            </td>
                            <td class="py-3 text-gray-600">
                                @php
                                    $optionText = "";
                                    if ($userChoice && isset($response->question) && ! empty($response->question->options)) {
                                        foreach ($response->question->options as $option) {
                                            if (($option["key"] ?? null) == $userChoice) {
                                                $optionText = $option["text"] ?? "";
                                                break;
                                            }
                                        }
                                    }
                                @endphp

                                {{ $optionText !== "" ? $optionText : "-" }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="chartModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300">
    <div class="relative w-11/12 max-w-4xl rounded-lg bg-white p-4 shadow-xl md:p-6">
        <button id="closeModalBtn" class="absolute -right-3 -top-3 flex h-8 w-8 items-center justify-center rounded-full bg-primary font-bold text-white shadow-lg transition-transform hover:scale-110">
            <span class="text-sm">X</span>
        </button>

        <div id="modal-chart-container" style="height: 60vh"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // --- Bagian A: Kode Original Anda (sedikit diubah untuk aksesibilitas) ---
    const data = @json($data);

    const originalCategories = data.map((item) => item.sub_code);
    const originalScores = data.map((item) => item.score);

    const plottedScores = originalScores.map((score, index) => {
        const category = originalCategories[index];
        if (category === 'K' || category === 'Z') {
            return 9 - score;
        }
        return score;
    });

    // Pindahkan 'options' ke variabel yang bisa diakses di luar
    var chartOptions = {
        chart: {
            height: '100%',
            type: 'radar',
            parentHeightOffset: 0,
            toolbar: {
                show: false,
            },
        },
        xaxis: {
            categories: originalCategories,
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
                size: 90, // Ukuran untuk chart kecil
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
        // Opsi responsif tetap berguna
        responsive: [
            {
                breakpoint: 768,
                options: {
                    plotOptions: {
                        radar: {
                            size: 100,
                        },
                    },
                },
            },
        ],
    };

    // Render chart kecil yang original
    var smallChart = new ApexCharts(document.querySelector('#chart'), chartOptions);
    smallChart.render();

    // --- Modal Chart ---
    const chartContainer = document.querySelector('#chart-container');
    const modal = document.querySelector('#chartModal');
    const closeModalBtn = document.querySelector('#closeModalBtn');
    const modalChartContainer = document.querySelector('#modal-chart-container');
    let modalChart = null;

    // Open Modal
    chartContainer.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Duplicate and change some options
        let modalOptions = chartOptions;

        modalOptions.chart.height = 'auto';
        modalOptions.plotOptions.radar.size = undefined;
        modalOptions.dataLabels.style.fontSize = '16px';
        modalOptions.chart.toolbar.show = true;

        // Hancurkan chart modal sebelumnya jika ada (untuk mencegah duplikasi)
        if (modalChart) {
            modalChart.destroy();
        }

        modalChart = new ApexCharts(modalChartContainer, modalOptions);
        modalChart.render();

        modal.addEventListener('transitionend', () => {
            if (modalChart) {
                modalChart.updateOptions({
                    chart: { height: 'auto' }
                });
            }
        }, { once: true });
    });

    // Close Modal
    function closeTheModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        // Remove Instance Chart when close
        if (modalChart) {
            modalChart.destroy();
            modalChart = null;
        }
    }

    // Close Modal Event Listener
    closeModalBtn.addEventListener('click', closeTheModal);
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeTheModal();
        }
    });
</script>
