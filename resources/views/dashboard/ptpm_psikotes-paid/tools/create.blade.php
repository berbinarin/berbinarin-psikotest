@extends(
    "dashboard.layouts.app",
    [
        "title" => "Alat Tes",
    ]
)

@section("content")
    <section class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-12">
            <div>
                <div class="flex items-center gap-2">
                    <a href="{{ route("dashboard.tools.index") }}">
                        <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                    </a>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Tambah Alat Tes</p>
                </div>
                <p class="text-disabled py-2">Fitur ini menambahkan data tes psikologi baru</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 rounded-[24px] bg-white px-10 py-7">
            <form action="{{ route("dashboard.tools.store") }}" method="POST" class="flex flex-col gap-10">
                @csrf
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="name" class="mb-2 font-bold text-[#9b9b9b]">Nama Alat Tes</label>
                        <input type="text" name="name" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Nama Alat Tes" value="{{ old("name") }}" required />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="order" class="mb-2 font-bold text-[#9b9b9b]">Nomor Alat Tes</label>
                        <input type="text" name="order" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Nomor Alat Tes" value="{{ old("order") }}" required />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="token" class="mb-2 font-bold text-[#9b9b9b]">Token</label>
                        <div class="flex gap-2">
                            <input type="text" name="token" id="tokenInput" class="w-full rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Token" value="{{ old("token") }}" required />
                            <button type="button" id="generateToken" class="rounded-md bg-blue-500 px-4 py-3 text-sm font-semibold text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Generate</button>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex gap-4 border-t-2 border-t-gray-400 pt-5">
                    <button type="submit" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg" style="width: 50%; background: #3986a3; color: #fff">Simpan</button>
                    <button type="button" id="cancelButton" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg" style="width: 50%; border: 2px solid #3986a3; color: #3986a3">Batal</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-md rounded-lg bg-white p-6 text-center">
            <div class="mb-4 flex justify-center">
                <img src="{{ asset("assets/dashboard/images/warning.svg") }}" alt="Warning Icon" class="h-12 w-12" />
            </div>
            <p class="mb-6 text-lg">Apakah Anda yakin ingin membatalkan penambahan data ini?</p>
            <div class="flex justify-center gap-4">
                <button id="confirmCancel" class="rounded-lg bg-[#3986A3] px-6 py-2 text-white">OK</button>
                <button id="cancelCancel" class="rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3]">Cancel</button>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cancelButton = document.getElementById('cancelButton');
            const confirmModal = document.getElementById('confirmModal');
            const confirmCancel = document.getElementById('confirmCancel');
            const cancelCancel = document.getElementById('cancelCancel');

            cancelButton.addEventListener('click', function (e) {
                e.preventDefault();
                confirmModal.classList.remove('hidden');
            });

            confirmCancel.addEventListener('click', function () {
                window.location.href = '{{ route("dashboard.tools.index") }}';
            });

            cancelCancel.addEventListener('click', function () {
                confirmModal.classList.add('hidden');
            });
        });
    </script>
@endsection
