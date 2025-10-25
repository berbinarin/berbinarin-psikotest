@php
    $categories = ["verbal", "numeric", "abstract"];
    $data = [
        "verbal" => [
            "total_score" => 75,
            "question_count" => 20,
            "average" => 3.75,
            "answer_distribution" => [
                1 => 2,
                2 => 3,
                3 => 5,
                4 => 6,
                5 => 4,
            ],
            "description" => "Kemampuan verbal cukup baik",
        ],
        "numeric" => [
            "total_score" => 80,
            "question_count" => 20,
            "average" => 4.0,
            "answer_distribution" => [
                1 => 1,
                2 => 2,
                3 => 4,
                4 => 8,
                5 => 5,
            ],
            "description" => "Kemampuan numerik baik",
        ],
        "abstract" => [
            "total_score" => 70,
            "question_count" => 20,
            "average" => 3.5,
            "answer_distribution" => [
                1 => 3,
                2 => 4,
                3 => 5,
                4 => 5,
                5 => 3,
            ],
            "description" => "Kemampuan abstrak cukup",
        ],
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
    <div class="mb-1 flex w-full gap-8">
        {{-- chart donat --}}
        <div x-data="{ graph: '{{ $categories[0] }}' }" class="max-h-[500px] flex-1 rounded-xl bg-white p-8 shadow-lg">
            <div class>
                <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name ?? "User Name" }}</h2>
            </div>
            <hr class="my-4 border-t-2 border-[#75BADB]" />

            @foreach ($categories as $category)
                <div x-show="graph === '{{ $category }}'" x-cloak>
                    <div class="overflow-y-auto">
                        <div class="flex w-full items-start">
                            <div class="flex flex-col items-center" style="width: 200px; flex: 0 0 200px">
                                <div style="width: 200px; height: 200px">
                                    <canvas id="chart-{{ $category }}"></canvas>
                                </div>

                                {{-- Legend di bawah chart --}}
                                <div class="mt-4 flex items-center gap-6">
                                    <div class="flex items-center gap-2">
                                        <div class="h-3 w-3 bg-[#3B82F6]"></div>
                                        <span class="text-sm text-gray-700">Benar</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="h-3 w-3 bg-[#EF4444]"></div>
                                        <span class="text-sm text-gray-700">Salah</span>
                                    </div>
                                </div>
                            </div>

                            <div class="ml-8 mt-5 flex flex-col">
                                <div class="mb-2">
                                    <span class="text-md">
                                        Benar:
                                        <span class="font-semibold">90 Poin</span>
                                    </span>
                                </div>
                                <div class="mb-2">
                                    <span class="text-md">
                                        Salah:
                                        <span class="font-semibold">10 Poin</span>
                                    </span>
                                </div>
                                <div class="mb-2">
                                    <span class="text-md">
                                        Kategori:
                                        <span class="font-semibold">Tinggi</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <hr class="my-4 border-t-2 border-[#75BADB]" />
            {{-- Kesimpulan --}}
            <div class="mt-4 rounded-md bg-white/50">
                <h3 class="mb-1 text-[18px] font-bold text-[#75BADB]">Kesimpulan</h3>
                <div class="space-y-2 text-sm text-gray-700">
                    <div>
                        Total Pertanyaan Terjawab:
                        <span class="font-semibold">70 Pertanyaan</span>
                    </div>
                    <div>
                        Total Benar:
                        <span class="font-semibold">40 Pertanyaan</span>
                    </div>
                    <div>
                        Total Salah:
                        <span class="font-semibold">30 Pertanyaan</span>
                    </div>
                    <div>
                        Persentil:
                        <span class="font-semibold">P35</span>
                    </div>
                    <div>
                        Kategori:
                        <span class="font-semibold">Rendah</span>
                    </div>
                </div>
            </div>
         </div>

        {{-- Detail Jawaban --}}
        <div class="flex w-full select-text flex-col self-start rounded-lg bg-white p-6 shadow-md md:w-1/3" style="max-height: 510px; height: 510px">
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
                        {{-- Add static data for demonstration --}}
                        @for ($i = 1; $i <= 20; $i++)
                            <tr class="border-b">
                                <td class="p-2 text-center">{{ $i }}</td>
                                <td class="p-2 text-center">{{ rand(1, 5) }}</td>
                                <td class="p-2">Sample Answer {{ $i }}</td>
                            </tr>
                        @endfor
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
            const categories = @json($categories);
            const CHART_SIZE = 140;
            const DOUGHNUT_CUTOUT = '75%';

            categories.forEach((cat) => {
                const canvas = document.getElementById(`chart-${cat}`);
                if (!canvas) return;

                const container = canvas.parentElement;
                if (container) {
                    container.style.width = CHART_SIZE + 'px';
                    container.style.height = CHART_SIZE + 'px';
                }

                canvas.width = CHART_SIZE;
                canvas.height = CHART_SIZE;

                new Chart(canvas, {
                    type: 'doughnut',
                    data: {
                        labels: ['Benar', 'Salah'],
                        datasets: [
                            {
                                data: [90, 10],
                                backgroundColor: ['#3B82F6', '#EF4444'],
                                borderWidth: 0,
                                cutout: DOUGHNUT_CUTOUT,
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, 
                        plugins: {
                            legend: {
                                display: false,
                            },
                            title: {
                                display: false,
                            },
                        },
                    },
                });
            });
        });
    </script>
@endpush
