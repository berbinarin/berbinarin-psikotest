@extends(
    "dashboard.layouts.app",
    [
        "title" => "Daftar Jenis Tes",
    ]
)

@section("content")
    @include("components.confirm", ["type" => "delete"])
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-5">
                <div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route("dashboard.price-list.test-category.index") }}">
                            <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                        </a>
                        <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">{{ $category->name }}</p>
                    </div>
                    <p class="py-2 text-gray-500">Di halaman dashboard ini, Anda dapat melihat berbagai layanan alat tes dan harga yang termasuk dalam kategori {{ $category->name }}.</p>
                    <a href="{{ route("dashboard.price-list.test-types.create", $category->id) }}" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                    </a>
                </div>
            </div>

            {{-- Test Types Data Table --}}
            <div class="mb-7 rounded-[24px] bg-white px-10 py-7 shadow">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama Jenis Tes</th>
                                <!-- <th style="text-align: center">Kategori</th> -->
                                <th style="text-align: center">Harga</th>
                                <th style="text-align: center">Deskripsi</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testTypes as $testType)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $testType->name }}</td>
                                    <!-- <td class="text-center">{{ $testType->testCategory->name ?? "-" }}</td> -->
                                    <td class="text-center">{{ "Rp" . number_format($testType->price, 0, ",", ".") }}</td>
                                    <td class="text-start">{{ $testType->description ?? "-" }}</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{ route("dashboard.price-list.test-types.edit", [$testType->testCategory, $testType->id]) }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #e9b306">
                                            <i class="bx bx-edit-alt text-white"></i>
                                        </a>
                                        <form id="deleteForm-{{ $testType->id }}" action="{{ route("dashboard.price-list.test-types.destroy", [$testType->testCategory, $testType->id]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" data-id="{{ $testType->id }}" class="delete-alert inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444">
                                                <i class="bx bx-trash-alt text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    <script>
        function toggleModal(modalId) {
            var modal = document.getElementById(modalId);
            if (modal.style.display === 'none' || modal.style.display === '') {
                modal.style.display = 'block';
            } else {
                modal.style.display = 'none';
            }
        }
    </script>

    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
            document.getElementById(modalID + '-backdrop').classList.toggle('hidden');
            document.getElementById(modalID).classList.toggle('flex');
            document.getElementById(modalID + '-backdrop').classList.toggle('flex');
        }
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
                deleteFormId = this.dataset.id; // simpan id form yang mau dihapus
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
