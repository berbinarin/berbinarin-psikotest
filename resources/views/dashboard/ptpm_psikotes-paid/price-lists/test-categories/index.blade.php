@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-12">
                <div>
                    <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Data Kategori Psikotes</p>
                    <p class="text-disabled py-2">Fitur ini menampilkan informasi data pengguna yang telah melakukan registrasi Psikotes Berbinar</p>
                    <a href="{{ route("dashboard.test-categories.create") }}" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="rounded-[24px] bg-white px-10 py-7">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama Kategori Tes</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testCategories as $category)
                                <tr id="" class="data-consume">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{ route("dashboard.test-categories.show", $category->id) }}" class="mt-4 inline-flex items-start justify-start rounded p-3 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0">
                                            <p class="font-semibold text-primary">Detail</p>
                                            <i class="bx bx-right-arrow-alt mt-1 text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card Section -->
        <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-2">
            @foreach($testCategories as $category)
                <a href="{{ route('dashboard.price-list.test-types.by-category', $category->id) }}" class="flex h-[145px] w-[523px] flex-row items-center rounded-xl bg-white p-6 shadow hover:bg-gray-100 transition">
                    <div class="flex h-[104px] w-[119px] items-center justify-center rounded-lg bg-gray-100">
                        <img src="{{ asset('assets/dashboard/images/arrow-down.svg') }}" alt="arrow down" class="w-16 h-16">
                    </div>
                    <div class="ml-6">
                        <span class="text-[28px] font-semibold text-gray-800">{{ $category->name }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
