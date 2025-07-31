@extends(
    "landing.layouts.app",
    [
        "title" => "Berbinar Insightful Indonesia",
    ]
)

@section("style")
    <style>
        .text-gradient {
            background: linear-gradient(to right, #f7b23b, #916823);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        select {
            background-image: none !important;
        }
    </style>
@endsection

@section("content")
    <div x-data="{ page: 1 }" x-cloak class="mx-4 mb-8 mt-24 flex flex-col justify-center rounded-2xl bg-none px-12 py-6 shadow-none max-md:px-1 sm:mx-24 sm:mb-20 sm:mt-36 md:bg-white md:shadow-lg">
        <div class="flex flex-row justify-between">
            {{-- Tombol Kembali --}}
            <div>
                <template x-if="page === 1">
                    <a href="{{ route('home.index') }}">
                        <div class="flex cursor-pointer items-center space-x-2">
                            <img src="{{ asset('/assets/landing/icons/left-arrow.svg') }}" alt="Left Arrow" class="h-3 w-auto" />
                            <p class="flex text-[15px] font-semibold text-[#3986A3]">
                                Kembali
                                <span class="ml-0.5 hidden sm:block">pilih psikotes</span>
                            </p>
                        </div>
                    </a>
                </template>

                <template x-if="page === 2">
                    <button @click="page = 1; window.scrollTo({top: 0, behavior: 'smooth'})" type="button">
                        <div class="flex cursor-pointer items-center space-x-2">
                            <img src="{{ asset('/assets/landing/icons/left-arrow.svg') }}" alt="Left Arrow" class="h-3 w-auto" />
                            <p class="flex text-[15px] font-semibold text-[#3986A3]">
                                Kembali
                                <span class="ml-0.5 hidden sm:block">ke jadwal</span>
                            </p>
                        </div>
                    </button>
                </template>
            </div>

            {{-- Syarat dan Ketentuan --}}
            <div class="flex cursor-pointer items-center space-x-1" id="openModal">
                <img src="{{ asset("/assets/landing/icons/sk-vector.png") }}" alt="Syarat & Ketentuan" class="h-3 w-auto" />
                <p class="text-[15px] font-semibold text-[#3986A3]">
                    <span class="hidden sm:block">Syarat & Ketentuan</span>
                    <span class="block sm:hidden">S&K</span>
                </p>
            </div>

            {{-- Modal --}}
            <div id="modal" class="fixed inset-0 -top-6 z-30 flex hidden items-center justify-center bg-gray-900 bg-opacity-50 backdrop-blur-md max-sm:-top-2">
                <div class="h-auto max-h-screen w-[70%] overflow-y-auto rounded-2xl bg-white p-6 shadow-md max-lg:h-[90%] max-sm:w-[86%] max-sm:px-2">
                    <h1 class="bg-gradient-to-r from-amber-400 to-yellow-700 bg-clip-text pb-4 text-center text-3xl font-bold text-transparent max-sm:text-2xl">Syarat dan Ketentuan</h1>

                    <div class="mb-6">
                        <div class="flex items-start gap-2">
                            <img src="{{ asset("assets/landing/icons/location.png") }}" alt="Lokasi" class="mt-0.5 h-5 w-5 object-contain" />
                            <span class="font-semibold">Lokasi offline Konseling</span>
                        </div>
                        <ol class="mt-1 list-decimal space-y-1 pl-7">
                            <li class="max-sm:text-sm">a. Psikolog: Surabaya, Kediri, Sidoarjo, Denpasar, Samarinda, Jakarta, Malang, dan Kalimantan Utara (Tarakan)</li>
                            <li class="max-sm:text-sm">b. Peer Counselor: Bekasi, Jakarta, Tangerang Selatan, Padang, Wonogiri, dan Malang</li>
                        </ol>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-start gap-2">
                            <img src="{{ asset("assets/landing/icons/payment.png") }}" alt="Pembayaran" class="mt-0.5 h-5 w-5" />
                            <span class="font-semibold">Pembayaran</span>
                        </div>
                        <ol class="mt-1 list-decimal space-y-1 pl-7">
                            <li class="max-sm:text-sm">Melakukan pembayaran ke Bank Mandiri dengan no rekening 1400020763711 a.n. Berbinar Insightful Indonesia dengan aturan transfer 1×24 jam.</li>
                        </ol>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-start gap-2">
                            <img src="{{ asset("/assets/landing/icons/chat.png") }}" alt="Pembalasan Pesan" class="mt-0.5 h-5 w-5" />
                            <span class="font-semibold">Pembalasan Pesan</span>
                        </div>
                        <ol class="mt-1 list-decimal space-y-1 pl-7">
                            <li class="max-sm:text-sm">Tidak membalas pesan admin dalam 1×24 jam, pendaftaran oleh klien secara otomatis dibatalkan.</li>
                            <li class="max-sm:text-sm">Tidak membalas pesan admin dalam 1×24 jam, jadwal yang sudah ditentukan oleh klien berhak untuk diubah oleh Tim Berbinar dan kesepakatan dari klien.</li>
                            <li class="max-sm:text-sm">Tidak membalas pesan admin dalam 2×24 jam setelah melakukan pembayaran, pembayaran dianggap hangus.</li>
                        </ol>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-start gap-2">
                            <img src="{{ asset("assets/landing/icons/cancel.png") }}" alt="Pengajuan Pembatalan" class="mt-0.5 h-5 w-5" />
                            <span class="font-semibold">Pengajuan Pembatalan</span>
                        </div>
                        <ol class="mt-1 list-decimal space-y-1 pl-7">
                            <li class="max-sm:text-sm">Pengajuan proses pembatalan layanan konseling dapat dilakukan dalam kurun waktu 1×24 jam setelah proses administrasi dan dana yang telah dibayarkan akan dikembalikan 100%.</li>
                        </ol>
                    </div>

                    <div class="mt-4 flex justify-center lg:gap-x-3">
                        <button id="closeModal" class="rounded-md border-[1.5px] border-[#225062] bg-transparent px-4 py-1.5 font-medium text-black max-sm:text-[15px]">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route("auth.psikotes-paid.register") }}" method="POST">
            @csrf
            {{-- Jadwal --}}
            <div x-show="page === 1">
                <h1 class="font text-gradient my-6 text-center text-3xl font-semibold max-sm:mx-2 max-sm:text-[29px]">Isi Jadwal Psikotes</h1>

                <div class="flex flex-col space-y-3">
                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Tanggal Psikotes</p>
                        <div class="relative">
                            <input type="date" id="psikotes_date" name="psikotes_date" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="dd/mm/yy" value="{{ old("psikotes_date") }}" readonly />
                            <img src="{{ asset("assets/landing/icons/date.png") }}" class="absolute right-5 top-1/2 h-4 w-auto -translate-y-1/2 object-contain" onclick="document.getElementById('datepicker').focus()" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Waktu Psikotes</p>
                        <div class="relative">
                            <input type="time" id="psikotes_time" name="psikotes_time" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="--:--" value="{{ old("psikotes_time") }}" readonly />
                            <img src="{{ asset("assets/landing/icons/clock.png") }}" class="absolute right-5 top-1/2 h-4 w-auto -translate-y-1/2 object-contain" onclick="document.getElementById('timepicker').focus()" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Layanan Psikotes</p>
                        <div class="relative">
                            <select id="service" name="service" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none">
                                <option value="offline" {{ old("service" === "offline" ? "selected" : "") }}>Offline</option>
                                <option value="online" {{ old("service" === "online" ? "selected" : "") }}>Online</option>
                            </select>
                            <img src="{{ asset("assets/landing/icons/dropdown.png") }}" class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Kategori Psikotes</p>
                        <div class="relative">
                            <select id="test_category_id" name="test_category_id" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none">
                                <option value=""></option>
                                @foreach ($testCategories as $category)
                                    <option value="{{ $category->id }}" {{ old("test_category_id") == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <img src="{{ asset("assets/landing/icons/dropdown.png") }}" class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Jenis Psikotes</p>
                        <div class="relative">
                            <select id="test_type_id" name="test_type_id" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none">
                                <option value=""></option>
                            </select>
                            <img src="{{ asset("assets/landing/icons/dropdown.png") }}" class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Harga</p>
                        <div class="relative">
                            <input type="text" id="price" name="price" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="Rp 0,00" readonly />
                        </div>
                    </div>

                    <div class="flex items-center justify-center pt-10">
                        <div class="flex w-full justify-center">
                            <button @click="page = 2; window.scrollTo({top: 0})" type="button" class="text-md w-full rounded-xl bg-gradient-to-r from-[#3986A3] to-[#225062] px-24 py-2 text-white max-sm:text-[15px] sm:w-auto">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Diri --}}
            <div x-show="page === 2">
                <h1 class="font text-gradient my-6 text-center text-3xl font-semibold max-sm:mx-2 max-sm:text-[29px]">Data Diri</h1>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Nama Lengkap</p>
                        <div class="relative">
                            <input type="text" id="name" name="name" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="Budi Berbinar" value="{{ old("name") }}" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Email Aktif</p>
                        <div class="relative">
                            <input type="email" id="email" name="email" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="email.anda@gmail.com" value="{{ old("email") }}" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Usia</p>
                        <div class="relative">
                            <input type="number" id="age" name="age" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="20" value="{{ old("age") }}" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Kota Domisili</p>
                        <div class="relative">
                            <input type="text" id="domicile" name="domicile" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="Surabaya" value="{{ old("domicile") }}" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Jenis Kelamin</p>
                        <div class="relative">
                            <select id="gender" name="gender" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" value="{{ old("gender") }}">
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                            <img src="{{ asset("assets/landing/icons/dropdown.png") }}" class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Nomor WhatsApp</p>
                        <div class="relative">
                            <input type="number" id="phone_number" name="phone_number" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="08112345XXXX" value="{{ old("phone_number") }}" />
                        </div>
                    </div>
                </div>

                <h1 class="font text-gradient my-10 text-center text-3xl font-semibold max-sm:mx-2 max-sm:text-[29px]">Alasan Mengikuti Psikotes</h1>

                <div class="relative">
                    <textarea id="reason" name="reason" class="h-72 w-full cursor-pointer resize-none rounded-lg border-none bg-[#F1F3F6] px-3 pt-3 text-start shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="Tidak ada minimum/batas jumlah kata">{{ old("reason") }}</textarea>
                </div>

                <div class="flex items-center justify-center gap-6 pt-10">
                    <div class="flex justify-center">
                        <button type="submit" class="text-md w-full rounded-xl bg-gradient-to-r from-[#3986A3] to-[#225062] px-24 py-2 text-white max-sm:text-[15px] sm:w-auto">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section("script")
    <script>
        // Mengatur input tanggal dan waktu
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#psikotes_date', {
                dateFormat: 'Y-m-d', // Ini adalah format yang AKAN DIKIRIM ke Laravel (untuk validasi & DB)
                altInput: true, // Aktifkan alternate input
                altFormat: 'd/m/Y', // Ini adalah format yang AKAN DITAMPILKAN kepada pengguna
                allowInput: true, // Memungkinkan input manual (optional)
                // Jika Anda menggunakan old() sebagai nilai awal datepicker, tambahkan ini:
                defaultDate: '{{ old("psikotes_date") ? old("psikotes_date") : "" }}',
            });

            flatpickr('#psikotes_time', {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
                time_24hr: true,
                defaultDate: '{{ old("psikotes_time") ? old("psikotes_time") : "" }}',
            });
        });

        // Mengatur input jenis, kategoori, harga, dan layanan psikotes
        const testTypes = @json($testTypes);
        const categorySelect = document.getElementById('test_category_id');
        const typeSelect = document.getElementById('test_type_id');
        const priceInput = document.getElementById('price');

        // Format currency function
        function formatCurrency(amount) {
            return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        categorySelect.addEventListener('change', function () {
            const selectedCategoryId = this.value;
            const filteredTypes = testTypes.filter((type) => type.test_category_id == selectedCategoryId);

            // Clear the existing options in the typeSelect
            typeSelect.innerHTML = '';

            // Add the filtered options to the typeSelect
            filteredTypes.forEach(function (type) {
                typeSelect.innerHTML += `<option value="${type.id}" data-price="${type.price}">${type.name}</option>`;
            });

            // Trigger change event to update the price field if needed
            if (filteredTypes.length > 0) {
                typeSelect.dispatchEvent(new Event('change'));
            }
        });

        typeSelect.addEventListener('change', function () {
            const selectedType = typeSelect.options[typeSelect.selectedIndex];
            const price = selectedType.getAttribute('data-price');
            if (price) {
                // Format the price and set it in the input field
                priceInput.value = `Rp ${formatCurrency(price)}`;
            } else {
                priceInput.value = '';
            }
        });

        document.querySelectorAll('.dropdown-select').forEach((select, index) => {
            const icon = document.querySelectorAll('.dropdown-icon')[index];

            select.addEventListener('click', function () {
                icon.classList.toggle('rotate-180');
            });

            select.addEventListener('blur', function () {
                icon.classList.remove('rotate-180');
            });
        });

        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('modal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
@endsection
