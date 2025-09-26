@php
    // Array kategori baru (contoh sesuai gambar)
    $categories = [
        "honesty and humility",
        "emotionality",
        "extraversion",
        "agreeableness",
        "conscientiousness",
        "openness to experience",
        "altruism",
    ];
@endphp

@push("style")
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

<div x-data="{ category: '{{ $categories[0] }}' }" class="w-full">
    <div style="padding-left: 80px; padding-right: 80px">
        <div class="mx-auto mb-4 flex  flex-wrap gap-2 rounded-[20px] bg-white p-2 shadow-md">
            @foreach ($categories as $cat)
                <button
                    @click="category = '{{ $cat }}'"
                    class="rounded-full px-4 py-2 text-sm font-semibold transition"
                    :class="category === '{{ $cat }}'
                    ? 'bg-[#3986A3] text-white shadow-md'
                    : 'text-[#black] hover:bg-[#3986A3] hover:text-white'"
                >
                    {{ Str::title($cat) }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- Container Graph + Table --}}
    <div class="mb-1 flex w-full gap-8">
        {{-- Graph Section --}}
        <div x-data="{ graph: '{{ $categories[0] }}' }" class="max-h-[500px] flex-1 overflow-y-auto rounded-xl bg-white p-8 shadow-lg">
            <div class="mb-4">
                <h2 class="text-[28px] font-semibold text-[#75BADB]">John Doe</h2>
                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach ($categories as $category)
                        <button class="rounded-full border-2 px-3 py-1 text-base font-semibold transition" @click="graph = '{{ $category }}'" :class="graph === '{{ $category }}' ? 'bg-[#75BADB] text-white' : 'text-[#75BADB] hover:bg-[#A0D3E9] hover:text-white'">
                            {{ Str::title($category) }}
                        </button>
                    @endforeach
                </div>
            </div>
            <hr class="my-4 border-t-2 border-[#75BADB]" />
            @foreach ($categories as $category)
                {{-- Data statis --}}
                @php
                    $totalQuestionsInCategory = 5;
                    $totalScore = 15;
                    $finalPercentage = 60;
                    $answerDistribution = [1 => 2, 2 => 3, 3 => 1, 4 => 4, 5 => 0];
                    $maxValue = max($answerDistribution);
                @endphp

                <div x-show="graph === '{{ $category }}'" x-cloak>
                    <div class="overflow-y-auto">
                        {{-- Diagram Horizontal Bar --}}
                        <div class="flex w-full flex-col items-center">
                            <canvas id="horizontalBarChart-{{ $category }}" class="mb-1" style="max-height: 220px; max-width: 700px"></canvas>
                            <div class="mb-4 flex gap-4 text-xs">
                                <div class="flex items-center gap-1">
                                    <span class="inline-block h-3 w-3 rounded bg-[#75BADB]"></span>
                                    1 = sangat tdk sesuai
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="inline-block h-3 w-3 rounded bg-[#FFE066]"></span>
                                    2 = tdk sesuai
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="inline-block h-3 w-3 rounded bg-[#A685E2]"></span>
                                    3 = ragu-ragu
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="inline-block h-3 w-3 rounded bg-[#6DD3CE]"></span>
                                    4 = sesuai
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="inline-block h-3 w-3 rounded bg-[#FF6B6B]"></span>
                                    5 = sangat sesuai
                                </div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            {{-- Ringkasan Skor --}}
                            <div class="w-full">
                                <p class="mb-2 text-base text-gray-700">
                                    Total Poin:
                                    <b>{{ $totalScore }} poin</b>
                                </p>
                                <p class="mb-2 text-base text-gray-700">
                                    Rata-rata Poin per Soal:
                                    <b>{{ round($totalScore / $totalQuestionsInCategory, 2) }}</b>
                                </p>
                                <p class="mb-2 text-base text-gray-700">
                                    Persentase Skor:
                                    <b>{{ $finalPercentage }}%</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <hr class="my-4 border-t-2 border-[#75BADB]" />
            {{-- Tambahan: Rincian Jawaban --}}
            <div class="mt-4">
                <h3 class="mb-2 text-lg font-semibold text-[#75BADB]">Rincian Jawaban</h3>
                <ul class="list-outside list-disc space-y-1 pl-5 leading-6 text-gray-700">
                    <li>Jawaban 1: Setuju</li>
                    <li>Jawaban 2: Ragu-ragu</li>
                    <li>Jawaban 3: Sangat Sesuai</li>
                    <li>Jawaban 4: Tidak Sesuai</li>
                    <li>Jawaban 5: Sangat Tidak Sesuai</li>
                </ul>
            </div>
        </div>
        {{-- Table Section --}}
        <div x-data="{ tab: '{{ $categories[0] }}' }" class="w-1/3 rounded-xl bg-white p-6 shadow-lg" style="max-height: 500px">
            <h2 class="mb-4 text-xl font-semibold">Detail Jawaban</h2>
            <div class="mb-4 flex flex-wrap gap-2">
                @foreach ($categories as $category)
                    <button class="rounded-full border-2 px-3 py-1 text-sm font-semibold transition" @click="tab = '{{ $category }}'" :class="tab === '{{ $category }}' ? 'bg-[#75BADB] text-white' : 'text-[#75BADB] hover:bg-[#A0D3E9] hover:text-white'">
                        {{ Str::title($category) }}
                    </button>
                @endforeach
            </div>
            @foreach ($categories as $category)
                <div x-show="tab === '{{ $category }}'" x-cloak>
                    <div class="overflow-hidden">
                        <div class="overflow-y-auto" style="max-height: 280px">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="sticky top-0 border-b bg-white">
                                        <th class="p-2 text-center text-gray-500">No.</th>
                                        <th class="p-2 text-center text-gray-500">Poin</th>
                                        <th class="p-2 text-gray-500">Jawaban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Dummy Data --}}
                                    <tr class="border-b">
                                        <td class="p-2 text-center">1</td>
                                        <td class="p-2 text-center">4</td>
                                        <td class="p-2">Setuju</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 text-center">2</td>
                                        <td class="p-2 text-center">3</td>
                                        <td class="p-2">Ragu-ragu</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 text-center">3</td>
                                        <td class="p-2 text-center">5</td>
                                        <td class="p-2">Sangat Sesuai</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            const colors = ['rgba(117, 186, 219, 0.6)', 'rgba(255, 224, 102, 0.6)', 'rgba(166, 133, 226, 0.6)', 'rgba(109, 211, 206, 0.6)', 'rgba(255, 107, 107, 0.6)'];

            const categories = @json($categories);

            categories.forEach((cat) => {
                const ctx = document.getElementById(`horizontalBarChart-${cat}`);
                if (!ctx) return;
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['1', '2', '3', '4', '5'],
                        datasets: [
                            {
                                label: 'Jumlah Jawaban',
                                data: [2, 3, 1, 4, 0], // contoh statis
                                backgroundColor: colors,
                                borderRadius: 0,
                            },
                        ],
                    },
                    options: {
                        indexAxis: 'y',
                        scales: {
                            x: {
                                beginAtZero: true,
                                max: 7,
                                grid: { color: '#eee' },
                                ticks: { stepSize: 1 },
                                position: 'top',
                            },
                            y: { grid: { color: '#eee' } },
                        },
                        plugins: { legend: { display: false } },
                        animation: false,
                    },
                    plugins: [
                        {
                            afterDatasetsDraw: function (chart) {
                                const ctx = chart.ctx;
                                chart.data.datasets.forEach((dataset, i) => {
                                    const meta = chart.getDatasetMeta(i);
                                    meta.data.forEach((bar, index) => {
                                        const value = dataset.data[index];
                                        if (value > 0) {
                                            ctx.save();
                                            ctx.font = 'bold 13px sans-serif';
                                            ctx.fillStyle = '#444';
                                            ctx.textAlign = 'left';
                                            ctx.textBaseline = 'middle';
                                            ctx.fillText(value, bar.x + 15, bar.y);
                                            ctx.fillStyle = dataset.backgroundColor[index].replace('0.6', '1');
                                            const barHeight = bar.height || (bar.base - bar.y) * 2;
                                            ctx.fillRect(bar.x - 6, bar.y - barHeight / 2, 12, barHeight);
                                            ctx.restore();
                                        }
                                    });
                                });
                            },
                        },
                    ],
                });
            });
        });
    </script>
@endpush
