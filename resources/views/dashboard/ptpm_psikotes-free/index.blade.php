@extends(
    "dashboard.layouts.app",
    [
        "title" => "Dashboard",
    ]
)

@section("content")
    <section class="flex h-full max-h-[95vh] w-full flex-col py-5">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                <span class="italic">Dashboard&nbsp;</span>
                Pendaftaran Psikotes Gratis
            </h1>
            <p class="mt-2 text-gray-500">
                <span class="italic">Dashboard&nbsp;</span>
                ini memberikan informasi mengenai jumlah pengguna yang telah mendaftar psikotes.
            </p>
        </div>

        <!-- Card Section -->
        <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Card Individu -->
            <div class="flex h-[150px] flex-col justify-between rounded-xl bg-white p-4 shadow">
                <span class="text-left text-[20px] font-semibold text-gray-800">Data Pendaftar</span>
                <div class="mt-auto flex items-center justify-between">
                    <span class="text-[36px] font-bold text-gray-900">{{ $profiles->count() }}</span>
                    <div class="flex h-[64px] w-[64px] items-center justify-center rounded-xl bg-gray-100">
                        <i class="fi fi-br-ballot h-10 w-10 text-center text-4xl text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="flex flex-1 flex-col rounded-lg bg-white shadow p-5">
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
    </section>
@endsection

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($chartData);

        // Pastikan ada data sebelum menjalankan script grafik
        if (Object.keys(chartData).length > 0) {
            const labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            // Fungsi untuk membuat dataset berdasarkan tahun dan kategori yang ada
            function createDatasets(year) {
                const dataForYear = chartData[year] || {}; // Ambil data untuk tahun terpilih, atau objek kosong jika tidak ada

                const monthlyData = labels.map((month) => {
                    // Cari data: dataForYear -> bulan -> kategori. Jika tidak ada, nilainya 0.
                    return dataForYear[month] ?? 0;
                });

                return [
                    {
                        label: 'Jumlah Pendaftar',
                        data: monthlyData,
                        borderWidth: 1,
                    },
                ];
            }

            // Inisialisasi Grafik
            const ctx = document.getElementById('myChart').getContext('2d');
            const yearSelector = document.getElementById('yearSelector');
            const initialYear = yearSelector.value; // Ambil tahun pertama yang terpilih di dropdown

            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: createDatasets(initialYear), // Muat data untuk tahun awal
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: { display: true, text: 'Laporan Jumlah Pendaftar', font: { size: 18 } },
                        tooltip: { mode: 'index', intersect: false },
                        legend: { position: 'top' },
                    },
                    scales: {
                        y: { beginAtZero: true, title: { display: true, text: 'Jumlah Peserta' } },
                        x: { title: { display: true, text: 'Bulan' } },
                    },
                },
            });

            // Event Listener untuk Dropdown
            yearSelector.addEventListener('change', function () {
                const selectedYear = this.value;
                myChart.data.datasets = createDatasets(selectedYear);
                myChart.update(); // Render ulang grafik dengan data baru
            });
        }
    </script>
@endpush
