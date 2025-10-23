@extends(
    "landing.layouts.test",
    [
        "title" => "Psikotes Paid",
    ]
)

@push("style")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

@section("content")
    @if(request()->query('tes') === 'selesai')
        @php
            session()->now('alert', true);
            session()->now('icon', asset('assets/dashboard/images/success.png'));
            session()->now('type', 'success');
            session()->now('title', 'Anda telah menyelesaikan tes!');
            session()->now('message', '');
        @endphp
    @endif

    @include('components.alert')
    @include('components.confirm', ['type' => 'logout'])
    <!-- Pindahkan x-data ke div utama -->
    <div x-data="{ open: false, toolId: null }" class="relative bg-none md:min-h-screen md:bg-cover md:bg-center" style="background-image: url('{{ asset("assets/auth/images/Login.png") }}')">
        <!-- Header & Sambutan -->
        <div class="flex justify-between">
            <div class="mx-8 mt-5">
                @if (auth()->user()->testimonials->count() > 0)
                    <button class="flex h-12 w-28 cursor-not-allowed items-center justify-center rounded-xl bg-primary font-semibold text-white disabled:opacity-75" disabled>Testimoni</button>
                @else
                    <a href="{{ route("psikotes-paid.testimonial.index") }}" class="flex h-12 w-28 items-center justify-center rounded-xl bg-primary font-semibold text-white transition-all hover:opacity-90">Testimoni</a>
                @endif
            </div>

            <div class="flex flex-col items-center justify-center pt-5">
                <!-- Logo -->
                <div class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-gradient-to-b from-[#F7B23B] to-[#916823] p-[1px]">
                    <div class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-white px-[19.92px] py-[7.47px]">
                        <img src="{{ asset("assets/auth/images/logo-berbinar.png") }}" class="h-[34.36px] w-[33.36px]" />
                        <img src="{{ asset("assets/auth/images/psikotest.png") }}" class="h-[34.36px] w-[33.36px]" />
                    </div>
                </div>

                <!-- Sambutan -->
                <div class="mt-4 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans font-bold text-transparent">
                    <h1 class="hidden text-[26.67px] md:block">Temukan Psikotes yang Tepat untukmu</h1>
                    <h1 class="block text-[24px] md:hidden">Discover Your Potential</h1>
                </div>
            </div>

            <div class="mx-8 mt-5">
                <form id="logout-form" action="{{ route("auth.logout") }}" method="POST">
                    @csrf
                    <button type="button" id="logout-button" class="flex h-12 w-28 items-center justify-center rounded-xl bg-primary font-semibold text-white transition-all hover:opacity-90">Keluar</button>
                </form>
            </div>
        </div>

        <!-- Swiper Section Fixed -->
        <section class="fixed bottom-0 left-0 right-0 top-[160px] mb-6">
            <div class="swiper mySwiper h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide !h-auto">
                        <div class="mx-auto grid h-full max-w-[700px] grid-cols-2 justify-items-center gap-x-1 gap-y-5 md:max-w-[1200px] md:grid-cols-4 md:gap-x-3">
                            @foreach ($tools as $tool)
                                <button type="button" @click="open = true; toolId = {{ $tool->id }}">
                                    <div class="relative h-[89.84px] w-[161.02px] rounded-[10px] bg-[#3986A3] text-white transition-all hover:opacity-85 md:h-[141.33px] md:w-[253.33px]">
                                        <span class="absolute left-3 top-1 z-10 font-plusJakartaSans text-[20px] font-bold text-[#F5F5F6] md:text-[33.33px]">Tes {{ str_pad($tool->order, 2, "0", STR_PAD_LEFT) }}</span>
                                        <span class="absolute -bottom-6 right-3 select-none font-sans text-[80px] font-extrabold text-white/20 md:-bottom-9 md:text-[120px]">
                                            {{ $tool->order }}
                                        </span>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
            <div class="relative h-[184.67px] w-[370.67px] rounded-[10.67px] bg-white shadow-lg">
                <!-- Tombol close -->
                <button @click="open = false" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">✕</button>

                <div class="flex flex-col items-center px-4 py-4">
                    <h2 class="mb-[13.33px] self-start font-plusJakartaSans font-medium text-black">Token Akses</h2>
                    <span class="mb-4 text-center font-plusJakartaSans text-sm font-normal text-[#344054]">Masukkan token akses untuk memulai tes!</span>

                    <form action="{{ route("psikotes-paid.tools.verify-token") }}" method="POST">
                        @csrf
                        <input type="text" name="token" class="mb-5 h-[36px] w-[338.67px] rounded-lg border border-[#BDBDBD] bg-white px-3 py-2 font-plusJakartaSans text-[10.67px] font-normal focus:border-[#424242] focus:outline-none" placeholder="Token" />
                        <input type="hidden" name="tool_id" :value="toolId" />

                        <div class="flex justify-center">
                            <button class="h-[27.33px] w-[116.67px] rounded-[5.33px] bg-[#106681] font-plusJakartaSans text-xs font-semibold text-white">Mulai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <!-- Footer hanya di mobile -->
            <div class="mt-auto w-full md:hidden">
                <img src="{{ asset("assets/auth/images/Footer - Section.png") }}" alt="footer" class="w-full object-cover" />
            </div>
        </footer>
    </div>
@endsection

@push("script")
    {{-- Sweet Alert diganti: hapus Swal, hanya bersihkan query param 'tes' agar tidak men-trigger lagi --}}
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const tesStatus = urlParams.get('tes');
        if (tesStatus === 'selesai') {
            const url = new URL(window.location.href);
            url.searchParams.delete('tes');
            window.history.replaceState({}, document.title, url.toString());
        }

        document.getElementById("logout-button").addEventListener("click", function () {
            if (typeof showLogoutConfirm === 'function') {
                showLogoutConfirm();
            } else {
                if (confirm('Apakah Anda yakin ingin keluar?')) {
                    document.getElementById("logout-form").submit();
                }
            }
        });
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            direction: 'vertical',
            slidesPerView: 'auto',
            mousewheel: true,
            freeMode: true,
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
