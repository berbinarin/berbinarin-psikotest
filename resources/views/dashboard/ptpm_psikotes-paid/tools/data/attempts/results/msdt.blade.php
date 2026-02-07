@php
$description = $data[0]['description'];
@endphp

<div class="mb-1 flex w-full gap-8 max-h-[580px]">
    <!-- Kartu Kiri: Ringkasan & Rincian Jawaban -->
    <div class="flex w-3/5 flex-col rounded-2xl bg-white shadow-lg">
        <div class="px-8 pt-4 pb-1">
            <div class="mb-1">
                <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name ?? "User Tidak Diketahui" }}</h2>
            </div>
            <div class="mt-2 text-[13px] text-gray-600">
                <p>
                    <span class="font-semibold text-gray-700">Kategori:</span>
                    <span class="ml-1 text-gray-800">{{ $description['type'] }}</span>
                </p>
                <p class="mt-1">
                    <span class="font-semibold text-gray-700">Status:</span>
                    <span class="ml-1 text-gray-800">{{ $description['status'] }}</span>
                </p>
            </div>
            <div class="mt-4 border-b-2 border-gray-200"></div>
        </div>

        <div class="flex min-h-0 flex-1 flex-col border-gray-200">
            <div class="px-8 pt-2 pb-2">
                <h3 class="mb-1 text-base font-semibold text-[#75BADB]">Rincian Jawaban</h3>
            </div>
            <div class="flex-1 overflow-y-auto px-8 pb-4">
                <div class="text-[13px]  text-gray-700">
                    @foreach (($description['text']['description'] ?? []) as $desc)
                        @if(!($loop->last))
                            <p>{{ $desc }}</p>
                        @else
                            <p>{!! $desc !!} Pemimpin tipe ini memiliki sifat-sifat sebagai berikut:</p>
                        @endif
                    @endforeach
                </div>

                <div class="mt-4 space-y-4 text-[13px] leading-relaxed text-gray-700">
                    @foreach (($description['text']['feature'] ?? []) as $feature)
                        <div>
                            <p class="font-semibold">{{ $loop->iteration }}. {{ $feature['general'] }}. Hal ini tampak pada sifat-sifatnya sebagai berikut:</p>
                            <ul class="mt-1 list-[lower-alpha] space-y-1 pl-5">
                                @foreach ($feature['characteristic'] ?? [] as $characteristic)
                                    <li>{{ $characteristic }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Kanan: Detail Jawaban per Pernyataan -->
    <div class="flex w-2/5 flex-col rounded-2xl bg-white px-8 py-6 shadow-lg">
        <h2 class="mb-4 text-xl font-semibold text-[#75BADB]">Jawaban</h2>

        <div class="flex-1 overflow-y-auto">
            <table class="w-full table-fixed border-collapse text-[13px]">
                <thead>
                    <tr class="border-b border-gray-200 text-gray-500">
                        <th class="w-[10%] px-2 py-2 text-left font-medium">No</th>
                        <th class="w-[15%] px-2 py-2 text-left font-medium">Pilihan</th>
                        <th class="w-[75%] px-2 py-2 text-left font-medium">Pernyataan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attempt->responses as $response)
                        <tr class="border-b border-gray-100 align-top">
                            <td class="px-2 py-2 text-gray-700">{{ $response->question->order }}</td>
                            <td class="px-2 py-2 font-semibold text-gray-800">{{ $response->answer["choice"] }}</td>
                            <td class="px-2 py-2 text-gray-700">
                                {{ collect($response->question['options'])->firstWhere('key', $response->answer['choice'])['text'] ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>