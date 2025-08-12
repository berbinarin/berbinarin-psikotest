@extends(
    "dashboard.layouts.app",
    [
        "title" => "Detail Pendaftar Psikotes",
    ]
)

@section("content")
    <section class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-5">
            <div>
                <div class="flex items-center gap-2">
                    <a href="{{ route("dashboard.registrants.index") }}">
                        <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                    </a>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Detail Data Pendaftar</p>
                </div>
                <p class="text-gray-500 py-2">Fitur ini menampilkan data user seperti  Nama, Jenis kelamin, Tanggal lahir, Email yang telah mengisi  Psikotes Berbinar.</p>
            </div>
        </div>
        <div class="flex flex-col gap-10 rounded-[24px] bg-white px-10 py-7">
            <form class="flex flex-col gap-10">
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Nama</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->name }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Jenis Kelamin</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                        <input type="number" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->age }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                        <input type="tel" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->phone_number }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Username</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->username }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Password</label>
                        <input type="tel" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="berbinar" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Tanggal Psikotes</label>
                        <input type="date" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ \Carbon\Carbon::parse($registrant->schedule)->format("d-m-Y") }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Waktu Psikotes</label>
                        <input type="time" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ \Carbon\Carbon::parse($registrant->schedule)->format("H:i") }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                        <input type="email" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->email }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->testCategory->name }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Harga</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->name }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->psikotes_service }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Domisili</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->domicile }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                        <textarea rows="10" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" readonly disabled>{{ $registrant->reason }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
