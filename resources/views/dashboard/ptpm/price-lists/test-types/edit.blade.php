@extends(
    "dashboard.layouts.app",
    [
        "title" => "Edit Jenis Test",
    ]
)

@section("content")
<section class="flex w-full flex-col">
    <div class="py-4 md:pb-7 md:pt-12">
        <div>
            <div class="mb-2 flex items-center gap-2">
                <a href="{{ url()->previous() }}">
                    <img src="{{ asset('assets/dashboard/images/back-btn.png') }}" alt="Back Button" />
                </a>
                <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Edit Jenis Test</p>
            </div>
            <p class="text-disabled py-2">Ubah data jenis test untuk kategori <b>{{ $category->name }}</b>.</p>
        </div>
    </div>
    
    <div class="rounded-[24px] bg-white px-10 py-7">
        <form action="{{ route('dashboard.test-types.update', [$category->id, $testType->id]) }}" method="POST" class="flex flex-col gap-6">
            @csrf
            @method('PUT')
            <input type="hidden" name="test_category_id" value="{{ $category->id }}">
            
            <div class="flex flex-col">
                <label class="mb-2 font-bold text-[#9b9b9b]">Nama Jenis Test</label>
                <input 
                    type="text" 
                    name="name" 
                    class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" 
                    value="{{ old('name', $testType->name) }}" 
                    required
                    placeholder="Nama Jenis Test"
                >
            </div>
            
            <div class="flex flex-col">
                <label class="mb-2 font-bold text-[#9b9b9b]">Harga</label>
                <input 
                    type="number" 
                    name="price" 
                    class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" 
                    value="{{ old('price', $testType->price) }}" 
                    required
                    placeholder="Harga"
                >
            </div>
            
            <div class="flex flex-col">
                <label class="mb-2 font-bold text-[#9b9b9b]">Deskripsi</label>
                <textarea 
                    name="description" 
                    class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" 
                    rows="4"
                    placeholder="Deskripsi"
                >{{ old('description', $testType->description) }}</textarea>
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
        <p class="mb-6 text-lg">Apakah Anda yakin ingin membatalkan perubahan data ini?</p>
        <div class="flex justify-center gap-4">
            <button id="confirmCancel" class="rounded-lg bg-[#3986A3] px-6 py-2 text-white">OK</button>
            <button id="cancelCancel" class="rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3]">Cancel</button>
        </div>
    </div>
</div>
@endsection

@section('script')
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
            window.location.href = '{{ url()->previous() }}';
        });

        cancelCancel.addEventListener('click', function () {
            confirmModal.classList.add('hidden');
        });
    });
</script>
@endsection