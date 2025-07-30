@section("style")
    <style>
        .scroll-container {
            cursor: grab;
            scroll-behavior: smooth;
        }
        .scroll-container:active {
            cursor: grabbing;
        }
        .scroll-container:hover {
            overflow-x: auto;
        }
        .scroll-container::-webkit-scrollbar {
            height: 0;
            background: transparent;
        }
    </style>
@endsection

<div class="mb-1 flex w-full gap-8">
    <!-- Chart & Summary -->
    <div class="flex-1 rounded-xl bg-white p-8 shadow-lg max-h-[500px]">
        <div class="pb-5">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name }}</h2>
            <p class="mt-4 text-base text-gray-700">Berikut merupakan 3 peringkat kategori dengan nilai terendah, yaitu Outdoor, Mechanical, Scientific dan Computational.</p>
        </div>

        <!-- Bar Chart -->
        <div class="flex w-full flex-col items-center">
            <canvas id="horizontalBarChart" class="mb-1" style="max-height: 300px; max-width: 700px"></canvas>
            <div class="scroll-container mb-4 flex gap-4 text-xs">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="flex items-center gap-1">
                        <span class="inline-block h-3 w-3 rounded" style="background: {{ ["#FFD6E0", "#ACD6E9", "#FFECA3", "#CAB6EE", "#98C5F6", "#FF6B6B"][$i % 6] }}"></span>
                        {{ $i }} =
                        @if ($i == 1)
                            Sangat Tidak Sesuai
                        @elseif ($i == 2)
                            Tidak Sesuai
                        @elseif ($i == 3)
                            Cukup Sesuai
                        @elseif ($i == 4)
                            Sesuai
                        @elseif ($i == 5)
                            Sangat Sesuai
                        @endif
                    </div>
                @endfor
