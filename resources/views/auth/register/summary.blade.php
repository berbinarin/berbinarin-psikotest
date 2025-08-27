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
    </style>
@endpush

@section("content")
    <div class="mx-4 mb-8 mt-24 flex flex-col justify-center rounded-3xl bg-none px-12 py-6 shadow-none max-md:px-1 sm:mx-24 sm:mb-20 sm:mt-36 md:bg-white md:shadow-lg">
        <div class="flex justify-end">
            <div class="flex cursor-pointer items-center space-x-1" id="openModal">
                <img src="{{ asset("assets\landing\images\sk-vector.png") }}" alt="Syarat & Ketentuan" class="h-3 w-auto" />
                <p class="text-[15px] font-semibold text-[#3986A3]">
                    <span class="hidden sm:block">Syarat & Ketentuan</span>
                    <span class="block sm:hidden">S&K</span>
                </p>
            </div>
        </div>

        <!-- Modal -->
        <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
            <div class="max-h-[90vh] w-[90%] max-w-4xl rounded-2xl bg-white p-8 shadow-lg max-sm:overflow-y-auto max-sm:p-4">
                <!-- Judul Utama -->
                <div class="overflow-y-auto">
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

        <div class="flex flex-col space-y-4">
            <h1 class="text-gradient text-bold text-center text-3xl font-semibold max-sm:mx-2 max-sm:text-[29px]">Terima Kasih</h1>
            <div class="flex items-center justify-center">
                <img src="{{ asset("assets\landing\logo\logo-berbinar.png") }}" alt="Berbinar" class="h-[120px] w-[120px] object-contain" />
            </div>
            <p class="text-gradient text-center text-xl font-medium max-sm:mx-2 max-sm:text-xl">
                Untuk SobatBinar yang ingin mengetahui kepribadian lebih dalam atau ingin mengetahui aspek-aspek psikologis lain seperti, minat bakat, tes kecocokan pasangan, tes penjurusan, dan lainnya bisa ditemukan di Berbinar Insightfull Indonesia.
                <br />
                <br />
                Jika ada hal yang ingin disampaikan atau mengalami kendala selama pengerjaan psikotes berlangsung, silahkan hubungi narahubung di
                <b>0895323303487 (Indah)</b>
            </p>
        </div>

        <div class="flex items-center justify-center pt-10">
            <a href="{{ route("home.index") }}" class="flex w-full justify-center">
                <button class="text-md w-full rounded-xl bg-gradient-to-r from-[#3986A3] to-[#225062] px-24 py-2 text-white max-sm:text-[15px] sm:w-auto">Beranda</button>
            </a>
        </div>
    </div>
@endsection

@push("script")
    <script>
        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('modal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
@endpush
