@extends(
    "dashboard.layouts.app",
    [
        "title" => "Edit Pendaftar Psikotes",
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
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Edit Data Pendaftar</p>
                </div>
                <p class="text-disabled py-2">Fitur ini digunakan untuk edit data user seperti  Nama, Jenis kelamin, Tanggal lahir, Email yang telah mengisi  Psikotes Berbinar.</p>
            </div>
        </div>
        <div class="flex flex-col gap-10 rounded-[24px] bg-white px-10 py-7">
            <form method="POST" action="{{ route("dashboard.registrants.update", $registrant->id) }}" class="flex flex-col gap-10">
                @csrf
                @method("PUT")

                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="name" class="mb-2 font-bold text-[#9b9b9b]">Nama</label>
                        <input type="text" id="name" name="name" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->name }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="gender" class="mb-2 font-bold text-[#9b9b9b]">Jenis Kelamin</label>
                        <select id="gender" name="gender" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0">
                            <option value="Laki-Laki" {{ $registrant->gender == "Laki-Laki" ? "selected" : "" }}>Laki-Laki</option>
                            <option value="Perempuan" {{ $registrant->gender == "Perempuan" ? "selected" : "" }}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="age" class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                        <input type="number" id="age" name="age" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->age }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="phone_number" class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                        <input type="tel" id="phone_number" name="phone_number" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->phone_number }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="email" class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                        <input type="email" id="email" name="email" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->email }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="test_category" class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                        <input type="text" id="test_category" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->testCategory->name }}" readonly />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="psikotest_service" class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                        <select id="psikotest_service" name="psikotest_service" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0">
                            <option value="Online" {{ $registrant->psikotest_service == "Online" ? "selected" : "" }}>Online</option>
                            <option value="Offline" {{ $registrant->psikotest_service == "Offline" ? "selected" : "" }}>Offline</option>
                        </select>
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="test_type_id" class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                        <input type="text" id="test_type_id" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->name }}" readonly />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="reason" class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                        <textarea id="reason" name="reason" rows="10" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0">{{ $registrant->reason }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex gap-4 border-t-2 border-t-gray-400 pt-5">
                    <button type="submit" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg" style="width: 50%; background: #3986a3; color: #fff">Simpan</button>
                    <button type="button" id="cancelButton" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg" style="width: 50%; border: 2px solid #3986a3; color: #3986a3">Batal</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-md rounded-lg bg-white p-6 text-center">
            <div class="mb-4 flex justify-center">
                <img src="{{ asset("assets/dashboard/images/warning.svg") }}" alt="Warning Icon" class="h-12 w-12" />
            </div>
            <p class="mb-6 text-lg">Apakah Anda yakin ingin membatalkan penambahan data ini?</p>
            <div class="flex justify-center gap-4">
                <button id="confirmCancel" class="rounded-lg bg-[#3986A3] px-6 py-2 text-white">OK</button>
                <button id="cancelCancel" class="rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3]">Cancel</button>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cancelButton = document.getElementById('cancelButton');
            const confirmModal = document.getElementById('confirmModal');
            const confirmCancel = document.getElementById('confirmCancel');
            const cancelCancel = document.getElementById('cancelCancel');
            // const tanggalInput = document.getElementById('jadwalTanggal');
            // const hariInput = document.getElementById('hariKonseling');

            cancelButton.addEventListener('click', function (e) {
                e.preventDefault();
                confirmModal.classList.remove('hidden');
            });

            confirmCancel.addEventListener('click', function () {
                window.location.href = '{{ route("dashboard.registrants.index") }}';
            });

            cancelCancel.addEventListener('click', function () {
                confirmModal.classList.add('hidden');
            });

            // tanggalInput.addEventListener('change', function () {
            //     if (this.value) {
            //         hariInput.value = getDayName(this.value);
            //     } else {
            //         hariInput.value = '';
            //     }
            // });

            // if (tanggalInput.value) {
            //     hariInput.value = getDayName(tanggalInput.value);
            // }
        });
    </script>
@endsection
