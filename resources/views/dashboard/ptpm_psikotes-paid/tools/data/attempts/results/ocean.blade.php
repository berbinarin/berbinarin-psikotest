@php
    use Illuminate\Support\Str;

    $categories = ["extraversion", "agreeableness", "neuroticism", "conscientiousness", "openness"];
@endphp

@push("style")
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

<div class="mb-1 flex w-full gap-8">
    {{-- Graph Section --}}
    <div x-data="{ graph: '{{ $categories[0] }}' }" class="max-h-[500px] flex-1 rounded-xl bg-white p-8 shadow-lg">
        <div class="mb-4">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name }}</h2>

            <div class="mt-3 flex flex-wrap gap-2">
                @foreach ($categories as $category)
                    <button class="rounded-full border-2 px-3 py-1 text-base font-semibold transition" @click="graph = '{{ $category }}'" :class="graph === '{{ $category }}' ? 'bg-[#75BADB] text-white' : 'text-[#75BADB] hover:bg-[#A0D3E9] hover:text-white'">
                        {{ Str::title($category) }}
                    </button>
                @endforeach
            </div>
        </div>

        @foreach ($categories as $category)
            @php
                $categoryData = $data[$category];
                $totalQuestionsInCategory = $categoryData["question_count"] > 0 ? $categoryData["question_count"] : 1;
                $maxValue = max($categoryData["answer_distribution"]) ?? 1;
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
                            @php
                                $maxPossibleScore = $totalQuestionsInCategory * 5;
                                $finalPercentage = $maxPossibleScore > 0 ? ($categoryData["total_score"] / $maxPossibleScore) * 100 : 0;
                            @endphp

                            <p class="mb-2 text-base text-gray-700">
                                Total Poin:
                                <b>{{ $categoryData["total_score"] }} poin</b>
                            </p>
                            <p class="mb-2 text-base text-gray-700">
                                Rata-rata Poin per Soal:
                                <b>{{ round($categoryData["total_score"] / $totalQuestionsInCategory, 2) }}</b>
                            </p>
                            <p class="mb-2 text-base text-gray-700">
                                Persentase Skor:
                                <b>{{ round($finalPercentage) }}%</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
                                @foreach ($attempt->responses as $response)
                                    @if (isset($response->question) && $response->question->scoring["scale"] === $category)
                                        <tr class="border-b">
                                            <td class="p-2 text-center">{{ $response->question->order }}</td>
                                            <td class="p-2 text-center">{{ $response->answer["value"] }}</td>
                                            <td class="p-2">{{ collect($response->question->options)->firstWhere("value", $response->answer["value"])["text"] ?? "N/A" }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@section("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
                @foreach ($categories as $category)
                    @php
                        $categoryData = $data[$category];
                        $maxValue = max($categoryData["answer_distribution"]) ?? 1;
                    @endphp

                    const ctx{{ $category }} = document.getElementById('horizontalBarChart-{{ $category }}').getContext('2d');
                    new Chart(ctx{{ $category }}, {
                        type: 'bar',
                        data: {
                            labels: ['1', '2', '3', '4', '5'],
                            datasets: [
                                {
                                    label: 'Jumlah Jawaban',
                                    data: [
                                        {{ $categoryData["answer_distribution"][1] ?? 0 }},
                                        {{ $categoryData["answer_distribution"][2] ?? 0 }},
                                        {{ $categoryData["answer_distribution"][3] ?? 0 }},
                                        {{ $categoryData["answer_distribution"][4] ?? 0 }},
                                        {{ $categoryData["answer_distribution"][5] ?? 0 }}
                                    ],
                                    backgroundColor: [
                                        'rgba(117, 186, 219, 0.6)',
                                        'rgba(255, 224, 102, 0.6)',
                                        'rgba(166, 133, 226, 0.6)',
                                        'rgba(109, 211, 206, 0.6)', 
                                        'rgba(255, 107, 107, 0.6)',
                                    ],
                                    borderRadius: 0, 
                                },
                            ],
                        },
                        options: {
                            indexAxis: 'y',
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    max: {{ ceil($maxValue * 1.2) }},
                                    grid: { color: "#eee" },
                                    ticks: { stepSize: {{ ceil($maxValue/5) }} },
                                    position: 'top' 
                                },
                                y: {
                                    grid: { color: "#eee" }
                                }
                            },
                            plugins: {
                                legend: { display: false },
                                datalabels: {
                                    anchor: 'end',
                                    align: 'end',
                                    color: '#444',
                                    font: { weight: 'bold', size: 14 }
                                }
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
                            }
                        }]
                    });
                @endforeach
            });
    </script>
@endsection
