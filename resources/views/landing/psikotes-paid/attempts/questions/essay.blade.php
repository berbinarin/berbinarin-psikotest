@extends(
    "landing.layouts.test",
    [
        "title" => "Tes 1",
    ]
)

@php
    $options = [
        "Saya bukan seorang pemurung",
        "Saya kadang merasa sedih tanpa sebab",
        "Saya mudah marah atau frustrasi",
        "Saya merasa bahagia dan tenang",
    ];
@endphp

@section("content")
    <section>
        <div class="relative flex h-screen w-screen items-center justify-center overflow-hidden bg-cover bg-center md:bg-cover md:bg-center" style="background-image: url('{{ asset("assets/auth/images/Login.png") }}')">
            <div class="h-[550px] w-[1227.33px] rounded-[20px] border-[1.33px] border-sky-100 bg-white/40 backdrop-blur-[6.67px]">
                <div class="relative flex flex-row items-center px-[55.33px] pt-[23.33px]">
                    <div class="flex flex-row gap-4 rounded-[50px] bg-gradient-to-b from-[#F7B23B] to-[#916823] p-[1px]">
                        <div class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-white px-[19.92px] py-[7.47px]">
                            <img src="{{ asset("assets/auth/images/logo-berbinar.png") }}" class="h-[34.36px] w-[33.36px]" />
                            <img src="{{ asset("assets/auth/images/psikotest.png") }}" class="h-[34.36px] w-[33.36px]" />
                        </div>
                    </div>

                    <h1 class="absolute left-1/2 top-[65%] -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans text-[26.67px] font-bold text-transparent">Tes 01</h1>
                </div>

                <div class="mx-auto mt-5 flex w-[565.33px] flex-col items-center gap-8 px-6 pt-12">
                    <div class="relative flex w-full flex-col items-center justify-center">
                        <div class="relative h-[6.67px] w-full rounded-md bg-[#D3D3D3]">
                            <div class="relative h-[6.67px] rounded-md bg-[#E9B306]" style="width: 40%">
                                <span class="absolute right-0 top-1/2 block h-[14.46px] w-[14.46px] -translate-y-1/2 translate-x-1/2 rounded-full bg-[#E9B306]"></span>
                            </div>
                        </div>
                        <span class="absolute -top-6 right-0 text-xs font-bold text-black">40%</span>
                    </div>

                    <div class="mx-auto flex w-full flex-col gap-4">
                        <p class="text-justify font-plusJakartaSans text-xs font-medium">Tuliskan satu pengalaman keberhasilan anda dalam menjalankan tugas, yang menurut anda merupakan tugas yang sangat sulit. Jelaskan tugas tersebut dan faktor-faktor yang membantu anda menemukan penyelesaian atas tugas yang sulit tersebut</p>
                        <textarea name="" id="" cols="30" rows="10" class="w-md border-1 h-[172px] rounded-[13px] border-[#9E9E9E] px-4 py-3 text-xs placeholder:font-plusJakartaSans placeholder:text-xs placeholder:font-normal placeholder:text-[#9E9E9E] focus:border-none focus:shadow-none focus:outline-none" placeholder="Ketik Jawaban Anda Disini....."></textarea>
                    </div>

                    <button class="mt-2 h-[43.67px] w-[136px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selanjutnya</button>
                </div>
            </div>
        </div>
    </section>
@endsection
