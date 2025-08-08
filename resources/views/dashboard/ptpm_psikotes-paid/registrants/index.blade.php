@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)



@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-12">
                <div>
                    <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Data Pendaftar Psikotes</p>
                    <p class="text-disabled py-2 text-gray-500">Fitur ini menampilkan data  seperti  Nama, Kategori, Jenis, dan Harga yang telah mengisi  Psikotes Berbinar.</p>
                    <a href="{{ route("dashboard.registrants.create") }}" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="rounded-[24px] bg-white px-10 py-7 mb-7">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama Lengkap</th>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">Password</th>
                                <th style="text-align: center">Layanan</th>
                                <th style="text-align: center">Kategori</th>
                                <th style="text-align: center">Harga</th>
                                <th style="text-align: center">Jadwal</th>
                                <th style="text-align: center"><span class="italic">Action</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrants as $registrant)
                                <tr id="" class="data-consume">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $registrant->user->name }}</td>
                                    <td>{{ $registrant->user->username }}</td>
                                    <td>{{ \Illuminate\Support\Str::before($registrant->user->email, "@") }}</td>
                                    <td class="text-center">{{ Str::title($registrant->psikotes_service) }}</td>
                                    <td class="text-center">{{ $registrant->testType->testCategory->name }}</td>
                                    <td class="text-center">{{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($registrant->schedule)->format("d-m-Y H:i:s") }}
                                    </td>
                                    <td class="flex items-center justify-center gap-2">
                                        <button
                                            type="button"
                                            class="detail-button inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            style="background-color: #3b82f6"
                                            data-id="{{ $registrant->id }}"
                                            data-name="{{ $registrant->user->name }}"
                                            data-gender="{{ $registrant->gender }}"
                                            data-age="{{ $registrant->age }}"
                                            data-phone_number="{{ $registrant->phone_number }}"
                                            data-email="{{ $registrant->user->email }}"
                                            data-test_category="{{ $registrant->testType->testCategory->name }}"
                                            data-psikotest_service="{{ $registrant->psikotest_service }}"
                                            data-test_type="{{ $registrant->testType->name }}"
                                            data-reason="{{ $registrant->reason }}"
                                            data-action="{{ route('dashboard.registrants.update', $registrant->id) }}"
                                        >
                                            <i class="bx bx-show text-white"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="edit-button inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            style="background-color: #e9b306"
                                            data-id="{{ $registrant->id }}"
                                            data-name="{{ $registrant->user->name }}"
                                            data-gender="{{ $registrant->gender }}"
                                            data-age="{{ $registrant->age }}"
                                            data-phone_number="{{ $registrant->phone_number }}"
                                            data-email="{{ $registrant->user->email }}"
                                            data-test_category="{{ $registrant->testType->testCategory->name }}"
                                            data-psikotest_service="{{ $registrant->psikotest_service }}"
                                            data-test_type="{{ $registrant->testType->name }}"
                                            data-reason="{{ $registrant->reason }}"
                                            data-action="{{ route('dashboard.registrants.update', $registrant->id) }}"
                                        >
                                            <i class="bx bx-edit-alt text-black"></i>
                                        </button>
                                        <form id="deleteForm-{{ $registrant->id }}" action="{{ route("dashboard.registrants.destroy", $registrant->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" class="delete-button inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444" data-id="{{ $registrant->id }}">
                                                <i class="bx bx-trash-alt text-white"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route("dashboard.registrants.show", $registrant->id) }}" class="mt-4 inline-flex items-start justify-start rounded p-3 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0">
                                            <p class="font-semibold text-primary">Detail</p>
                                            <i class="bx bx-right-arrow-alt mt-1 text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Edit -->
            <div id="editModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
                <div class="w-[90%] rounded-lg bg-white p-6">
                    <div class="mb-4 flex items-start gap-3">
                        <button id="closeEditModal" class="text-gray-500 hover:text-gray-700 text-4xl text-center justify-center items-center"><img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" /></button>
                        <h2 class="text-3xl font-bold">Edit Data Pendaftar</h2>
                    </div>
                    <form id="editForm" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="flex gap-4 mb-4">
                            <div class="flex w-full flex-col">
                                <label for="edit_name" class="mb-2 font-bold text-[#9b9b9b]">Nama</label>
                                <input type="text" id="edit_name" name="name" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2" />
                            </div>
                            <div class="flex w-full flex-col">
                                <label for="edit_gender" class="mb-2 font-bold text-[#9b9b9b]">Jenis Kelamin</label>
                                <select id="edit_gender" name="gender" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-4 mb-4">
                            <div class="flex w-full flex-col">
                                <label for="edit_age" class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                                <input type="number" id="edit_age" name="age" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2" />
                            </div>
                            <div class="flex w-full flex-col">
                                <label for="edit_phone_number" class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                                <input type="tel" id="edit_phone_number" name="phone_number" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2" />
                            </div>
                        </div>
                        <div class="flex gap-4 mb-4">
                            <div class="flex w-full flex-col">
                                <label for="edit_email" class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                                <input type="email" id="edit_email" name="email" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2" />
                            </div>
                            <div class="flex w-full flex-col">
                                <label for="edit_test_category" class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                                <input type="text" id="edit_test_category" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2" readonly />
                            </div>
                        </div>
                        <div class="flex gap-4 mb-4">
                            <div class="flex w-full flex-col">
                                <label for="edit_psikotest_service" class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                                <select id="edit_psikotest_service" name="psikotest_service" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2">
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                </select>
                            </div>
                            <div class="flex w-full flex-col">
                                <label for="edit_test_type_id" class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                                <input type="text" id="edit_test_type_id" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2" readonly />
                            </div>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <label for="edit_reason" class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                            <textarea id="edit_reason" name="reason" rows="3" class="rounded-md border border-gray-300 bg-gray-50 px-4 py-2"></textarea>
                        </div>
                        <div class="flex gap-4 mt-6">
                            <button type="submit" class="flex-1 rounded-lg bg-[#3986a3] px-6 py-2 text-white">Simpan</button>
                            <button type="button" id="cancelEditModal" class="flex-1 rounded-lg border border-[#3986a3] px-6 py-2 text-[#3986a3]">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal Edit -->

            <!-- Modal Detail -->
            <div id="detailModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
                <div class="w-[90%] rounded-lg bg-white p-6">
                    <div class="mb-4 flex flex-col justify-between items-center">
                        <div class="w-full flex flex-row justify-start gap-3 mb-4">
                            <button id="closeDetailModal" class="text-gray-500 hover:text-gray-700 text-4xl text-start justify-start items-start"><img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" /></button>
                            <h2 class="text-3xl font-bold">Detail Data Pendaftar</h2>
                        </div>
                        <form class="flex flex-col w-full">
                            <div class="flex gap-5">
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Nama</label>
                                    <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->name }}" readonly disabled />
                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Jenis Kelamin</label>
                                    <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->gender }}" readonly disabled />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                                    <input type="number" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->age }}" readonly disabled />
                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                                    <input type="tel" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->phone_number }}" readonly disabled />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                                    <input type="email" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->email }}" readonly disabled />
                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                                    <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->testCategory->name }}" readonly disabled />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Username</label>
                                    <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->user->username }}" readonly disabled />
                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Password</label>
                                    <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ \Illuminate\Support\Str::before($registrant->user->email, '@') }}" readonly disabled />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                                    <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->psikotes_service }}" readonly disabled />
                                </div>
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                                    <input type="text" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0" value="{{ $registrant->testType->name }}" readonly disabled />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="flex w-full flex-col">
                                    <label class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                                    <textarea rows="5" class="rounded-md border-1 border-gray-300 bg-gray-50 px-6 py-3 text-sm font-semibold drop-shadow focus:ring-0 max-h-48" readonly disabled>{{ $registrant->reason }}</textarea>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <!-- End Modal Detail -->


        </div>
    </section>
