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
            height: 8px;
            background: transparent;
        }
        .scroll-container::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 4px;
        }
    </style>
@endpush

<div class="mb-4 flex w-full gap-8 max-lg:flex-col">
    <div class="flex-1 rounded-xl bg-white p-8 shadow-lg">
        <div class="pb-5">
            <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name }}</h2>
            <p class="text-base text-gray-700">
                Ini adalah hasil dari tes IST yang diambil pada tanggal {{ $attempt->created_at->format('d F Y') }}. Berikut adalah ringkasan hasil tes yang telah dicapai:
            </p>
        </div>

        <div class="flex w-full flex-col items-center">
            <canvas id="horizontalBarChart" class="mb-1" style="max-height: 450px; max-width: 700px"></canvas>
        </div>
    </div>

    <div class="flex flex-col overflow-hidden rounded-lg bg-white p-8 shadow-lg" style="width: 100%; max-width: 40%">
        <h2 class="mb-4 text-xl font-semibold">Detail Jawaban per Subtes</h2>
        
        <!-- Tab Navigation with Scroll -->
        <div class="scroll-container mb-4 overflow-x-auto whitespace-nowrap pb-2" id="subtestTabs">
            <div class="inline-flex gap-2 border-b">
                @foreach($data as $index => $subtest)
                    <button 
                        class="{{ $index === 0 ? 'border-[#75BADB] text-[#75BADB]' : 'border-transparent text-gray-500 hover:text-[#75BADB]' }} rounded-none border-b-2 bg-none px-4 py-2 text-sm font-medium outline-none transition whitespace-nowrap" 
                        type="button" 
                        onclick="changeTab('subtest-{{ $index }}')" 
                        id="tab-subtest-{{ $index }}">
                        {{ $subtest['subtest'] }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Tab Content -->
        <div class="flex min-h-0 flex-1 flex-col">
            <div class="flex-1 overflow-y-auto">
                @foreach($data as $index => $subtest)
                    <div id="content-subtest-{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }}">
                        <table class="w-full table-fixed border-collapse text-sm">
                            <thead class="sticky top-0 bg-white z-10 shadow-sm">
                                <tr class="border-b-2 border-gray-200">
                                    <th class="p-3 text-center text-gray-600 font-semibold" style="width: 20%">Kunci</th>
                                    <th class="p-3 text-center text-gray-600 font-semibold" style="width: 20%">Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subtest['questions'] as $qIndex => $q)
                                    <tr class="border-b hover:bg-gray-50 transition">
                                        <td class="p-3 text-center align-top font-medium" style="width: 20%">
                                            <span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 rounded">
                                                @if(isset($q['poin_1']) || isset($q['poin_2']))
                                                    {{-- Untuk Subtes 4, tampilkan poin_1 dan poin_2 --}}
                                                    <div>
                                                        @if(isset($q['poin_1']))
                                                            <div>Poin 1: {{ is_array($q['poin_1']) ? implode(', ', $q['poin_1']) : $q['poin_1'] }}</div>
                                                        @endif
                                                        @if(isset($q['poin_2']))
                                                            <div>Poin 2: {{ is_array($q['poin_2']) ? implode(', ', $q['poin_2']) : $q['poin_2'] }}</div>
                                                        @endif
                                                    </div>
                                                @else
                                                    {{ $q['correct_answer'] ?? '-' }}
                                                @endif
                                            </span>
                                        </td>
                                        <td class="p-3 text-center align-top font-medium" style="width: 20%">
                                            @if(isset($q['correct_answer']))
                                                <span class="inline-block px-2 py-1 {{ $q['user_answer'] === $q['correct_answer'] ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded">
                                                    {{ $q['user_answer'] ?? '-' }}
                                                </span>
                                            @else
                                                <span class="inline-block px-2 py-1 bg-gray-100 text-gray-700 rounded">
                                                    {{ $q['user_answer'] ?? '-' }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Data dari database 
            const chartLabels = @json(array_column($data, 'subtest'));
            
            // Ambil jumlah benar 
            const chartDataValues = @json(array_column($data, 'benar_count'));
            
            const chartColors = [
                'rgba(117, 186, 219, 0.6)', 
                'rgba(255, 224, 102, 0.6)', 
                'rgba(166, 133, 226, 0.6)', 
                'rgba(84, 159, 240, 0.6)', 
                'rgba(239, 68, 68, 0.6)', 
                'rgba(76, 175, 80, 0.6)', 
                'rgba(255, 159, 64, 0.6)', 
                'rgba(153, 102, 255, 0.6)', 
                'rgba(255, 99, 132, 0.6)'
            ];

            const ctx = document.getElementById('horizontalBarChart').getContext('2d');
            const chartData = {
                labels: chartLabels,
                datasets: [
                    {
                        label: 'Jawaban Benar',
                        data: chartDataValues,
                        backgroundColor: chartColors,
                        borderRadius: 5,
                        barThickness: 25,
                    },
                ],
            };

            // Cari nilai maksimal untuk set skala chart
            const maxValue = Math.max(...chartDataValues);
            const maxScale = Math.ceil((maxValue + 5) / 10) * 10; // Round up ke kelipatan 10

            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: maxScale,
                            grid: { color: '#eee' },
                            ticks: {
                                stepSize: Math.ceil(maxScale / 5),
                            },
                            position: 'top',
                        },
                        y: {
                            grid: { display: false },
                        },
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                label: function(context) {
                                    return 'Benar: ' + context.parsed.x + ' soal';
                                }
                            }
                        }
                    },
                },
            });
        });

        // Tab Scroll Functionality
        document.addEventListener('DOMContentLoaded', function () {
            const tabsContainer = document.getElementById('subtestTabs');
            let isDown = false;
            let startX;
            let scrollLeft;

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
            // Hide all content
            document.querySelectorAll('[id^="content-subtest-"]').forEach((content) => {
                content.style.display = 'none';
            });

            // Reset all tabs
            document.querySelectorAll('[id^="tab-subtest-"]').forEach((tab) => {
                tab.classList.remove('border-[#75BADB]', 'text-[#75BADB]');
                tab.classList.add('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            });

            // Show selected content
            document.getElementById(`content-${tabName}`).style.display = 'block';

            // Highlight selected tab
            document.getElementById(`tab-${tabName}`).classList.remove('border-transparent', 'text-gray-500', 'hover:text-[#75BADB]');
            document.getElementById(`tab-${tabName}`).classList.add('border-[#75BADB]', 'text-[#75BADB]');
        }
    </script>
@endpush