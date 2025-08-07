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
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Detail Data Pendaftar</p>
                </div>
                <p class="text-disabled py-2">Fitur ini menampilkan data user seperti  Nama, Jenis kelamin, Tanggal lahir, Email yang telah mengisi  Psikotes Berbinar.</p>
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
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->gender }}" readonly disabled />
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
            </div>
            <div class="ml-14 w-[1000px] rounded-md bg-white px-5 py-4">
                <div class="flex w-full flex-row gap-5">
                    <div class="flex w-full flex-col">
                        <dl class="flex grow flex-col text-black">
                            <dt class="self-start font-bold">Username</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->user->username }}
                            </dd>
                        </dl>
                    </div>
                    <div class="ml-5 flex w-full flex-col">
                        <dl class="flex grow flex-col text-black">
                            <dt class="self-start font-bold">Password</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ \Illuminate\Support\Str::before($registrant->user->email, '@') }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="ml-14 w-[1000px] rounded-md bg-white px-5 py-4">
                <div class="flex w-full flex-row gap-5">
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
                        <dl class="flex grow flex-col text-black">
                            <dt class="self-start font-bold">Nama</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->user->name }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Usia</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->age }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Email</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->user->email }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Layanan Psikotes</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->psikotes_service }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Harga</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Tanggal Psikotes</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ \Carbon\Carbon::parse($registrant->schedule)->format("d-m-Y") }}
                            </dd>
                        </dl>
                        <label class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->psikotes_service }}" readonly disabled />
                    </div>
                    <div class="flex w-full flex-col">
                        <label class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                        <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->name }}" readonly disabled />
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
