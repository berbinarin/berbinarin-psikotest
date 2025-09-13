@extends(
    "dashboard.layouts.app",
    [
        "title" => "Respon Checkpoint",
    ]
)

@section("content")
<section class="flex w-full">
    <div class="w-full">
        <div class="py-4 md:pb-7 md:pt-5">
            <div>
                <div class="flex items-center gap-2">
                    <a href="{{ route("dashboard.checkpoint.index") }}">
                        <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                    </a>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">
                        Data Jawaban <span class="italic">Checkpoint</span>
                    </p>
                </div>
                <p class="text-disabled py-2 text-gray-500">
                    Halaman dashboard ini menampilkan detail jawaban yang telah dikumpulkan dari pengguna.
                </p>
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
                        @foreach ($responses as $attemptId => $attemptData)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $attemptData['user']->username }}</td>
                                <td class="text-center">{{ $attemptData['user']->name }}</td>
                                <td class="text-center">{{ $attemptData['tool']->name }}</td>
                                <td class="flex items-center justify-center gap-2">
                                    <button
                                        onclick="openDetailJawabanModal('{{ $attemptId }}', '{{ $attemptData['tool']->name }}', '{{ $attemptData['user']->name }}', '{{ route('dashboard.checkpoint.responses.show', $attemptId) }}')"
                                        class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                        style="background-color: #3b82f6">
                                        <i class="bx bx-show text-white"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
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
            <p id="modalTitle" class="font-semibold text-lg">Detail Jawaban</p>
            <div id="modalTesName" class="px-5 py-1 bg-[#75BADB] rounded-3xl text-white text-sm">Nama Tes</div>
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
            <tbody id="detailJawabanTable" class="text-center px-2">
                {{-- Isi dari JS --}}
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

    function openDetailJawabanModal(attemptId, tesName, userName, url) {
        // Set judul & tes name
        document.getElementById('modalTitle').innerText = "Detail Jawaban – " + userName;
        document.getElementById('modalTesName').innerText = tesName;

        // Clear isi tabel
        const tbody = document.getElementById('detailJawabanTable');
        tbody.innerHTML = "<tr><td colspan='4' class='py-4 text-gray-400'>Loading...</td></tr>";

        // Fetch data
        fetch(url)
            .then(res => res.json())
            .then(data => {
                tbody.innerHTML = ""; // kosongkan loading
                if (data.length === 0) {
                    tbody.innerHTML = "<tr><td colspan='4' class='py-4 text-gray-400'>Belum ada jawaban</td></tr>";
                } else {
                    data.forEach((row, index) => {
                        tbody.innerHTML += `
                            <tr class="border-b border-gray-300">
                                <td class="py-4 pr-6">${index + 1}</td>
                                <td>${row.question ?? '-'}</td>
                                <td>${row.answer ?? '-'}</td>
                                <td>${row.correct_answer ?? '-'}</td>
                            </tr>
                        `;
                    });
                }
            });

        document.getElementById('detailJawabanModal').classList.remove('hidden');
    }

    function closeDetailJawabanModal() {
        document.getElementById('detailJawabanModal').classList.add('hidden');
    }
</script>
@endpush
