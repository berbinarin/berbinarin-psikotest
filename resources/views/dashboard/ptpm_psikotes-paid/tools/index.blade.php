@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="ml-20 py-4 md:pt-12">
                    <div class="">
                        @if (session("success"))
                            <div class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700" role="alert">
                                <span class="block sm:inline">{{ session("success") }}</span>
                            </div>
                        @endif

                        <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Data Test Psikotes Paid</p>
                        <p class="text-disabled py-2">Fitur ini menampilkan informasi data test dari user yang telah mengerjakan psikotes Berbinar.</p>
                        {{-- <a href="{{ route('dashboard.arteri') }}"><button class="bg-blue-300 p-2">Arteri</button></a> --}}
                    </div>
                </div>
                <div class="ml-20 w-[1150px] rounded-[24px] bg-white px-10 py-7">
                    <div class="mt-4 overflow-x-auto">
                        <table id="table" class="display gap-3" style="overflow-x: scroll">
                            <thead>
                                <tr>
                                    {{-- <th style="text-align: center">No</th> --}}
                                    <th style="text-align: center">Nama Alat Tes</th>
                                    <th style="text-align: center">Nomor Alat Tes</th>
                                    <th style="text-align: center">Token</th>
                                    <th style="text-align: center">Generate Token</th>
                                    <th style="text-align: center">Dashboard</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tools as $tool)
                                    <tr id="" class="data-consume">
                                        <td class="text-center">{{ $tool->name }}</td>
                                        <td class="text-center">{{ $tool->order }}</td>
                                        <td class="text-center">{{ $tool->token }}</td>
                                        <td class="flex justify-center gap-2">
                                            {{-- GENERATE TOKEN --}}
                                            <form action="{{ route("dashboard.tools.generate-token", $tool->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                <button type="submit" class="mt-0 gap-1 inline-flex items-start justify-start rounded-3xl bg-blue-500 p-3 text-white hover:bg-blue-500 focus:ring-2 focus:ring-offset-2">
                                                    <i class="bx bx-sync "></i>
                                                    <span class="text-xs font-semibold">Update</span>
                                                </button>
                                            </form>
                                        </td>

                                        <td class="justify-center gap-2">
                                            <a href="{{ route("dashboard.tools.data.index", $tool->id) }}" class="mt-0 gap-1 inline-flex items-start justify-start rounded-3xl bg-green-500 p-3 text-white hover:bg-green-500 focus:ring-2 focus:ring-offset-2">
                                                <i class="bx bx-home-alt "></i>
                                                <span class="text-xs font-semibold">Dashboard</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("script")
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                order: [[1, 'asc']],
            });
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
