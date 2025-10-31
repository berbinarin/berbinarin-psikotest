@php
    use Illuminate\Support\Str;

    $categories = ["extroversion", "neuroticism", "lie"];
@endphp

@push("style")
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

<div class="mb-1 flex w-full gap-8">
    <!-- chart section -->
    <div x-data="{ graph: 'extraversion' }" class="max-h-[500px] flex-1 rounded-xl bg-white p-8 shadow-lg">
        <div class="mb-4">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name }}</h2>
        </div>

        <!-- legend -->
        <div>
            <div class="overflow-y-auto">
                <div class="flex w-full flex-col items-center">
                    <canvas id="horizontalBarChart-epi" class="mb-1" style="max-height: 220px; max-width: 700px"></canvas>
                    <div class="mb-4 flex gap-4 text-xs">
                        <div class="flex items-center gap-1">
                            <span class="inline-block h-3 w-3 rounded bg-[#75BADB]"></span>
                            Extraversion
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="inline-block h-3 w-3 rounded bg-[#FFE066]"></span>
                            Neuroticism
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="inline-block h-3 w-3 rounded bg-[#A685E2]"></span>
                            Lie
                        </div>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-full">
                        @foreach ($categories as $category)
                            @php
                                $categoryData = $data[$category];
                            @endphp
                            <p class="mb-2 text-base text-gray-700">
                                Total Poin pada {{ Str::title(str_replace("_", " ", $category)) }}:
                                <b>{{ $categoryData['total_score'] }} poin</b>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Jawaban -->
    <div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 40%">
        <h2 class="mb-4 text-xl font-semibold">Detail Jawaban</h2>

        <div class="flex min-h-0 flex-1 flex-col">
            <div class="flex-1 overflow-y-auto">
                <div style="display: block">
                    <table class="w-full table-fixed border-collapse text-sm">
                        <thead class="sticky top-0 bg-white">
                            <tr class="border-b">
                                <th class="p-2 text-center text-gray-500" style="width: 50%">Pernyataan</th>
                                <th class="p-2 text-center text-gray-500" style="width: 25%">Jawaban</th>
                                <th class="p-2 text-center text-gray-500" style="width: 25%">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attempt->responses as $response)
                                @php
                                    $userAnswer = $response->answer['value'];
                                    $correctAnswer = $response->question->scoring['correct_answer'];

                                    $score = ($userAnswer == $correctAnswer) ? 1 : 0;
                                @endphp
                                <tr class="border-b">
                                    <td class="p-2 align-top" style="width: 50%">{{ $response->question->text }}</td>
                                    <td class="p-2 text-center align-top" style="width: 25%">{{ $response->answer['value'] ? 'Ya' : 'Tidak'}}</td>
                                    <td class="p-2 text-center align-top" style="width: 25%">{{ $score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const thickEdgePlugin = {
            afterDatasetsDraw: function (chart) {
                const ctx = chart.ctx;
                chart.data.datasets.forEach(function (dataset, i) {
                    const meta = chart.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        const value = dataset.data[index];
                        ctx.save();
                        ctx.font = 'bold 14px sans-serif';
                        if (value > 0) {
                            ctx.fillStyle = '#444';
                            ctx.textAlign = 'left';
                            ctx.textBaseline = 'middle';
                            ctx.fillText(value, bar.x + 10, bar.y);
                            ctx.fillStyle = dataset.backgroundColor[index].replace('0.6', '1');
                            const barHeight = bar.height || (bar.base - bar.y) * 2;
                            ctx.fillRect(bar.x - 6, bar.y - barHeight / 2, 12, barHeight);
                        }
                        ctx.restore();
                    });
                });
            },
        };

        // chart
        const chartEpi = document.getElementById('horizontalBarChart-epi').getContext('2d');
        const epiData = @json([
            $data['extroversion']['total_score'],
            $data['neuroticism']['total_score'],
            $data['lie']['total_score']
        ]);
        new Chart(chartEpi, {
            type: 'bar',
            data: {
                labels: ['1', '2', '3'],
                datasets: [
                    {
                        label: 'Jumlah Poin',
                        data: epiData,
                        backgroundColor: ['rgba(117, 186, 219, 0.6)', 'rgba(255, 224, 102, 0.6)', 'rgba(166, 133, 226, 0.6)'],
                        borderRadius: 0,
                    },
                ],
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 25,
                        grid: { color: '#eee' },
                        ticks: { stepSize: 5 },
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
            plugins: [thickEdgePlugin],
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

        function changeTab(tabName) {
            document.querySelectorAll('[id^="content-subtest-"]').forEach((content) => {
                content.style.display = 'none';
            });

            document.querySelectorAll('[id^="tab-subtest-"]').forEach((tab) => {
                tab.classList.remove('border-[#75BADB]', 'text-[#75BADB]');
                tab.classList.add('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            });

            document.getElementById(`content-${tabName}`).style.display = 'block';

            document.getElementById(`tab-${tabName}`).classList.remove('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            document.getElementById(`tab-${tabName}`).classList.add('border-[#75BADB]', 'text-[#75BADB]');
        }
    </script>
@endpush