<div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 40%">
    <div class="flex-1 overflow-y-auto" style="max-height: 400px">
        <div class="pb-10">
            <h2 class="text-2xl font-semibold">{{ $attempt->user->name }}</h2>
            <p class="mt-4">
                Berikut merupakan 3 peringkat kategori dengan nilai terendah, yaitu
            </p>
            {{-- Loop through data for lowest ranked categories --}}
            <div>
                <ul class="flex flex-col gap-2 pt-4">
                    @foreach ($data['categories'] as $key => $value)
                        <li class="flex items-center gap-2">
                            <div class="flex justify-center rounded-full bg-primary px-2 py-1">
                                <span class="text-white">{{ $loop->iteration }}.</span>
                            </div>
                            <div class="flex w-full justify-between">
                                <p class="pl-2">{{ $key }}</p>
                                <p class="pr-20 font-bold">{{ $value }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <h2 class="pt-4 text-2xl font-semibold">Kesimpulan</h2>
            {{-- Deskripsi ditampilkan disini, sesuai dengan kategori yang memiliki 3 nilai tertinggi (now lowest) --}}
            <ul>
                @foreach ($data['descriptions'] as $categoryName => $description)
                    <li>
                        <h3 class="text-primary-alt pt-2 text-xl font-semibold">{{ Str::of($categoryName)->replace("_", " ")->title() }}</h3>
                        <p>{{ $description }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Detail Jawaban -->
    <div class="flex w-1/3 flex-col rounded-xl bg-white p-6 shadow-lg" style="height: 500px">
        <h2 class="mb-4 text-xl font-semibold">Detail Jawaban</h2>
        <div class="scroll-container mb-4 overflow-x-hidden whitespace-nowrap pb-2" id="subtestTabs">
            <div class="inline-flex gap-2 border-b">
                @php
                    $subtestTitles = $attempt->responses->pluck("question.section.title")->unique();
                @endphp

                @foreach ($subtestTitles as $i => $subtest)
                    <button class="{{ $i === 0 ? "border-[#75BADB] text-[#75BADB]" : "border-transparent text-gray-500 hover:text-[#75BADB]" }} rounded-none border-b-2 bg-none px-3 pb-2 text-base font-medium outline-none transition" type="button" onclick="changeTab('subtest-{{ $subtest }}')" id="tab-subtest-{{ $subtest }}">Subtes {{ $subtest }}</button>
                @endforeach
            </div>
        </div>

        <!-- Table Content -->
        <div class="flex min-h-0 flex-1 flex-col">
            <div class="flex-1 overflow-y-auto">
                @foreach ($subtestTitles as $i => $subtest)
                    <div id="content-subtest-{{ $subtest }}" style="display: {{ $i === 0 ? "block" : "none" }}">
                        <table class="w-full table-fixed border-collapse text-sm">
                            <thead class="sticky top-0 bg-white">
                                <tr>
                                    <th class="p-2 text-center text-gray-500" style="width: 50%">Pernyataan</th>
                                    <th class="p-2 text-center text-gray-500" style="width: 25%">Kategori</th>
                                    <th class="p-2 text-center text-gray-500" style="width: 25%">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attempt->responses->where("question.section.title", $subtest) as $response)
                                    @php
                                        $options = collect($response->question->options["variants"]["male"]);
                                        $categories = $response->question->scoring;
                                    @endphp
{{-- The right section remains unchanged --}}
<div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 60%">
    <h2 class="mb-4 text-2xl font-semibold">Detail Jawaban</h2>

    <div x-data="{ tab: 'subtest-A' }">
        <ul class="flex flex-wrap items-center gap-7 text-lg font-bold">
            @foreach ($attempt->responses as $response)
                <li>
                    <button :class="tab === 'subtest-{{ $response->question->section->title }}' ? 'pb-2 border-b-2 border-blue-300 text-primary-alt' : 'text-gray-700 pb-2'" @click="tab = 'subtest-{{ $response->question->section->title }}'">Subtes {{ $response->question->section->title }}</button>
                </li>
            @endforeach
        </ul>
        @foreach ($attempt->responses as $response)
            <div x-show="tab === 'subtest-{{ $response->question->section->title }}'" class="pt-2">
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

                    @php
                        // Ubah array options menjadi Laravel Collection
                        $options = collect($response->question->options["variants"]["male"]);
                        $categories = $response->question->scoring;
                    @endphp

                                    @foreach ($response->answer["ranked_ids"] as $item)
                                        <tr class="border-b">
                                            <td class="p-2 align-top" style="width: 50%">{{ $options->where("id", $item)->first()["text"] }}</td>
                                            <td class="p-2 text-center align-top" style="width: 25%">{{ Str::title($categories[$item]) }}</td>
                                            <td class="p-2 text-center align-top" style="width: 25%">{{ $item }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chartLabels = ['1', '2', '3', '4', '5', '6'];
            const chartDataValues = [12, 24, 8, 40, 16, 32];
            const chartColors = ['rgba(117, 186, 219, 0.6)', 'rgba(255, 224, 102, 0.6)', 'rgba(166, 133, 226, 0.6)', 'rgba(84, 159, 240, 0.6)', 'rgba(239, 68, 68, 0.6)', 'rgba(76, 175, 80, 0.6)'];

            const ctx = document.getElementById('horizontalBarChart').getContext('2d');
            const chartData = {
                labels: chartLabels,
                datasets: [
                    {
                        label: 'Total Poin',
                        data: chartDataValues,
                        backgroundColor: chartColors,
                        borderRadius: 0,
                        barThickness: 30,
                    },
                ],
            };

            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 40,
                            grid: { color: '#eee' },
                            ticks: {
                                stepSize: 8,
                                callback: function (value) {
                                    return [0, 8, 16, 24, 32, 40].includes(value) ? value : '';
                                },
                            },
                            position: 'top',
                        },
                        y: {
                            grid: { color: '#eee' },
                        },
                    },
                    plugins: {
                        legend: { display: false },
                    },
                    animation: false,
                },
                plugins: [
                    {
                        afterDatasetsDraw: function (chart) {
                            const ctx = chart.ctx;
                            chart.data.datasets.forEach(function (dataset, i) {
                                const meta = chart.getDatasetMeta(i);
                                meta.data.forEach(function (bar, index) {
                                    const value = dataset.data[index];
                                    ctx.save();
                                    ctx.font = 'bold 14px sans-serif';
                                    if (value >= 40) {
                                        ctx.fillStyle = '#fff';
                                        ctx.textAlign = 'right';
                                        ctx.textBaseline = 'middle';
                                        ctx.fillText(value, bar.x - 10, bar.y);
                                    } else {
                                        ctx.fillStyle = '#444';
                                        ctx.textAlign = 'left';
                                        ctx.textBaseline = 'middle';
                                        ctx.fillText(value, bar.x + 10, bar.y);
                                    }
                                    if (value > 0) {
                                        const solidColor = chartColors[index % chartColors.length].replace('0.6', '1');
                                        const barHeight = bar.height || (bar.base - bar.y) * 2;
                                        ctx.fillStyle = solidColor;
                                        ctx.fillRect(bar.x - 6, bar.y - barHeight / 2, 12, barHeight);
                                    }
                                    ctx.restore();
                                });
                            });
                        },
                    },
                ],
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const tabsContainer = document.getElementById('subtestTabs');
            let isDown = false;
            let startX;
            let scrollLeft;

            tabsContainer.addEventListener('wheel', (e) => {
                if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
                    e.preventDefault();
                    tabsContainer.scrollLeft += e.deltaY;
                }
            });

            tabsContainer.addEventListener('mousedown', (e) => {
                isDown = true;
                tabsContainer.style.cursor = 'grabbing';
                startX = e.pageX - tabsContainer.offsetLeft;
                scrollLeft = tabsContainer.scrollLeft;
            });

            tabsContainer.addEventListener('mouseleave', () => {
                isDown = false;
                tabsContainer.style.cursor = 'grab';
            });

            tabsContainer.addEventListener('mouseup', () => {
                isDown = false;
                tabsContainer.style.cursor = 'grab';
            });

            tabsContainer.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - tabsContainer.offsetLeft;
                const walk = (x - startX) * 2;
                tabsContainer.scrollLeft = scrollLeft - walk;
            });
        });

        function changeTab(tabName) {
            document.querySelectorAll('[id^="content-subtest-"]').forEach((content) => {
                content.style.display = 'none';
            });

            document.querySelectorAll('[id^="tab-subtest-"]').forEach((tab) => {
                tab.classList.remove('border-[#75BADB]', 'text-[#75BADB]');
                tab.classList.add('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            });

            document.getElementById(`content-${tabName}`).style.display = 'block';

            document.getElementById(`tab-${tabName}`).classList.remove('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            document.getElementById(`tab-${tabName}`).classList.add('border-[#75BADB]', 'text-[#75BADB]');
        }
    </script>
@endsection
