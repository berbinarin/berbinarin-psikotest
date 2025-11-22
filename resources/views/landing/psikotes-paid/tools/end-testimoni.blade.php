@extends(
    "landing.layouts.test",
    [
        "title" => "Tes Complete",
    ]
)

@section("content")
    <section>
        <div class="relative flex h-screen w-screen items-center justify-center overflow-hidden bg-cover bg-center md:bg-cover md:bg-center" style="background-image: url('{{ asset("assets/auth/images/Login.webp") }}')">
            <div class="h-[550px] w-[1227.33px] rounded-[20px] border-[1.33px] border-sky-100 bg-white/40 backdrop-blur-[6.67px]">
                <div class="relative flex flex-row items-center px-[55.33px] pt-[23.33px]">
                    <!-- Logo kiri -->
                    <div class="flex flex-row gap-4 rounded-[50px] bg-gradient-to-b from-[#F7B23B] to-[#916823] p-[1px]">
                        <div class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-white px-[19.92px] py-[7.47px]">
                            <img src="{{ asset("assets/auth/images/logo-berbinar.webp") }}" class="h-[34.36px] w-[33.36px]" />
                            <img src="{{ asset("assets/auth/images/psikotest.webp") }}" class="h-[34.36px] w-[33.36px]" />
                        </div>
                    </div>
                </div>

                <!-- Teks dan tombol -->
                <div class="flex h-full w-full flex-col items-center justify-start gap-12 px-6 pt-12">
                    <img src="{{ asset("assets/landing/images/psikotes-paid/congrats.webp") }}" alt="congrats" class="w-lg h-56" />
                    <h1 class="bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans text-[26.67px] font-bold text-transparent">Terima kasih atas testimoni yang diberikan!</h1>
                    <button class="-mt-4 h-[35px] w-[200px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-xs font-bold text-white">Kembali ke Beranda</button>
                </div>
            </div>
        </div>
    </section>
@endsection
