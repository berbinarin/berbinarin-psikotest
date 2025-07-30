@extends(
    "dashboard.layouts.app",
    [
        "title" => "Detail Pendaftar Psikotes",
    ]
)

@section("content")
    <section class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-12">
            <div>
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route("dashboard.registrants.index") }}">
                        <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                    </a>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Edit Pendaftar Psikotes</p>
                </div>
                <p class="text-disabled py-2">Fitur ini mengubah informasi data pengguna yang telah melakukan registrasi Psikotes Berbinar</p>
            </div>
        </div>
        <div class="flex flex-col gap-10 rounded-[24px] bg-white px-10 py-7">
            <form class="flex flex-col gap-10">
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Nama</label>
                        <input type="text" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->name }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Jenis Kelamin</label>
                        <input type="text" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->gender }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                        <input type="number" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->age }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                        <input type="tel" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->phone_number }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                        <input type="email" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->email }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                        <input type="text" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->testCategory->name }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                        <input type="text" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->psikotest_service }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                        <input type="text" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->name }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                        <textarea rows="10" class="rounded-md border-0 bg-gray-100 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" readonly disabled>{{ $registrant->reason }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
