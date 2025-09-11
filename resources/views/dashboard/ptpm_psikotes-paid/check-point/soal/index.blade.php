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
                        <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Data Soal <span class="italic">Checkpoint</span></p>
                    </div>
                    <p class="text-disabled py-2 text-gray-500">Halaman yang menampilkan dan mengelola data soal <span class="italic">Checkpoint</span>.</p>
                    <a href="javascript:void(0);" onclick="openCreateSoalModal()" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
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
                                <th style="text-align: center">Tipe Soal</th>
                                <th style="text-align: center">Pertanyaan</th>
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
                                    <td>Pilihan Ganda</td>
                                    <td>Kapan Kanz punya pacar history nerd?</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="javascript:void(0);" onclick="openDetailSoalModal()" class="detail-button inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            style="background-color: #3b82f6">
                                            <i class="bx bx-show-alt text-white"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="openEditSoalModal()" class="edit-button inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
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

    <!-- Modal Tambah Data Soal -->
    <div id="createSoalModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 text-center relative">
            <button type="button" onclick="closeCreateSoalModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            <h3 class="mb-4 text-xl leading-6 text-black font-bold" id="modal-title">Tambah Soal <span class="italic">Checkpoint</span></h3>
            <form id="createSoalForm" method="POST" action="{{ route('dashboard.check-point.soal.index') }}">
                @csrf
                <div class="flex flex-col gap-4 mb-5 mt-6">
                    <div class="text-left">
                        <label class="block mb-1 font-medium text-gray-600">Tipe Soal</label>
                        <select id="tipe" name="tipe" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                            <option value="pilihan_ganda">Pilihan Ganda</option>
                            <option value="uraian">Uraian</option>
                        </select>
                    </div>
                    <div class="text-left">
                        <label class="block mb-1 font-medium text-gray-600">Pertanyaan</label>
                        <input type="text" id="question" name="question" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berapa hasil dari 2 + 5?" required>
                    </div>
                    <div id="pilihanGandaSection">
                        <div class="text-left">
                            <div class="mb-6 mt-2 flex cursor-pointer items-center justify-center rounded-lg border border-dashed border-blue-500 py-2 text-blue-500" id="addOptionButton">
                                <h1 class="flex items-center gap-2">
                                    <i class="bx bx-plus-circle"></i>
                                    Tambahkan pilihan
                                </h1>
                            </div>
                            <div id="pilihanContainer"></div>
                        </div>
                    </div>
                    <div id="uraianSection" class="hidden">
                        <label class="block mb-1 font-medium text-gray-600">Jawaban Uraian</label>
                        <input type="text" name="jawaban_uraian" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban uraian..." />
                    </div>
                </div>
                <div class="flex w-full justify-center gap-4">
                    <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeCreateSoalModal()">Batal</button>
                    <button type="submit" class="rounded-lg bg-[#3986A3] w-1/2 px-6 py-2 text-white text-center hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Data Soal -->
    <div id="editSoalModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 text-center relative">
            <button type="button" onclick="closeEditSoalModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            <h3 class="mb-4 text-xl leading-6 text-black font-bold" id="modal-title">Edit Soal <span class="italic">Checkpoint</span></h3>
            <form id="editSoalForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-4 mb-5 mt-6">
                    <div class="text-left">
                        <label class="block mb-1 font-medium text-gray-600">Tipe Soal</label>
                        <select id="edit_tipe" name="tipe" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                            <option value="pilihan_ganda">Pilihan Ganda</option>
                            <option value="uraian">Uraian</option>
                        </select>
                    </div>
                    <div class="text-left">
                        <label class="block mb-1 font-medium text-gray-600">Pertanyaan</label>
                        <input type="text" id="edit_question" name="question" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berapa hasil dari 2 + 5?" required>
                    </div>
                    <div id="pilihanGandaSection">
                        <div class="text-left">
                            <div class="mb-6 mt-2 flex cursor-pointer items-center justify-center rounded-lg border border-dashed border-blue-500 py-2 text-blue-500" id="addOptionButton">
                                <h1 class="flex items-center gap-2">
                                    <i class="bx bx-plus-circle"></i>
                                    Tambahkan pilihan
                                </h1>
                            </div>
                            <div id="pilihanContainer"></div>
                        </div>
                    </div>
                    <div id="uraianSection" class="hidden">
                        <label class="block mb-1 font-medium text-gray-600">Jawaban Uraian</label>
                        <input type="text" name="jawaban_uraian" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban uraian..." />
                    </div>
                </div>
                <div class="flex w-full justify-center gap-4">
                    <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeEditSoalModal()">Batal</button>
                    <button type="submit" class="rounded-lg bg-[#3986A3] w-1/2 px-6 py-2 text-white text-center hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Detail Data Soal -->
    <div id="detailSoalModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 text-center relative">
            <button type="button" onclick="closeDetailSoalModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            <h3 class="mb-4 text-xl leading-6 text-black font-bold">Detail Soal <span class="italic">Checkpoint</span></h3>
            <div class="flex flex-col gap-4 mb-5 mt-6">
                <div class="text-left">
                    <label class="block mb-1 font-medium text-gray-600">Tipe Soal</label>
                    <select class="w-full rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" disabled>
                        <option value="pilihan_ganda" selected>Pilihan Ganda</option>
                        <option value="uraian">Uraian</option>
                    </select>
                </div>
                <div class="text-left">
                    <label class="block mb-1 font-medium text-gray-600">Pertanyaan</label>
                    <input type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="Kapan Kanz punya pacar history nerd?" readonly>
                </div>
                <div class="text-left">
                    <label class="block mb-1 font-medium text-gray-600">Pilihan Jawaban</label>
                    <div id="detailPilihanContainer">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">A.</div>
                            <input type="text" class="w-4/5 rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="Belum pernah" readonly>
                            <select class="rounded-lg border appearance-none bg-none border-gray-300 px-2 py-2 bg-gray-100" disabled>
                                <option value="benar" selected>Benar</option>
                                <option value="salah">Salah</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">B.</div>
                            <input type="text" class="w-4/5 rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="Sudah 3x" readonly>
                            <select class="rounded-lg border appearance-none bg-none border-gray-300 px-2 py-2 bg-gray-100" disabled>
                                <option value="benar">Benar</option>
                                <option value="salah" selected>Salah</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">C.</div>
                            <input type="text" class="w-4/5 rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="Rahasia" readonly>
                            <select class="rounded-lg border appearance-none bg-none border-gray-300 px-2 py-2 bg-gray-100" disabled>
                                <option value="benar">Benar</option>
                                <option value="salah" selected>Salah</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">D.</div>
                            <input type="text" class="w-4/5 rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="Tidak akan pernah" readonly>
                            <select class="rounded-lg border appearance-none bg-none border-gray-300 px-2 py-2 bg-gray-100" disabled>
                                <option value="benar">Benar</option>
                                <option value="salah" selected>Salah</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">E.</div>
                            <input type="text" class="w-4/5 rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="3 bulan lagi" readonly>
                            <select class="rounded-lg border appearance-none bg-none border-gray-300 px-2 py-2 bg-gray-100" disabled>
                                <option value="benar">Benar</option>
                                <option value="salah" selected>Salah</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeDetailSoalModal()">Kembali</button>
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
        function openCreateSoalModal() {
            document.getElementById('createSoalModal').classList.remove('hidden');
        }
        function closeCreateSoalModal() {
            document.getElementById('createSoalModal').classList.add('hidden');
            document.getElementById('createSoalForm').reset();
        }
    </script>

    <script>
    let abjadPool = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T'];
    let usedAbjad = [];

    const pilihanContainer = document.getElementById('pilihanContainer');
    const addOptionButton = document.getElementById('addOptionButton');

    addOptionButton.addEventListener('click', function () {
        // Cari abjad pertama yang belum dipakai
        const abjad = abjadPool.find(a => !usedAbjad.includes(a));
        if (!abjad) return; // Jika abjad habis

        usedAbjad.push(abjad);

        const pilihanDiv = document.createElement('div');
        pilihanDiv.className = 'flex items-center gap-2 mb-2';
        pilihanDiv.setAttribute('data-abjad', abjad);

        pilihanDiv.innerHTML = `
            <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
            <input type="text" name="pilihan[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban pilihan ${abjad}" required>
            <select name="pilihan[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
                <option value="benar">Benar</option>
                <option value="salah">Salah</option>
            </select>
            <button type="button" class="bg-[#ECE6F0] rounded-lg w-1/12 h-auto pb-2 text-center align-top text-gray-500 font-bold px-2 text-2xl deleteOptionBtn">×</button>
        `;
        pilihanContainer.appendChild(pilihanDiv);

        // Event hapus
        pilihanDiv.querySelector('.deleteOptionBtn').addEventListener('click', function () {
            const abjadHapus = pilihanDiv.getAttribute('data-abjad');
            usedAbjad = usedAbjad.filter(a => a !== abjadHapus);
            pilihanDiv.remove();
        });
    });
