@extends(
    "dashboard.layouts.app",
    [
        "title" => "Detail Testimoni",
    ]
)

@section("content")
<section class="flex w-full flex-col">
    <div class="py-4 md:pb-7 md:pt-12">
        <div class="flex items-center gap-2 mb-2">
            <a href="{{ route('dashboard.testimonial.index') }}">
                <img src="{{ asset('assets/dashboard/images/back-btn.png') }}" alt="Back Button" />
            </a>
            <p class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">
                Detail Testimoni
            </p>
        </div>
        <p class="text-disabled py-2">
            Fitur ini menampilkan data testimoni user yang telah melakukan Psikotest.
        </p>
    </div>

    <div class="rounded-[16px] bg-white px-8 py-8 shadow-md flex flex-col gap-8 max-h-[70vh]">
        <div>
            <p class="mb-2 font-semibold text-gray-700">
                Ceritakan pengalaman SobatBinar dalam mengikuti kegiatan psikotes di Berbinar!
            </p>
            <div class="rounded-lg border border-gray-200 bg-[#FAFAFA] p-5">
                <p class="text-gray-700">
                    {{ $testimonial->sharing_experience ?? '-' }}
                </p>
            </div>
        </div>
        <div>
            <p class="mb-2 font-semibold text-gray-700">
                Bagaimana pendapat SobatBinar mengenai kegiatan psikotes yang telah terlaksana?
            </p>
            <div class="rounded-lg border border-gray-200 bg-[#FAFAFA] p-5">
                <p class="text-gray-700">
                    {{ $testimonial->opinion_psikotest ?? '-' }}
                </p>
            </div>
        </div>
        <div>
            <p class="mb-2 font-semibold text-gray-700">
                Apakah SobatBinar memiliki masukan atau saran mengenai kegiatan pelaksanaan psikotes di Berbinar?
            </p>
            <div class="rounded-lg border border-gray-200 bg-[#FAFAFA] p-5">
                <p class="text-gray-700">
                    {{ $testimonial->criticism_suggestion ?? '-' }}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
