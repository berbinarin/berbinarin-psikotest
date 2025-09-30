@extends(
    "dashboard.layouts.app",
    [
        "title" => "Kode Voucher",
    ]
)

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route("dashboard.voucher-code.index") }}">
                        <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Tambah Kode Voucher</p>
                </div>
                <p class="w-3/4 text-disabled">Halaman yang digunakan untuk menambahkan, mengelola, dan melengkapi kode voucher.</p>
            </div>
            <div class="rounded-md bg-white px-4 py-4 shadow-lg shadow-gray-400 md:px-8 md:py-7 xl:px-10">
                <form id="createForm" method="POST" action="{{ route("dashboard.voucher-code.store") }}">
                    @csrf

                    <div id="voucherContainer">
                        <div class="voucher-row">
                            <div class="mb-6 flex flex-row justify-between gap-2">
                                <div class="text-left w-1/2">
                                    <label class="block mb-1 font-medium text-gray-600">Kategori Voucher</label>
                                    <select name="category" id="createCategory" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        <option value="umum">Umum</option>
                                        <option value="pelajar">Pelajar</option>
                                    </select>
                                </div>
                                <div class="w-1/2 text-left">
                                    <label class="mb-1 block font-medium text-gray-600">Nama Voucher</label>
                                    <input type="text" name="name" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Nama Voucher" required />
                                </div>
                            </div>
                            <div class="mb-6 flex flex-row justify-between gap-2">
                                <div class="w-1/2 text-left">
                                    <label class="mb-1 block font-medium text-gray-600">Kode Voucher</label>
                                    <input type="text" name="code" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berbinar123" required />
                                </div>
                                <div class="relative w-1/2 text-left">
                                    <label class="mb-1 block font-medium text-gray-600">Diskon</label>
                                    <div class="relative">
                                        <input type="number" name="percentage" class="w-full rounded-lg border border-gray-300 px-3 py-2 pr-8" min="1" max="100" placeholder="90" required />
                                        <span class="pointer-events-none absolute right-3 top-2 text-base text-disabled">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 flex flex-row justify-between gap-2">
                                <div class="w-1/2 text-left">
                                    <label class="mb-1 block font-medium text-gray-600">Tipe Voucher</label>
                                    <select name="voucher_type[]" class="voucherType w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                        <option value="">Pilih Tipe</option>
                                        <option value="metode">Metode</option>
                                        <option value="hari">Hari</option>
                                    </select>
                                </div>
                                <div class="w-1/2 text-left">
                                    <label class="voucherDetailLabel mb-1 block font-medium text-gray-600">Detail</label>
                                    <select name="detail[]" class="voucherDetail w-full rounded-lg border border-gray-300 px-3 py-2" required>
                                        <option value="">Pilih Detail</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add More Button -->
                    <div class="mb-6 mt-2 flex cursor-pointer items-center justify-center rounded-lg border border-dashed border-blue-500 py-2 text-blue-500" id="addVoucherButton">
                        <h1 class="flex items-center gap-2">
                            <i class="bx bx-plus-circle"></i>
                            Tambahkan Voucher Lain
                        </h1>
                    </div>
                    <hr class="mb-6 border-t-2 border-t-gray-400" />
                    <div class="mb-2 flex w-full justify-center gap-4">
                        <button type="button" class="w-1/2 rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeCreateModal()">Batal</button>
                        <button type="submit" class="w-1/2 rounded-lg bg-[#3986A3] px-6 py-2 text-center text-white hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Template for new voucher rows -->
    <template id="voucherTemplate">
        <div class="voucher-row pt-2">
            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold">Voucher Baru</h3>
                <button type="button" class="btn-delete-voucher flex items-center gap-1 rounded-lg border border-red-200 bg-red-50 px-2 py-1 text-sm font-semibold text-red-600 shadow-sm transition hover:border-red-600 hover:bg-red-600 hover:text-white" title="Hapus voucher">
                    <i class="bx bx-trash text-lg"></i>
                    Hapus
                </button>
            </div>
            <div class="mb-6 flex flex-row justify-between gap-2">
                <div class="w-1/2 text-left">
                    <label class="mb-1 block font-medium text-gray-600">Tipe Voucher</label>
                    <select name="voucher_type[]" class="voucherType w-full rounded-lg border border-gray-300 px-3 py-2" required>
                        <option value="">Pilih Tipe</option>
                        <option value="metode">Metode</option>
                        <option value="hari">Hari</option>
                    </select>
                </div>
                <div class="w-1/2 text-left">
                    <label class="voucherDetailLabel mb-1 block font-medium text-gray-600">Detail</label>
                    <select name="detail[]" class="voucherDetail w-full rounded-lg border border-gray-300 px-3 py-2" required>
                        <option value="">Pilih Detail</option>
                    </select>
                </div>
            </div>
            <hr class="mb-6 border-t-2 border-t-gray-400" />
        </div>
    </template>

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

