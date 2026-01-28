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
                        <img src="{{ asset("assets/dashboard/images/back-btn.webp") }}" alt="Back Button" />
                    </a>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Detail Data Pendaftar</p>
                </div>
                <p class="text-gray-500 py-2">Fitur ini menampilkan data pengguna seperti  nama, jenis kelamin, tanggal lahir, dan email yang telah mengisi  psikotes Berbinar.</p>
                <a href="{{ route("dashboard.registrants.report.index", $registrant->id) }}" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                    <span class="leading-none">Laporan</span>
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-10 rounded-[24px] bg-white shadow mb-7 px-10 py-7">
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
                        <label class="mb-2 font-bold text-[#9b9b9b]">Tanggal Lahir</label>
                        {{-- <input type="date" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ \Carbon\Carbon::parse($registrant->date_of_birth)->format("Y-m-d") }}" readonly disabled /> --}}
                        @if ($registrant->date_of_birth)
                            <input type="date"
                                class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                                value="{{ \Carbon\Carbon::parse($registrant->date_of_birth)->format('Y-m-d') }}"
                                readonly disabled
                            />
                        @else
                            <input type="text"
                                class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                                value="-"
                                readonly disabled
                            />
                        @endif
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                        <input type="number" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->age }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                        <input type="email" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->email }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                        <input type="tel" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->phone_number }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Nama Pengguna</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->username }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Kata Sandi</label>
                        <input type="tel" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="berbinar" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Tanggal Psikotes</label>
                        <input type="date" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ \Carbon\Carbon::parse($registrant->schedule)->format("Y-m-d") }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Waktu Psikotes</label>
                        <input type="time" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ \Carbon\Carbon::parse($registrant->schedule)->format("H:i") }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->testCategory->name }}" readonly disabled />
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
                        <label class="mb-2 font-bold text-[#9b9b9b]">Harga</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Kode Voucher</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $registrant->voucher_code ? $registrant->voucher_code : '-' }}" readonly disabled />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                        <textarea rows="10" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" readonly disabled>{{ $registrant->reason }}</textarea>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Bukti Kartu Pelajar</label>
                            @if($registrant->student_card)
                                <a href="{{ asset('storage/' . $registrant->student_card) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $registrant->student_card) }}"
                                        alt="Bukti Kartu Pelajar"
                                        style="max-width:120px;max-height:120px;border-radius:8px;border:1px solid #ccc;">
                                </a>
                            @else
                                <span>-</span>
                            @endif
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