</script>

<script>
    // Untuk modal edit
    let editAbjadPool = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T'];
    let editUsedAbjad = [];

    const editPilihanContainer = document.getElementById('editPilihanContainer');
    const editAddOptionButton = document.getElementById('editAddOptionButton');

    editAddOptionButton.addEventListener('click', function () {
        const abjad = editAbjadPool.find(a => !editUsedAbjad.includes(a));
        if (!abjad) return;
        editUsedAbjad.push(abjad);

        const pilihanDiv = document.createElement('div');
        pilihanDiv.className = 'flex items-center gap-2 mb-2';
        pilihanDiv.setAttribute('data-abjad', abjad);

        pilihanDiv.innerHTML = `
            <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
            <input type="text" name="pilihan[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban pilihan ${abjad}" required>
            <select name="pilihan[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
                <option value="benar">Benar</option>
                <option value="salah">Salah</option>
            </select>
            <button type="button" class="bg-[#ECE6F0] rounded-lg w-1/12 h-auto pb-2 text-center align-top text-gray-500 font-bold px-2 text-2xl deleteOptionBtn">×</button>
        `;
        editPilihanContainer.appendChild(pilihanDiv);

        pilihanDiv.querySelector('.deleteOptionBtn').addEventListener('click', function () {
            const abjadHapus = pilihanDiv.getAttribute('data-abjad');
            editUsedAbjad = editUsedAbjad.filter(a => a !== abjadHapus);
            pilihanDiv.remove();
        });
    });

    // Fungsi untuk membuka modal edit dan mengisi data
    function openEditSoalModal(soal) {
        document.getElementById('editSoalModal').classList.remove('hidden');
        document.getElementById('editSoalForm').action = soal.action_url;
        document.getElementById('edit_tipe').value = soal.tipe;
        document.getElementById('edit_question').value = soal.question;

        // Reset pilihan
        editPilihanContainer.innerHTML = '';
        editUsedAbjad = [];

        if (soal.pilihan && Array.isArray(soal.pilihan)) {
            soal.pilihan.forEach(function(pilihan) {
                const abjad = pilihan.abjad;
                editUsedAbjad.push(abjad);

                const pilihanDiv = document.createElement('div');
                pilihanDiv.className = 'flex items-center gap-2 mb-2';
                pilihanDiv.setAttribute('data-abjad', abjad);

                pilihanDiv.innerHTML = `
                    <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
                    <input type="text" name="pilihan[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" value="${pilihan.jawaban}" required>
                    <select name="pilihan[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
                        <option value="benar" ${pilihan.status === 'benar' ? 'selected' : ''}>Benar</option>
                        <option value="salah" ${pilihan.status === 'salah' ? 'selected' : ''}>Salah</option>
                    </select>
                    <button type="button" class="bg-[#ECE6F0] rounded-lg w-1/12 h-auto pb-2 text-center align-top text-gray-500 font-bold px-2 text-2xl deleteOptionBtn">×</button>
                `;
                editPilihanContainer.appendChild(pilihanDiv);

                pilihanDiv.querySelector('.deleteOptionBtn').addEventListener('click', function () {
                    const abjadHapus = pilihanDiv.getAttribute('data-abjad');
                    editUsedAbjad = editUsedAbjad.filter(a => a !== abjadHapus);
                    pilihanDiv.remove();
                });
            });
        }
    }

    function closeEditSoalModal() {
        document.getElementById('editSoalModal').classList.add('hidden');
        document.getElementById('editSoalForm').reset();
        editPilihanContainer.innerHTML = '';
        editUsedAbjad = [];
    }
