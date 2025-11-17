@php
    $categories = array_keys($data->toArray());
@endphp

@push("style")
<style>
    [x-cloak] {
        display: none !important;
    }
</style>
@endpush

<div x-data="{ category: '{{ $categories[0] }}' }" class="w-full">

    {{-- Container Graph + Table --}}
    <div class="mb-1 flex w-full gap-8">
        {{-- Graph Section --}}
        <div x-data="{ graph: '{{ $categories[0] }}' }" class="max-h-[500px] flex-1 overflow-y-auto rounded-xl bg-white p-8 shadow-lg">
            <div class="mb-4">
                <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name }}</h2>
                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach ($categories as $category)
                        <button class="rounded-full border-2 px-3 py-1 text-base font-semibold transition"
                            @click="graph = '{{ $category }}'"
                            :class="graph === '{{ $category }}' ? 'bg-[#75BADB] text-white' : 'text-[#75BADB] hover:bg-[#A0D3E9] hover:text-white'">
                            {{ Str::title(str_replace('_',' ',$category)) }}
                        </button>
                    @endforeach
                </div>
            </div>
            <hr class="my-4 border-t-2 border-[#75BADB]" />

            @foreach ($categories as $category)
                @php
                    $catData = $data[$category];
                    $totalScore = $catData['total_score'];
                    $totalQuestions = $catData['question_count'];
                    $average = $catData['average'];
                    $answerDistribution = $catData['answer_distribution'];
                    $description = $catData['description'] ?? '';
                @endphp

                <div x-show="graph === '{{ $category }}'" x-cloak>
                    <div class="overflow-y-auto">
                        {{-- Diagram Horizontal Bar --}}
                        <div class="flex w-full flex-col items-center">
                            <canvas id="horizontalBarChart-{{ $category }}" class="mb-1" style="max-height: 220px; max-width: 700px"></canvas>
                            <div class="mb-4 flex gap-4 text-xs">
                                <div class="flex items-center gap-1"><span class="inline-block h-3 w-3 rounded bg-[#75BADB]"></span>1 = sangat tdk setuju</div>
                                <div class="flex items-center gap-1"><span class="inline-block h-3 w-3 rounded bg-[#FFE066]"></span>2 = tdk setuju</div>
                                <div class="flex items-center gap-1"><span class="inline-block h-3 w-3 rounded bg-[#A685E2]"></span>3 = ragu-ragu</div>
                                <div class="flex items-center gap-1"><span class="inline-block h-3 w-3 rounded bg-[#6DD3CE]"></span>4 = setuju</div>
                                <div class="flex items-center gap-1"><span class="inline-block h-3 w-3 rounded bg-[#FF6B6B]"></span>5 = sangat setuju</div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            {{-- Ringkasan Skor --}}
                            <div class="w-full">
                                <p class="mb-2 text-base text-gray-700">Total Poin: <b>{{ $totalScore }} poin</b></p>
                                <p class="mb-2 text-base text-gray-700">
                                    Rata-rata Poin per Soal:
                                    <b>{{ round($totalScore / max($totalQuestions, 1), 2) }}</b>
                                </p>
                                <p class="mb-2 text-base text-gray-700">Rata-rata: <b>{{ $average }}</b></p>
                                <p class="mb-2 text-base text-gray-700">Deskripsi: <b>{{ $description }}</b></p>
                            </div>
                        </div>

                        {{-- Sub Categories --}}
                        @if(!empty($catData['sub_categories']))
                            <div class="mt-3">
                                <h4 class="font-semibold text-gray-700">Sub Kategori:</h4>
                                <ul class="pl-5 list-disc">
                                    @foreach ($catData['sub_categories'] as $subKey => $sub)
                                        <li>
                                            <b>{{ Str::title(str_replace('_',' ',$subKey)) }}</b> - Avg: {{ $sub['average'] }} | {{ $sub['description'] ?? '' }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Kanan: Detail Jawaban -->
        <div class="select-text flex w-full flex-col self-start rounded-lg bg-white p-6 shadow-md md:w-1/3" style="max-height: 510px; height: 510px">
            <h2 class="mb-4 text-xl font-semibold">Detail Jawaban</h2>
            <div class="flex-1 overflow-y-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="sticky top-0 border-b bg-white">
                            <th class="p-2 text-center text-gray-500">No.</th>
                            <th class="p-2 text-center text-gray-500">Poin</th>
                            <th class="p-2 text-gray-500">Jawaban</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($attempt->responses as $response)
                            @if (isset($response->question) && $response->question->scoring["scale"])
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
</div>

@push("script")
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('alpine:init', () => {
    const colors = ['rgba(117, 186, 219, 0.6)', 'rgba(255, 224, 102, 0.6)', 'rgba(166, 133, 226, 0.6)', 'rgba(109, 211, 206, 0.6)', 'rgba(255, 107, 107, 0.6)'];
    const categories = @json($categories);
    const answerData = @json($data->map(fn($d)=>$d['answer_distribution'])->toArray());

    categories.forEach((cat) => {
        const ctx = document.getElementById(`horizontalBarChart-${cat}`);
        if (!ctx) return;
        const data = Object.values(answerData[cat] ?? {1:0,2:0,3:0,4:0,5:0});

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['1','2','3','4','5'],
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: data,
                    backgroundColor: colors,
                    borderRadius: 0
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: { beginAtZero:true, ticks:{ stepSize:1 }, grid:{color:'#eee'}, position:'top' },
                    y: { grid:{color:'#eee'} }
                },
                plugins: { legend:{ display:false } },
                animation:false
            }
        });
    });
});
</script>
@endpush
