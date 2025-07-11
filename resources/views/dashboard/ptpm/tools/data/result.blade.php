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
                        <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Detail Data Jawaban Alat Test {{ $tool->name }}</p>
                        <p class="text-disabled w-2/4">Halaman dashboard ini menampilkan jawaban yang telah dikumpulkan dari pengguna.</p>
                        <a href="/dashboard/tools/{{ $tool->id }}/data">
                            <buttpon type="button" class="mt-4 inline-flex items-start justify-start rounded bg-blue-500 p-3 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-8">
                                <p class="font-medium leading-none text-white">Kembali</p>
                            </buttpon>
                        </a>
                    </div>
                </div>

                <div class="mt-1 flex w-full gap-5">
                    @if (View::exists("dashboard.ptpm.tools.data.tools." . \Illuminate\Support\Str::slug($tool->name)))
                        @include("dashboard.ptpm.tools.data.tools." . \Illuminate\Support\Str::slug($tool->name))
                    @else
                        <p>Dashboard untuk alat psikotes {{ $tool->name }} belum ada</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
