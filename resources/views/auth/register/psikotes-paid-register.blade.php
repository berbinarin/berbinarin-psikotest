@extends(
    "landing.layouts.app",
    [
        "title" => "Berbinar Insightful Indonesia",
    ]
)

@push("style")
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

        .dropdown-select {
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;

            background-image: none !important;
            background-repeat: no-repeat !important;
            background-position: right 0.5rem center !important;
            background-size: 0 !important;
        }
        select::-ms-expand {
            display: none;
        }
    </style>
@endpush

@section("content")
    <div x-data="{ page: 1 }" x-cloak class="mx-4 mb-8 mt-24 flex flex-col justify-center rounded-2xl bg-none px-12 py-6 shadow-none max-md:px-1 sm:mx-24 sm:mb-20 sm:mt-36 md:bg-white md:shadow-lg">
        <div class="flex flex-row justify-between">
            {{-- Tombol Kembali --}}
            <div>
                <template x-if="page === 1">
                    <a href="{{ route("home.index") }}">
                        <div class="flex cursor-pointer items-center space-x-2">
                            <img src="{{ asset("/assets/landing/icons/left-arrow.svg") }}" alt="Left Arrow" class="h-3 w-auto" />
                            <p class="flex text-[15px] font-semibold text-[#3986A3]">Kembali</p>
                        </div>
                    </a>
                </template>

                <template x-if="page === 2">
                    <button @click="page = 1; window.scrollTo({top: 0, behavior: 'smooth'})" type="button">
                        <div class="flex cursor-pointer items-center space-x-2">
                            <img src="{{ asset("/assets/landing/icons/left-arrow.svg") }}" alt="Left Arrow" class="h-3 w-auto" />
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

            <!-- Modal -->
            <!-- Modal -->
            <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
                <div class="max-h-[90vh] w-[90%] max-w-4xl rounded-2xl bg-white p-8 shadow-lg max-sm:overflow-y-auto max-sm:p-4">
                    <div class="overflow-y-auto">
                        <!-- Judul Utama -->
                        <h1 class="mb-4 text-center text-3xl font-bold text-[#2C5C84] max-sm:text-2xl">Syarat dan Ketentuan</h1>

                        <!-- Subjudul -->
                        <h2 class="mb-2 text-lg font-semibold text-[#F4A900]">Syarat dan Ketentuan</h2>

                        <!-- Daftar Syarat -->
                        <ul class="list-disc space-y-2 pl-6 text-[sm]">
                            <li>
                                <span class="font-semibold">Harap baca sebelum daftar:</span>
                                <ol class="mt-1 list-decimal pl-4 text-[#70787D]">
                                    <li>
                                        Setelah mengisi formulir, calon pendaftar akan diarahkan untuk melakukan
                                        <span class="font-bold">pembayaran 100%</span>
                                        ke
                                        <span class="font-bold">Bank Mandiri</span>
                                        dengan no rekening
                                        <span class="font-bold">1400020763711</span>
                                        a.n. Berbinar Insightful Indonesia dengan aturan transfer 1×24 jam setelah pengisian formulir.
                                    </li>
                                    <li>
                                        Jika calon peserta tes
                                        <span class="font-bold">tidak membalas pesan</span>
                                        admin dalam waktu 1×24 jam setelah pengisian formulir, maka pendaftaran oleh calon peserta tes secara
                                        <span class="font-bold">otomatis dibatalkan</span>
                                        .
                                    </li>
                                    <li>
                                        Jika calon peserta tes
                                        <span class="font-bold">tidak membalas pesan</span>
                                        admin dalam 1×24 jam, jadwal yang sudah ditentukan oleh klien
                                        <span class="font-bold">berhak untuk dirubah oleh Tim Berbinar dan kesepakatan dari klien</span>
                                        .
                                    </li>
                                    <li>
                                        Jika calon peserta tes
                                        <span class="font-bold">tidak membalas pesan</span>
                                        admin dalam 2×24 jam setelah melakukan pembayaran,
                                        <span class="font-bold">pembayaran dianggap hangus</span>
                                        .
                                    </li>
                                    <li>
                                        Calon peserta tes
                                        <span class="font-bold">dapat mengajukan pembatalan</span>
                                        layanan psikotes dalam kurun waktu 1×24 jam setelah proses administrasi dan dana yang telah dibayarkan akan
                                        <span class="font-bold">dikembalikan 100%</span>
                                        .
                                    </li>
                                    <li>
                                        Setelah
                                        <span class="font-bold">selesai melaksanakan psikotes</span>
                                        , peserta akan dikirimkan hasil psikotesnya dengan jangka waktu tertentu.
                                    </li>
                                </ol>
                            </li>
                        </ul>

                        <!-- Tombol -->
                        <div class="mt-6 flex justify-center">
                            <button id="closeModal" class="rounded-md bg-gradient-to-r from-[#3986A3] to-[#15323D] px-6 py-2 font-medium text-white shadow-sm transition">Saya Mengerti</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal untuk kode voucher --}}

            <div id="voucher" class="fixed bg-gray-900 bg-opacity-50 backdrop-blur-md hidden inset-0 flex items-center justify-center z-30">
                <div class="h-auto max-sm:max-h-[90%] max-h-screen w-[70%] overflow-y-auto rounded-2xl bg-white p-6 max-sm:px-2 shadow-md max-lg:h-[90%] max-sm:w-[86%]">
                    <h1 class="bg-gradient-to-r from-[#3986A3] to-[#15323D] bg-clip-text text-transparent pb-6 text-center text-3xl font-bold max-sm:text-lg">Promo KTM dan Kartu Pelajar <br class=""> Produk Konseling Bersama Psikolog</h1>
                    <div class="mb-6">
                        <div class="max-h-[440px] lg:max-h-96 overflow-y-auto">

                        <h2 class="bg-gradient-to-r from-amber-400 to-yellow-700 bg-clip-text text-transparent pb-4 text-2xl font-bold max-sm:text-lg">Syarat dan Ketentuan</h2>
                        <ul class="list-disc text-black marker:text-primary pl-6">
                            <li class="mb-2">
                                <p class="font-semibold">Promo Berlaku untuk:</p>
                                <p class="max-sm:text-sm text-disabled pl-7">
                                    <ol class="list-decimal text-gray-600 marker:text-disabled pl-5">
                                        <li>Siswa aktif jenjang SMP/SMA/sederajat.</li>
                                        <li>Mahasiswa aktif jenjang D3, D4, atau S1.</li>
                                        <li>Dibuktikan dengan mengupload Kartu Tanda Mahasiswa (KTM) atau Kartu Pelajar yang masih berlaku saat melakukan pendaftaran</li>
                                    </ol>
                                </p>

                            </li>
                            <li class="mb-2">
                                <p class="font-semibold">Diskon/Penawaran:</p>
                                <p class="max-sm:text-sm text-disabled pl-7">
                                    <ol class="list-decimal text-gray-600 marker:text-disabled pl-5">
                                        <li>Potongan harga sebesar 20% untuk setiap sesi konseling individu.</li>
                                        <li>Promo hanya berlaku untuk layanan konseling online.</li>
                                    </ol>
                                </p>
                            </li>

                            <li class="mb-2">
                                <p class="font-semibold">Cara Menggunakan Promo:</p>
                                <p class="max-sm:text-sm text-disabled pl-7">
                                    <ol class="list-decimal text-gray-600 marker:text-disabled pl-5">
                                        <li>Daftar melalui website berbinar konseling <br> <a href="https://berbinar.in/produk/konseling" class="text-blue-500">https://berbinar.in/produk/<br class="hidden max-sm:block">konseling</a></li>
                                        <li>Upload KTM/kartu pelajar saat pendaftaran.</li>
                                        <li>Cantumkan kode promo #KONSELINGPELAJAR</li>
                                    </ol>
                                </p>
                            </li>

                            <li class="mb-2">
                                <p class="font-semibold">Ketentuan Tambahan:</p>
                                <p class="max-sm:text-sm text-disabled pl-7">
                                    <ol class="list-decimal text-gray-600 marker:text-disabled pl-5">
                                        <li>Promo hanya berlaku untuk 1x sesi per individu, kecuali dinyatakan lain.</li>
                                        <li>Tidak dapat memilih Psikolog yang akan menangani</li>
                                        <li>Tidak dapat digabungkan dengan promo lainnya.</li>
                                        <li>Tidak berlaku untuk layanan lanjutan atau paket konseling tertentu.</li>
                                        <li>Pihak penyelenggara berhak membatalkan promo jika ditemukan penyalahgunaan (misalnya kartu tidak valid atau sudah tidak aktif).</li>
                                    </ol>
                                </p>
                            </li>
                        </ul>
                        </div>

                    </div>


                    <div class="mt-4 justify-center flex lg:gap-x-3">
                        <button id="closeVoucher" class="w-[90%] lg:w-1/4 rounded-xl border-[1.5px] bg-gradient-to-r from-[#3986A3] to-[#15323D] border-[#225062] bg-transparent px-4 py-1.5 font-medium text-white max-sm:text-[15px]">Saya Mengerti</button>
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
                            <input type="time" id="psikotes_time" name="psikotes_time" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 pr-16 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="--:--" value="{{ old("psikotes_time") }}" readonly />
                            <span class="pointer-events-none absolute left-[64px] top-1/2 -translate-y-1/2 text-base text-[#333]">WIB</span>
                            <img src="{{ asset("assets/landing/icons/clock.png") }}" class="absolute right-5 top-1/2 h-4 w-auto -translate-y-1/2 object-contain" onclick="document.getElementById('timepicker').focus()" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Layanan Psikotes</p>
                        <div class="relative">
                            <select id="service" name="service" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] bg-[length:0] bg-right bg-no-repeat px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none">
                                <option value="offline" {{ old("service") === "offline" ? "selected" : "" }}>Offline</option>
                                <option value="online" {{ old("service") === "online" ? "selected" : "" }}>Online</option>
                            </select>
                            <img src="{{ asset("assets/landing/icons/dropdown.png") }}" class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-1">
                        <p class="text-sm text-[#333333] sm:text-[17px]">Kategori Psikotes</p>
                        <div class="relative">
                            <select id="test_category_id" name="test_category_id" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none bg-[length:0] bg-no-repeat bg-right" style="">
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
                            <select id="test_type_id" name="test_type_id" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none bg-[length:0] bg-no-repeat bg-right">
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

                    {{-- Kode Promo --}}
                    <div class="flex flex-col space-y-1">
                        <p class="text-[#333333] sm:text-[17px] text-sm">Kode Promo</p>
                        <div class="relative">
                            <input type="text" id="kode_promo" name="kode_promo" class="bg-[#F1F3F6] md:shadow-none shadow-md border-none rounded-lg w-full px-3 py-3 cursor-pointer focus:ring-[#3986A3]" placeholder="Berbinar">
                            <button type="button" onclick="redeemVoucher()" class="absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer flex bg-[#106681] text-white justify-between gap-2 py-[4px] px-2  rounded-md items-center">Redeem Code</button>
                        </div>
                    </div>
                    {{-- Bukti Kartu Pelajar --}}
                    <div class="mb-4 rounded-lg" id="bukti-kartu-pelajar-container" style="background-color: white;display:none;">
                        <label for="bukti_kartu_pelajar">Bukti Kartu Pelajar</label>
                        <div class="relative w-full flex items-center">
                            <input type="file" id="bukti_kartu_pelajar" name="bukti_kartu_pelajar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                            <div class="mt-1 block w-full h-12 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary pointer-events-none cursor-pointer content-center flex items-center">
                                <button type="button" class="pointer-events-none border flex justify-between gap-2 py-[4px] px-2 border-[#B3B3B3] rounded-md cursor-pointer items-center">
                                    <img src="{{ asset('assets/images/landing/produk/emo/upload-line-icon.png') }}" alt="" class="w-4 h-4">
                                    Upload
                                </button>
                                <span id="fileName" class="ml-3 text-base text-gray-600 truncate"></span>
                            </div>
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
                            <img class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
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

