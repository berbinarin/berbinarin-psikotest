@extends(
    "landing.layouts.test",
    [
        'title' => 'Tes ' . str_pad($tool->order, 2, '0', STR_PAD_LEFT),
    ]
)

@section("content")
    <section>
        <div class="relative flex h-screen w-screen items-center justify-center overflow-hidden bg-cover bg-center md:bg-cover md:bg-center" style="background-image: url('{{ asset("assets/auth/images/Login.webp") }}')">
            <div class="flex flex-col h-[550px] w-[1227.33px] rounded-[20px] border-[1.33px] border-sky-100 bg-white/40 backdrop-blur-[6.67px]">
                <div class="relative flex items-center px-[55.33px] pt-[23.33px]">
                    <!-- Logo kiri -->
                    <div class="flex flex-row gap-4 rounded-[50px] bg-gradient-to-b from-[#F7B23B] to-[#916823] p-[1px]">
                        <div class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-white px-[19.92px] py-[7.47px]">
                            <img src="{{ asset("assets/auth/images/logo-berbinar.webp") }}" class="h-[34.36px] w-[33.36px]" />
                            <img src="{{ asset("assets/auth/images/psikotest.webp") }}" class="h-[34.36px] w-[33.36px]" />
                        </div>
                    </div>

                    <!-- Judul tengah -->
                    <h1 class="absolute left-1/2 top-[65%] -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans text-[26.67px] font-bold text-transparent">Tes {{ str_pad($tool->order, 2, "0", STR_PAD_LEFT) }}</h1>
                </div>

                <!-- Teks dan tombol -->
                <div class="flex h-full w-full flex-col items-center justify-start px-6 pt-12 ">
                    <div class="flex-1 w-[565.33px] text-justify font-plusJakartaSans text-[13.33px] font-normal">{!! $tool->introduce !!}</div>
                    <a href="{{ route('psikotes-paid.attempt.question') }}" class="mt-6 mb-8 flex h-[43.67px] w-[136px] items-center justify-center rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selanjutnya</a>
                </div>
            </div>
        </div>
    </section>
@endsection
