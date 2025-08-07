@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
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
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Tambah Data Pendaftar</p>
                </div>
                <p class="text-disabled py-2">Fitur ini menambah data user seperti  Nama, Jenis kelamin, Tanggal lahir, dan Email yang telah mengisi  Psikotes Berbinar.</p>
            </div>
        </div>

        {{-- Wrapper Alpine.js --}}
        <div
            class="flex flex-col gap-10 rounded-[24px] bg-white px-10 pt-7 pb-10 mb-7"
            x-data="{
                testCategories: {{ Js::from($testCategories) }},
                selectedCategory: '{{ old("test_category_id") }}' || '',
                selectedTestType: '{{ old("test_type_id") }}' || '',
                filteredTestTypes: [],

                init() {
                    if (this.selectedCategory) {
                        this.filterTypes()
                    }
                },

                filterTypes() {
                    if (! this.selectedCategory) {
                        this.filteredTestTypes = []
                        this.selectedTestType = ''
                        return
                    }

                    const category = this.testCategories.find(
                        (cat) => cat.id == this.selectedCategory,
                    )
                    this.filteredTestTypes = category ? category.test_types : []

                    if (
                        ! this.filteredTestTypes.find(
                            (type) => type.id == this.selectedTestType,
                        )
                    ) {
                        this.selectedTestType = ''
                    }
                },
            }"
            x-init="init()"
        >
            <form action="{{ route("dashboard.registrants.store") }}" method="POST" class="flex flex-col gap-10">
                @csrf
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="name" class="mb-2 font-bold text-[#9b9b9b]">Nama</label>
                        <input type="text" id="name" name="name" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Nama Lengkap" value="{{ old("name") }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="gender" class="mb-2 font-bold text-[#9b9b9b]">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0">
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="male" @selected(old("gender") === "male")>Laki-Laki</option>
                            <option value="female" @selected(old("gender") === "female")>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="age" class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                        <input type="number" id="age" name="age" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Umur Sekarang" value="{{ old("age") }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="phone_number" class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                        <input type="tel" id="phone_number" name="phone_number" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Nomor Telepon Aktif" value="{{ old("phone_number") }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="email" class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                        <input type="email" id="email" name="email" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Berbinar@gmail.com" value="{{ old("email") }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="test_category_id" class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                        <select name="test_category_id" id="test_category_id" x-model="selectedCategory" @change="filterTypes()" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0">
                            {{-- Placeholder yang value-nya "" --}}
                            <option value="" selected disabled>Pilih Kategori Psikotes</option>
                            @foreach ($testCategories as $testCategory)
                                <option value="{{ $testCategory->id }}">{{ $testCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="service" class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                        <select name="service" id="service" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0">
                            <option value="" selected disabled>Pilih Layanan Psikotes</option>
                            <option value="online" @selected(old("service") === "online")>Online</option>
                            <option value="offline" @selected(old("service") === "offline")>Offline</option>
                        </select>
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="test_type_id" class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                        <select name="test_type_id" id="test_type_id" x-model="selectedTestType" :disabled="!selectedCategory || filteredTestTypes.length === 0" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0">
                            <option value="" selected disabled>Pilih Jenis Psikotes</option>
                            <template x-for="testType in filteredTestTypes" :key="testType.id">
                                <option :value="testType.id" x-text="testType.name"></option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="date" class="mb-2 font-bold text-[#9b9b9b]">Tanggal Psikotes</label>
                        <input type="date" name="date" id="date" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" onclick="document.getElementById('datepicker').focus()" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="time" class="mb-2 font-bold text-[#9b9b9b]">Waktu Psikotes (WIB)</label>
                        <input type="time" name="time" id="time" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" onclick="document.getElementById('timepicker').focus()" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="domicile" class="mb-2 font-bold text-[#9b9b9b]">Domisili</label>
                        <input type="text" id="domicile" name="domicile" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Domisili" value="{{ old("domicile") }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="reason" class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                        <textarea id="reason" name="reason" rows="10" class="rounded-md border-1 border-gray-300 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Tuliskan Alasan Di Sini">{{ old("reason") }}</textarea>
                    </div>
                </div>
                <hr class="border-t-2 border-t-gray-400">
                <div class="flex gap-4">
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

@section('script')
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

            document.addEventListener('DOMContentLoaded', function () {
                flatpickr('#date', {
                    dateFormat: 'Y-m-d', // Ini adalah format yang AKAN DIKIRIM ke Laravel (untuk validasi & DB)
                    altInput: true, // Aktifkan alternate input
                    altFormat: 'd/m/Y', // Ini adalah format yang AKAN DITAMPILKAN kepada pengguna
                    allowInput: true, // Memungkinkan input manual (optional)
                    // Jika Anda menggunakan old() sebagai nilai awal datepicker, tambahkan ini:
                    defaultDate: '{{ old("psikotes_date") ? old("psikotes_date") : "" }}',
                });

                flatpickr('#time', {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: 'H:i',
                    time_24hr: true,
                    defaultDate: '{{ old("psikotes_time") ? old("psikotes_time") : "" }}',
                });
            });
        });
    </script>
@endsection
