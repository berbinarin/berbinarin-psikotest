<div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 40%">
    <div class="flex-1 overflow-y-auto" style="max-height: 400px">
        <div class="pb-10">
            <h2 class="text-2xl font-semibold">{{ $psikotesSession->user->name }}</h2>
            <p class="mt-4">
                Berikut merupakan 3 peringkat kategori dengan nilai terendah, yaitu

                <b>{{ Str::of("Mechanial")->replace("_", " ")->title() }}</b>

                <b>{{ Str::of("Mechanical")->replace("_", " ")->title() }}</b>
            </p>
            <div>
                {{-- Dalam sini --}}

                <ul class="flex flex-col gap-2 pt-4">
                    @foreach ($data as $key => $value)
                        <li class="flex items-center gap-2">
                            <div class="flex justify-center rounded-full bg-primary px-2 py-1">
                                <span class="text-white">{{ $loop->iteration }}.</span>
                            </div>
                            <div class="flex w-full justify-between">
                                <p class="pl-2">{{ Str::title($key) }}</p>
                                <p class="pr-20 font-bold">{{ $value }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <h2 class="pt-4 text-2xl font-semibold">Kesimpulan</h2>
            <ul>
                <li>
                    <h3 class="text-primary-alt pt-2 text-xl font-semibold">{{ Str::of("Testing")->replace("_", " ") }}</h3>
                    <p>ini merupakan description</p>
                </li>
                <li>
                    <h3 class="text-primary-alt pt-2 text-xl font-semibold">{{ Str::of("Testing")->replace("_", " ")->title() }}</h3>
                    <p>ini merupakan description</p>
                </li>
                <li>
                    <h3 class="text-primary-alt pt-2 text-xl font-semibold">{{ Str::of("Testing")->replace("_", " ")->title() }}</h3>
                    <p>ini merupakan description</p>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 60%">
    <h2 class="mb-4 text-2xl font-semibold">Detail Jawaban</h2>

    <div x-data="{ tab: 'subtest-A' }">
        <ul class="flex flex-wrap items-center gap-7 text-lg font-bold">
            @foreach ($psikotesSession->responses as $response)
                <li>
                    <button :class="tab === 'subtest-{{ $response->question->section->title }}' ? 'pb-2 border-b-2 border-blue-300 text-primary-alt' : 'text-gray-700 pb-2'" @click="tab = 'subtest-{{ $response->question->section->title }}'">Subtes {{ $response->question->section->title }}</button>
                </li>
            @endforeach
        </ul>
        @foreach ($psikotesSession->responses as $response)
            <div x-show="tab === 'subtest-{{ $response->question->section->title }}'" class="pt-2">
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
                    @php
                        // Ubah array options menjadi Laravel Collection
                        $options = collect($response->question->options["variants"]["male"]);
                        $categories = $response->question->scoring;
                    @endphp

                    <div class="max-h-40 overflow-y-auto" style="max-height: 250px">
                        <table class="w-full table-fixed border-collapse text-lg">
                            <tbody class="flex flex-col border-b">
                                @foreach ($response->answer["ranked_ids"] as $item)
                                    <tr class="border-b">
                                        <td class="p-4" style="width: 50%">{{ $options->where("id", $item)->first()["text"] }}</td>
                                        <td class="p-4 text-center" style="width: 25%">{{ Str::title($categories[$item]) }}</td>
                                        <td class="p-4 text-center" style="width: 25%">{{ $item }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
