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
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Data Jawaban Checkpoint</p>
                    <p class="text-disabled py-2 text-gray-500">Halaman dashboard ini menampilkan detail jawaban yang telah dikumpulkan dari pengguna.</p>
                    <a href="{{ route("dashboard.registrants.create") }}" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="rounded-[24px] bg-white shadow px-10 py-7 mb-7">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama Pengguna</th>
                                <th style="text-align: center">Nama Lengkap</th>
                                <th style="text-align: center">Nama Tes</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Di sini ditaruh foreach-nya --}}
                                <tr id="" class="data-consume">
                                    <td class="text-center">
                                        {{-- @if($registrant->user->testimonials->isNotEmpty())
                                            <div class=" inline-flex items-center justify-center rounded p-2 w-10"
                                                style="background-color: #106681">
                                                <span class="text-white text-center">{{ $loop->iteration }}</span>
                                            </div>
                                        @else
                                            <span class="inline-flex items-center justify-center rounded px-3 py-1 text-black #3986A3">
                                                {{ $loop->iteration }}
                                            </span>
                                        @endif --}}

                                        1

                                    </td>
                                    <td>Dummy Username</td>
                                    <td>Dummy Name</td>
                                    <td class="text-center">Dummy Test</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{route("dashboard.check-point.index") }}" class="detail-button inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            style="background-color: #3b82f6">
                                            <i class="bx bx-show-alt text-white"></i>
                                        </a>
                                        <a href="{{route("dashboard.check-point.index") }}" class="edit-button inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            style="background-color: #e9b306">
                                            <i class="bx bx-edit-alt text-white"></i>
                                        </a>
                                        {{--
                                        <form id="deleteForm-{{ $registrant->id }}" action="{{ route("dashboard.registrants.destroy", $registrant->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            --}}
                                            <button type="button" class="delete-button inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444" data-id="{{-- {{ $registrant->id }} --}}">
                                                <i class="bx bx-trash-alt text-white"></i>
                                            </button>
                                        {{-- </form> --}}

                                    </td>
                                </tr>
                            {{-- Ini buat penutup foreach-nya --}}
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
@endpush
