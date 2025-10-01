@push("style")
    <style>
        [x-cloak] { display: none !important; }
    </style>
@endpush

<div class="mb-1 flex w-full gap-8">
    {{-- Graph Section --}}
    <div class="max-h-[500px] flex-1 rounded-xl bg-white p-8 shadow-lg">
        <div class="mb-4">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name }}</h2>
            <p class="mt-2 text-gray-600">Berikut ini merupakan visualisasi dengan jawaban untuk alat tes BDI</p>
        </div>

        <div>
            <div class="flex w-full flex-col items-center">
                <canvas id="horizontalBarChart-data" class="mb-1" style="max-height: 220px; max-width: 700px"></canvas>

                <div class="mb-4 flex gap-4 text-xs">
                    <div class="flex items-center gap-1">
                        <span class="inline-block h-3 w-3 rounded bg-[#75BADB]"></span>
                        0
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="inline-block h-3 w-3 rounded bg-[#FFE066]"></span>
                        1
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="inline-block h-3 w-3 rounded bg-[#A685E2]"></span>
                        2
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="inline-block h-3 w-3 rounded bg-[#FF6B6B]"></span>
                        3
                    </div>
                </div>
            </div>

            {{-- Ringkasan Skor --}}
            <div class="mt-4">
                <p class="mb-2 text-base text-gray-700">
                    Total skor yang didapatkan adalah
                    <b>{{ $data['total_score'] }} poin</b>
                </p>
                <p class="mb-2 text-base text-gray-700">
                    Kesimpulan:
                    <b>{{ $data['description'] }}</b>
                </p>
            </div>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="w-1/3 rounded-xl bg-white p-6 shadow-lg" style="max-height: 500px">
        <h2 class="mb-4 text-xl font-semibold">Detail Jawaban</h2>

        <div class="overflow-hidden">
            <div class="overflow-y-auto" style="max-height: 380px">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="sticky top-0 border-b bg-white">
                            <th class="p-2 text-center text-gray-500">No.</th>
                            <th class="p-2 text-center text-gray-500">Poin</th>
                            <th class="p-2 text-center text-gray-500">Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attempt->responses as $response)
                            @if (isset($response->question) && $response->question->type === 'multiple_choice')
                                <tr class="border-b">
                                    <td class="p-2 text-center">{{ $response->question->order }}.</td>
                                    @php
                                        $userChoice = $response->answer["choice"];
                                        $optionText = "";
                                        foreach ($response->question->options as $option) {
                                            if ($option["key"] == $userChoice) {
                                                $optionText = $option["text"];
                                                break;
                                            }
                                        }
                                        $scoringPoin = $response->question->scoring[$userChoice] ?? '';
                                    @endphp
                                    <td class="p-2 text-center ">{{ $scoringPoin }}</td>
                                    <td class="p-2">{{ $optionText }}</td>
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
        const ctxdata = document.getElementById('horizontalBarChart-data').getContext('2d');
        new Chart(ctxdata, {
            type: 'bar',
            data: {
                labels: ['0', '1', '2', '3'],
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: [
                        {{ $data['answer_distribution']['A'] ?? 0 }},
                        {{ $data['answer_distribution']['B'] ?? 0 }},
                        {{ $data['answer_distribution']['C'] ?? 0 }},
                        {{ $data['answer_distribution']['D'] ?? 0 }},
                    ],
                    backgroundColor: [
                        'rgba(117, 186, 219, 0.6)',
                        'rgba(255, 224, 102, 0.6)',
                        'rgba(166, 133, 226, 0.6)',
                        'rgba(255, 107, 107, 0.6)',
                    ],
                    borderRadius: 0,
                }],
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: { beginAtZero: true, grid: { color: "#eee" } },
                    y: { grid: { color: "#eee" } }
                },
                plugins: { legend: { display: false } },
                animation: false,
            }
        });
    });
</script>
@endpush
