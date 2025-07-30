@section("style")
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
@endsection

<div class="mb-1 flex w-full gap-8">
    <!-- Chart & Summary -->
    <div class="flex-1 rounded-xl bg-white p-8 shadow-lg max-h-[500px]">
        <div class="pb-1">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{  $attempt->user->name  ?? 'User Tidak Diketahui' }}</h2>
            <p class="mt-4 text-base text-gray-700">Berikut merupakan hasil tes VAK (Visual, Auditori, Kinestetik).</p>
        </div>

        <!-- Bar Chart -->
        <div class="flex w-full flex-col items-center">
            <canvas id="horizontalBarChart" class="mb-1" style="max-height: 300px; max-width: 700px"></canvas>
            <div class="scroll-container mb-4 flex gap-4 text-xs">
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-3 rounded" style="background: #75BADB"></span>
                    Visual
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-3 rounded" style="background: #A685E2"></span>
                    Auditori
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-3 rounded" style="background: #FFB6C1"></span>
                    Kinestetik
                </div>
            </div>
            <div class="text-gray-600 text-xs text-center max-w-full mb-2">
                Kecenderungan siswa untuk menerima informasi dalam belajar dengan menggunakan indera penglihatan. Gaya belajar ini mengakses citra visual seperti warna, gambar dan video.
            </div>
        </div>
    </div>

    <!-- Detail Jawaban -->
    <div class="flex w-1/3 flex-col rounded-xl bg-white p-6 shadow-lg" style="height: 500px">
        <h2 class="mb-4 text-xl font-semibold">Detail Jawaban</h2>
        <div class="scroll-container mb-4 overflow-x-hidden whitespace-nowrap pb-2" id="subtestTabs">
            <div class="inline-flex gap-2 border-b">
                <button class="border-[#75BADB] text-[#75BADB] rounded-none border-b-2 bg-none px-3 pb-2 text-base font-medium outline-none transition" type="button" onclick="changeTab('visual')" id="tab-visual">Subtes Visual</button>
                <button class="border-transparent text-gray-500 hover:text-[#75BADB] rounded-none border-b-2 bg-none px-3 pb-2 text-base font-medium outline-none transition" type="button" onclick="changeTab('auditori')" id="tab-auditori">Subtes Auditori</button>
                <button class="border-transparent text-gray-500 hover:text-[#75BADB] rounded-none border-b-2 bg-none px-3 pb-2 text-base font-medium outline-none transition" type="button" onclick="changeTab('kinestetik')" id="tab-kinestetik">Subtes Kinestetik</button>
            </div>
        </div>

        <div class="flex min-h-0 flex-1 flex-col">
            <div class="flex-1 overflow-y-auto">
                <div id="content-visual" style="display: block">
                    <table class="w-full table-fixed border-collapse text-sm">
                        <thead class="sticky top-0 bg-white">
                            <tr>
                                <th class="p-2 text-center text-gray-500" style="width: 10%">No</th>
                                <th class="p-2 text-center text-gray-500" style="width: 90%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $questionNumber = 1; @endphp
                            @forelse($data['responses_by_category']['visual'] ?? [] as $response)
                                <tr class="border-b hover:bg-blue-50 transition-all duration-200 hover:shadow-sm">
                                    <td class="text-center font-medium p-2">{{ $questionNumber }}</td>
                                    <td class="text-left p-2">
                                        @php
                                            $answerValue = $response->answer['value'];
                                            $optionLabel = collect($response->question->options ?? [])->firstWhere('value', (string)$answerValue)['text'] ?? $answerValue;
                                        @endphp
                                        <span class="text-gray-800">{{ $optionLabel }}</span>
                                    </td>
                                </tr>
                                @php $questionNumber++; @endphp
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-8 text-gray-400">
                                        <i class="fas fa-info-circle text-2xl mb-2"></i>
                                        <p>Jawaban Subtes Visual tidak tersedia.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div id="content-auditori" style="display: none">
                    <table class="w-full table-fixed border-collapse text-sm">
                        <thead class="sticky top-0 bg-white">
                            <tr>
                                <th class="p-2 text-center text-gray-500" style="width: 10%">No</th>
                                <th class="p-2 text-center text-gray-500" style="width: 90%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $questionNumber = 1; @endphp
                            @forelse($data['responses_by_category']['auditori'] ?? [] as $response)
                                <tr class="border-b hover:bg-blue-50 transition-all duration-200 hover:shadow-sm">
                                    <td class="text-center font-medium p-2">{{ $questionNumber }}</td>
                                    <td class="text-left p-2">
                                        @php
                                            $answerValue = $response->answer['value'];
                                            $optionLabel = collect($response->question->options ?? [])->firstWhere('value', (string)$answerValue)['text'] ?? $answerValue;
                                        @endphp
                                        <span class="text-gray-800">{{ $optionLabel }}</span>
                                    </td>
                                </tr>
                                @php $questionNumber++; @endphp
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-8 text-gray-400">
                                        <i class="fas fa-info-circle text-2xl mb-2"></i>
                                        <p>Jawaban Subtes Auditori tidak tersedia.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div id="content-kinestetik" style="display: none">
                    <table class="w-full table-fixed border-collapse text-sm">
                        <thead class="sticky top-0 bg-white">
                            <tr>
                                <th class="p-2 text-center text-gray-500" style="width: 10%">No</th>
                                <th class="p-2 text-center text-gray-500" style="width: 90%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $questionNumber = 1; @endphp
                            @forelse($data['responses_by_category']['kinestetik'] ?? [] as $response)
                                <tr class="border-b hover:bg-blue-50 transition-all duration-200 hover:shadow-sm">
                                    <td class="text-center font-medium p-2">{{ $questionNumber }}</td>
                                    <td class="text-left p-2">
                                        @php
                                            $answerValue = $response->answer['value'];
                                            $optionLabel = collect($response->question->options ?? [])->firstWhere('value', (string)$answerValue)['text'] ?? $answerValue;
                                        @endphp
                                        <span class="text-gray-800">{{ $optionLabel }}</span>
                                    </td>
                                </tr>
                                @php $questionNumber++; @endphp
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-8 text-gray-400">
                                        <i class="fas fa-info-circle text-2xl mb-2"></i>
                                        <p>Jawaban Subtes Kinestetik tidak tersedia.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chartLabels = ['Visual', 'Auditori', 'Kinestetik'];
            const chartDataValues = [
                {{ $data['scores']['visual'] ?? 0 }},
                {{ $data['scores']['auditori'] ?? 0 }},
                {{ $data['scores']['kinestetik'] ?? 0 }}
            ];
            const chartColors = [
                'rgba(117, 186, 219, 0.6)',
                'rgba(166, 133, 226, 0.6)',
                'rgba(255, 182, 193, 0.6)'
            ];

            const ctx = document.getElementById('horizontalBarChart').getContext('2d');
            const chartData = {
                labels: chartLabels,
                datasets: [
                    {
                        label: 'Skor',
                        data: chartDataValues,
                        backgroundColor: chartColors,
                        borderRadius: 0,
                        barThickness: 40,
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
                            max: 100,
                            grid: { color: '#eee' },
                            ticks: {
                                stepSize: 20,
                                callback: function (value) {
                                    return [0, 20, 40, 60, 80, 100].includes(value) ? value : '';
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
                        tooltip: { enabled: false },
                    },
                    animation: false,
                },
                plugins: [{
                    afterDatasetsDraw: function(chart) {
                        const ctx = chart.ctx;
                        chart.data.datasets.forEach(function(dataset, i) {
                            const meta = chart.getDatasetMeta(i);
                            meta.data.forEach(function(bar, index) {
                                const value = dataset.data[index];
                                ctx.save();
                                ctx.font = 'bold 14px sans-serif';
                                ctx.fillStyle = '#333';
                                ctx.textAlign = 'left';
                                ctx.textBaseline = 'middle';
                                ctx.fillText(value, bar.x + 8, bar.y);

                                const solidColor = chartColors[index % chartColors.length].replace('0.6', '1');
                                const barHeight = bar.height || (bar.base - bar.y) * 2 || 30;
                                ctx.fillStyle = solidColor;
                                ctx.fillRect(bar.x - 6, bar.y - barHeight / 2, 12, barHeight);

                                ctx.restore();
                            });
                        });
                    }
                }]
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

        function changeTab(tabName) {
            document.querySelectorAll('[id^="content-"]').forEach((content) => {
                content.style.display = 'none';
            });

            document.querySelectorAll('[id^="tab-"]').forEach((tab) => {
                tab.classList.remove('border-[#75BADB]', 'text-[#75BADB]');
                tab.classList.add('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            });

            document.getElementById(`content-${tabName}`).style.display = 'block';

            document.getElementById(`tab-${tabName}`).classList.remove('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            document.getElementById(`tab-${tabName}`).classList.add('border-[#75BADB]', 'text-[#75BADB]');
        }
    </script>
@endsection