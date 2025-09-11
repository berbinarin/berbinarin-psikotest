@extends(
    "dashboard.layouts.app",
    [
        "title" => "Check Point",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-5">
                <div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route("dashboard.check-point.jawaban.index") }}">
                            <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                        </a>
                        <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Detail Data Jawaban Checkpoint</p>
                    </div>
                    <p class="text-disabled py-2 text-gray-500">Halaman dashboard ini menampilkan detail jawaban yang telah dikumpulkan dari pengguna.</p>
                </div>
            </div>
            <div class="w-full flex flex-row gap-4 justify-between">
                <!-- Charts Section -->
                <div class="w-3/5 grid grid-cols-1 gap-6">
                    <div class="flex h-[330px] flex-col rounded-[24px] bg-white px-6 py-4 shadow">
                        <div class="mb-4">
                            <!-- Ini untuk username-nya -->
                        <h1 class="text-cyan-500 text-2xl font-semibold mb-7">Morgan Vero</h1>
                        <p>Kategori yang paling tinggi nilainya adalah <span class="font-semibold">Benar {{-- ini untuk nama kategori tertingginya --}}</span> dengan skor <span class="font-semibold">40 poin {{-- ini untuk skornya --}}</span>. Sehingga di dapatkan kesimpulan hasil adalah <span class="font-semibold">Fokus{{-- ini untuk hasilnya --}}</span>.</p>
                        </div>
                        <div class="flex w-full flex-col items-center h-full">
                            <canvas id="marketingChart" class="mb-1" style="max-height: 180px;"></canvas>
                            <div class="mb-4 flex gap-4 text-xs">
                                @php
                                    $chartLabels = ['Benar', 'Salah'];
                                    $chartColors = ['#106681', '#E9B306'];
                                @endphp
                                @foreach($chartLabels as $i => $label)
                                    <div class="flex items-center gap-1">
                                        <span class="inline-block h-3 w-3 rounded" style="background: {{ $chartColors[$i] }}"></span>
                                        {{ $label }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-2/5 rounded-[24px] bg-white shadow px-6 py-4">
                    <div class="overflow-x-auto">
                        <h1 class="text font-bold mb-7">Detail Jawaban</h1>
                        <table class="w-full display gap-3 overflow-x-scroll" style="overflow-x: scroll">
                            <thead class="w-full border-b border-gray-300 overflow-x-scroll">
                                <tr>
                                    <th class="text-center text-gray-400">No</th>
                                    <th class="text-center text-gray-400">Pertanyaan</th>
                                    <th class="text-center text-gray-400">Jawaban</th>
                                    <th class="text-center text-gray-400">Jawaban Benar</th>
                                </tr>
                            </thead>
                            <tbody class="text-center px-2">
                                {{-- Ini buat detailnya --}}
                                <tr class="border-b border-gray-300" style="padding-top : 10px">
                                    <td>1</td>
                                    <td>Lorem ipsum dolor sit amet consectetur.</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

{{--
@section('script')
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const chartDataValues = [{{ $Benar }}, {{ $Salah }}];
                            const chartColors = ['rgba(16, 102, 129, 0.6)', 'rgba(233, 179, 6, 0.6)'];
                            const solidColors = ['#106681', '#E9B306'];
                            const chartLabels = ['Benar', 'Salah'];

                            const ctx = document.getElementById('marketingChart').getContext('2d');
                            const chartData = {
                                labels: chartLabels,
                                datasets: [
                                    {
                                        label: 'Jumlah',
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
                                            grid: { color: '#eee' },
                                            position: 'top',
                                            ticks: {
                                                stepSize: 50,
                                                callback: function(value) {
                                                    return value % 50 === 0 ? value : '';
                                                }
                                            },
                                            min: 0,
                                            max: 250, // Fixed maximum scale at 250
                                            suggestedMax: 250 // Ensure the scale always goes up to 250
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
                                                    if (value >= Math.max(...chartDataValues) * 0.8) {
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
                                                        const solidColor = solidColors[index % solidColors.length];
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
                    </script>
                @endsection
--}}
