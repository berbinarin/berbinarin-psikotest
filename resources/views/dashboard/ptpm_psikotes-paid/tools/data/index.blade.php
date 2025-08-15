@extends(
    "dashboard.layouts.psikotes-tool",
    [
        "title" => "Dashboard " . $tool->name,
    ]
)

@section("content")
    <section class="h-full max-h-[95vh] w-full py-5">
        <div class="flex h-full flex-col">
            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard Alat Tes {{ $tool->name }}</h1>
                <p class="mt-2 text-gray-500">Dashboard ini memberikan informasi mengenai jumlah pengguna yang telah menyelesaikan proses pengumpulan.</p>
            </div>

            <!-- Card Section -->
            <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-3 lg:grid-cols-4">
                <div class="flex h-[150px] flex-col rounded-xl bg-white p-4 shadow">
                    <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Responden</span>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-[44px] font-bold text-gray-900">{{ $tool->attempts->count() }}</span>
                        <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                            <img src="{{ asset("assets/dashboard/images/arrow-down.svg") }}" alt="arrow down" class="h-12 w-12" />
                        </div>
                    </div>
                </div>
                <div class="flex h-[150px] flex-col rounded-xl bg-white p-4 shadow">
                    <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Soal</span>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-[44px] font-bold text-gray-900">{{ $tool->questions->count() }}</span>
                        <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                            <img src="{{ asset("assets/dashboard/images/arrow-down.svg") }}" alt="arrow down" class="h-12 w-12" />
                        </div>
                    </div>
                </div>
                <div class="flex h-[150px] flex-col rounded-xl bg-white p-4 shadow">
                    <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Bagian</span>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-[44px] font-bold text-gray-900">{{ $tool->sections->count() }}</span>
                        <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                            <img src="{{ asset("assets/dashboard/images/arrow-down.svg") }}" alt="arrow down" class="h-12 w-12" />
                        </div>
                    </div>
                </div>
                <div class="flex h-[150px] flex-col rounded-xl bg-white p-4 shadow">
                    <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Rata-rata Durasi</span>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-[44px] font-bold text-gray-900">{{ $averageDurationMinutes }}</span>
                        <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                            <img src="{{ asset("assets/dashboard/images/arrow-down.svg") }}" alt="arrow down" class="h-12 w-12" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="flex-1 flex flex-col bg-white rounded-lg p-5">
                {{-- 1. Header dengan Judul dan Dropdown Tahun --}}
                <div class="mb-2 flex justify-end">
                    {{-- Hanya tampilkan dropdown jika ada data --}}
                    @if (! empty($chartData))
                        <select id="yearSelector" class="rounded-lg border text-xs focus:outline-none focus:ring focus:ring-blue-300">
                            @foreach (array_keys($chartData) as $year)
                                <option value="{{ $year }}" {{ $loop->first ? "selected" : "" }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                {{-- 2. Elemen Canvas untuk Grafik --}}
                <div class="flex-1">
                    @if (! empty($chartData))
                        <canvas id="myChart"></canvas>
                    @else
                        <p class="mt-12 text-center text-gray-500">Tidak ada data yang dapat ditampilkan.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($chartData);
        const allCategories = @json($allCategories);

        // Pastikan ada data sebelum menjalankan script grafik
        if (Object.keys(chartData).length > 0) {
            const labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            // Palet warna untuk setiap kategori
            const colorPalette = ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'];

            // 4. Fungsi untuk membuat dataset berdasarkan tahun dan kategori yang ada
            function createDatasets(year) {
                const dataForYear = chartData[year] || {}; // Ambil data untuk tahun terpilih, atau objek kosong jika tidak ada

                return allCategories.map((category, index) => {
                    // Untuk setiap kategori, buat array data per bulan
                    const monthlyData = labels.map((month) => {
                        // Cari data: dataForYear -> bulan -> kategori. Jika tidak ada, nilainya 0.
                        return dataForYear[month]?.[category] ?? 0;
                    });

                    return {
                        label: category,
                        data: monthlyData,
                        // Ambil warna dari palet, ulangi jika kategori lebih banyak dari warna
                        backgroundColor: colorPalette[index % colorPalette.length],
                        borderWidth: 1,
                    };
                });
            }

            // 5. Inisialisasi Grafik
            const ctx = document.getElementById('myChart').getContext('2d');
            const yearSelector = document.getElementById('yearSelector');
            const initialYear = yearSelector.value; // Ambil tahun pertama yang terpilih di dropdown

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: createDatasets(initialYear), // Muat data untuk tahun awal
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: { display: true, text: 'Laporan Jumlah Peserta per Kategori', font: { size: 18 } },
                        tooltip: { mode: 'index', intersect: false },
                        legend: { position: 'top' },
                    },
                    scales: {
                        y: { beginAtZero: true, title: { display: true, text: 'Jumlah Peserta' } },
                        x: { title: { display: true, text: 'Bulan' } },
                    },
                },
            });

            // 6. Event Listener untuk Dropdown
            yearSelector.addEventListener('change', function () {
                const selectedYear = this.value;
                myChart.data.datasets = createDatasets(selectedYear);
                myChart.update(); // Render ulang grafik dengan data baru
            });
        }
    </script>
@endsection
