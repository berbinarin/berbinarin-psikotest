@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@php
    use Illuminate\Support\Str;
@endphp

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-12">
                <div>
                    <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Data Pendaftar Psikotes</p>
                    <p class="text-disabled py-2">Fitur ini menampilkan informasi data pengguna yang telah melakukan registrasi Psikotes Berbinar</p>
                    <a href="{{ route("dashboard.registrants.create") }}" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="rounded-[24px] bg-white px-10 py-7">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama Lengkap</th>
                                <th style="text-align: center">Layanan</th>
                                <th style="text-align: center">Kategori</th>
                                <th style="text-align: center">Jenis</th>
                                <th style="text-align: center">Harga</th>
                                <th style="text-align: center">Jadwal</th>
                                <th style="text-align: center">Waktu</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrants as $registrant)
                                <tr id="" class="data-consume">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $registrant->user->name }}</td>
                                    <td class="text-center">{{ Str::title($registrant->psikotes_service) }}</td>
                                    <td class="text-center">{{ $registrant->testType->testCategory->name }}</td>
                                    <td class="text-center">{{ $registrant->testType->name }}</td>
                                    <td class="text-center">{{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($registrant->schedule)->format("d-m-Y") }}
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($registrant->schedule)->format("H:i:s") }}
                                    </td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{ route('dashboard.registrants.show', $registrant->id) }}" class="mt-4 inline-flex items-start justify-start rounded p-3 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0">
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
        </div>
    </section>

    <div class="fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto overflow-x-hidden outline-none focus:outline-none" id="modal-id">
        <div class="relative mx-48 my-5 w-[800px] items-center justify-center">
            <!--content-->
            <div class="relative flex w-full flex-col rounded-lg border-0 bg-white shadow-lg outline-none focus:outline-none">
                <!--header-->
                <div class="border-blueGray-200 flex items-start justify-between rounded-t border-b border-solid p-5">
                    <h3 class="text-3xl font-semibold">Tambah Pendaftar</h3>
                </div>
                <!--body-->
                <div class="relative flex-auto p-5">
                    <form class="flex flex-col gap-1" method="post">
                        @csrf
                        <div class="grid grid-cols-6 gap-x-6 gap-y-4">
                            <div class="col-span-2">
                                <label for="name" class="block text-lg font-semibold leading-6 text-black">Nama</label>
                                <div class="mt-2">
                                    <input type="text" name="fullname" id="fullname" class="block w-full rounded-md border-0 py-1.5 text-lg text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6" />
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block text-lg font-semibold leading-6 text-black">Email</label>
                                <div class="mt-2">
                                    <input type="email" name="email" id="email" class="block w-full rounded-md border-0 py-1.5 text-lg text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6" />
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="gender" class="block text-lg font-semibold leading-6 text-black">Jenis Kelamin</label>
                                <div class="mt-2">
                                    <select id="gender" name="gender" autocomplete="gender" class="block w-full rounded-md border-0 py-1.5 text-lg text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="age" class="block text-lg font-semibold leading-6 text-black">Usia</label>
                                <div class="mt-2">
                                    <input type="number" name="age" id="age" autocomplete="age" class="block w-full rounded-md border-0 py-1.5 text-lg text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6" />
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="dimicile" class="block text-lg font-semibold leading-6 text-black">Domisili</label>
                                <div class="mt-2">
                                    <input type="text" name="domicile" id="domicile" class="block w-full rounded-md border-0 py-1.5 text-lg text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6" />
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="phone-input" class="block text-lg font-semibold leading-6 text-black">Nomor Telepon</label>
                                <div class="mt-2">
                                    <input type="text" name="phone_number" id="phone-input" class="block w-full rounded-md border-0 py-1.5 text-lg text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6" placeholder="+62xxxxxxxxxx" />
                                </div>
                            </div>
                            <div class="col-span-3">
                                <label for="psikotest_category_id" class="block text-lg font-semibold leading-6 text-black">Kategori Psikotes</label>
                                <div class="mt-2">
                                    <select id="psikotest_category_id" name="psikotest_category_id" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-lg sm:leading-6">
                                        <option value="1">Kategori 1</option>
                                        <option value="2">Kategori 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <label for="psikotest_type_id" class="block text-lg font-semibold leading-6 text-black">Jenis Psikotes</label>
                                <div class="mt-2">
                                    <select id="psikotest_type_id" name="psikotest_type_id" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-lg sm:leading-6">
                                        <option value="1">Jenis Psikotes 1</option>
                                        <option value="2">Jenis Psikotes 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="service" class="block text-lg font-semibold leading-6 text-black">Layanan Psikotes</label>
                                <div class="mt-2">
                                    <select id="service" name="service" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-lg sm:leading-6">
                                        <option value="online">Online</option>
                                        <option value="offline">Offline (Surabaya)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="preference_schedule" class="block text-lg font-semibold leading-6 text-black">Jadwal Psikotes</label>
                                <div class="mt-2">
                                    <input type="datetime-local" name="preference_schedule" id="preference_schedule" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-lg sm:leading-6" />
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="price" class="block text-lg font-semibold leading-6 text-black">Harga Psikotes</label>
                                <div class="mt-2">
                                    <input type="text" name="price" id="price" {{-- readonly --}} class="price block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-lg sm:leading-6" data-mask="000.000.000" data-mask-reverse="true" />
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="reason" class="block text-lg font-semibold leading-6 text-black">Alasan Mengikuti Psikotes</label>
                                <div class="mt-2">
                                    <textarea id="reason" name="reason" rows="3" class="block h-[100px] w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-lg sm:leading-6"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--footer-->
                        <div class="border-blueGray-200 flex items-center justify-end rounded-b border-t border-solid pt-3">
                            <button class="background-transparent mb-1 mr-1 px-6 py-2 text-base font-bold text-gray-500 outline-none transition-all duration-150 ease-linear focus:outline-none" type="button" onclick="toggleModal('modal-id')">Close</button>
                            <button type="submit" name="submit" class="mt-4 inline-flex items-start justify-start rounded bg-primary px-6 py-3 hover:bg-primary focus:outline-none focus:ring-2 sm:mt-0">
                                <p class="text-base font-semibold leading-none text-white">Simpan</p>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 z-40 hidden bg-black opacity-25" id="modal-id-backdrop"></div>
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
@endsection
