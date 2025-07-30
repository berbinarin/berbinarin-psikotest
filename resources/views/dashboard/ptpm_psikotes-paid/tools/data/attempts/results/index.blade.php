@extends(
    "dashboard.layouts.psikotes-tool",
    [
        "title" => "Detail Jawaban " . $tool->name,
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="w-full">
                <div class="py-4 md:pb-7 md:pt-12">
                    <div>
                        <div class="mb-2 flex items-center gap-2">
                            <a href="{{ url()->previous() }}">
                                <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                            </a>
                            <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Detail Jawaban Alat Test {{$tool->name}}</p>
                        </div>
                        <p class="text-disabled py-2">Halaman dashboard ini menampilkan detail jawaban yang telah dikumpulkan dari pengguna.</p>
                    </div>
                </div>

                <div class="mt-1 flex w-full gap-5">
                    @if (View::exists("dashboard.ptpm_psikotes-paid.tools.data.attempts.results." . \Illuminate\Support\Str::slug($tool->name)))
                        @include("dashboard.ptpm_psikotes-paid.tools.data.attempts.results." . \Illuminate\Support\Str::slug($tool->name))
                    @else
                        <p>Dashboard untuk alat psikotes {{ $tool->name }} belum ada</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
