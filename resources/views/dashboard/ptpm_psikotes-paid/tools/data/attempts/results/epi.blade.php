@push("style")
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

<div class="mb-1 flex w-full gap-8">
    <!-- chart section -->
    <div x-data="{ graph: 'extraversion' }" class="max-h-[500px] flex-1 rounded-xl bg-white p-8 shadow-lg">
        <div class="mb-4">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">Nama Pengguna</h2>
        </div>

        <!-- legend -->
        <div x-show="graph === 'extraversion'" x-cloak>
            <div class="overflow-y-auto">
                <div class="flex w-full flex-col items-center">
                    <canvas id="horizontalBarChart-extraversion" class="mb-1" style="max-height: 220px; max-width: 700px"></canvas>
                    <div class="mb-4 flex gap-4 text-xs">
                        <div class="flex items-center gap-1">
                            <span class="inline-block h-3 w-3 rounded bg-[#75BADB]"></span>
                            Extraversion
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="inline-block h-3 w-3 rounded bg-[#FFE066]"></span>
                            Neuroticism
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="inline-block h-3 w-3 rounded bg-[#A685E2]"></span>
                            Lie
                        </div>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-full">
                        <p class="mb-2 text-base text-gray-700">
                            Total Poin pada Extraversion:
                            <b>32 poin</b>
                        </p>
                        <p class="mb-2 text-base text-gray-700">
                            Rata-rata Poin pada Extraversion:
                            <b>3.2</b>
                        </p>
                        <p class="mb-2 text-base text-gray-700">
                            Persentase Skor:
                            <b>64%</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Jawaban -->
    <div class="flex max-h-[500px] flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 40%">
        <h2 class="mb-4 text-xl font-semibold">Detail Jawaban</h2>
        <div class="scroll-container mb-4 overflow-x-hidden whitespace-nowrap pb-2" id="subtestTabs">
            <div class="inline-flex gap-2 border-b">
                <button class="rounded-none border-b-2 border-[#75BADB] bg-none px-3 pb-2 text-base font-medium text-[#75BADB] outline-none transition" type="button" onclick="changeTab('content-subtest-Minat_Karir')" id="tab-subtest-Minat_Karir">Subtes A</button>
                <button class="rounded-none border-b-2 border-transparent bg-none px-3 pb-2 text-base font-medium text-gray-500 outline-none transition hover:text-[#75BADB]" type="button" onclick="changeTab('content-subtest-Gaya_Kerja')" id="">Subtes B</button>
                <button class="rounded-none border-b-2 border-transparent bg-none px-3 pb-2 text-base font-medium text-gray-500 outline-none transition hover:text-[#75BADB]" type="button" onclick="changeTab('content-subtest-Gaya_Kerja')" id="">Subtes C</button>
                <button class="rounded-none border-b-2 border-transparent bg-none px-3 pb-2 text-base font-medium text-gray-500 outline-none transition hover:text-[#75BADB]" type="button" onclick="" id="">Subtes D</button>
            </div>
        </div>

        <div class="flex min-h-0 flex-1 flex-col">
            <div class="flex-1 overflow-y-auto">
                <div id="content-subtest-Minat_Karir" style="display: block">
                    <table class="w-full table-fixed border-collapse text-sm">
                        <thead class="sticky top-0 bg-white">
                            <tr class="border-b">
                                <th class="p-2 text-center text-gray-500" style="width: 50%">Pernyataan</th>
                                <th class="p-2 text-center text-gray-500" style="width: 25%">Kategori</th>
                                <th class="p-2 text-center text-gray-500" style="width: 25%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="p-2 align-top" style="width: 50%">Saya senang bekerja di lapangan dan melakukan kegiatan fisik.</td>
                                <td class="p-2 text-center align-top" style="width: 25%">Realistik</td>
                                <td class="p-2 text-center align-top" style="width: 25%">5</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-2 align-top" style="width: 50%">Saya tertarik untuk menemukan dan memecahkan masalah kompleks.</td>
                                <td class="p-2 text-center align-top" style="width: 25%">Investigatif</td>
                                <td class="p-2 text-center align-top" style="width: 25%">4</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-2 align-top" style="width: 50%">Saya lebih memilih ekspresi diri melalui seni dan desain.</td>
                                <td class="p-2 text-center align-top" style="width: 25%">Artistik</td>
                                <td class="p-2 text-center align-top" style="width: 25%">3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="content-subtest-Gaya_Kerja" style="display: none">
                    <table class="w-full table-fixed border-collapse text-sm">
                        <thead class="sticky top-0 bg-white">
                            <tr>
                                <th class="p-2 text-center text-gray-500" style="width: 50%">Pernyataan</th>
                                <th class="p-2 text-center text-gray-500" style="width: 25%">Kategori</th>
                                <th class="p-2 text-center text-gray-500" style="width: 25%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="p-2 align-top" style="width: 50%">Saya selalu berusaha untuk akurat dalam pekerjaan saya.</td>
                                <td class="p-2 text-center align-top" style="width: 25%">**Ketelitian**</td>
                                <td class="p-2 text-center align-top" style="width: 25%">**5**</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-2 align-top" style="width: 50%">Saya suka berinteraksi dan bekerja sama dengan orang lain.</td>
                                <td class="p-2 text-center align-top" style="width: 25%">**Orientasi_Sosial**</td>
                                <td class="p-2 text-center align-top" style="width: 25%">**4**</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const thickEdgePlugin = {
            afterDatasetsDraw: function (chart) {
                const ctx = chart.ctx;
                chart.data.datasets.forEach(function (dataset, i) {
                    const meta = chart.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        const value = dataset.data[index];
                        ctx.save();
                        ctx.font = 'bold 14px sans-serif';
                        if (value > 0) {
                            ctx.fillStyle = '#444';
                            ctx.textAlign = 'left';
                            ctx.textBaseline = 'middle';
                            ctx.fillText(value, bar.x + 10, bar.y);
                            ctx.fillStyle = dataset.backgroundColor[index].replace('0.6', '1');
                            const barHeight = bar.height || (bar.base - bar.y) * 2;
                            ctx.fillRect(bar.x - 6, bar.y - barHeight / 2, 12, barHeight);
                        }
                        ctx.restore();
                    });
                });
            },
        };

        // chart
        const ctxExtraversion = document.getElementById('horizontalBarChart-extraversion').getContext('2d');
        new Chart(ctxExtraversion, {
            type: 'bar',
            data: {
                labels: ['1', '2', '3'],
                datasets: [
                    {
                        label: 'Jumlah Jawaban',
                        data: [2, 1, 3, 4, 0],
                        backgroundColor: ['rgba(117, 186, 219, 0.6)', 'rgba(255, 224, 102, 0.6)', 'rgba(166, 133, 226, 0.6)', 'rgba(109, 211, 206, 0.6)', 'rgba(255, 107, 107, 0.6)'],
                        borderRadius: 0,
                    },
                ],
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 5,
                        grid: { color: '#eee' },
                        ticks: { stepSize: 1 },
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
            plugins: [thickEdgePlugin],
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
@endpush
