@push("style")
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
@endpush

<div class="mb-1 flex w-full gap-8">
    <div class="max-h-[580px] w-3/5 rounded-xl bg-white p-8 shadow-lg">
        <div class="mb-4 pb-1">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name ?? "User Tidak Diketahui" }}</h2>
            <p class="mt-2 text-base text-gray-700">Berikut merupakan visualisasi diagram jawaban alat tes CFIT.</p>
        </div>

        <!-- Bar Chart -->
        <div class="flex w-full flex-col items-center">
            <canvas id="verticalBarChart" class="mb-1" style="max-height: 400px; height: 400px; max-width: 500px"></canvas>
            <div class="scroll-container mb-4 ms-6 flex gap-14 text-xs">
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-2 rounded" style="background: #7aa3b3"></span>
                    Subtes 1
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-2 rounded" style="background: #f2d16a"></span>
                    Subtes 2
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-2 rounded" style="background: #7b7fdf"></span>
                    Subtes 3
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-block h-3 w-2 rounded" style="background: #e69ce7"></span>
                    Subtes 4
                </div>
            </div>
        </div>
    </div>

    <!-- detail jawaban -->
    <div class="flex w-2/5 flex-col gap-5">
        <div class="flex h-[360px] w-full flex-col rounded-xl bg-white p-6 shadow-lg">
            <h2 class="mb-3 text-xl font-semibold">Detail Jawaban</h2>
            <div class="scroll-container mb-1 overflow-x-hidden whitespace-nowrap pb-1" id="subtestTabs">
                <div class="inline-flex gap-2 border-b">
                    <button class="rounded-none border-b-2 border-[#75BADB] bg-none px-3 pb-2 text-base font-medium text-[#75BADB] outline-none transition" type="button" onclick="changeTab('subtest-1')" id="tab-subtest-1">Subtes 1</button>
                    <button class="rounded-none border-b-2 border-transparent bg-none px-3 pb-2 text-base font-medium text-gray-500 outline-none transition hover:text-[#75BADB]" type="button" onclick="changeTab('subtest-2')" id="tab-subtest-2">Subtes 2</button>
                    <button class="rounded-none border-b-2 border-transparent bg-none px-3 pb-2 text-base font-medium text-gray-500 outline-none transition hover:text-[#75BADB]" type="button" onclick="changeTab('subtest-3')" id="tab-subtest-3">Subtes 3</button>
                    <button class="rounded-none border-b-2 border-transparent bg-none px-3 pb-2 text-base font-medium text-gray-500 outline-none transition hover:text-[#75BADB]" type="button" onclick="changeTab('subtest-4')" id="tab-subtest-4">Subtes 4</button>
                </div>
            </div>

            <div class="flex min-h-0 flex-1 flex-col">
                <div class="min-h-0 flex-1 overflow-y-auto">
                    <div id="content-subtest-1" style="display: block">
                        <table class="w-full table-fixed border-collapse text-sm">
                            <thead class="sticky top-0 bg-white">
                                <tr>
                                    <th class="p-2 text-center text-gray-500" style="width: 10%">No</th>
                                    <th class="p-2 text-center text-gray-500" style="width: 90%">Choice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dummyNumbers = range(1, 15);
                                @endphp

                                @forelse ($dummyNumbers as $i)
                                    <tr class="border-b">
                                        <td class="p-2 text-center">{{ $i }}</td>
                                        <td class="p-2 text-center">A</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="py-8 text-center text-gray-400">
                                            <i class="fas fa-info-circle mb-2 text-2xl"></i>
                                            <p>Jawaban Subtes 1 tidak tersedia.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div id="content-subtest-2" style="display: none">
                        <table class="w-full table-fixed border-collapse text-sm">
                            <thead class="sticky top-0 bg-white">
                                <tr>
                                    <th class="p-2 text-center text-gray-500" style="width: 10%">No</th>
                                    <th class="p-2 text-center text-gray-500" style="width: 90%">Choice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dummyNumbers = range(1, 15);
                                @endphp

                                @forelse ($dummyNumbers as $i)
                                    <tr class="border-b">
                                        <td class="p-2 text-center">{{ $i }}</td>
                                        <td class="p-2 text-center">B</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="py-8 text-center text-gray-400">
                                            <i class="fas fa-info-circle mb-2 text-2xl"></i>
                                            <p>Jawaban Subtes 2 tidak tersedia.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div id="content-subtest-3" style="display: none">
                        <table class="w-full table-fixed border-collapse text-sm">
                            <thead class="sticky top-0 bg-white">
                                <tr>
                                    <th class="p-2 text-center text-gray-500" style="width: 10%">No</th>
                                    <th class="p-2 text-center text-gray-500" style="width: 90%">Choice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dummyNumbers = range(1, 15);
                                @endphp

                                @forelse ($dummyNumbers as $i)
                                    <tr class="border-b">
                                        <td class="p-2 text-center">{{ $i }}</td>
                                        <td class="p-2 text-center">C</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="py-8 text-center text-gray-400">
                                            <i class="fas fa-info-circle mb-2 text-2xl"></i>
                                            <p>Jawaban Subtes 3 tidak tersedia.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div id="content-subtest-4" style="display: none">
                        <table class="w-full table-fixed border-collapse text-sm">
                            <thead class="sticky top-0 bg-white">
                                <tr>
                                    <th class="p-2 text-center text-gray-500" style="width: 10%">No</th>
                                    <th class="p-2 text-center text-gray-500" style="width: 90%">Choice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dummyNumbers = range(1, 15);
                                @endphp

                                @forelse ($dummyNumbers as $i)
                                    <tr class="border-b">
                                        <td class="p-2 text-center">{{ $i }}</td>
                                        <td class="p-2 text-center">D</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="py-8 text-center text-gray-400">
                                            <i class="fas fa-info-circle mb-2 text-2xl"></i>
                                            <p>Jawaban Subtes 4 tidak tersedia.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex h-[200px] w-full flex-col justify-center rounded-xl bg-[#236A7B] p-6 text-[13px] text-white shadow-md">
            <div>
                <p class="select-text text-[12px]">IQ</p>
                <h1 class="mb-2 select-text text-[16px] font-bold">70</h1>
                <p class="select-text text-[12px]">Kategori</p>
                <p class="mb-2 select-text text-[16px] font-bold">Rendah</p>
                <p class="select-text text-[12px]">Klasifikasi</p>
                <h1 class="mb-1 select-text text-[16px] font-bold">Mentally - Defective Profound Mental Retardation</h1>
            </div>
        </div>
    </div>
</div>

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chartLabels = ['Subtes 1', 'Subtes 2', 'Subtes 3', 'Subtes 4'];
            const totalValues = [17, 7, 18, 13];
            const correctValues = [7, 3, 8, 6];
            const chartColors = ['rgba(122, 163, 179,1)', 'rgba(242, 209, 106, 1)', 'rgba(123, 127, 223, 1)', 'rgba(226, 156, 231, 1)'];

            const ctx = document.getElementById('verticalBarChart').getContext('2d');
            const chartData = {
                labels: chartLabels,
                datasets: [
                    {
                        label: 'Jawaban Benar',
                        data: correctValues,
                        backgroundColor: chartColors,
                        barThickness: 30,
                        grouped: true,
                    },
                    {
                        label: 'Jumlah Soal',
                        data: totalValues,
                        backgroundColor: 'rgba(255, 96, 96, 1)',
                        barThickness: 30,
                        grouped: false,
                    },
                ],
            };

            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        x: {
                            grid: {
                                color: '#eee',
                            },
                            ticks: {
                                display: false,
                            },
                        },
                        y: {
                            beginAtZero: true,
                            max: 25,
                            grid: {
                                color: '#eee',
                            },
                            ticks: {
                                stepSize: 5,
                                callback: function (value) {
                                    return [0, 5, 10, 15, 20, 25].includes(value) ? value : '';
                                },
                            },
                        },
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            enabled: true,
                        },
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
                                    ctx.fillStyle = '#333';
                                    ctx.textAlign = 'center';
                                    ctx.textBaseline = 'bottom';
                                    ctx.fillText(value, bar.x, bar.y - 5);
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
            document.querySelectorAll('[id^="content-"]').forEach((content) => {
                content.style.display = 'none';
            });

            document.querySelectorAll('[id^="tab-"]').forEach((tab) => {
                tab.classList.remove('border-[#75BADB]', 'text-[#75BADB]');
                tab.classList.add('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            });

            document.getElementById(`content-${tabName}`).style.display = 'block';

            document.getElementById(`tab-${tabName}`).classList.remove('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            document.getElementById(`tab-${tabName}`).classList.add('border-[#75BADB]', 'text-[#75BADB]');
        }
    </script>
@endpush
