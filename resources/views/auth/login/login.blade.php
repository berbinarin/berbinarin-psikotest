@extends(
    "auth.layouts.app",
    [
        "title" => "Login Dashboard",
    ]
)

@section("content")
    <section class="h-screen w-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset("assets/auth/images/loginbg.png") }}')">
        <!-- icon -->
        <div class="ml-14 mt-12 mb-2 flex flex-row items-center justify-start gap-4">
            <img src="{{ asset("assets/auth/images/logo-berbinar.png") }}" alt="Logo Berbinar" class="h-[75px] w-[75px]" />
            <h4 class="font-plusJakartaSans font-bold text-[#3986A3]">PT Berbinar Insightful Indonesia</h4>
        </div>

        <!-- Form Login -->
        <form action="{{ route('auth.authenticate') }}" method  ="post">
            @csrf
            <input type="hidden" name="login_type" value="admin">
            <div class="flex items-center justify-center">
                <div class="w-[500px] rounded-2xl bg-white p-8 shadow-[0px_1px_4px_0px_rgba(12,12,13,0.05)]">
                    <!-- Judul & Deskripsi -->
                    <div class="text-center">
                        <h1 class="font-plusJakartaSans text-2xl font-bold text-[#1E1E1E]">
                            Welcome to
                            <br />
                            Dashboard Admin Berbinarin
                        </h1>
                        <p class="mt-3 text-base font-normal text-[#736565]">Masuk ke dashboard dan lakukan manajemen data secara menyeluruh untuk keperluan admin, konten, dan informasi di website Berbinarin.</p>
                    </div>

                    <!-- Garis Horizontal -->
                    <div class="mx-auto mt-4 w-full border-t border-[#CCCCCC]"></div>

                    <!-- Form Pengisian -->
                    <div class="mt-4 flex flex-col gap-4">
                        <!-- Username -->
                        <div class="flex flex-col gap-1">
                            <label class="text-base font-normal text-[#1E1E1E]">Username</label>
                            <div class="flex h-10 items-center rounded-lg bg-white px-4 outline outline-1 outline-stone-300/80">
                                <img class="mr-3 size-6" src="assets/auth/images/Circled Envelope.png" alt="Username Icon" />
                                <input type="text" name="username" placeholder="Username" class="flex-1 border-none bg-transparent text-base text-[#A9A7A7] outline-none placeholder:translate-y-[1px] placeholder:text-base focus:border-none focus:outline-none focus:ring-0" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="flex flex-col gap-1">
                            <label class="text-base font-normal text-[#1E1E1E]">Password</label>
                            <div class="flex h-10 items-center rounded-lg bg-white px-4 outline outline-1 outline-stone-300/80">
                                <img class="mr-3 size-6" src="assets/auth/images/Secure.png" alt="Password Icon" />
                                <input type="password" name="password" placeholder="Password" class="flex-1 border-none bg-transparent text-base text-[#A9A7A7] outline-none placeholder:translate-y-[1px] placeholder:text-base focus:border-none focus:outline-none focus:ring-0" />
                            </div>
                        </div>

                        <!-- Tombol Login -->
                        <button type="submit" class="mt-4 h-12 rounded-xl bg-cyan-700 text-base font-bold text-white transition hover:bg-cyan-800">Sign In</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Copyright -->
        <div class="mr-24 mt-8 text-end text-lg font-bold text-[#3986A3]">
            <h4>© 2025, Berbinar.in</h4>
        </div>
    </section>
@endsection
