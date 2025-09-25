@extends('auth.layouts.app', [
    'title' => 'Psikotes Berbinar',
])

@section('content')
    <section>
        <div class="relative h-screen w-screen bg-none md:bg-cover md:bg-center"
            style="background-image: url('{{ asset('assets/auth/images/Login.png') }}')">
            <div class="flex flex-col items-center justify-center">
                <!-- Logo -->
                <div
                    class="mt-[15px] flex flex-row items-center justify-center gap-4 rounded-[50px] bg-gradient-to-b from-[#F7B23B] to-[#916823] p-[1px] px-[2px] py-[2px] md:mt-[48px]">
                    <div
                        class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-white px-[19.92px] py-[7.47px] md:gap-6 md:px-8 md:py-[10px]">
                        <img src="{{ asset('assets/auth/images/logo-berbinar.png') }}" alt="logo berbinar"
                            class="h-[34.36px] w-[33.36px] md:h-[42px] md:w-[40px]" />
                        <img src="{{ asset('assets/auth/images/psikotest.png') }}" alt="psikotest"
                            class="h-[34.36px] w-[33.36px] md:h-[46px] md:w-[44px]" />
                    </div>
                </div>

                {{-- Cek apakah ada error dengan key 'message' --}}
                {{-- @if ($errors->has('message'))
                    {{-- Jika ada, tampilkan dalam sebuah kotak alert --}}
                {{-- <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ $errors->first('message') }}</span>
                    </div> --}}
                @endif --}}


                <!-- div Form Login -->
                <form action="{{ route('auth.authenticate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="login_type" value="user" />

                    <div class="mt-[101px] flex flex-col items-center justify-center md:mt-[100.67px]">
                        <div
                            class="h-[246.46px] w-[320px] rounded-[10px] border border-[#E0E0E0] bg-white font-plusJakartaSans drop-shadow-lg md:h-[293px] md:w-[450.67px] md:rounded-[13.33px]">
                            <!-- Title -->
                            <div
                                class="mt-[21.92px] flex flex-col items-center justify-center gap-[2.19px] text-center md:mt-[26.67px] md:gap-[2.67px]">
                                <h1 class="text-xl font-bold text-black md:text-[26px]">Masuk</h1>
                                <h5 class="text-sm font-normal text-[#757575] md:text-[11]">Selamat Datang di Psikotest
                                    Berbinar</h5>
                            </div>
                            <!-- Form pengisian -->
                            <div class="mt-[21.92px] flex items-center justify-center md:mt-[26.67px]">
                                <div
                                    class="flex flex-col items-center justify-center gap-[10.96px] font-plusJakartaSans font-normal md:gap-[13.33px]">
                                    <!-- Username -->
                                    <div class="relative h-[36.72px] w-[240px] md:h-[44.67px] md:w-[280px]">
                                        <label
                                            class="absolute -top-1 left-3 bg-white px-1 text-[10px] text-[#BDBDBD] peer-focus:text-[#424242]">Username</label>
                                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                                            class="peer w-full rounded-[5px] border border-[#BDBDBD] bg-white px-[10px] py-[8px] text-[12px] focus:border-[#424242] focus:outline-none focus:ring-0" />
                                    </div>

                                    <!-- Password -->
                                    <div class="relative h-[36.72px] w-[240px] md:h-[44.67px] md:w-[280px]">
                                        <label
                                            class="absolute -top-1 left-3 bg-white px-1 text-[10px] text-[#BDBDBD] peer-focus:text-[#424242]">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="peer w-full rounded-[5px] border border-[#BDBDBD] bg-white px-[10px] py-[8px] text-[12px] outline-none focus:border-[#424242] focus:outline-none focus:ring-0" />
                                    </div>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="mt-[26.67px] flex items-center justify-center">
                                <button type="submit"
                                    class="h-[30.69px] w-[240px] rounded-[4.38px] bg-[#106681] font-plusJakartaSans text-[12px] font-bold text-white md:h-[37.33px] md:w-[253.33px] md:rounded-[5.33px]">Log
                                    In</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Footer hanya di mobile -->
            <div class="mt-auto w-full md:hidden">
                <img src="{{ asset('assets/auth/images/Footer - Section.png') }}" alt="footer"
                    class="w-full object-cover" />
            </div>
        </div>
    </section>
@endsection

@push('script')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: 'Username atau Password Salah',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
            });
        </script>
    @endif
@endpush
