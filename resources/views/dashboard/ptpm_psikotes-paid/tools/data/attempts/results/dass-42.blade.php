<div class="flex flex-col gap-6 md:flex-row">
    {{-- Ringkasan & Diagram --}}
    <div class="flex flex-col rounded-xl bg-white p-6 shadow-md w-full md:w-2/5">
        <h2 class="text-xl font-semibold mb-4">{{ $attempt->user->name }}</h2>

        <div class="overflow-y-auto scrollbar-thin pr-2" style="max-height: calc(100vh - 200px)">
            {{-- Ringkasan --}}
            @php
                $highest = $data->sortByDesc('score')->first();
                $maxScore = 42;
                $colors = [
                    'depression' => 'bg-blue-300',
                    'anxiety' => 'bg-purple-300',
                    'stress' => 'bg-pink-300',
                ];
                $chartColors = [
                    'depression' => 'rgba(59,130,246,0.6)',
                    'anxiety' => 'rgba(139,92,246,0.6)',
                    'stress' => 'rgba(236,72,153,0.6)',
                ];
            @endphp

            <div class="mb-4 text-gray-700">
                @if($highest)
                    Kategori yang paling tinggi nilainya adalah <b>{{ $highest['name'] }}</b> dengan skor <b>{{ $highest['score'] }} poin</b>.
                    Sehingga di dapatkan kesimpulan berupa <b>{{ $highest['name'] }}</b> tipe <b>{{ $highest['description'] }}</b>.
                @else
                    Data DASS-42 tidak tersedia.
                @endif
            </div>

            {{-- Diagram Horizontal --}}
            <div class="space-y-3 mb-4">
                @foreach($data as $result)
                    <div class="flex items-center">
                        <div class="h-8 {{ $colors[$result['category']] ?? 'bg-gray-300' }} rounded-r-md"
                             style="width: {{ ($result['score'] / $maxScore) * 100 }}%">
                        </div>
                        <span class="ml-3 text-sm text-gray-800">{{ $result['score'] }} poin</span>
                    </div>
                @endforeach
            </div>

            {{-- Indikator --}}
            <div class="space-y-2">
                @foreach($data as $result)
                    <div class="flex items-center">
                        <div class="h-3 w-3 rounded-full {{ $colors[$result['category']] ?? 'bg-gray-300' }}"></div>
                        <span class="ml-2 text-sm text-gray-700">
                            {{ $result['name'] }} — <b>{{ $result['description'] }}</b> ({{ $result['score'] }} poin)
                        </span>
                    </div>
                @endforeach
            </div>

            {{-- Ringkasan Tingkat Keparahan --}}
            <div class="mt-6 space-y-3">
                @foreach($data as $result)
                    <div class="flex justify-between items-center bg-gray-50 rounded-lg px-4 py-3 shadow-sm">
                        <div class="flex items-center">
                            <div class="h-3 w-3 rounded-full {{ $colors[$result['category']] ?? 'bg-gray-300' }}"></div>
                            <span class="ml-3 font-medium text-gray-700">{{ ucfirst($result['category']) }}</span>
                        </div>
                        <div class="text-right text-sm text-gray-600">
                            Total poin: <b>{{ $result['score'] }}</b> —
                            <span class="font-semibold text-gray-800">{{ $result['description'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Detail Jawaban --}}
    <div class="flex flex-col rounded-xl bg-white p-6 shadow-md w-full md:w-3/5">
        <h2 class="text-xl font-semibold mb-4">Detail Jawaban</h2>

        <table class="w-full table-fixed border-collapse text-sm">
            <thead class="sticky top-0 bg-white z-10">
                <tr class="flex border-b text-gray-500 font-semibold">
                    <th class="w-1/2 p-3 text-center">Pernyataan</th>
                    <th class="w-1/4 p-3 text-center">Kategori</th>
                    <th class="w-1/4 p-3 text-center">Nilai</th>
                </tr>
            </thead>
        </table>

        <div class="overflow-y-auto scrollbar-thin" style="max-height: 380px">
            <table class="w-full table-fixed border-collapse text-sm">
                <tbody class="flex flex-col">
                    @foreach ($attempt->responses as $response)
                        <tr class="border-b">
                            <td class="w-1/2 p-3">{{ $response->question->text }}</td>
                            <td class="w-1/4 p-3 text-center">{{ $response->question->scoring['scale'] }}</td>
                            <td class="w-1/4 p-3 text-center">{{ $response->answer['value'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
