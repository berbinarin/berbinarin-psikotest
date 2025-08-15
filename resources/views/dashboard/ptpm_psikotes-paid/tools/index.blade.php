@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-5">
                <div>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Data Alat Tes</p>
                    <p class="text-disabled py-2 text-gray-500"><span class="italic">Dashboard&nbsp;</span> ini memberikan informasi mengenai jenis alat tes beserta nomor alat tes dari token nya.</p>
                    {{-- <a href="{{ route("dashboard.tools.create") }}" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                    </a> --}}
                </div>
            </div>
            <div class="rounded-[24px] bg-white shadow px-10 py-7 mb-7">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama Alat Tes</th>
                                <th style="text-align: center">Nomor Alat Tes</th>
                                <th style="text-align: center">Token</th>
                                <th style="text-align: center" class="w-80">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tools as $tool)
                                <tr id="" class="data-consume">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $tool->name }}</td>
                                    <td class="text-center">{{ $tool->order }}</td>
                                    <td class="text-center">{{ $tool->token }}</td>
                                    <td class="flex items-center justify-center gap-3 w-80">
                                        <form method="POST" action="{{ route("dashboard.tools.generate-token", $tool->id) }}" method="PUT">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="inline-flex items-center justify-center w-36 rounded-3xl p-1 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #549FF0">
                                                <i class="bx bx-refresh text-white mx-1 scale-150"></i>
                                                <p class="text-white">Update</p>
                                            </button>
                                        </form>

                                        <a href="{{ route("dashboard.tools.data.index", $tool->id) }}" class="inline-flex items-center justify-center w-36 rounded-3xl p-1 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #64A1C4">
                                            <i class="bx bx-home text-white mx-1 scale-110"></i>
                                            <p class="text-white">Dashboard</p>
                                        </a>
                                        {{-- <form action="" method="POST"> --}}
                                            {{-- @csrf --}}
                                            {{-- @method("DELETE") --}}
                                            {{-- <button type="submit" class="inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444"> --}}
                                            {{-- <i class="bx bx-trash-alt text-white"></i> --}}
                                            {{-- </button> --}}
                                        {{-- </form> --}}
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
                    title: 'Hapus Alat Tes',
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