@push("script")
    <script>
        // Mengatur input tanggal dan waktu
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#psikotes_date', {
                dateFormat: 'Y-m-d', // Ini adalah format yang AKAN DIKIRIM ke Laravel (untuk validasi & DB)
                altInput: true, // Aktifkan alternate input
                altFormat: 'd/m/Y', // Ini adalah format yang AKAN DITAMPILKAN kepada pengguna
                allowInput: true, // Memungkinkan input manual (optional)
                minDate: new Date().fp_incr(7),
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

    function validateStep1() {
    const requiredFields = ['jadwal_tanggal', 'jadwal_pukul', 'metode', 'sesi'];
    const metode = document.getElementById('metode-select').value;

    if (metode === 'offline') {
        requiredFields.push('daerah');
    }

    // Cek kategori voucher dari hasil redeem
    const kategoriVoucher = document.getElementById('bukti-kartu-pelajar-container').style.display === 'block' ? 'pelajar' : '';

    for (let fieldName of requiredFields) {
        let field;
        if (fieldName === 'metode') {
            field = document.getElementById('metode-select');
        } else if (fieldName === 'sesi') {
            field = document.getElementById('sesi-select');
        } else if (fieldName === 'daerah') {
            field = document.getElementById('daerah-select');
        } else {
            field = document.querySelector(`[name="${fieldName}"]`);
        }

        if (!field || field.value.trim() === '' || field.value === 'Pilih metode konseling') {
            return 'Data "' + getFieldLabel(fieldName) + '" belum diisi.';
        }
    }

    // Jika kategori pelajar, cek bukti kartu pelajar
    if (kategoriVoucher === 'pelajar') {
        const buktiKartu = document.getElementById('bukti_kartu_pelajar');
        if (!buktiKartu.files || buktiKartu.files.length === 0) {
            return 'Bukti Kartu Pelajar wajib diupload untuk kategori pelajar.';
        }
    }

    return null;
    }

    function redeemVoucher() {
        const kode = document.getElementById('kode_promo').value.trim();
        const hargaInput = document.getElementById('harga-input');
        const hargaAsli = parseInt(hargaInput.dataset.hargaAsli);
        const hargaAsliSpan = document.getElementById('harga-asli');
        const hargaDiskonSpan = document.getElementById('harga-diskon');

        // Validasi input kosong
        if (!kode) {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Masukkan kode promo terlebih dahulu.",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000
            });
            return;
        }

        // Validasi harga belum dipilih
        if (!hargaAsli) {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Silakan pilih jadwal, metode, dan sesi terlebih dahulu.",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000
            });
            return;
        }

        fetch('/produk/konseling/psikolog/cek-voucher?code=' + encodeURIComponent(kode))
            .then(res => res.json())
            .then(data => {
                if (data.valid) {
                    // Jika kode valid: tampilkan modal dan update harga
                    const diskon = data.percentage;
                    const hargaDiskon = hargaAsli - (hargaAsli * diskon / 100);

                    hargaAsliSpan.textContent = 'Rp' + hargaAsli.toLocaleString();
                    hargaAsliSpan.className = 'harga-coret';
                    hargaDiskonSpan.textContent = 'Rp' + hargaDiskon.toLocaleString();
                    hargaInput.value = hargaDiskon;
                    hargaInput.dataset.hargaFinal = hargaDiskon;

                    // Toggle upload KTM jika kode untuk pelajar
                    const buktiContainer = document.getElementById('bukti-kartu-pelajar-container');
                    const buktiInput = document.getElementById('bukti_kartu_pelajar');

                    if (data.category?.toLowerCase() === 'pelajar') {
                        buktiContainer.style.display = 'block';
                        buktiInput.setAttribute('required', 'required');
                    } else {
                        buktiContainer.style.display = 'none';
                        buktiInput.removeAttribute('required');
                    }

                    // Tampilkan modal syarat & ketentuan
                    document.getElementById('voucher').classList.remove('hidden');

                } else {
                    // Jika kode tidak valid: reset harga dan tampilkan Swal
                    hargaAsliSpan.textContent = 'Rp' + hargaAsli.toLocaleString();
                    hargaAsliSpan.className = '';
                    hargaDiskonSpan.textContent = '';
                    hargaInput.value = hargaAsli;

                    document.getElementById('bukti-kartu-pelajar-container').style.display = 'none';
                    document.getElementById('bukti_kartu_pelajar').removeAttribute('required');

                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "error",
                        title: "Kode voucher tidak valid!",
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 4000
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    title: "Terjadi kesalahan saat memverifikasi kode.",
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 4000
                });
            });
    }

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });

    document.getElementById('closeVoucher').addEventListener('click', function() {
        document.getElementById('voucher').classList.add('hidden');
    });

    ['openModal', 'openModal2', 'openModal3'].forEach(id => {
        document.getElementById(id)?.addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
        });
    });


    function tampilkanHarga(hargaAsli, hargaDiskon) {
        document.getElementById('harga-asli').textContent = 'Rp' + hargaAsli.toLocaleString();
        document.getElementById('harga-diskon').textContent = 'Rp' + hargaDiskon.toLocaleString();
        document.getElementById('harga-input').value = hargaDiskon;
    }

        // Cek validasi data
        document.querySelector('form[action="{{ route("auth.psikotes-paid.register") }}"]').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = this;

            // Ambil semua input yang wajib
            const psikotes_date = form.psikotes_date.value.trim();
            const psikotes_time = form.psikotes_time.value.trim();
            const service = form.service.value.trim();
            const test_category_id = form.test_category_id.value.trim();
            const test_type_id = form.test_type_id.value.trim();

            const name = form.name.value.trim();
            const email = form.email.value.trim();
            const age = form.age.value.trim();
            const domicile = form.domicile.value.trim();
            const gender = form.gender.value.trim();
            const phone_number = form.phone_number.value.trim();
            const reason = form.reason.value.trim();

            if (phone_number.length < 8) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nomor WhatsApp tidak valid',
                    text: 'Nomor WhatsApp harus memiliki minimal 8 digit.',
                    confirmButtonColor: '#3986A3',
                });
                return;
            }

            // Cek input kosong
            if (!psikotes_date || !psikotes_time || !service || !test_category_id || !test_type_id || !name || !email || !age || !domicile || !gender || !phone_number || !reason) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Form Belum Lengkap',
                    text: 'Mohon pastikan semua bagian telah diisi.',
                    confirmButtonColor: '#3986A3',
                });
                return;
            }

            // Cek format email sederhana
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Email tidak valid',
                    text: 'Mohon masukkan alamat email yang benar.',
                    confirmButtonColor: '#3986A3',
                });
                return;
            }

            // AJAX cek email terdaftar (ganti url dengan route backend yang cek email)
            try {
                const response = await fetch('{{ route("auth.psikotes-paid.register.check-email") }}?email=' + encodeURIComponent(email));
                const data = await response.json();

                if (data.exists) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Email sudah terdaftar',
                        text: 'Email ini sudah pernah digunakan, silakan gunakan email lain.',
                        confirmButtonColor: '#3986A3',
                    });
                    return;
                }
            } catch (error) {
                console.error('Error cek email:', error);
                // Kalau error cek email, bisa lanjut atau tampil pesan lain sesuai kebutuhan
            }

            // Kalau semua lolos, submit form
            form.submit();
        });
    </script>
@endpush
