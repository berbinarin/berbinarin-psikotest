@extends(
    "landing.layouts.test",
    [
        "title" => "Tes 1",
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

                    <!-- Judul tengah -->
                    <h1 class="absolute left-1/2 top-[65%] -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans text-[26.67px] font-bold text-transparent">Tes 01</h1>
                </div>

                <!-- Teks dan tombol -->
                <div class="flex h-full w-full flex-col items-center justify-start px-6 pt-12">
                    <p class="w-[565.33px] text-justify font-plusJakartaSans text-[13.33px] font-normal">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur accusamus adipisci sequi rem fuga officia excepturi ea nihil enim maiores odit earum perspiciatis sint, rerum minima quibusdam corrupti alias nobis? Placeat optio incidunt expedita harum recusandae repellendus soluta quisquam voluptates obcaecati quos ullam esse corrupti cum reiciendis magnam, unde, animi, alias ea eaque? Esse dolore dicta sed nostrum ratione quaerat voluptates temporibus! A vitae modi omnis cumque ullam natus eum, animi earum. Necessitatibus autem voluptas ipsum eos illo modi sed tempore nisi vero, omnis quos facilis. Commodi nihil incidunt mollitia?</p>
                    <button class="mt-6 h-[43.67px] w-[136px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selanjutnya</button>
                </div>
            </div>
        </div>
    </section>
@endsection
