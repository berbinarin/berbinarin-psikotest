@extends(
    "dashboard.layouts.app",
    [
        "title" => "Detail Testimoni",
    ]
)

@section("content")
    <section class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-5">
            <div class="flex items-center gap-2">
                <a href="{{ route("dashboard.testimonial.index") }}">
                    <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                </a>
                <p class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Detail Testimoni</p>
            </div>
            <p class="text-disabled py-2">Fitur ini menampilkan data testimoni pengguna yang telah melakukan Psikotes.</p>
        </div>

        <div class="mb-7 flex flex-col gap-5 rounded-[16px] bg-white px-8 py-8 shadow-md">
            @foreach ($user->testimonials as $testimoni)
                <div>
                    <p class="mb-2 font-semibold text-gray-700">{{ $testimoni->question }}</p>
                    <div class="rounded-lg border border-gray-200 bg-[#FAFAFA] p-5">
                        <p class="text-gray-700">
                            {{ $testimoni->answer }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
