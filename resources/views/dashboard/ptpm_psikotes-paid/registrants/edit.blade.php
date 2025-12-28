@extends('dashboard.layouts.app', [
    'title' => 'Edit Pendaftar Psikotes',
])

@section('content')
    <section class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-5">
            <div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('dashboard.registrants.index') }}">
                        <img src="{{ asset('assets/dashboard/images/back-btn.webp') }}" alt="Back Button" />
                    </a>
                    <p tabindex="0"
                        class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">
                        Edit Data Pendaftar</p>
                </div>
                <p class="text-gray-500 py-2">Fitur ini digunakan untuk edit data pengguna seperti nama, jenis kelamin,
                    tanggal lahir, dan email yang telah mengisi psikotes Berbinar.</p>
            </div>
        </div>
        <div class="flex flex-col gap-10 rounded-[24px] bg-white shadow px-10 mb-7 py-7">
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('dashboard.registrants.update', $registrant->id) }}"
                class="flex flex-col gap-10">
                @csrf
                @method('PUT')
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="name" class="mb-2 font-bold text-[#9b9b9b]">Nama</label>
                        <input type="text" id="name" name="name"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $registrant->user->name }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="gender" class="mb-2 font-bold text-[#9b9b9b]">Jenis Kelamin</label>
                        <select id="gender" name="gender"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0">
                            <option value="male" {{ $registrant->gender === 'male' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="female" {{ $registrant->gender === 'female' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                </div>
                @php
                    $date_of_birth = $registrant->date_of_birth
                        ? \Carbon\Carbon::parse($registrant->date_of_birth)
                        : null;
                @endphp
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="age" class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                        <input type="number" id="age" name="age"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $registrant->age }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="date_of_birth" class="mb-2 font-bold text-[#9b9b9b]">Tanggal Lahir</label>
                        <input type="date" id="date_of_birth" name="date_of_birth"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $date_of_birth ? $date_of_birth->format('Y-m-d') : '' }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="phone_number" class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                        <input type="tel" id="phone_number" name="phone_number"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $registrant->phone_number }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="email" class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                        <input type="email" id="email" name="email"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $registrant->user->email }}" />
                    </div>
                </div>
                @php
                    $schedule = $registrant->schedule ? \Carbon\Carbon::parse($registrant->schedule) : null;
                @endphp
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="psikotes_date" class="mb-2 font-bold text-[#9b9b9b]">Jadwal</label>
                        <input type="date" id="psikotes_date" name="psikotes_date"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $schedule ? $schedule->format('Y-m-d') : '' }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="psikotes_type" class="mb-2 font-bold text-[#9b9b9b]">Waktu</label>
                        <input type="time" id="psikotes_type" name="psikotes_time"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $schedule ? $schedule->format('H:i') : '' }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="test_category" class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                        <input type="text" id="test_category" name="test_category"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $registrant->testType->testCategory->name }}" readonly />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="test_type_id" class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                        <select name="test_type_id" id="test_type_id"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0">
                            <option value="" disabled
                                {{ old('test_type_id', $registrant->test_type_id) ? '' : 'selected' }}>
                                Pilih Jenis Psikotes
                            </option>
                            @foreach ($testTypes as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('test_type_id', $registrant->test_type_id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="psikotes_service" class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                        <select id="psikotes_service" name="psikotes_service"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0">
                            <option value="online" {{ $registrant->psikotes_service == 'online' ? 'selected' : '' }}>
                                Online</option>
                            <option value="offline" {{ $registrant->psikotes_service == 'offline' ? 'selected' : '' }}>
                                Offline</option>
                        </select>
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="domicile" class="mb-2 font-bold text-[#9b9b9b]">Domisili</label>
                        <input type="text" id="domicile" name="domicile"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0"
                            value="{{ $registrant->domicile }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="reason" class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                        <textarea id="reason" name="reason" rows="10"
                            class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0">{{ $registrant->reason }}</textarea>
                    </div>
                </div>
                <hr class="border-t-2 border-t-gray-400">
                <div class="flex gap-4">
                    <button type="button" id="cancelButton"
                        class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                        style="width: 50%; border: 2px solid #3986a3; color: #3986a3">Batal</button>
                    <button type="submit" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                        style="width: 50%; background: #3986a3; color: #fff">Simpan</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-md rounded-lg bg-white p-6 text-center">
            <div class="mb-4 flex justify-center">
                <img src="{{ asset('assets/dashboard/images/warning.webp') }}" alt="Warning Icon" class="h-12 w-12" />
            </div>
            <p class="mb-6 text-lg">Apakah Anda yakin ingin membatalkan penambahan data ini?</p>
            <div class="flex justify-center gap-4">
                <button id="confirmCancel" class="rounded-lg bg-[#3986A3] px-6 py-2 text-white">OK</button>
                <button id="cancelCancel"
                    class="rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3]">Cancel</button>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cancelButton = document.getElementById('cancelButton');
            const confirmModal = document.getElementById('confirmModal');
            const confirmCancel = document.getElementById('confirmCancel');
            const cancelCancel = document.getElementById('cancelCancel');
            // const tanggalInput = document.getElementById('jadwalTanggal');
            // const hariInput = document.getElementById('hariKonseling');

            cancelButton.addEventListener('click', function(e) {
                e.preventDefault();
                confirmModal.classList.remove('hidden');
            });

            confirmCancel.addEventListener('click', function() {
                window.location.href = '{{ route('dashboard.registrants.index') }}';
            });

            cancelCancel.addEventListener('click', function() {
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

            flatpickr('#date_of_birth', {
                dateFormat: 'Y-m-d', // Ini adalah format yang AKAN DIKIRIM ke Laravel (untuk validasi & DB)
                altInput: true, // Aktifkan alternate input
                altFormat: 'd/m/Y', // Ini adalah format yang AKAN DITAMPILKAN kepada pengguna
                allowInput: true, // Memungkinkan input manual (optional)
                // Jika Anda menggunakan old() sebagai nilai awal datepicker, tambahkan ini:
                defaultDate: '{{ old('date_of_birth', $date_of_birth?->format('Y-m-d')) }}',
            });
        });
    </script>
@endpush
