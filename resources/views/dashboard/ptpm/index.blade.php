@extends(
    "dashboard.layouts.app",
    [
        "title" => "Dashboard",
    ]
)

@section("content")
    <section class="max-h-[95vh] w-full p-5">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard Pendaftaran Psikotest</h1>
            <p class="mt-2 text-gray-500">Dashboard ini memberikan informasi mengenai jumlah pengguna yang telah mendaftar psikotest.</p>
        </div>

        <!-- Card Section -->
        <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Card Individu -->
            <div class="flex h-[150px] flex-col rounded-xl bg-white p-4 shadow">
                <span class="flex-1 text-left text-[28px] font-semibold text-gray-800">Individu</span>
                <div class="mt-auto flex items-center justify-center gap-4">
                    <span class="text-[44px] font-bold text-gray-900">29</span>
                    <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                        <img src="{{ asset('assets/dashboard/images/arrow-down.svg') }}" alt="arrow down" class="w-12 h-12">
                    </div>
                </div>
            </div>

            <!-- Card Instansi -->
            <div class="flex h-[150px] flex-col rounded-xl bg-white p-4 shadow">
                <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Instansi</span>
                <div class="mt-auto flex items-center justify-center gap-4">
                    <span class="text-[44px] font-bold text-gray-900">15</span>
                    <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                        <img src="{{ asset('assets/dashboard/images/arrow-down.svg') }}" alt="arrow down" class="w-12 h-12">
                    </div>
                </div>
            </div>

            <!-- Card Perusahaan -->
            <div class="flex h-[150px] flex-col rounded-xl bg-white p-4 shadow">
                <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Perusahaan</span>
                <div class="mt-auto flex items-center justify-center gap-4">
                    <span class="text-[44px] font-bold text-gray-900">22</span>
                    <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                        <img src="{{ asset('assets/dashboard/images/arrow-down.svg') }}" alt="arrow down" class="w-12 h-12">
                    </div>
                </div>
            </div>

            <!-- Card Komunitas -->
            <div class="flex h-[150px] flex-col rounded-xl bg-white p-4 shadow">
                <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Komunitas</span>
                <div class="mt-auto flex items-center justify-center gap-4">
                    <span class="text-[44px] font-bold text-gray-900">8</span>
                    <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                        <img src="{{ asset('assets/dashboard/images/arrow-down.svg') }}" alt="arrow down" class="w-12 h-12">
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section-->
        <div class="grid grid-cols-1 gap-6 ">
            <!-- Summary Chart -->
            <div class="flex h-[380px] flex-col rounded-xl bg-white p-6 shadow">
                <div class="mb-4">
                    <span class="font-semibold text-gray-800">Summary</span>
                </div>
                <div class="relative flex justify-between items-end h-full mb-4 pl-10">
                    <!-- Keterangan-->
                    <div class="absolute top-0 bottom-0 left-0 flex flex-col justify-between py-2">
                        <span class="absolute left-0 text-sm text-gray-500 top-0">50</span>
                        <span class="absolute left-0 text-sm text-gray-500 top-[45px]">40</span>
                        <span class="absolute left-0 text-sm text-gray-500 top-[95px]">30</span>
                        <span class="absolute left-0 text-sm text-gray-500 top-[145px]">20</span>
                        <span class="absolute left-0 text-sm text-gray-500 top-[195px]">10</span>
                    </div>

                    <!-- Batang Grafik -->
                    <!-- data dummy -->
                    @php
                        $chartData = [
                            ['label' => "Individu", 'value' => 10],
                            ['label' => "Instansi", 'value' => 20],
                            ['label' => "Perusahaan", 'value' => 40],
                            ['label' => "Komunitas", 'value' => 50]
                        ];
                        $maxValue = 50;
                    @endphp

                    @foreach($chartData as $data)
                        @php
                            $barHeightPercentage = ($data['value'] / $maxValue) * 100;
                        @endphp
                        <div class="flex-1 flex flex-col items-center mx-2 h-full">
                            <div class="w-[13px] h-full bg-gray-100 rounded-lg relative">
                                <div 
                                    class="w-full bg-[#3986A3] rounded-lg absolute bottom-0 transition-all duration-500 ease-out" 
                                    style="height: {{ $barHeightPercentage }}%"
                                ></div>
                            </div>
                            <span class="mt-2 text-sm text-gray-700">{{ $data['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const donutCtx = document.getElementById('donutChart').getContext('2d');
            const donutChart = new Chart(donutCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Individu', 'Instansi', 'Perusahaan', 'Komunitas'],
                    datasets: [
                        {
                            data: [29, 15, 22, 8],
                            backgroundColor: ['#2196bc', '#7fb1c3', '#5a8b9d', '#ffffff'],
                            borderColor: '#2e5e6c',
                            borderWidth: 0,
                            hoverOffset: 0,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '55%',
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false },
                    },
                    animation: {
                        animateScale: false,
                        animateRotate: true,
                    },
                    onHover: (event, chartElement) => {
                        event.native.target.style.cursor = 'default';
                    },
                },
            });
        });
    </script>
@endsection