</script>

<script>
    const tipeSelect = document.getElementById('tipe');
    const pilihanGandaSection = document.getElementById('pilihanGandaSection');
    const uraianSection = document.getElementById('uraianSection');

    tipeSelect.addEventListener('change', function() {
        if (this.value === 'uraian') {
            pilihanGandaSection.classList.add('hidden');
            uraianSection.classList.remove('hidden');
        } else {
            pilihanGandaSection.classList.remove('hidden');
            uraianSection.classList.add('hidden');
        }
    });
</script>

<script>
    // Ambil elemen pada modal edit
    const editTipeSelect = document.getElementById('edit_tipe');
    const editPilihanGandaSection = document.querySelector('#editSoalModal #pilihanGandaSection');
    const editUraianSection = document.querySelector('#editSoalModal #uraianSection');

    editTipeSelect.addEventListener('change', function() {
        if (this.value === 'uraian') {
            editPilihanGandaSection.classList.add('hidden');
            editUraianSection.classList.remove('hidden');
        } else {
            editPilihanGandaSection.classList.remove('hidden');
            editUraianSection.classList.add('hidden');
        }
    });

    // Jika ingin langsung menyesuaikan saat modal dibuka (misal dari data edit)
    function openEditSoalModal(soal) {
        document.getElementById('editSoalModal').classList.remove('hidden');
        document.getElementById('editSoalForm').action = soal.action_url;
        document.getElementById('edit_tipe').value = soal.tipe;
        document.getElementById('edit_question').value = soal.question;

        // Tampilkan/hide section sesuai tipe
        if (soal.tipe === 'uraian') {
            editPilihanGandaSection.classList.add('hidden');
            editUraianSection.classList.remove('hidden');
            // Isi jawaban uraian jika ada
            editUraianSection.querySelector('input[name="jawaban_uraian"]').value = soal.jawaban_uraian || '';
        } else {
            editPilihanGandaSection.classList.remove('hidden');
            editUraianSection.classList.add('hidden');
        }

        // Reset pilihan ganda
        editPilihanContainer.innerHTML = '';
        editUsedAbjad = [];

        if (soal.pilihan && Array.isArray(soal.pilihan)) {
            soal.pilihan.forEach(function(pilihan) {
                const abjad = pilihan.abjad;
                editUsedAbjad.push(abjad);

                const pilihanDiv = document.createElement('div');
                pilihanDiv.className = 'flex items-center gap-2 mb-2';
                pilihanDiv.setAttribute('data-abjad', abjad);

                pilihanDiv.innerHTML = `
                    <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
                    <input type="text" name="pilihan[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" value="${pilihan.jawaban}" required>
                    <select name="pilihan[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
                        <option value="benar" ${pilihan.status === 'benar' ? 'selected' : ''}>Benar</option>
                        <option value="salah" ${pilihan.status === 'salah' ? 'selected' : ''}>Salah</option>
                    </select>
                    <button type="button" class="bg-[#ECE6F0] rounded-lg w-1/12 h-auto pb-2 text-center align-top text-gray-500 font-bold px-2 text-2xl deleteOptionBtn">×</button>
                `;
                editPilihanContainer.appendChild(pilihanDiv);

                pilihanDiv.querySelector('.deleteOptionBtn').addEventListener('click', function () {
                    const abjadHapus = pilihanDiv.getAttribute('data-abjad');
                    editUsedAbjad = editUsedAbjad.filter(a => a !== abjadHapus);
                    pilihanDiv.remove();
                });
            });
        }
    }
</script>

<script>
    function openDetailSoalModal() {
        document.getElementById('detailSoalModal').classList.remove('hidden');
    }
    function closeDetailSoalModal() {
        document.getElementById('detailSoalModal').classList.add('hidden');
    }
</script>
@endpush
