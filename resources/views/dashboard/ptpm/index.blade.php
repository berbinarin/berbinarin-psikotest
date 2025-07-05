@extends("dashboard.layouts.app",
    [
        "title" => "Dashboard",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="py-10">
                    <div class="">
                        <p class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Dashboard PsikotestPaid</p>
                        <p class="text-disabled w-2/4">Dashboard</p>
                    </div>
                </div>
            </div>

            <div class="md-20 ml-20 grid w-full grid-cols-2 gap-8 rounded-lg bg-gray-100 p-8 shadow-lg">
                <div class="flex w-full flex-col items-center justify-between rounded-lg bg-[#6482AD] p-10 shadow-lg">
                    <div class="flex w-full flex-row justify-between">
                        <div class="block text-2xl font-semibold text-white">Individu</div>
                        <i class="bx bxs-user text-3xl text-white"></i>
                    </div>
                    <div class="mt-4 flex w-full flex-col items-start justify-start">
                        <span class="block text-4xl font-bold text-white"></span>
                        <span class="block text-2xl font-semibold text-white">Pendaftar</span>
                    </div>
                </div>

                <div class="flex w-full flex-col items-center justify-between rounded-lg bg-[#7FA1C3] p-10 shadow-lg">
                    <div class="flex w-full flex-row justify-between">
                        <div class="block text-2xl font-semibold text-white">Instansi Pendidikan</div>
                        <i class="bx bxs-graduation text-3xl text-white"></i>
                    </div>
                    <div class="mt-4 flex w-full flex-col items-start justify-start">
                        <span class="block text-4xl font-bold text-white"></span>
                        <span class="block text-2xl font-semibold text-white">Pendaftar</span>
                    </div>
                </div>

                <div class="flex w-full flex-col items-center justify-between rounded-lg bg-[#85B3E2] p-10 shadow-lg">
                    <div class="flex w-full flex-row justify-between">
                        <div class="block text-2xl font-semibold text-white">Perusahaan</div>
                        <i class="bx bxs-business text-3xl text-white"></i>
                    </div>
                    <div class="mt-4 flex w-full flex-col items-start justify-start">
                        <span class="block text-4xl font-bold text-white"></span>
                        <span class="block text-2xl font-semibold text-white">Pendaftar</span>
                    </div>
                </div>

                <div class="flex w-full flex-col items-center justify-between rounded-lg bg-[#94c8fb] p-10 shadow-lg">
                    <div class="flex w-full flex-row justify-between">
                        <div class="block text-2xl font-semibold text-white">Komunitas</div>
                        <i class="bx bxs-group text-3xl text-white"></i>
                    </div>
                    <div class="mt-4 flex w-full flex-col items-start justify-start">
                        <span class="block text-4xl font-bold text-white"></span>
                        <span class="block text-2xl font-semibold text-white">Pendaftar</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
