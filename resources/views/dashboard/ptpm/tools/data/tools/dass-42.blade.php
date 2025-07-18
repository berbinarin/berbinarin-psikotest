<div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 40%">
    <div class="flex-1 overflow-y-auto" style="max-height: 400px">
        <div class="pb-10">
            {{-- Menampilkan nama user dari session --}}
            <h2 class="text-2xl font-semibold">{{ $psikotesSession->user->name }}</h2>
            <p class="mt-4">
                {{-- Mengambil kategori dengan skor tertinggi secara dinamis --}}
                @php
                    $highestCategory = $dass42Results->sortByDesc('score')->first();
                    // Max score for DASS-42 is 42 (14 questions * max 3 points each)
                    $maxPossibleScore = 42;
                @endphp
                @if($highestCategory)
                    Kategori yang paling tinggi nilainya adalah
                    <b>{{ $highestCategory['name'] }}</b>
                    dengan skor
                    <b>{{ $highestCategory['score'] }} poin</b>
                    . Sehingga didapatkan kesimpulan berupa
                    <b>{{ $highestCategory['name'] }}</b>
                    tipe
                    <b>{{ $highestCategory['description'] }}</b>
                    .
                @else
                    <p>Data hasil DASS42 tidak tersedia.</p>
                @endif
            </p>
        </div>
        <div class="relative mb-4 space-y-4" style="padding-left: 0">
            {{-- Diagram Bar Dinamis --}}
            {{-- Warna untuk setiap kategori --}}
            @php
                $colors = [
                    'depression' => 'bg-blue-300',
                    'anxiety' => 'bg-purple-300',
                    'stress' => 'bg-red-300',
                ];
            @endphp

            @foreach($dass42Results as $categoryData)
                <div class="flex items-center">
                    {{-- Menghitung lebar bar secara dinamis berdasarkan skor dan maxPossibleScore --}}
                    <div class="ml-1 h-10 rounded-r-lg {{ $colors[$categoryData['category']] ?? 'bg-gray-300' }}"
                         style="width: {{ ($categoryData['score'] / $maxPossibleScore) * 100 . "%" }}"></div>
                    <span class="ml-2 font-medium text-gray-700">{{ $categoryData['score'] }} poin</span>
                </div>
            @endforeach

            {{-- Garis Pinggir --}}
            <div class="absolute bottom-0 left-0 h-48 w-1 bg-gray-300"></div>
            <div class="absolute bottom-0 left-0 h-1 w-full bg-gray-300"></div>
        </div>

        <div class="flex flex-col">
            <div class="">
                {{-- Keterangan warna untuk setiap kategori (bisa disederhanakan jika menggunakan loop di atas) --}}
                @foreach($dass42Results as $categoryData)
                    <div class="mb-2 flex items-center space-x-2">
                        <div class="h-4 w-4 rounded-full {{ $colors[$categoryData['category']] ?? 'bg-gray-300' }}"></div>
                        <p class="text-lg text-gray-700">{{ $categoryData['name'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="pt-2">
                {{-- Total Poin per Kategori Secara Dinamis --}}
                <p class="mb-4 text-lg text-gray-700">
                    @foreach($dass42Results as $categoryData)
                        Total poin pada {{ $categoryData['name'] }}:
                        <b>{{ $categoryData['score'] }} poin</b>
                        <br />
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>

<div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 60%">
    <h2 class="mb-4 text-2xl font-semibold">Detail Jawaban</h2>
    <div class="w-full">
        <table class="w-full table-fixed border-collapse text-lg">
            <thead>
                <tr class="flex border-b">
                    <th class="p-4 text-center text-gray-400" style="width: 50%">Pernyataan</th>
                    <th class="p-4 text-center text-gray-400" style="width: 25%">Kategori</th>
                    <th class="p-4 text-center text-gray-400" style="width: 25%">Nilai</th>
                </tr>
            </thead>
        </table>
        <div class="overflow-y-auto" style="max-height: 350px">
            <table class="w-full table-fixed border-collapse text-lg">
                <tbody class="flex flex-col border-b">
                    {{-- Loop melalui respons sesi psikotes untuk detail jawaban --}}
                    @foreach ($psikotesSession->responses as $response)
                        @if (isset($response->question) && isset($response->question->scoring['scale']) && $response->question->scoring['scale'] !== null)
                            <tr class="border-b">
                                <td class="p-4" style="width: 50%">{{ $response->question->text }}</td>
                                <td class="p-4 text-center" style="width: 25%">{{ ucfirst($response->question->scoring['scale']) }}</td>
                                <td class="p-4 text-center" style="width: 25%">{{ $response->answer['value'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
