@extends(
    "dashboard.layouts.psikotes-tool",
    [
        "title" => "Dashboard RMIB",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="w-full">
                <div class="py-4 md:pb-7 md:pt-12">
                    <div>
                        <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Dashboard Alat Tes {{ $tool->name }}</p>
                        <p class="text-disabled w-2/4">Dashboard ini memberikan informasi mengenai jumlah pengguna yang telah menyelesaikan proses pengumpulan.</p>
                    </div>
                </div>
                <div class="h-full w-full rounded-lg bg-white p-7 shadow-md" style="height: 150%">
                    <div class="relative flex h-1/2 w-1/2 flex-col justify-between rounded-lg p-6 text-white" style="background-color: #6482ad">
                        <h3 class="block text-2xl font-bold">{{ $tool->name }}</h3>
                        <div>
                            <p class="block text-4xl font-bold text-white">{{ $tool->sessions->count() }}</p>
                            <p>User</p>
                        </div>
                        <span class="absolute bottom-2 right-2 p-6 text-xl">9999</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
