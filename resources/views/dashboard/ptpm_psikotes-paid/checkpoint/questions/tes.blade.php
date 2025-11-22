@extends(
    "dashboard.layouts.app",
    [
        "title" => "Soal Checkpoint",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-5">
                <div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route("dashboard.checkpoint.index") }}">
                            <img src="{{ asset("assets/dashboard/images/back-btn.webp") }}" alt="Back Button" />
                        </a>
                        <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Data Soal <span class="italic">Checkpoint</span></p>
                    </div>
                    <p class="text-disabled py-2 text-gray-500">Halaman yang menampilkan dan mengelola data soal <span class="italic">Checkpoint</span>.</p>
                    <a href="javascript:void(0);" onclick="openCreateQuestionModal()" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                    </a>
                </div>
            </div>

            {{-- Questions Data Table --}}
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
                            @foreach ($questions as $question)
                                <tr id="" class="data-consume">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $question->type == 'multiple_choice' ? 'Pilihan Ganda' : 'Jawaban Singkat'}}</td>
                                    <td>{{ $question->text }}</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="javascript:void(0);" onclick="openDetailSoalModal({{ json_encode($question) }})" class="detail-button inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            style="background-color: #3b82f6">
                                            <i class="bx bx-show-alt text-white"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="openEditQuestionModal({{ json_encode([
                                                'id' => $question->id,
                                                'type' => $question->type,
                                                'question' => $question->text,
                                                'options' => $question->options ?? [],
                                                'correct_answer' => $question->correct_answer ?? null,
                                                'action_url' => route('dashboard.checkpoint.questions.update', $question->id),
                                            ]) }})"
                                            class="edit-button inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            style="background-color: #e9b306">
                                            <i class="bx bx-edit-alt text-white"></i>
                                        </a>
                                        <form id="deleteForm-{{ $question->id }}" action="{{ route("dashboard.checkpoint.questions.destroy", $question->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="delete-button inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444" data-id="{{ $question->id }}">
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

    <!-- Question's Create Modal -->
    <div id="createQuestionModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 text-center relative">
            <h3 class="mb-4 text-xl leading-6 text-black font-bold" id="modal-title">Tambah Soal <span class="italic">Checkpoint</span></h3>
            <form id="createSoalForm" method="POST" action="{{ route('dashboard.checkpoint.questions.store') }}">
                @csrf
                <div class="flex flex-col gap-4 mb-5 mt-6">
                    <div class="text-left">
                        <label class="block mb-1 font-medium text-gray-600">Tipe Soal</label>
                        <select id="type" name="type" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                            <option value="multiple_choice">Pilihan Ganda</option>
                            <option value="short_answer">Jawaban Singkat</option>
                        </select>
                    </div>
                    <div class="text-left">
                        <label class="block mb-1 font-medium text-gray-600">Pertanyaan</label>
                        <input type="text" id="question" name="question" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berapa hasil dari 2 + 5?" required>
                    </div>
                    <div id="multipleChoiceSection" class="max-h-52 overflow-y-auto">
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
                    <div id="shortAnswerSection" class="hidden max-h-52 overflow-y-auto">
                        <label class="block mb-1 font-medium text-gray-600">Jawaban Uraian</label>
                        <input type="text" name="correct_answer" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban uraian..." />
                    </div>
                </div>
                <div class="flex w-full justify-center gap-4">
                    <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeCreateQuestionModal()">Batal</button>
                    <button type="submit" class="rounded-lg bg-[#3986A3] w-1/2 px-6 py-2 text-white text-center hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Question's Edit Modal -->
    <div id="editQuestionModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 text-center relative">
            <h3 class="mb-4 text-xl leading-6 text-black font-bold" id="modal-title">Edit Soal <span class="italic">Checkpoint</span></h3>
            <form id="editSoalForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-4 mb-5 mt-6">
                    <div class="text-left">
                        <label class="block mb-1 font-medium text-gray-600">Tipe Soal</label>
                        <select id="edit_type" name="type" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                            <option value="multiple_choice">Pilihan Ganda</option>
                            <option value="short_answer">Jawaban Singkat</option>
                        </select>
                    </div>
                    <div class="text-left">
                        <label class="block mb-1 font-medium text-gray-600">Pertanyaan</label>
                        <input type="text" id="edit_question" name="question" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berapa hasil dari 2 + 5?" required>
                    </div>
                    <div id="editMultipleChoiceSection" class="max-h-52 overflow-y-auto">
                        <div class="text-left">
                            <div class="mb-6 mt-2 flex cursor-pointer items-center justify-center rounded-lg border border-dashed border-blue-500 py-2 text-blue-500" id="editAddOptionButton">
                                <h1 class="flex items-center gap-2">
                                    <i class="bx bx-plus-circle"></i>
                                    Tambahkan pilihan
                                </h1>
                            </div>
                            <div id="editPilihanContainer"></div>
                        </div>
                    </div>
                    <div id="editShortAnswerSection" class="hidden max-h-52 overflow-y-auto">
                        <label class="block mb-1 font-medium text-gray-600">Jawaban Uraian</label>
                        <input type="text" name="correct_answer" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban uraian..." />
                    </div>
                </div>
                <div class="flex w-full justify-center gap-4">
                    <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeEditQuestionModal()">Batal</button>
                    <button type="submit" class="rounded-lg bg-[#3986A3] w-1/2 px-6 py-2 text-white text-center hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Question's Detail Modal -->
    <div id="detailQuestionModal" class="fixed inset-0 z-10 hidden items-center justify-center bg-black bg-opacity-50 flex">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 text-center relative">
            <h3 class="mb-4 text-xl leading-6 text-black font-bold">Detail Soal <span class="italic">Checkpoint</span></h3>
            <div class="flex flex-col gap-4 mb-5 mt-6">
                <div class="text-left">
                    <label class="block mb-1 font-medium text-gray-600">Tipe Soal</label>
                    <select class="w-full rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" disabled>
                        <option value="multiple_choice" selected>Pilihan Ganda</option>
                        <option value="short_answer">Jawaban Singkat</option>
                    </select>
                </div>
                <div class="text-left">
                    <label class="block mb-1 font-medium text-gray-600">Pertanyaan</label>
                    <input type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="Kapan Kanz punya pacar history nerd?" readonly>
                </div>
                <div id="pilihanWrapper" class="text-left">
                    <label class="block mb-1 font-medium text-gray-600">Pilihan Jawaban</label>
                    <div id="detailPilihanContainer" class="max-h-52 overflow-y-auto"></div>
                </div>
                <div id="shortAnswerContainer" class="text-left hidden mb-4">
                    <label class="block mb-1 font-medium text-gray-600">Jawaban Uraian</label>
                    <p id="shortAnswerText" class="px-3 py-2 bg-gray-100 rounded-lg border border-gray-300"></p>
                </div>
            </div>
            <button type="button" class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeDetailQuestionModal()">Kembali</button>
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
        function openCreateQuestionModal() {
            document.getElementById('createQuestionModal').classList.remove('hidden');
        }
        function closeCreateQuestionModal() {
            document.getElementById('createQuestionModal').classList.add('hidden');
            document.getElementById('createSoalForm').reset();
        }
    </script>

    {{-- Modal Create --}}
    <script>
        let abjadPool = ['A','B','C','D'];
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
                <input type="text" name="options[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban pilihan ${abjad}" required>
                <select name="options[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
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
        const typeSelect = document.getElementById('type');
        const multipleChoiceSection = document.getElementById('multipleChoiceSection');
        const shortAnswerSection = document.getElementById('shortAnswerSection');

        typeSelect.addEventListener('change', function() {
            if (this.value === 'short_answer') {
                multipleChoiceSection.classList.add('hidden');
                shortAnswerSection.classList.remove('hidden');
            } else {
                multipleChoiceSection.classList.remove('hidden');
                shortAnswerSection.classList.add('hidden');
            }
        });
    </script>

    {{-- Modal Edit --}}
    <script>
        let editAbjadPool = ['A','B','C','D'];
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
                <input type="text" name="options[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban pilihan ${abjad}" required>
                <select name="options[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
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

        function closeEditQuestionModal() {
            document.getElementById('editQuestionModal').classList.add('hidden');
            document.getElementById('editSoalForm').reset();
            editPilihanContainer.innerHTML = '';
            editUsedAbjad = [];
        }
    </script>

    <script>
        // Ambil elemen pada modal edit
        const editTipeSelect = document.getElementById('edit_type');
        const editPilihanGandaSection = document.querySelector('#editQuestionModal #editMultipleChoiceSection');
        const editUraianSection = document.querySelector('#editQuestionModal #editShortAnswerSection');

        editTipeSelect.addEventListener('change', function() {
            if (this.value === 'short_answer') {
                editPilihanGandaSection.classList.add('hidden');
                editUraianSection.classList.remove('hidden');
            } else {
                editPilihanGandaSection.classList.remove('hidden');
                editUraianSection.classList.add('hidden');
            }
        });

        // Jika ingin langsung menyesuaikan saat modal dibuka (misal dari data edit)
        function openEditQuestionModal(soal) {
            document.getElementById('editQuestionModal').classList.remove('hidden');
            document.getElementById('editSoalForm').action = soal.action_url;
            document.getElementById('edit_type').value = soal.type;
            document.getElementById('edit_question').value = soal.question;

            // Tampilkan/hide section sesuai type
            if (soal.type === 'short_answer') {
                editPilihanGandaSection.classList.add('hidden');
                editUraianSection.classList.remove('hidden');
                // Isi jawaban short_answer jika ada
                editUraianSection.querySelector('input[name="correct_answer"]').value = soal.scoring?.correct_answer || '';
            } else {
                editPilihanGandaSection.classList.remove('hidden');
                editUraianSection.classList.add('hidden');
            }

            // Reset options ganda
            editPilihanContainer.innerHTML = '';
            editUsedAbjad = [];

            if (soal.options && Array.isArray(soal.options)) {
                soal.options.forEach(function(options) {
                    const abjad = options.key;
                    const jawaban = options.text;
                    const status = (options.key === soal.scoring.correct_answer) ? 'benar' : 'salah';

                    editUsedAbjad.push(abjad);

                    const pilihanDiv = document.createElement('div');
                    pilihanDiv.className = 'flex items-center gap-2 mb-2';
                    pilihanDiv.setAttribute('data-abjad', abjad);

                    pilihanDiv.innerHTML = `
                        <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
                        <input type="text" name="options[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" value="${options.text}" required>
                        <select name="options[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
                            <option value="benar" ${status === 'benar' ? 'selected' : ''}>Benar</option>
                            <option value="salah" ${status === 'salah' ? 'selected' : ''}>Salah</option>
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

    {{-- Modal Detail --}}
    <script>
        function openDetailQuestionModal() {
            document.getElementById('detailQuestionModal').classList.remove('hidden');
        }
        function closeDetailQuestionModal() {
            document.getElementById('detailQuestionModal').classList.add('hidden');
        }
    </script>

    <script>
        function openDetailSoalModal(soal) {
            document.getElementById('detailQuestionModal').classList.remove('hidden');

            // Isi type soal dan pertanyaan
            const typeSelect = document.querySelector('#detailQuestionModal select');
            typeSelect.value = soal.type; // pake 'type', bukan 'type'

            const questionInput = document.querySelector('#detailQuestionModal input[type="text"]');
            questionInput.value = soal.text; // pake 'text', bukan 'question'

            // Isi pilihan jawaban
            const pilihanWrapper = document.getElementById('pilihanWrapper');
            const pilihanContainer = document.getElementById('detailPilihanContainer');
            const shortAnswerContainer = document.getElementById('shortAnswerContainer');
            const shortAnswerText = document.getElementById('shortAnswerText');

            // reset tampilan
            pilihanWrapper.style.display = 'none';
            shortAnswerContainer.style.display = 'none';
            pilihanContainer.innerHTML = '';
            shortAnswerText.textContent = '';

            if (soal.type === 'multiple_choice' && soal.options && Array.isArray(soal.options)) {
                pilihanWrapper.style.display = 'block';
                soal.options.forEach(function(options) {
                    const abjad = options.key;
                    const jawaban = options.text;
                    const status = (options.key === soal.scoring.correct_answer) ? 'benar' : 'salah';

                    const dropdownClass = status === 'benar'
                        ? 'bg-green-500 text-white'
                        : 'bg-red-500 text-white';

                    const pilihanDiv = document.createElement('div');
                    pilihanDiv.className = 'flex items-center gap-2 mb-2';

                    pilihanDiv.innerHTML = `
                        <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
                        <input type="text" class="w-4/5 rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="${jawaban}" readonly>
                        <select class="rounded-lg border appearance-none bg-none border-gray-300 px-2 py-2 ${dropdownClass}" disabled>
                            <option value="benar" ${status === 'benar' ? 'selected' : ''}>Benar</option>
                            <option value="salah" ${status === 'salah' ? 'selected' : ''}>Salah</option>
                        </select>
                    `;
                    pilihanContainer.appendChild(pilihanDiv);
                });
            } else if (soal.type === 'short_answer') {
                shortAnswerContainer.style.display = 'block';
                shortAnswerText.textContent = soal.scoring?.correct_answer || '-';
            }
        }
    </script>
@endpush
