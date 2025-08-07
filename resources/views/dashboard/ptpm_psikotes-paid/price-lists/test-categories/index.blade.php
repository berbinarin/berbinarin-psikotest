@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@section("content")
    <section class="w-fullp-8 min-h-screen">
        <div class="py-4 md:pb-7 md:pt-12">
            <div>
                <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Price List</p>
                <p class="text-disabled py-2 text-gray-500">Terdapat {{ $testCategories->count() }} menu pada <span class="italic">Price List&nbsp;</span> yang dapat dipilih sesuai kebutuhan.</p>
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
