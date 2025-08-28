@extends(
    "landing.layouts.test",
    [
        "title" => "Tes Complete",
    ]
)

@section("content")
    <section>
        <div class="relative flex h-screen w-screen items-center justify-center overflow-hidden bg-cover bg-center md:bg-cover md:bg-center" style="background-image: url('{{ asset("assets/auth/images/Login.png") }}')">
            <div class="h-[550px] w-[1227.33px] rounded-[20px] border-[1.33px] border-sky-100 bg-white/40 backdrop-blur-[6.67px]">
                <div class="relative flex flex-row items-center px-[55.33px] pt-[23.33px]">
                    <!-- Logo kiri -->
                    <div class="flex flex-row gap-4 rounded-[50px] bg-gradient-to-b from-[#F7B23B] to-[#916823] p-[1px]">
                        <div class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-white px-[19.92px] py-[7.47px]">
                            <img src="{{ asset("assets/auth/images/logo-berbinar.png") }}" class="h-[34.36px] w-[33.36px]" />
                            <img src="{{ asset("assets/auth/images/psikotest.png") }}" class="h-[34.36px] w-[33.36px]" />
                        </div>
                    </div>
                </div>

                <!-- Teks dan tombol -->
                <div class="flex h-full w-full flex-col items-center justify-start gap-12 px-6 pt-4">
                    <img src="{{ asset("assets/landing/images/psikotes-paid/psikotes-ikon-piala.png") }}" alt="congrats" class="h-[275px] w-[225px]" />
                    <h1 class="-mt-7 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans text-xl font-bold text-transparent">Selamat, Anda telah menyelesaikan Tes!</h1>
                    <a href="{{ route("psikotes-paid.tools.index", ["tes" => "selesai"]) }}" class="flex h-[35px] w-[200px] items-center justify-center rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-xs font-bold text-white">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("script")
    <script>
        localStorage.removeItem('target-time');
        localStorage.removeItem('section-order');
        localStorage.removeItem('checkpoint_deadline');
    </script>
@endpush
