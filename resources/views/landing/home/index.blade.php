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

        .text-gradient-blue {
            background: linear-gradient(to right, #3986a3, #15323d);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>

    <div class="bg-cover bg-center bg-no-repeat">
        <!-- Hero Section Start -->
        <section class="flex h-screen w-full flex-col items-center justify-center gap-10 text-center">
            <!-- Judul -->
            <h1 class="font-plusJakartaSans text-[24px] font-bold text-[#333333] md:text-4xl">
                Tingkatkan Potensi dengan
                <br />
                Psikotes
                <span class="text-gradient-blue">Berbinar</span>
            </h1>

            <!-- Gambar-gambar -->
            <div class="flex flex-wrap items-center justify-center gap-10 md:mt-2 md:gap-[106px]">
                @php
                    $items = [
                        ["img" => "Individu", "label" => "Individu"],
                        ["img" => "Perusahaan", "label" => "Perusahaan"],
                        ["img" => "Komunitas", "label" => "Komunitas"],
                        ["img" => "Pendidikan", "label" => "Pendidikan"],
                    ];
                @endphp

                @foreach ($items as $item)
                    <div class="flex flex-col items-center gap-1 md:gap-2">
                        <img src="{{ asset("assets/landing/images/psikotes/{$item["img"]}.png") }}" alt="{{ $item["label"] }}" class="h-[110px] w-[110px] md:h-[150px] md:w-[150px]" />
                        <p class="text-gradient font-plusJakartaSans text-base font-semibold leading-normal md:text-[28px]">{{ $item["label"] }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-5 flex flex-col items-center gap-4 md:mt-1 md:flex-row md:gap-8">
                <button onclick="openModal()" class="w-[320px] rounded-xl bg-gradient-to-r from-[#3986A3] to-[#15323D] px-5 py-3 font-plusJakartaSans text-lg font-semibold text-white md:w-auto md:text-2xl">Ikuti Tes Kepribadian Berbayar</button>
                <button class="w-[320px] rounded-xl bg-gradient-to-r from-[#F7B23B] to-[#916823] px-5 py-3 font-plusJakartaSans text-lg font-semibold text-white md:w-auto md:text-2xl">Ikuti Tes Kepribadian Gratis</button>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Pop-up -->
        <div id="popUp" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4">
            <div class="relative w-full max-w-[374px] rounded-lg bg-white p-6 text-center">
                <!-- Tombol Tutup -->
                <button onclick="closeModal()" class="absolute right-4 top-4" aria-label="Tutup pop-up">
                    <div class="flex size-6 items-center justify-center overflow-hidden rounded-sm bg-white outline outline-1 outline-offset-[-1px] outline-zinc-400">
                        <img src="{{ asset("assets/landing/images/psikotes/Icon.png") }}" alt="Tutup" class="h-3 w-3" />
                    </div>
                </button>

                <!-- Isi Modal -->
                <img src="{{ asset("assets/landing/images/psikotes/singa-pensil.png") }}" alt="" class="mx-auto mb-4 h-[185px] w-[185px]" />
                <h2 class="mb-2 font-plusJakartaSans text-[21px] font-bold text-[#333333]">Akses Psikotes anda</h2>
                <h4 class="font-plusJakartaSans text-base font-medium text-[#333333]">Silakan masuk jika sudah memiliki akun, atau lakukan pendaftaran</h4>
                <div class="mt-6 flex justify-center gap-4">
                    <button class="flex h-[45px] w-[145px] items-center justify-center rounded-xl border-2 border-[#106681] bg-white font-plusJakartaSans text-lg font-semibold text-[#106681]">Masuk</button>
                    <button class="flex h-[45px] w-[145px] items-center justify-center rounded-xl border-2 bg-gradient-to-r from-[#3986A3] to-[#15323D] font-plusJakartaSans text-lg font-semibold text-white">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Script -->
    <script>
        function openModal() {
            document.getElementById('popUp').classList.remove('hidden');
            document.getElementById('popUp').classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeModal() {
            document.getElementById('popUp').classList.remove('flex');
            document.getElementById('popUp').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    </script>
@endsection
