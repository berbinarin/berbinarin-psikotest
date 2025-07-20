<div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 40%">
    <div class="flex-1 overflow-y-auto" style="max-height: 400px">
        <div class="pb-10">
            <h2 class="text-2xl font-semibold">{{ $attempt->user->name }}</h2>
            <p class="mt-4">
                Kategori yang paling tinggi nilainya adalah
                <b>{{ $data->keys()->first() }}</b>
                dengan skor
                <b>{{ $data->first() }} poin</b>
                . Sehingga di dapatkan kesimpulan berupa
                <b>Anxiety</b>
                tipe
                <b>Moderate</b>
                .
            </p>
        </div>
        <div class="relative mb-4 space-y-4" style="padding-left: 0">
            {{-- Diagram --}}
            <div class="flex items-center">
                <div class="ml-1 h-10 rounded-r-lg bg-blue-300" style="width: {{ (12 / 61) * 100 . "%" }}"></div>
                <span class="ml-2 font-medium text-gray-700">10 poin</span>
            </div>
            <div class="flex items-center">
                <div class="ml-1 h-10 rounded-r-lg bg-purple-300" style="width: {{ (12 / 61) * 100 . "%" }}"></div>
                <span class="ml-2 font-medium text-gray-700">{{ 12 }} poin</span>
            </div>
            <div class="flex items-center pb-4">
                <div class="ml-1 h-10 rounded-r-lg bg-red-300" style="width: {{ (12 / 61) * 100 . "%" }}"></div>
                <span class="ml-2 font-medium text-gray-700">{{ 12 }} poin</span>
            </div>

            {{-- Garis Pinggir --}}
            <div class="absolute bottom-0 left-0 h-48 w-1 bg-gray-300"></div>
            <div class="absolute bottom-0 left-0 h-1 w-full bg-gray-300"></div>
        </div>

        <div class="flex flex-col">
            <div class="">
                <div class="mb-2 flex items-center space-x-2">
                    <div class="h-4 w-4 rounded-full bg-blue-300"></div>
                    <p class="text-lg text-gray-700">Depression</p>
                </div>
                <div class="mb-2 flex items-center space-x-2">
                    <div class="h-4 w-4 rounded-full bg-purple-300"></div>
                    <p class="text-lg text-gray-700">Anxiety</p>
                </div>
                <div class="mb-2 flex items-center space-x-2">
                    <div class="h-4 w-4 rounded-full bg-red-300"></div>
                    <p class="text-lg text-gray-700">Stress</p>
                </div>
            </div>
            <div class="pt-2">
                <p class="mb-4 text-lg text-gray-700">
                    Total poin pada Depression:
                    <b>10poin</b>
                    <br />
                    Total poin pada Anxiety:
                    <b>12poin</b>
                    <br />
                    Total poin pada Stress:
                    <b>12poin</b>
                    <br />
                </p>
            </div>
        </div>
    </div>
</div>

<div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 60%">
    <h2 class="mb-4 text-2xl font-semibold">Detail Jawaban</h2>
    <!-- Bungkus keseluruhan dengan satu div -->
    <div class="w-full">
        <!-- Tabel untuk header saja -->
        <table class="w-full table-fixed border-collapse text-lg">
            <thead>
                <tr class="flex border-b">
                    <th class="p-4 text-center text-gray-400" style="width: 50%">Pernyataan</th>
                    <th class="p-4 text-center text-gray-400" style="width: 25%">Kategori</th>
                    <th class="p-4 text-center text-gray-400" style="width: 25%">Nilai</th>
                </tr>
            </thead>
        </table>

        <!-- Kontainer dengan overflow untuk body -->
        <div class="overflow-y-auto" style="max-height: 350px">
            <table class="w-full table-fixed border-collapse text-lg">
                <tbody class="flex flex-col border-b">
                    @foreach ($attempt->responses as $response)
                        <tr class="border-b">
                            <td class="p-4" style="width: 50%">{{ $response->question->text }}</td>
                            <td class="p-4 text-center" style="width: 25%">{{ $response->question->scoring['scale'] }}</td>
                            <td class="p-4 text-center" style="width: 25%">{{ $response->answer['value'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