@push('script')
    <script>
        const voucherTypeOptions = {
            metode: [
                { value: 'offline', text: 'Offline' },
                { value: 'online', text: 'Online' },
            ],
            hari: [
                { value: 'weekdays', text: 'Weekdays' },
                { value: 'weekend', text: 'Weekend' },
            ],
            sesi: [
                { value: '1', text: '1 Jam' },
                { value: '2', text: '2 Jam' },
                { value: '3', text: '3 Jam' },
            ],
        };

        function updateVoucherDetailOptions(selectElement, detailSelect) {
            const selectedType = selectElement.value;
            detailSelect.innerHTML = '<option value="">Pilih Detail</option>';

            if (selectedType && voucherTypeOptions[selectedType]) {
                voucherTypeOptions[selectedType].forEach((option) => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.value;
                    optionElement.textContent = option.text;
                    detailSelect.appendChild(optionElement);
                });
            }
        }

        function updateVoucherDetailLabel(selectElement, labelElement) {
            switch (selectElement.value) {
                case 'metode':
                    labelElement.textContent = 'Metode';
                    break;
                case 'hari':
                    labelElement.textContent = 'Hari';
                    break;
                case 'sesi':
                    labelElement.textContent = 'Durasi';
                    break;
                default:
                    labelElement.textContent = 'Detail';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Add new voucher row
            document.getElementById('addVoucherButton').addEventListener('click', function () {
                const template = document.getElementById('voucherTemplate');
                const clone = template.content.cloneNode(true);
                document.getElementById('voucherContainer').appendChild(clone);
            });

            // Handle dynamic select changes for all rows (existing and future)
            document.addEventListener('change', function (e) {
                if (e.target.classList.contains('voucherType')) {
                    const row = e.target.closest('.voucher-row');
                    const detailSelect = row.querySelector('.voucherDetail');
                    const detailLabel = row.querySelector('.voucherDetailLabel');

                    updateVoucherDetailOptions(e.target, detailSelect);
                    updateVoucherDetailLabel(e.target, detailLabel);
                }
            });

            // Handle delete button for voucher rows
            document.addEventListener('click', function (e) {
                if (e.target.closest('.btn-delete-voucher')) {
                    const row = e.target.closest('.voucher-row');
                    if (row && document.querySelectorAll('.voucher-row').length > 1) {
                        row.remove();
                    }
                }
            });

            // Initialize first row's voucher type select
            const firstVoucherType = document.querySelector('.voucherType');
            const firstVoucherDetail = document.querySelector('.voucherDetail');
            const firstVoucherLabel = document.querySelector('.voucherDetailLabel');

            if (firstVoucherType && firstVoucherDetail && firstVoucherLabel) {
                firstVoucherType.addEventListener('change', function () {
                    updateVoucherDetailOptions(this, firstVoucherDetail);
                    updateVoucherDetailLabel(this, firstVoucherLabel);
                });
            }

            // Ambil semua kode voucher yang sudah ada dari backend
            const existingCodes = @json($vouchers->pluck('code')->map(function($code){ return strtolower($code); }));

            document.getElementById('createForm').addEventListener('submit', function(e) {
                // Ambil semua input kode voucher di form
                const codeInputs = document.querySelectorAll('input[name="code"]');
                let isDuplicate = false;

                codeInputs.forEach(function(input) {
                    const code = input.value.trim().toLowerCase();
                    if (existingCodes.includes(code)) {
                        isDuplicate = true;
                    }
                });

                if (isDuplicate) {
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
        });

        function closeCreateModal() {
            // Your existing close modal function
            document.getElementById('confirmModal').classList.remove('hidden');

            document.getElementById('confirmCancel').addEventListener('click', function() {
                window.location.href = "{{ route('dashboard.voucher-code.index') }}";
            });

            document.getElementById('cancelCancel').addEventListener('click', function() {
                document.getElementById('confirmModal').classList.add('hidden');
            });
        }
    </script>
@endpush
