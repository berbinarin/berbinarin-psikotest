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
                    <div class="flex items-center gap-2">
                        <a href="{{ route("dashboard.check-point.index") }}">
                            <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                        </a>
                        <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Data Jawaban <span class="italic">Checkpoint</span></p>
                    </div>
                    <p class="text-disabled py-2 text-gray-500">Halaman dashboard ini menampilkan detail jawaban yang telah dikumpulkan dari pengguna.</p>
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
                                        <a href="javascript:void(0);" onclick="openDetailJawabanModal()" class="detail-button inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            style="background-color: #3b82f6">
                                            <i class="bx bx-show-alt text-white"></i>
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

    <!-- Modal Detail Data Soal -->
    <div id="detailJawabanModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
        <div class="w-full max-w-2xl rounded-xl bg-white p-6 text-center relative">
            <div class="flex flex-row w-full justify-between mb-4">
                <p class="font-semibold text-lg">Detail Jawaban</p>
                <div class="px-5 py-1 bg-[#75BADB] rounded-3xl text-white text-sm">Nama Tes</div>
            </div>
                <table class="w-full display gap-3 overflow-x-scroll mb-6 max-h-40 overflow-y-auto" style="overflow-x: scroll">
                    <thead class="w-full border-b border-gray-300 overflow-x-scroll">
                        <tr>
                            <th class="text-center text-gray-400">No</th>
                            <th class="text-center text-gray-400">Pertanyaan</th>
                            <th class="text-center text-gray-400">Jawaban</th>
                            <th class="text-center text-gray-400">Jawaban Benar</th>
                        </tr>
                    </thead>
                    <tbody class="text-center px-2">
                        {{-- Ini buat detailnya. Bisa dikasih foreach di sini --}}
                        <tr class="border-b border-gray-300" style="padding-top : 10px">
                            <td class="py-4 pr-6">1</td>
                            <td>Kapan Kanz memiliki pacar history nerd?</td>
                            <td>A</td>
                            <td>A</td>
                        </tr>

                        <tr class="border-b border-gray-300" style="padding-top : 10px">
                            <td class="py-4 pr-6">2</td>
                            <td>Mengapa Kanz diberi nama Kanz?</td>
                            <td>E</td>
                            <td>C</td>
                        </tr>

                        <tr class="border-b border-gray-300" style="padding-top : 10px">
                            <td class="py-4 pr-6">3</td>
                            <td>Siapa nama pacar Kanz?</td>
                            <td>B</td>
                            <td>D</td>
                        </tr>

                        {{-- Ini buat penutup foreach-nya --}}

                    </tbody>
                </table>
            <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeDetailJawabanModal()">Kembali</button>
        </div>
    </div>
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
        function openDetailJawabanModal() {
            document.getElementById('detailJawabanModal').classList.remove('hidden');
        }
        function closeDetailJawabanModal() {
            document.getElementById('detailJawabanModal').classList.add('hidden');
        }
    </script>
@endpush
