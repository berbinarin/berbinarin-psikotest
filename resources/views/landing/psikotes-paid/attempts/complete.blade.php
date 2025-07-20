@extends(
    "landing.layouts.test",
    [
        "title" => "Tes Complete",
    ]
)

@section("content")
    <div class="container mx-auto">
        <div class="fixed left-0 top-0 -z-10 h-screen w-screen bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset("assets/landing/images/psikotes-paid/psikotes-soal-bg.png") }})"></div>

        <div class="relative flex h-[85vh] flex-col">
            <div class="flex flex-col items-center justify-center gap-7">
                <div class="mt-8 flex w-fit items-center gap-7 rounded-[70px] bg-white px-8 py-[10px]">
                    <img class="h-10 w-10" src="{{ asset("/assets/landing/images/psikotes-paid/logo-berbinar.png") }}" alt="Logo Berbinar" />
                    <img class="h-11 w-11" src="{{ asset("/assets/landing/images/psikotes-paid/logo-berbinar-psikotes.png") }}" alt="Logo Berbinar Psikotest" />
                </div>
            </div>
            
            <div class="flex flex-col flex-1 items-center justify-center">
                <img src="{{ asset("/assets/landing/images/psikotes-paid/psikotes-ikon-piala.png") }}" alt="Ikon" class="w-52 rounded-full" />
                <p class="text-center text-xl font-bold">Selamat! Kamu sudah menyelesaikan Tes!</p>

                <div class="mb-4 mt-10 flex justify-center">
                    <a href="{{ route('psikotes-paid.tools.index') }}" class="rounded-full bg-primary px-10 py-2 text-white hover:bg-blue-600 focus:bg-blue-600 focus:outline-none">Kembali ke Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        localStorage.removeItem('target-time');
    </script>
@endsection
