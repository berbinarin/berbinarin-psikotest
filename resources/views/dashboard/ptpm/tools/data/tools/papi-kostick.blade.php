<div class="flex w-full flex-col gap-5 md:flex-row">
    {{-- Kolom Kiri: Detail Hasil & Deskripsi --}}
    <div class="w-full rounded-lg bg-white p-6 shadow-md md:w-2/3">
        <h2 class="mb-1 text-xl font-bold text-gray-900">Name: {{ $session->user->name }}</h2>
        <p class="text-sm text-gray-600">Berikut adalah rincian jawaban dan kepribadian berdasarkan tes Papi Kostick.</p>

        <div id="chart-container">
            <div id="chart"></div>
        </div>

        @foreach ($data as $mainCategory => $details)
            <div class="mt-8">
                <p class="text-lg font-bold text-gray-500">{{ $mainCategory }}</p>
                <div class="mt-3 border-l-4 border-blue-500 pl-4">
                    @foreach ($details as $item)
                        <div class="mb-5">
                            <p class="text-base font-bold text-gray-800">{{ $item["sub_code"] }} ({{ $item["sub_name"] }}) {{ $item["score"] }}</p>
                            <p class="text-base font-normal text-gray-600">{{ $item["description"] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- Kolom Kanan: Daftar Jawaban User --}}
    <div class="w-full self-start rounded-lg bg-white p-6 shadow-md md:w-1/3">
        <h3 class="mb-4 text-lg font-bold">Jawaban</h3>
        <ul class="max-h-[600px] space-y-3 overflow-y-auto pr-2">
            @foreach ($session->responses->sortBy("question.order") as $response)
                <li class="flex items-start text-sm">
                    <span class="mr-3 w-6 font-semibold text-gray-700">{{ $loop->iteration }}.</span>
                    <span class="flex-1 text-gray-600">
                        {{--
                            
                        --}}
                        {{-- Menampilkan teks jawaban yang dipilih user --}}
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

                        {{ $optionText }}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const papiDescriptions = {
        G: 'Peran sebagai pekerja keras',
        A: 'Kebutuhan untuk berprestasi',
        L: 'Peran kepemimpinan',
        P: 'Kebutuhan mengatur orang lain',
        I: 'Kebutuhan mengambil keputusan',
        T: 'Tipe yang bersemangat',
        V: 'Tipe yang gesit',
        X: 'Kebutuhan untuk diperhatikan',
        S: 'Kebutuhan hubungan sosial',
        B: 'Kebutuhan untuk menjadi bagian dari kelompok',
        O: 'Kebutuhan akan kedekatan dan kasih sayang',
        R: 'Tipe teoretis',
        D: 'Minat bekerja dengan detail',
        C: 'Tipe yang teratur',
        Z: 'Kebutuhan untuk berubah',
        E: 'Kebutuhan mengendalikan emosi',
        K: 'Kebutuhan untuk bersikap keras kepala',
        F: 'Kebutuhan untuk mendukung atasan',
        W: 'Kebutuhan akan aturan dan arahan',
        N: 'Kebutuhan menyelesaikan tugas',
    };

    const categories = ['G', 'A', 'L', 'P', 'I', 'T', 'V', 'X', 'S', 'B', 'O', 'R', 'D', 'C', 'Z', 'E', 'K', 'F', 'W', 'N'];
    const originalScores = [7, 6, 5, 4, 3, 5, 7, 8, 6, 7, 9, 6, 5, 8, 4, 2, 3, 4, 6, 5];

    const plottedScores = originalScores.map((score, index) => {
        const category = categories[index];
        if (category === 'Z' || category === 'K') {
            return 9 - score;
        }
        return score;
    });

    var options = {
        series: [
            {
                name: 'Skor PAPI Kostick',
                data: plottedScores,
            },
        ],
        chart: {
            type: 'radar',
            height: 650,
            toolbar: { show: true },
        },
        dataLabels: {
            enabled: true,
            formatter: function (value, { dataPointIndex }) {
                return originalScores[dataPointIndex];
            },
            style: { fontSize: '12px', fontWeight: 'bold', colors: ['#333'] },
            background: {
                enabled: true,
                foreColor: '#fff',
                padding: 4,
                borderRadius: 2,
                borderWidth: 1,
                borderColor: '#fff',
                opacity: 0.8,
            },
            offsetY: -22,
        },
        title: {
            text: 'Hasil Psikotes PAPI Kostick',
            align: 'center',
            style: { fontSize: '20px', color: '#263238' },
        },
        xaxis: {
            categories: categories,
            labels: { style: { fontSize: '14px', fontWeight: 'bold' } },
        },
        // --- PERUBAHAN KUNCI DI SINI ---
        yaxis: {
            min: 0,
            max: 9,
            tickAmount: 9,
            labels: {
                show: true, // Diubah dari 'false' menjadi 'true'
                formatter: function (val) {
                    return Math.round(val);
                },
            },
        },
        // --- AKHIR PERUBAHAN ---
        stroke: { show: true, width: 2, colors: ['#3F51B5'], dashArray: 0 },
        fill: { opacity: 0.3, colors: ['#3F51B5'] },
        markers: {
            size: 5,
            colors: ['#FFF'],
            strokeColor: '#3F51B5',
            strokeWidth: 2,
            hover: { size: 7 },
        },
        tooltip: {
            y: {
                formatter: function (value, { dataPointIndex }) {
                    const aspectCode = categories[dataPointIndex];
                    const aspectDescription = papiDescriptions[aspectCode];
                    const originalValue = originalScores[dataPointIndex];
                    return `${aspectDescription}: <strong>${originalValue}</strong>`;
                },
            },
        },
        annotations: {
            points: [
                { x: 'Z', y: 9, marker: { size: 0 }, label: { text: '(terbalik)', offsetY: -15, style: { color: '#E91E63', fontSize: '10px' } } },
                { x: 'K', y: 9, marker: { size: 0 }, label: { text: '(terbalik)', offsetY: 15, style: { color: '#E91E63', fontSize: '10px' } } },
            ],
        },
    };

    var chart = new ApexCharts(document.querySelector('#chart'), options);
    chart.render();
</script>
