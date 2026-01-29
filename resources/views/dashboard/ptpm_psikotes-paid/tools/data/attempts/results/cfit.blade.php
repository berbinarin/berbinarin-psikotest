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

@php
    $subtests = $data['subtests'] ?? [];
    $subtestLabels = collect($subtests)->pluck('title')->values();
    $totalValues = collect($subtests)->pluck('total_questions')->values();
    $correctValues = collect($subtests)->pluck('correct')->values();
    $iqClassification = $data['iq_classification'] ?? null;
    $iqClassificationText = is_array($iqClassification)
        ? trim(implode(' - ', array_filter([
            $iqClassification['classification'] ?? null,
            $iqClassification['clinical_classification'] ?? null,
        ])))
        : $iqClassification;
@endphp

<div class="mb-1 flex w-full gap-8">
    <div class="max-h-[580px] w-3/5 rounded-xl bg-white p-8 shadow-lg">
        <div class="mb-4 pb-1">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name ?? "User Tidak Diketahui" }}</h2>
            <p class="mt-2 text-base text-gray-700">Berikut merupakan visualisasi diagram jawaban alat tes CFIT.</p>
        </div>

        <!-- Bar Chart -->
        <div class="flex w-full flex-col items-center">
            <canvas id="verticalBarChart" class="mb-1" style="max-height: 400px; height: 400px; max-width: 500px"></canvas>
            <div class="scroll-container mb-4 ms-6 flex gap-14 text-xs">
                @forelse ($subtests as $index => $subtest)
                    @php
                        $legendColors = ['#7aa3b3', '#f2d16a', '#7b7fdf', '#e69ce7'];
                        $legendColor = $legendColors[$index % count($legendColors)];
                    @endphp
                    <div class="flex items-center gap-1">
                        <span class="inline-block h-3 w-2 rounded" style="background: {{ $legendColor }}"></span>
                        {{ $subtest['title'] ?? 'Subtes' }}
                    </div>
                @empty
                    <div class="text-gray-400">Subtes tidak tersedia.</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- detail jawaban -->
    <div class="flex w-2/5 flex-col gap-5">
        <div class="flex h-[360px] w-full flex-col rounded-xl bg-white p-6 shadow-lg">
            <h2 class="mb-3 text-xl font-semibold">Detail Jawaban</h2>
            <div class="scroll-container mb-1 overflow-x-hidden whitespace-nowrap pb-1" id="subtestTabs">
                <div class="inline-flex gap-2 border-b">
                    @forelse ($subtests as $index => $subtest)
                        @php $tabId = \Illuminate\Support\Str::slug($subtest['title'] ?? ('Subtes ' . ($index + 1))); @endphp
                        <button
                            class="rounded-none border-b-2 {{ $index === 0 ? 'border-[#75BADB] text-[#75BADB]' : 'border-transparent text-gray-500 hover:text-[#75BADB]' }} bg-none px-3 pb-2 text-base font-medium outline-none transition"
                            type="button"
                            onclick="changeTab('{{ $tabId }}')"
                            id="tab-{{ $tabId }}"
                        >
                            {{ $subtest['title'] ?? 'Subtes' }}
                        </button>
                    @empty
                        <span class="px-3 pb-2 text-sm text-gray-400">Subtes tidak tersedia.</span>
                    @endforelse
                </div>
            </div>

            <div class="flex min-h-0 flex-1 flex-col">
                <div class="min-h-0 flex-1 overflow-y-auto">
                    @forelse ($subtests as $index => $subtest)
                        @php
                            $contentId = \Illuminate\Support\Str::slug($subtest['title'] ?? ('Subtes ' . ($index + 1)));
                            $answers = $subtest['answers'] ?? [];
                        @endphp
                        <div id="content-{{ $contentId }}" style="display: {{ $index === 0 ? 'block' : 'none' }}">
                            <table class="w-full table-fixed border-collapse text-sm">
                                <thead class="sticky top-0 bg-white">
                                    <tr>
                                        <th class="p-2 text-center text-gray-500" style="width: 10%">No</th>
                                        <th class="p-2 text-center text-gray-500" style="width: 90%">Choice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($answers as $answer)
                                        @php
                                            $userAnswer = $answer['user_answer'] ?? null;
                                            $displayAnswer = is_array($userAnswer)
                                                ? (count($userAnswer) ? implode(', ', $userAnswer) : '—')
                                                : ($userAnswer ?? '—');
                                        @endphp
                                        <tr class="border-b">
                                            <td class="p-2 text-center">{{ $answer['number'] ?? '-' }}</td>
                                            <td class="p-2 text-center">{{ $displayAnswer }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="py-8 text-center text-gray-400">
                                                <i class="fas fa-info-circle mb-2 text-2xl"></i>
                                                <p>Jawaban {{ $subtest['title'] ?? 'Subtes' }} tidak tersedia.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <div class="py-8 text-center text-gray-400">
                            <i class="fas fa-info-circle mb-2 text-2xl"></i>
                            <p>Jawaban subtes tidak tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="flex h-[200px] w-full flex-col justify-center rounded-xl bg-[#236A7B] p-6 text-[13px] text-white shadow-md">
            <div>
                <p class="select-text text-[12px]">IQ</p>
                <h1 class="mb-2 select-text text-[16px] font-bold">{{ $data['iq'] ?? '—' }}</h1>
                <p class="select-text text-[12px]">Kategori</p>
                <p class="mb-2 select-text text-[16px] font-bold">{{ $data['iq_category'] ?? '—' }}</p>
                <p class="select-text text-[12px]">Klasifikasi</p>
                <h1 class="mb-1 select-text text-[16px] font-bold">{{ $iqClassificationText ?: '—' }}</h1>
                @if (!empty($data['iq_message']))
                    <p class="mt-1 text-[11px] text-white/80">{{ $data['iq_message'] }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chartLabels = @json($subtestLabels);
            const totalValues = @json($totalValues);
            const correctValues = @json($correctValues);
            const chartColors = ['rgba(122, 163, 179,1)', 'rgba(242, 209, 106, 1)', 'rgba(123, 127, 223, 1)', 'rgba(226, 156, 231, 1)'];
            const maxTotal = totalValues.length ? Math.max(...totalValues) : 0;

            const ctx = document.getElementById('verticalBarChart').getContext('2d');
            const chartData = {
                labels: chartLabels,
                datasets: [
                    {
                        label: 'Jawaban Benar',
                        data: correctValues,
                        backgroundColor: chartColors,
                        barThickness: 30,
                        grouped: true,
                    },
                    {
                        label: 'Jumlah Soal',
                        data: totalValues,
                        backgroundColor: 'rgba(255, 96, 96, 1)',
                        barThickness: 30,
                        grouped: false,
                    },
                ],
            };

            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        x: {
                            grid: {
                                color: '#eee',
                            },
                            ticks: {
                                display: false,
                            },
                        },
                        y: {
                            beginAtZero: true,
                            max: maxTotal ? Math.ceil((maxTotal + 4) / 5) * 5 : 5,
                            grid: {
                                color: '#eee',
                            },
                            ticks: {
                                stepSize: 5,
                                callback: function (value) {
                                    return [0, 5, 10, 15, 20, 25].includes(value) ? value : '';
                                },
                            },
                        },
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            enabled: true,
                        },
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
                                    ctx.fillStyle = '#333';
                                    ctx.textAlign = 'center';
                                    ctx.textBaseline = 'bottom';
                                    ctx.fillText(value, bar.x, bar.y - 5);
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
@endpush
