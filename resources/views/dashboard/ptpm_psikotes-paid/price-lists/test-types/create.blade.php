@extends(
    "dashboard.layouts.app",
    [
        "title" => "Tambah Jenis Tes",
    ]
)

@section("content")
    <section class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-5">
            <div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('dashboard.price-list.test-types.by-category', $category->id) }}">
                        <img src="{{ asset('assets/dashboard/images/back-btn.png') }}" alt="Back Button" />
                    </a>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">
                        Tambah Jenis Tes
                    </p>
                </div>
                <p class="text-gray-500 py-2">Silakan isi data jenis tes psikotes baru pada form berikut.</p>
            </div>
        </div>

        <div class="flex flex-col gap-10 rounded-[24px] bg-white shadow px-10 py-7">
            <form action="{{ route('dashboard.price-list.test-types.store', $category->id) }}" method="POST" class="flex flex-col gap-10">
                @csrf
                <div class="flex gap-10">
                    <div class="flex w-full flex-col">
                        <label for="name" class="mb-2 font-bold text-[#9b9b9b]">Nama Jenis Tes</label>
                        <input type="text" name="name" id="name" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Nama Jenis Tes" value="{{ old('name') }}" required />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="price" class="mb-2 font-bold text-[#9b9b9b]">Harga</label>
                        <div class="relative w-full">
                            <input type="number" name="price" id="price" class="w-full rounded-md border-0 px-6 pl-10 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Harga" value="{{ old('price') }}" required min="0" />
                            <p class="absolute top-[18px] left-3 text-sm -translate-y-1/3 text-gray-500 font-semibold">Rp. </p>

                        </div>
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="test_category_id" class="mb-2 font-bold text-[#9b9b9b]">Kategori</label>
                        <select name="test_category_id" id="test_category_id" class="appearance-none rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" required disabled>
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex w-full flex-col">
                        <label for="description" class="mb-2 font-bold text-[#9b9b9b]">Deskripsi</label>
                        <textarea name="description" id="description" rows="3" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Deskripsi">{{ old('description') }}</textarea>
                    </div>
                </div>
                <hr class="border-t-2 border-t-gray-400">
                <div class="flex gap-4">
                    <button type="button" id="cancelButton" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg" style="width: 50%; border: 2px solid #3986a3; color: #3986a3">Batal</button>
                    <button type="submit" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg" style="width: 50%; background: #3986a3; color: #fff">Simpan</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-md rounded-lg bg-white p-6 text-center">
            <div class="mb-4 flex justify-center">
                <img src="{{ asset('assets/dashboard/images/warning.svg') }}" alt="Warning Icon" class="h-12 w-12" />
            </div>
            <p class="mb-6 text-lg">Apakah Anda yakin ingin membatalkan penambahan data ini?</p>
            <div class="flex justify-center gap-4">
                <button id="confirmCancel" class="rounded-lg bg-[#3986A3] px-6 py-2 text-white">OK</button>
                <button id="cancelCancel" class="rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3]">Cancel</button>
            </div>
        </div>
    </div>
@endsection

@push("script")
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
                window.location.href = '{{ route('dashboard.price-list.test-types.by-category', $category->id) }}';
            });

            cancelCancel.addEventListener('click', function () {
                confirmModal.classList.add('hidden');
            });
        });
    </script>
@endpush
