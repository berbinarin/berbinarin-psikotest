@extends(
    "dashboard.layouts.app",
    [
        "title" => "Detail Alat Tes",
    ]
)

@section("content")
    <section class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-5">
            <div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('dashboard.tools.index') }}">
                        <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                    </a>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Detail Data Tes</p>
                </div>
                <p class="text-disabled py-2">Fitur ini menampilkan detail data tes psikologi</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 rounded-[24px] bg-white px-10 py-7">
            <form class="flex flex-col gap-10">
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Nama Alat Tes</label>
                        <input type="text" class="rounded-md border-0 px-6 py-3 text-sm font-semibold bg-gray-100 drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" value="{{ $tool->name }}" readonly />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Nomor Alat Tes</label>
                        <input type="text" class="rounded-md border-0 px-6 py-3 text-sm font-semibold bg-gray-100 drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" value="{{ $tool->no_alat_test }}" readonly />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Token</label>
                        <input type="text" class="rounded-md border-0 px-6 py-3 text-sm font-semibold bg-gray-100 drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" value="{{ $tool->token }}" readonly />
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script')

@endsection
