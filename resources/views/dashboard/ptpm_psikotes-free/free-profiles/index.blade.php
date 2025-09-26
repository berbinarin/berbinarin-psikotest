@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@section("content")
    @include("components.confirm", ["type" => "delete"])
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-5">
                <div>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Data Pendaftar Psikotes</p>
                    <p class="py-2 text-gray-500">Fitur ini menampilkan informasi data pengguna yang telah melakukan registrasi Psikotes Berbinar</p>
                    {{--
                        <a href="{{ route("dashboard.registrants.create") }}" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                        </a>
                    --}}
                </div>
            </div>
            <div class="mb-6 rounded-[24px] bg-white px-10 py-7 shadow">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama Lengkap</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Jenis Kelamin</th>
                                <th style="text-align: center">Tanggal Lahir</th>
                                <th style="text-align: center">Tanggal Tes</th>
                                {{-- <th style="text-align: center">Jam</th> --}}
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attempts as $attempt)
                                <tr id="" class="data-consume">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $attempt->profile->name }}</td>
                                    <td class="text-left">{{ $attempt->profile->email }}</td>
                                    <td class="text-center">{{ $attempt->profile->gender === 'female' ? 'Perempuan' : 'Laki-Laki' }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($attempt->profile->date_of_birth)->format("d-m-Y") }}
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($attempt->profile->date_of_test)->format("d-m-Y") }}
                                    </td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{ route("dashboard.free-profiles.data.detail", $attempt->id) }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                            <i class="bx bx-show text-white"></i>
                                        </a>
                                        {{--
                                            <a href="{{ route("dashboard.attempts.edit", $attempt->id) }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #e9b306">
                                            <i class="bx bx-edit-alt text-white"></i>
                                        </a> --}}
                                        <form id="deleteForm-{{ $attempt->id }}" action="{{ route("dashboard.free-profiles.destroy", $attempt->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" class="delete-alert inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444" data-id="{{ $attempt->id }}">
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
