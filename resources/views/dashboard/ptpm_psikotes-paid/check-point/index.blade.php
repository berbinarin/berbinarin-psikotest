@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@section("content")
    <section class="w-full min-h-screen">
        <div class="py-4 md:pb-7 md:pt-5">
            <div>
                <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Dashboard <span class="italic">Checkpoint</span></p>
                <p class="text-gray-500 py-2">Fitur ini digunakan untuk menampilkan data soal, dan jawaban <span class="italic">checkpoint</span>.</p>
            </div>
        </div>

        <!-- Card Section -->
        <div class="mb-8 w-full flex flex-row justify-between gap-6">

            <a href="{{ route('dashboard.check-point.soal.index') }}" class="flex h-[145px] w-[90%] flex-row items-center rounded-xl bg-white p-6 shadow hover:bg-gray-100 transition">
                <div class="flex h-[104px] w-[119px] items-center justify-center rounded-lg bg-gray-100">
                    <img src="{{ asset("assets/dashboard/images/checkpoint-question.png") }}" alt="" class="w-16 h-16">
                </div>
                <div class="ml-6">
                    <p class="text-[28px] font-semibold text-gray-800">20</p>
                    <p class="text-[20px] text-gray-800">Soal <span class="italic">checkpoint</span></p>
                </div>
            </a>

            <a href="{{ route('dashboard.check-point.jawaban.index') }}" class="flex h-[145px] w-[90%] flex-row items-center rounded-xl bg-white p-6 shadow hover:bg-gray-100 transition">
                <div class="flex h-[104px] w-[119px] items-center justify-center rounded-lg bg-gray-100">
                    <img src="{{ asset("assets/dashboard/images/checkpoint-answer.png") }}" alt="" class="w-16 h-16">
                </div>
                <div class="ml-6">
                    <p class="text-[28px] font-semibold text-gray-800">30</p>
                    <p class="text-[20px] text-gray-800">Jawaban <span class="italic">checkpoint</span></p>
                </div>
            </a>

        </div>
    </section>
@endsection
