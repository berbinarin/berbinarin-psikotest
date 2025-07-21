@php
    use Illuminate\Support\Str;

    $categories = ["extraversion", "agreeableness", "neuroticism", "conscientiousness", "openness"];

    // Deskripsi untuk setiap kategori (opsional, untuk tampilan yang lebih baik)
    $descriptions = [
        "extraversion" => "Dimensi kepribadian Extraversion ini berkaitan dengan tingkat kenyamanan seseorang dalam berinteraksi dengan orang lain, penuh semangat, dan kecenderungan untuk mencari stimulasi dari luar.",
        "agreeableness" => "Dimensi Agreeableness mengukur kecenderungan seseorang untuk bersikap welas asih dan kooperatif daripada curiga dan menentang orang lain. Ini mencerminkan perbedaan individu dalam kepedulian terhadap harmoni sosial.",
        "neuroticism" => "Dimensi Neuroticism mengukur tingkat stabilitas emosional seseorang. Skor tinggi menunjukkan kecenderungan untuk mengalami emosi negatif seperti kecemasan, kemarahan, atau kesedihan.",
        "conscientiousness" => "Dimensi Conscientiousness berkaitan dengan tingkat kedisiplinan, kehati-hatian, dan keteraturan seseorang. Ini menunjukkan preferensi untuk perilaku yang terencana daripada spontan.",
        "openness" => "Dimensi Openness to Experience mengukur sejauh mana seseorang terbuka terhadap pengalaman baru, memiliki imajinasi yang hidup, dan menghargai seni, emosi, petualangan, serta ide-ide yang tidak biasa.",
    ];
@endphp

<div class="flex w-full space-x-8">
    {{-- Graph Section --}}
    <div x-data="{ graph: '{{ $categories[0] }}' }" class="w-1/2 rounded-lg bg-white p-8 shadow-lg">
        <div class="mb-4">
            <h2 class="text-2xl font-semibold">Grafik Hasil Tes OCEAN</h2>

            <div class="mt-3 flex flex-wrap gap-2">
                @foreach ($categories as $category)
                    <button class="rounded-full border-2 px-4 py-2 text-lg font-semibold transition" @click="graph = '{{ $category }}'" :class="graph === '{{ $category }}' ? 'bg-[#75BADB] text-white' : 'text-[#75BADB] hover:bg-[#A0D3E9] hover:text-white'">
                        {{ Str::title($category) }}
                    </button>
                @endforeach
            </div>
        </div>

        @foreach ($categories as $category)
            @php
                $categoryData = $data[$category];
                $totalQuestionsInCategory = $categoryData["question_count"] > 0 ? $categoryData["question_count"] : 1; // Hindari pembagian dengan nol
            @endphp

            <div x-show="graph === '{{ $category }}'" x-cloak>
                <div class="overflow-y-auto" style="max-height: 800px">
                    <p class="mb-8 text-lg text-gray-500">{{ $descriptions[$category] ?? "" }}</p>

                    {{-- Diagram Dinamis --}}
                    <div class="relative mb-4 mt-2 space-y-4 pb-2" style="padding-left: 0">
                        @php
                            $barColors = [1 => "bg-blue-300", 2 => "bg-purple-300", 3 => "bg-red-300", 4 => "bg-yellow-400", 5 => "bg-red-900"];
                        @endphp

                        @foreach ($categoryData["answer_distribution"] as $scoreValue => $count)
                            @php
                                $percentage = ($count / $totalQuestionsInCategory) * 100;
                            @endphp

                            <div class="flex items-center">
                                <div class="{{ $barColors[$scoreValue] }} ml-1 h-10 w-full rounded-r-lg" style="width: {{ $percentage }}%"></div>
                                <span class="ml-2 w-16 text-right font-medium text-gray-700">{{ round($percentage) }}%</span>
                            </div>
                        @endforeach

                        {{-- Garis Pinggir --}}
                        <div class="absolute bottom-0 left-0 h-full w-px bg-gray-300"></div>
                        <div class="absolute bottom-0 left-0 h-px w-full bg-gray-300"></div>
                    </div>

                    <div class="flex items-start">
                        {{-- Legenda --}}
                        <div class="w-1/2">
                            <div class="mb-2 flex items-center space-x-2">
                                <div class="h-4 w-4 rounded-full bg-blue-300"></div>
                                <p class="text-sm text-gray-700">1 = Sangat Tidak Sesuai</p>
                            </div>
                            <div class="mb-2 flex items-center space-x-2">
                                <div class="h-4 w-4 rounded-full bg-purple-300"></div>
                                <p class="text-sm text-gray-700">2 = Tidak Sesuai</p>
                            </div>
                            <div class="mb-2 flex items-center space-x-2">
                                <div class="h-4 w-4 rounded-full bg-red-300"></div>
                                <p class="text-sm text-gray-700">3 = Ragu-ragu</p>
                            </div>
                            <div class="mb-2 flex items-center space-x-2">
                                <div class="h-4 w-4 rounded-full bg-yellow-400"></div>
                                <p class="text-sm text-gray-700">4 = Sesuai</p>
                            </div>
                            <div class="mb-2 flex items-center space-x-2">
                                <div class="h-4 w-4 rounded-full bg-red-900"></div>
                                <p class="text-sm text-gray-700">5 = Sangat Sesuai</p>
                            </div>
                        </div>

                        {{-- Ringkasan Skor --}}
                        <div class="w-1/2">
                            @php
                                $maxPossibleScore = $totalQuestionsInCategory * 5;
                                $finalPercentage = $maxPossibleScore > 0 ? ($categoryData["total_score"] / $maxPossibleScore) * 100 : 0;
                            @endphp

                            <p class="mb-2 text-base text-gray-700">
                                Total Poin:
                                <b>{{ $categoryData["total_score"] }} dari {{ $maxPossibleScore }} poin</b>
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
    <div x-data="{ tab: '{{ $categories[0] }}' }" class="w-1/2 rounded-lg bg-white p-8 shadow-lg">
        <h2 class="text-2xl font-semibold">Detail Jawaban</h2>

        <div class="mb-4 mt-4 flex flex-wrap gap-2">
            @foreach ($categories as $category)
                <button class="rounded-full border-2 px-4 py-2 text-lg font-semibold transition" @click="tab = '{{ $category }}'" :class="tab === '{{ $category }}' ? 'bg-[#75BADB] text-white' : 'text-[#75BADB] hover:bg-[#A0D3E9] hover:text-white'">
                    {{ Str::title($category) }}
                </button>
            @endforeach
        </div>

        @foreach ($categories as $category)
            <div x-show="tab === '{{ $category }}'" x-cloak>
                <div class="overflow-y-auto" style="max-height: 500px">
                    <table class="w-full text-left text-lg">
                        <thead>
                            <tr class="border-b">
                                <th class="p-2 text-center text-gray-500">No. Soal</th>
                                <th class="p-2 text-center text-gray-500">Nilai</th>
                                <th class="p-2 text-gray-500">Jawaban Teks</th>
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
        @endforeach
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
