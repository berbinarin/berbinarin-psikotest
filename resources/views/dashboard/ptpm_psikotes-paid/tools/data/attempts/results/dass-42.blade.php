@push("style")
    <style>
        .scroll-container {
            cursor: grab;
            scroll-behavior: smooth;
        }
        .scroll-container:active {
            cursor: grabbing;
        }
        .scroll-container:hover {
            overflow-x: auto;
        }
        .scroll-container::-webkit-scrollbar {
            height: 0;
            background: transparent;
        }
    </style>
@endpush

<div class="mb-1 flex w-full gap-8">
    <!-- Chart & Summary -->
    <div class="flex-1 rounded-xl bg-white p-8 shadow-lg max-h-[500px]">
        <div class="pb-5">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name }}</h2>
            <div class="text-gray-700">
                @php
                    $highest = $data->sortByDesc('score')->first();
                @endphp
                @if($highest)
                    Kategori yang paling tinggi nilainya adalah <b>{{ $highest['name'] }}</b> dengan skor <b>{{ $highest['score'] }} poin</b>.
                    Sehingga di dapatkan kesimpulan berupa <b>{{ $highest['name'] }}</b> tipe <b>{{ $highest['description'] }}</b>.
                @else
                    Data DASS-42 tidak tersedia.
                @endif
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="flex w-full flex-col items-center">
            <canvas id="horizontalBarChart" class="mb-1" style="max-height: 220px; max-width: 700px"></canvas>
            <div class="mb-4 flex gap-4 text-xs">
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-3 rounded bg-[#75BADB]"></span>
                    Depression
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-3 rounded bg-[#FFE066]"></span>
                    Anxiety
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-3 rounded bg-[#A685E2]"></span>
                    Stress
                </div>
            </div>
        </div>

        <!-- Score Summary -->
        <div class="flex flex-col pt-1 text-[14px]">
            <p class="mb-2 text-gray-700">
                Total poin pada Depression:
                <b>{{ $data["depression"]['score'] ?? "-" }} poin</b>
            </p>
            <p class="mb-2 text-gray-700">
                Total poin pada Anxiety:
                <b>{{ $data["anxiety"]['score'] ?? "-" }} poin</b>
            </p>
            <p class="mb-2 text-gray-700">
                Total poin pada Stress:
                <b>{{ $data["stress"]['score'] ?? "-" }} poin</b>
            </p>
        </div>
    </div>

    <!-- Detail Jawaban -->
    <div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 40%">
        <h2 class="mb-4 text-xl font-semibold">Detail Jawaban</h2>
        <div class="scroll-container mb-4 overflow-x-hidden whitespace-nowrap pb-2" id="subtestTabs">
            <div class="inline-flex border-b">
                @php
                    $subtests = ["Subtes A", "Subtes B", "Subtes C", "Subtes D", "Subtes E", "Subtes F", "Subtes G"];
                @endphp

                @foreach ($subtests as $i => $subtest)
                    <button class="{{ $i === 0 ? "border-[#75BADB] text-[#75BADB]" : "border-transparent text-gray-500 hover:text-[#75BADB]" }} border-b-2 px-3 pb-2 text-base font-medium transition" style="background: none; outline: none; border-radius: 0" type="button">
                        {{ $subtest }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Table Content -->
        <div class="flex min-h-0 flex-1 flex-col">
            <div class="flex-1 overflow-y-auto">
                <table class="w-full table-fixed border-collapse text-sm">
                    <thead class="sticky top-0 bg-white">
                        <tr>
                            <th class="p-2 text-center text-gray-500" style="width: 50%">Pernyataan</th>
                            <th class="p-2 text-center text-gray-500" style="width: 25%">Kategori</th>
                            <th class="p-2 text-center text-gray-500" style="width: 25%">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attempt->responses as $response)
                            <tr class="border-b">
                                <td class="p-2 align-top" style="width: 50%">{{ $response->question->text }}</td>
                                <td class="p-2 text-center align-top" style="width: 25%">{{ $response->question->scoring["scale"] }}</td>
                                <td class="p-2 text-center align-top" style="width: 25%">{{ $response->answer["value"] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chartLabels = ['Depression', 'Anxiety', 'Stress'];
            const chartDataValues = [{{ $data["depression"]['score'] ?? 0 }}, {{ $data["anxiety"]['score'] ?? 0 }}, {{ $data["stress"]['score'] ?? 0 }}];

            const ctx = document.getElementById('horizontalBarChart').getContext('2d');
            const chartData = {
                labels: chartLabels,
                datasets: [
                    {
                        label: 'Total Poin',
                        data: chartDataValues,
                        backgroundColor: [
                            'rgba(117, 186, 219, 0.6)', // Depression
                            'rgba(255, 224, 102, 0.6)', // Anxiety
                            'rgba(166, 133, 226, 0.6)', // Stress
                        ],
                        borderRadius: 0,
                    },
                ],
            };

            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 40,
                            grid: { color: '#eee' },
                            ticks: {
                                stepSize: 8,
                                callback: function (value) {
                                    return [0, 8, 16, 24, 32, 40].includes(value) ? value : '';
                                },
                            },
                            position: 'top',
                        },
                        y: {
                            grid: { color: '#eee' },
                        },
                    },
                    plugins: {
                        legend: { display: false },
                    },
                    animation: false,
                },
                plugins: [
                    {
                        afterDatasetsDraw: function (chart) {
                            const ctx = chart.ctx;
                            chart.data.datasets.forEach(function (dataset, i) {
                                const meta = chart.getDatasetMeta(i);
                                meta.data.forEach(function (bar, index) {
                                    const value = dataset.data[index];
                                    ctx.save();
                                    ctx.font = 'bold 14px sans-serif';
                                    if (value >= chart.options.scales.x.max) {
                                        ctx.fillStyle = '#fff';
                                        ctx.textAlign = 'right';
                                        ctx.textBaseline = 'middle';
                                        ctx.fillText(value, bar.x - 10, bar.y);
                                    } else {
                                        ctx.fillStyle = '#444';
                                        ctx.textAlign = 'left';
                                        ctx.textBaseline = 'middle';
                                        ctx.fillText(value, bar.x + 10, bar.y);
                                    }
                                    if (value > 0) {
                                        ctx.fillStyle = dataset.backgroundColor[index].replace('0.6', '1');
                                        const barHeight = bar.height || (bar.base - bar.y) * 2;
                                        ctx.fillRect(bar.x - 6, bar.y - barHeight / 2, 12, barHeight);
                                    }
                                    ctx.restore();
                                });
                            });
                        },
                    },
                ],
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const tabsContainer = document.getElementById('subtestTabs');
            let isDown = false;
            let startX;
            let scrollLeft;

            tabsContainer.addEventListener('wheel', (e) => {
                if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
                    e.preventDefault();
                    tabsContainer.scrollLeft += e.deltaY;
                }
            });

            tabsContainer.addEventListener('mousedown', (e) => {
                isDown = true;
                tabsContainer.style.cursor = 'grabbing';
                startX = e.pageX - tabsContainer.offsetLeft;
                scrollLeft = tabsContainer.scrollLeft;
            });

            tabsContainer.addEventListener('mouseleave', () => {
                isDown = false;
                tabsContainer.style.cursor = 'grab';
            });

            tabsContainer.addEventListener('mouseup', () => {
                isDown = false;
                tabsContainer.style.cursor = 'grab';
            });

            tabsContainer.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - tabsContainer.offsetLeft;
                const walk = (x - startX) * 2;
                tabsContainer.scrollLeft = scrollLeft - walk;
            });
        });
    </script>
@endpush