@endsection

@section("script")
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

    <script>
        document.querySelectorAll('.delete-button').forEach((button) => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const formId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Hapus Responden',
                    text: 'Apakah anda yakin menghapusnya?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm-' + formId).submit();
                    }
                });
            });
        });
    </script>

    <script>
        // Modal Edit
        document.querySelectorAll('.edit-button').forEach((button) => {
            button.addEventListener('click', function () {
                // Isi form modal dengan data dari button
                document.getElementById('edit_name').value = this.dataset.name;
                document.getElementById('edit_gender').value = this.dataset.gender;
                document.getElementById('edit_age').value = this.dataset.age;
                document.getElementById('edit_phone_number').value = this.dataset.phone_number;
                document.getElementById('edit_email').value = this.dataset.email;
                document.getElementById('edit_test_category').value = this.dataset.test_category;
                document.getElementById('edit_psikotest_service').value = this.dataset.psikotest_service;
                document.getElementById('edit_test_type_id').value = this.dataset.test_type;
                document.getElementById('edit_reason').value = this.dataset.reason;
                // Set action form
                document.getElementById('editForm').action = this.dataset.action;
                // Tampilkan modal
                document.getElementById('editModal').classList.remove('hidden');
            });
        });

        // Tutup modal
        document.getElementById('closeEditModal').onclick = function() {
            document.getElementById('editModal').classList.add('hidden');
        };
        document.getElementById('cancelEditModal').onclick = function() {
            document.getElementById('editModal').classList.add('hidden');
        };
    </script>

    <script>
        // Modal Detail
        document.querySelectorAll('.detail-button').forEach((button) => {
            button.addEventListener('click', function () {
                // Tampilkan modal
                document.getElementById('detailModal').classList.remove('hidden');
            });
        });

        // Tutup modal
        document.getElementById('closeDetailModal').onclick = function() {
            document.getElementById('detailModal').classList.add('hidden');
        };
    </script>
@endsection
