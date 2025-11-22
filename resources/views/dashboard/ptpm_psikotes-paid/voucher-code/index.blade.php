@extends(
    "dashboard.layouts.app",
    [
        "title" => "Kode Voucher",
    ]
)

@section("content")
    @include("components.confirm", ["type" => "delete"])

    <section class="flex w-full">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="py-4 md:pb-7 md:pt-12">
                    <div class="">
                        <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Kode Voucher</p>
                        <p class="text-disabled">Halaman yang menampilkan dan mengelola Kode Voucher.</p>
                        <a href="{{ route("dashboard.voucher-code.create") }}" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                            <p class="text-dark font-medium leading-none">Tambah Data</p>
                        </a>
                    </div>
                </div>
                <div class="mb-7 w-[80vw] rounded-md bg-white px-4 py-4 md:px-8 md:py-7 xl:px-10">
                    <div class="mt-4 overflow-x-auto">
                        <table id="table" class="display" style="overflow-x: scroll">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Kategori Voucher</th>
                                    <th style="text-align: center">Nama Voucher</th>
                                    <th style="text-align: center">Kode Voucher</th>
                                    <th style="text-align: center">Persentase Diskon</th>
                                    <th style="text-align: center">Tipe Voucher</th>
                                    <th style="text-align: center">Detail Voucher</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vouchers as $i => $voucher)
                                    <tr>
                                        <td class="text-center">{{ $i + 1 }}</td>
                                        <td class="text-center">{{ $voucher->category }}</td>
                                        <td class="text-center">{{ $voucher->name }}</td>
                                        <td class="text-center">{{ $voucher->code }}</td>
                                        <td class="text-center">{{ $voucher->percentage }}%</td>
                                        <td class="text-center">
                                            @php
                                                $voucherType = json_decode($voucher->voucher_type, true);
                                            @endphp

                                            {{ $voucherType ? implode(", ", $voucherType) : "-" }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $detail = json_decode($voucher->detail, true);
                                            @endphp

                                            {{ $detail ? implode(", ", $detail) : "-" }}
                                        </td>
                                        <td class="text-center">
                                            <div class="flex flex-row justify-center gap-2">
                                                <!-- tombol edit dan hapus -->
                                                <a href="{{ route("dashboard.voucher-code.edit", $voucher->id) }}" class="inline-flex items-start justify-start rounded bg-yellow-500 p-3 hover:bg-yellow-600">
                                                    <i class="bx bx-edit text-white"></i>
                                                </a>
                                                <form id="deleteForm-{{ $voucher->id }}" action="{{ route("dashboard.voucher-code.destroy", $voucher->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="button" class="delete-alert inline-flex items-start justify-start rounded p-3 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444" data-id="{{ $voucher->id }}">
                                                        <i class="bx bx-trash-alt text-white"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        {{--
                                            <td class="text-center flex flex-row justify-center gap-2">

                                            </td>
                                        --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal Konfirmasi Hapus -->
                        <!-- <div id="deleteModal" class="fixed inset-0 z-10 flex hidden items-center justify-center bg-black bg-opacity-50">
                            <div class="w-full max-w-md rounded-lg bg-white p-6 text-center">
                                <div class="mb-4 flex justify-center">
                                    <img src="{{ asset("assets/dashboard/images/warning.webp") }}" alt="Warning Icon" class="h-12 w-12" />
                                </div>
                                <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900" id="modal-title">Konfirmasi Hapus</h3>
                                <p class="mb-6 text-base text-gray-500">Apakah Anda yakin ingin menghapus kode voucher ini?</p>
                                <div class="flex w-full justify-center gap-4">
                                    <form id="deleteForm" method="POST" class="w-1/2">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="w-full rounded-lg bg-[#3986A3] px-6 py-2 text-center text-white hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Hapus</button>
                                    </form>
                                    <button type="button" class="w-1/2 rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeDeleteModal()">Batal</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("script")
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>

    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
            document.getElementById(modalID + '-backdrop').classList.toggle('hidden');
            document.getElementById(modalID).classList.toggle('flex');
            document.getElementById(modalID + '-backdrop').classList.toggle('flex');
        }
    </script>

    <script>
        let deleteFormId = null;

        document.querySelectorAll('.delete-alert').forEach((btn) => {
            btn.addEventListener('click', function () {
                deleteFormId = this.dataset.id;
                document.getElementById('deleteModal').classList.remove('hidden');
            });
        });

        document.getElementById('cancelDelete').addEventListener('click', function () {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteFormId = null;
        });

        document.getElementById('confirmDelete').addEventListener('click', function () {
            if (deleteFormId) {
                document.getElementById('deleteForm-' + deleteFormId).submit();
            }
        });
    </script>
@endpush
