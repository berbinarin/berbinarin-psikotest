@extends(
    "landing.layouts.app",
    [
        "title" => "Berbinar Insightful Indonesia",
    ]
)

@section("content")
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

    <div class="mx-4 mb-8 mt-24 flex flex-col justify-center rounded-2xl bg-none px-12 py-6 shadow-none max-md:px-1 sm:mx-24 sm:mb-20 sm:mt-36 md:bg-white md:shadow-lg">
        <div class="flex flex-row justify-between">
            <a href="/"
                <div class="flex cursor-pointer items-center space-x-2">
                    <img src="{{ asset("assets/images/landing/asset-konseling/vector/left-arrow.svg") }}" alt="Left Arrow" class="h-3 w-auto" />
                    <p class="flex text-[15px] font-semibold text-[#3986A3]">
                        Kembali
                        <span class="ml-0.5 hidden sm:block">pilih psikotes</span>
                    </p>
                </div>
            </a>

            <div class="flex cursor-pointer items-center space-x-1" id="openModal">
                <img src="{{ asset("assets/images/landing/asset-konseling/vector/sk-vector.png") }}" alt="Syarat & Ketentuan" class="h-3 w-auto" />
                <p class="text-[15px] font-semibold text-[#3986A3]">
                    <span class="hidden sm:block">Syarat & Ketentuan</span>
                    <span class="block sm:hidden">S&K</span>
                </p>
            </div>

            <div id="modal" class="fixed inset-0 -top-6 z-30 flex hidden items-center justify-center bg-gray-900 bg-opacity-50 backdrop-blur-md max-sm:-top-2">
                <div class="h-auto max-h-screen w-[70%] overflow-y-auto rounded-2xl bg-white p-6 shadow-md max-lg:h-[90%] max-sm:w-[86%] max-sm:px-2">
                    <h1 class="bg-gradient-to-r from-amber-400 to-yellow-700 bg-clip-text pb-4 text-center text-3xl font-bold text-transparent max-sm:text-2xl">Syarat dan Ketentuan</h1>
                    <div class="mb-6">
                        <div class="flex items-start gap-2">
                            <img src="{{ asset("assets/images/landing/asset-konseling/vector/location.png") }}" alt="Lokasi" class="mt-0.5 h-5 w-5" />
                            <span class="font-semibold">Lokasi offline Konseling</span>
                        </div>
                        <ol class="mt-1 list-decimal space-y-1 pl-7">
                            <li class="max-sm:text-sm">a. Psikolog: Surabaya, Kediri, Sidoarjo, Denpasar, Samarinda, Jakarta, Malang, dan Kalimantan Utara (Tarakan)</li>
                            <li class="max-sm:text-sm">b. Peer Counselor: Bekasi, Jakarta, Tangerang Selatan, Padang, Wonogiri, dan Malang</li>
                        </ol>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-start gap-2">
                            <img src="{{ asset("assets/images/landing/asset-konseling/vector/payment.png") }}" alt="Pembayaran" class="mt-0.5 h-5 w-5" />
                            <span class="font-semibold">Pembayaran</span>
                        </div>
                        <ol class="mt-1 list-decimal space-y-1 pl-7">
                            <li class="max-sm:text-sm">Melakukan pembayaran ke Bank Mandiri dengan no rekening 1400020763711 a.n. Berbinar Insightful Indonesia dengan aturan transfer 1×24 jam.</li>
                        </ol>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-start gap-2">
                            <img src="{{ asset("assets/images/landing/asset-konseling/vector/chat.png") }}" alt="Pembalasan Pesan" class="mt-0.5 h-5 w-5" />
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
                            <img src="{{ asset("assets/images/landing/asset-konseling/vector/cancel.png") }}" alt="Pengajuan Pembatalan" class="mt-0.5 h-5 w-5" />
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

        <h1 class="font text-gradient my-6 text-center text-3xl font-semibold max-sm:mx-2 max-sm:text-[29px]">Isi Jadwal Psikotes</h1>

        <form action="{{ route("register-schedule") }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-3">
                <div class="flex flex-col space-y-1">
                    <p class="text-sm text-[#333333] sm:text-[17px]">Tanggal Psikotes</p>
                    <div class="relative">
                        <input type="date" id="tglpsikotes" name="preference_date" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="dd/mm/yy" readonly />
                        <img src="{{ asset("assets/images/landing/asset-konseling/vector/date.png") }}" class="absolute right-5 top-1/2 h-4 w-auto -translate-y-1/2 object-contain" onclick="document.getElementById('datepicker').focus()" />
                    </div>
                </div>

                <div class="flex flex-col space-y-1">
                    <p class="text-sm text-[#333333] sm:text-[17px]">Waktu Psikotes</p>
                    <div class="relative">
                        <input type="time" id="waktupsikotes" name="preference_time" class="w-full cursor-pointer rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none" placeholder="--:--" readonly />
                        <img src="{{ asset("assets/images/landing/asset-konseling/vector/clock.png") }}" class="absolute right-5 top-1/2 h-4 w-auto -translate-y-1/2 object-contain" onclick="document.getElementById('timepicker').focus()" />
                    </div>
                </div>

                <div class="flex flex-col space-y-1">
                    <p class="text-sm text-[#333333] sm:text-[17px]">Layanan Psikotes</p>
                    <div class="relative">
                        <select id="service" name="service" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none">
                            <option value="offline">Offline</option>
                            <option value="online">Online</option>
                        </select>
                        <img src="{{ asset("assets/images/landing/asset-konseling/vector/dropdown.png") }}" class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
                    </div>
                </div>

                <div class="flex flex-col space-y-1">
                    <p class="text-sm text-[#333333] sm:text-[17px]">Kategori Psikotes</p>
                    <div class="relative">
                        <select id="psikotest_category_id" name="psikotest_category_id" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none">
                            <option value=""></option>
                            @foreach ($psikotestCategoryTypes as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <img src="{{ asset("assets/images/landing/asset-konseling/vector/dropdown.png") }}" class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
                    </div>
                </div>

                <div class="flex flex-col space-y-1">
                    <p class="text-sm text-[#333333] sm:text-[17px]">Jenis Psikotes</p>
                    <div class="relative">
                        <select id="psikotest_type_id" name="psikotest_type_id" class="dropdown-select w-full cursor-pointer appearance-none rounded-lg border-none bg-[#F1F3F6] px-3 py-3 shadow-md focus:ring-[#3986A3] md:shadow-none">
                            <option value=""></option>
                        </select>
                        <img src="{{ asset("assets/images/landing/asset-konseling/vector/dropdown.png") }}" class="dropdown-icon pointer-events-none absolute right-5 top-1/2 h-2 w-auto -translate-y-1/2 object-contain transition-transform duration-300" />
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
                        <button type="submit" class="text-md w-full rounded-xl bg-gradient-to-r from-[#3986A3] to-[#225062] px-24 py-2 text-white max-sm:text-[15px] sm:w-auto">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Mengatur input tanggal dan waktu
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#tglpsikotes', {
                dateFormat: 'd/m/Y',
                allowInput: true,
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#waktupsikotes', {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
                time_24hr: true,
            });
        });

        // Mengatur input jenis, kategoori, harga, dan layanan psikotes
        const psikotestTypes = @json($psikotestTypes);
        const categorySelect = document.getElementById('psikotest_category_id');
        const typeSelect = document.getElementById('psikotest_type_id');
        const priceInput = document.getElementById('price');

        // Format currency function
        function formatCurrency(amount) {
            return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        categorySelect.addEventListener('change', function () {
            const selectedCategoryId = this.value;
            const filteredTypes = psikotestTypes.filter((type) => type.category_psikotest_type_id == selectedCategoryId);

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
