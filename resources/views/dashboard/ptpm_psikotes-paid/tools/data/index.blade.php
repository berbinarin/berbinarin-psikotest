@extends(
    "dashboard.layouts.psikotes-tool",
    [
        "title" => "Dashboard " . $tool->name,
    ]
)

@section("content")
    <section class="max-h-[95vh] w-full p-5">
        <div class="flex h-full flex-col">
            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard Alat Tes {{ $tool->name }}</h1>
                <p class="mt-2 text-gray-500">Dashboard ini memberikan informasi mengenai jumlah pengguna yang telah menyelesaikan proses pengumpulan.</p>
            </div>

            <!-- Card Section -->
            <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-3 lg:grid-cols-4">
                <div class="flex h-[150px]   flex-col rounded-xl bg-white p-4 shadow">
                    <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Responden</span>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-[44px] font-bold text-gray-900">{{ $users->count() }}</span>
                        <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                            <img src="{{ asset("assets/dashboard/images/arrow-down.svg") }}" alt="arrow down" class="w-12 h-12" />
                        </div>
                    </div>
                </div>
                <div class="flex h-[150px]   flex-col rounded-xl bg-white p-4 shadow">
                    <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Soal</span>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-[44px] font-bold text-gray-900">{{ $questions->count() }}</span>
                        <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                            <img src="{{ asset("assets/dashboard/images/arrow-down.svg") }}" alt="arrow down" class="w-12 h-12" />
                        </div>
                    </div>
                </div>
                <div class="flex h-[150px]   flex-col rounded-xl bg-white p-4 sha   dow">
                    <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Section</span>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-[44px] font-bold text-gray-900">{{ $sections->count() }}</span>
                        <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                            <img src="{{ asset("assets/dashboard/images/arrow-down.svg") }}" alt="arrow down" class="w-12 h-12" />
                        </div>
                    </div>
                </div>
                <div class="flex h-[150px]   flex-col rounded-xl bg-white p-4 shadow">
                    <span class="mb-0 flex-1 text-left text-[28px] font-semibold text-gray-800">Rata-rata Durasi</span>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-[44px] font-bold text-gray-900">29</span>
                        <div class="flex h-[80px] w-[80px] items-center justify-center rounded-2xl bg-gray-100">
                            <img src="{{ asset("assets/dashboard/images/arrow-down.svg") }}" alt="arrow down" class="w-12 h-12" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section-->
            <div class="grid grid-cols-1 gap-6">
                <!-- Summary Chart -->
                <div class="flex h-[380px] flex-col rounded-xl bg-white p-6 shadow">
                    <div class="mb-4">
                        <span class="font-semibold text-gray-800">Summary</span>
                    </div>
                    <div class="relative mb-4 flex h-full items-end justify-between pl-10">
                        <!-- Keterangan-->
                        <div class="absolute bottom-0 left-0 top-0 flex flex-col justify-between py-2">
                            <span class="absolute left-0 top-0 text-sm text-gray-500">50</span>
                            <span class="absolute left-0 top-[45px] text-sm text-gray-500">40</span>
                            <span class="absolute left-0 top-[95px] text-sm text-gray-500">30</span>
                            <span class="absolute left-0 top-[145px] text-sm text-gray-500">20</span>
                            <span class="absolute left-0 top-[195px] text-sm text-gray-500">10</span>
                        </div>

                        <!-- Batang Grafik -->
                        <!-- data dummy -->
                        @php
                            $chartData = [
                                ["label" => "Instansi", "value" => 20],
                                ["label" => "Perusahaan", "value" => 40],
                                ["label" => "Komunitas", "value" => 50],
                            ];
                            $maxValue = 50;
                        @endphp

                        @foreach ($chartData as $data)
                            @php
                                $barHeightPercentage = ($data["value"] / $maxValue) * 100;
                            @endphp

                            <div class="mx-2 flex h-full flex-1 flex-col items-center">
                                <div class="relative h-full w-[13px] rounded-lg bg-gray-100">
                                    <div class="absolute bottom-0 w-full rounded-lg bg-[#3986A3] transition-all duration-500 ease-out" style="height: {{ $barHeightPercentage }}%"></div>
                                </div>
                                <span class="mt-2 text-sm text-gray-700">{{ $data["label"] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
