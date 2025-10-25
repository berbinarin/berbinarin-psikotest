@push("style")
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

<div class="w-full">
    <div class="mb-1 flex w-full gap-8">
        {{-- chart donat --}}
        <div class="max-h-[510px] flex-1 rounded-xl bg-white p-8 shadow-lg">
            <div class>
                <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name ?? "User Name" }}</h2>
            </div>
            <hr class="my-4 border-t-2 border-[#75BADB]" />

                <div class="overflow-y-auto">
                    <div class="flex w-full items-start justify-evenly">
                        <div class="flex flex-col items-center" style="width: 200px; flex: 0 0 200px">
                            <div style="width: 200px; height: 200px">
                                <canvas id="chart-d4"></canvas>
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
                            <div class="text-base  mt-4 ">
                                <table>
                                    <tr>
                                        <td>Total Pertanyaan Terjawab</td>
                                        <td class="font-semibold">: {{ $data['total_questions'] }} Pertanyaan</td>
                                    </tr>
                                    <tr>
                                        <td>Total Benar</td>
                                        <td class="font-semibold">: {{ $data['correct'] }} Pertanyaan</td>
                                    </tr>
                                    <tr>
                                        <td>Total Salah</td>
                                        <td class="font-semibold">: {{ $data['wrong'] }} Pertanyaan</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Persentil</td>
                                        <td class="font-semibold">: {{ $data['percentile'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td class="font-semibold">: {{ $data['category'] }}</td>
                                    </tr>
                                    
                                </table>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>

            <hr class="my-4 border-t-2 border-[#75BADB]" />

            {{-- Kesimpulan --}}
            <div class="mt-4 rounded-md bg-white/50">
                <h3 class="mb-1 text-[18px] font-bold text-[#75BADB]">Kesimpulan</h3>
                <p><span class="capitalize">{{ $attempt->user->name ?? "User Name" }}</span> berada pada persentil {{ substr($data['percentile'],1)}} ({{ $data['percentile'] }}), yang berarti menempati posisi di atas sekitar  {{ substr($data['percentile'],1)}}% dari kelompok norma. Dengan kata lain, {{ 100-(int) substr($data['percentile'],1)}}% peserta lain memiliki skor lebih tinggi pada aspek D4, yaitu penalaran abstrak dan logika kombinasi simbolik. Dengan demikian, <span class="capitalize">{{ $attempt->user->name ?? "User Name" }}</span> termasuk dalam kategori <span class="lowercase">{{ $data['category'] }}</span> untuk kemampuan tersebut.</p>
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
                            <th class="p-2 text-center text-gray-500">Kunci Jawaban</th>
                            <th class="p-2 text-gray-500">Jawaban Pengguna</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        {{-- Add static data for demonstration --}}
                        @foreach ($attempt->responses->slice(2) as $response)
                            <tr class="border-b">
                                <td class="p-2 text-center">{{ $loop->iteration }}.</td>
                                <td class="p-2">
                                    @php
                                        $answerKey = $response->question->scoring['correct_answer'];
                                        $optionTextKey = "";
                                        foreach ($response->question->options as $option) {
                                            if ($option["key"] == $answerKey) {
                                                $optionTextKey = $option["text"];
                                                break;
                                            }
                                        }
                                    @endphp

                                    {{ $answerKey }}. {{ $optionTextKey }}
                                </td>
                                <td class="p-2">
                                    @php
                                        $userChoice = $response->answer["choice"];
                                        $optionText = "";
                                        foreach ($response->question->options as $option) {
                                            if ($option["key"] == $userChoice) {
                                                $optionText = $option["text"];
                                                break;
                                            }
                                        }
                                    @endphp

                                    {{ $userChoice }}. {{ $optionText }}
                                </td>
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
        document.addEventListener('alpine:init', () => {
            const CHART_SIZE = 140;
            const DOUGHNUT_CUTOUT = '75%';

            const canvas = document.getElementById('chart-d4');
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
                            data: [{{ $data['correct'] }}, {{ $data['wrong'] }}],
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
                        legend: { display: false },
                        title: { display: false },
                    },
                },
            });
        });
    </script>
@endpush
