{{-- filepath: c:\laragon\www\kerja_new\berbinarin-psikotest\resources\views\dashboard\ptpm_psikotes-paid\kode_voucher\index.blade.php --}}
@extends(
    "dashboard.layouts.app",
    [
        "title" => "Kode Voucher",
    ]
)

@section("content")
<section class="flex w-full">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-12">
                <div>
                    <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Kode Voucher</p>
                    <p class="text-disabled">Halaman yang menampilkan dan mengelola Kode Voucher.</p>
                    <a href="javascript:void(0);" onclick="openCreateModal()" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <p class="text-dark font-medium leading-none">Tambah Data</p>
                    </a>
                </div>
            </div>
            <div class="rounded-md w-[80vw] bg-white mb-7 px-4 py-4 md:px-8 md:py-7 xl:px-10">
                <div class="mt-4 overflow-x-auto">
                    <table id="example" class="display" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Kategori Voucher</th>
                                <th style="text-align: center">Nama Voucher</th>
                                <th style="text-align: center">Kode Voucher</th>
                                <th style="text-align: center">Diskon (%)</th>
                                <th style="text-align: center">Tipe Voucher</th>
                                <th style="text-align: center">Detail Voucher</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $voucher->category }}</td>
                                    <td class="text-center">{{ $voucher->nama_voucher }}</td>
                                    <td class="text-center">{{ $voucher->code }}</td>
                                    <td class="text-center">{{ $voucher->percentage }}</td>
                                    <td class="text-center">{{ $voucher->tipe }}</td>
                                    <td class="text-center">{{ $voucher->detail }}</td>
                                    <td class="text-center flex flex-row justify-center gap-2">
                                        <a href="javascript:void(0);" onclick="openEditModal({{ $voucher->id }})"
                                            class="focus:ring-2 focus:ring-offset-2 inline-flex items-start justify-start p-3 bg-yellow-500 hover:bg-yellow-600 focus:outline-none rounded">
                                            <i class='bx bx-edit text-white'></i>
                                        </a>
                                        <button type="button" onclick="openDeleteModal({{ $voucher->id }})" class="focus:ring-2 focus:ring-offset-2 inline-flex items-start justify-start p-3 bg-red-500 hover:bg-red-600 focus:outline-none rounded">
                                            <i class="bx bx-trash-alt text-white"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Tambah Data -->
                    <div id="createModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
                        <div class="w-full max-w-lg rounded-xl bg-white p-6 text-center relative">
                            <button type="button" onclick="closeCreateModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                            <h3 class="mb-4 text-xl leading-6 text-black font-bold" id="modal-title">Add Kode Voucher</h3>
                            <form id="createForm" method="POST" action="{{ route('dashboard.kode_voucher.store') }}">
                                @csrf
                                <div class="flex flex-row justify-between gap-2 mb-5 mt-12">
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Kategori Voucher</label>
                                        <select name="category" id="kategoriVoucher" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <option value="umum">Umum</option>
                                            <option value="pelajar">Pelajar</option>
                                        </select>
                                    </div>
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Nama Voucher</label>
                                        <input type="text" name="nama_voucher" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berbinar123" required>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between gap-2 mb-5">
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Kode Voucher</label>
                                        <input type="text" name="code" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berbinar123" required>
                                    </div>
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Diskon</label>
                                        <span class="absolute right-10 translate-y-2 text-disabled text-base pointer-events-none">%</span>
                                        <input type="number" name="percentage" class="w-full rounded-lg border border-gray-300 px-3 py-2" min="1" max="100" placeholder="90" required>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between gap-2 mb-5">
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Tipe Voucher</label>
                                        <select name="tipe" id="tipeVoucher" class="w-full rounded-lg border border-gray-300 px-3 py-2" required onchange="updateDetailOptions('create')">
                                            <option value="" disabled selected>Pilih Tipe</option>
                                            <option value="tanggal">Tanggal</option>
                                            <option value="layanan_psikotest">Layanan Psikotest</option>
                                            <option value="kategori_psikotes">Kategori Psikotes</option>
                                        </select>
                                    </div>
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Detail Voucher</label>
                                        <select name="detail" id="detailVoucher" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                            <option value="" disabled selected>Pilih Detail</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="service_type" value="psikolog">
                                <div class="flex w-full justify-center gap-4">
                                    <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeCreateModal()">Batal</button>
                                    <button type="submit" class="rounded-lg bg-[#3986A3] w-1/2 px-6 py-2 text-white text-center hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Edit Data -->
                    <div id="editModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
                        <div class="w-full max-w-lg rounded-xl bg-white p-6 text-center relative">
                            <button type="button" onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                            <h3 class="mb-4 text-xl leading-6 text-black font-bold" id="modal-title">Edit Kode Voucher</h3>
                            <form id="editForm" method="POST" action="">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-row justify-between gap-2 mb-5 mt-12">
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Kategori Voucher</label>
                                        <select name="category" id="editKategoriVoucher" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                            <option value="" disabled>Pilih Kategori</option>
                                            <option value="umum">Umum</option>
                                            <option value="pelajar">Pelajar</option>
                                        </select>
                                    </div>
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Nama Voucher</label>
                                        <input type="text" name="nama_voucher" id="editNamaVoucher" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between gap-2 mb-5">
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Kode Voucher</label>
                                        <input type="text" name="code" id="editCode" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                    </div>
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Diskon</label>
                                        <span class="absolute right-10 translate-y-2 text-disabled text-base pointer-events-none">%</span>
                                        <input type="number" name="percentage" id="editPercentage" class="w-full rounded-lg border border-gray-300 px-3 py-2" min="1" max="100" required>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between gap-2 mb-5">
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Tipe Voucher</label>
                                        <select name="tipe" id="editTipeVoucher" class="w-full rounded-lg border border-gray-300 px-3 py-2" required onchange="updateDetailOptions('edit')">
                                            <option value="" disabled selected>Pilih Tipe</option>
                                            <option value="tanggal">Tanggal</option>
                                            <option value="layanan_psikotest">Layanan Psikotest</option>
                                            <option value="kategori_psikotes">Kategori Psikotes</option>
                                        </select>
                                    </div>
                                    <div class="text-left w-1/2">
                                        <label class="block mb-1 font-medium text-gray-600">Detail Voucher</label>
                                        <select name="detail" id="editDetailVoucher" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                            <option value="" disabled selected>Pilih Detail</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="service_type" value="psikolog">
                                <div class="flex w-full justify-center gap-4">
                                    <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeEditModal()">Batal</button>
                                    <button type="submit" class="rounded-lg bg-[#3986A3] w-1/2 px-6 py-2 text-white text-center hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Hapus -->
                    <div id="deleteModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
                        <div class="w-full max-w-md rounded-lg bg-white p-6 text-center">
                            <div class="mb-4 flex justify-center">
                                <img src="{{ asset('assets/dashboard/images/warning.svg') }}" alt="Warning Icon" class="h-12 w-12" />
                            </div>
                            <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900" id="modal-title">Konfirmasi Hapus</h3>
                            <p class="mb-6 text-base text-gray-500">Apakah Anda yakin ingin menghapus voucher ini?</p>
                            <div class="flex w-full justify-center gap-4">
                                <form id="deleteForm" method="POST" class="w-1/2">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="rounded-lg bg-[#3986A3] w-full px-6 py-2 text-white text-center hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Hapus</button>
                                </form>
                                <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeDeleteModal()">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section("script")
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }
    function closeCreateModal() {
        document.getElementById('createModal').classList.add('hidden');
        document.getElementById('createForm').reset();
        updateDetailOptions('create');
    }

    function openEditModal(id) {
    const voucher = @json($vouchers).find(v => v.id === id);
    if (!voucher) return;

    // Set form action ke route update
    document.getElementById('editForm').action = "{{ route('dashboard.kode_voucher.update', '') }}/" + id;

    document.getElementById('editKategoriVoucher').value = voucher.category;
    document.getElementById('editNamaVoucher').value = voucher.nama_voucher;
    document.getElementById('editCode').value = voucher.code;
    document.getElementById('editPercentage').value = voucher.percentage;
    document.getElementById('editTipeVoucher').value = voucher.tipe;
    updateDetailOptions('edit');
    document.getElementById('editDetailVoucher').value = voucher.detail;

    document.getElementById('editModal').classList.remove('hidden');
}
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editForm').reset();
        updateDetailOptions('edit');
    }

    let deleteModal = document.getElementById('deleteModal');
    let deleteForm = document.getElementById('deleteForm');
    function openDeleteModal(id) {
        // Gunakan route helper agar URL selalu benar
        document.getElementById('deleteForm').action = "{{ route('dashboard.kode_voucher.destroy', '') }}/" + id;
        deleteModal.classList.remove('hidden');
    }
    function closeDeleteModal() {
        deleteModal.classList.add('hidden');
        document.getElementById('deleteForm').action = '';
    }

    function updateDetailOptions(mode) {
        let tipeSelect, detailSelect;
        if (mode === 'create') {
            tipeSelect = document.getElementById('tipeVoucher');
            detailSelect = document.getElementById('detailVoucher');
        } else {
            tipeSelect = document.getElementById('editTipeVoucher');
            detailSelect = document.getElementById('editDetailVoucher');
        }

        const tipe = tipeSelect.value;
        let options = [];

        if (tipe === 'tanggal') {
            options = [
                { value: 'weekdays', text: 'Weekdays' },
                { value: 'weekend', text: 'Weekend' }
            ];
        } else if (tipe === 'layanan_psikotest') {
            options = [
                { value: 'online', text: 'Online' },
                { value: 'offline', text: 'Offline' }
            ];
        } else if (tipe === 'kategori_psikotes') {
            options = [
                { value: 'individu', text: 'Individu' },
                { value: 'komunitas', text: 'Komunitas' },
                { value: 'instansi pendidikan', text: 'Instansi Pendidikan' },
                { value: 'perusahaan', text: 'Perusahaan' }
            ];
        }

        detailSelect.innerHTML = '<option value="" disabled selected>Pilih Detail</option>';
        options.forEach(function(opt) {
            detailSelect.innerHTML += `<option value="${opt.value}">${opt.text}</option>`;
        });
    }

    function isKodeVoucherDuplicate(kode, id = null) {
        const vouchers = @json($vouchers);
        return vouchers.some(v => v.code.toLowerCase() === kode.toLowerCase() && (id === null || v.id !== id));
    }

    // Tambah Data
    document.getElementById('createForm').addEventListener('submit', function(e) {
        const kode = document.querySelector('#createForm input[name="code"]').value;
        if (isKodeVoucherDuplicate(kode)) {
            e.preventDefault();
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Kode voucher sudah digunakan!",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000
            });
            return false;
        }
    });

    // Edit Data
    document.getElementById('editForm').addEventListener('submit', function(e) {
        const kode = document.querySelector('#editForm input[name="code"]').value;
        const id = parseInt(document.getElementById('editForm').action.split('/').pop());
        if (isKodeVoucherDuplicate(kode, id)) {
            e.preventDefault();
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Kode voucher sudah digunakan!",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000
            });
            return false;
        }
    });
</script>
@endsection