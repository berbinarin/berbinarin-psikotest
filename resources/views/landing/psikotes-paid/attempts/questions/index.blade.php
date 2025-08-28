@extends(
    "landing.layouts.test",
    [
        "title" => "Tes " . str_pad($question->tool->order, 2, "0", STR_PAD_LEFT),
    ]
)

@push("style")
    <style>
        ul {
            padding-left: 1rem;
            list-style: disc !important;
        }
    </style>
@endpush

@section("content")
    <section>
        <div class="relative flex h-screen w-screen items-center justify-center overflow-hidden bg-cover bg-center md:bg-cover md:bg-center" style="background-image: url('{{ asset("assets/auth/images/Login.png") }}')">
            <div class="flex h-[550px] w-[1227.33px] flex-col rounded-[20px] border-[1.33px] border-sky-100 bg-white/40 backdrop-blur-[6.67px]">
                <div class="relative flex flex-row items-center px-[55.33px] pt-[23.33px]">
                    <div class="flex flex-row gap-4 rounded-[50px] bg-gradient-to-b from-[#F7B23B] to-[#916823] p-[1px]">
                        <div class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-white px-[19.92px] py-[7.47px]">
                            <img src="{{ asset("assets/auth/images/logo-berbinar.png") }}" class="h-[34.36px] w-[33.36px]" />
                            <img src="{{ asset("assets/auth/images/psikotest.png") }}" class="h-[34.36px] w-[33.36px]" />
                        </div>
                    </div>

                    <h1 class="absolute left-1/2 top-[65%] -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans text-[26.67px] font-bold text-transparent">Tes {{ str_pad($question->tool->order, 2, "0", STR_PAD_LEFT) }}</h1>
                </div>

                <form id="question-form" class="flex-1" action="{{ route("psikotes-paid.attempt.submit") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mx-auto flex h-full w-[565.33px] flex-col items-center gap-8 px-6 pt-7">
                        <div class="relative flex w-full flex-col items-center justify-center">
                            <div class="relative h-[6.67px] w-full rounded-md bg-[#D3D3D3]">
                                <div class="relative h-[6.67px] rounded-md bg-[#E9B306]" style="width: {{ $progress }}%">
                                    <span class="absolute right-0 top-1/2 block h-[14.46px] w-[14.46px] -translate-y-1/2 translate-x-1/2 rounded-full bg-[#E9B306]"></span>
                                </div>
                            </div>
                            <span class="absolute -top-6 right-0 text-xs font-bold text-black">{{ $progress }}%</span>
                        </div>

                        <div class="mx-auto flex w-full flex-1 flex-col gap-4">
                            @if ($question->type)
                                @include("landing.psikotes-paid.attempts.questions." . Str::slug($question->type))
                            @endif
                        </div>

                        @if ($question->type !== "ordering")
                            <button class="mb-6 mt-2 h-[43.67px] w-[136px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selanjutnya</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal -->
    {{-- SELALU RENDER KERANGKA MODAL INI, TAPI DENGAN CLASS "hidden" --}}
    <div id="checkpoint-modal" class="fixed inset-0 z-[999] flex hidden items-center justify-center bg-black/50">
        <div class="min-w-[400px] rounded-xl bg-white p-6 px-10 shadow-lg">
            <h2 class="mb-4 text-lg font-bold">Pertanyaan Cepat!</h2>

            {{-- Konten dinamis akan diisi oleh JavaScript --}}
            <p id="checkpoint-text" class="mb-4 text-center"></p>
            <div id="checkpoint-answers" class="mb-6 flex justify-center gap-4"></div>

            <div class="flex justify-center">
                <button id="checkpoint-submit-button" type="button" class="rounded-lg bg-[#106681] px-6 py-2 font-bold text-white">Selanjutnya</button>
            </div>
        </div>
    </div>

    <div id="countdownExample" class="absolute right-0 top-0">
        <span class="values"></span>
    </div>
@endsection

@push("script")
    <script type="module">
        const question = @json($question->load("section"));
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            width: '500px',
            customClass: {
                popup: 'toast',
            },
        });

        const duration = question.section.duration * 60000;

        // Tambah target-time ke local storage jika belum dibuat
        // Hindari mengganti nilai target-time jika sudah ada di local storage
        if (!localStorage.getItem('target-time')) {
            localStorage.setItem('target-time', new Date().getTime() + duration);
        }

        // Tambah section-order ke local storage jika belum dibuat
        // Hindari mengganti nilai section-order jika sudah ada di local storage
        if (!localStorage.getItem('section-order')) {
            localStorage.setItem('section-order', question.section.order);
        }

        // Jika section-order di local storage berbeda dengan section.order di question. (berpindah section)
        if (localStorage.getItem('section-order') != question.section.order) {
            localStorage.setItem('target-time', new Date().getTime() + duration);
            localStorage.setItem('section-order', question.section.order);
        }

        const target = Number(localStorage.getItem('target-time'));
        const diff = new Date(target - new Date().getTime());

        const timer = new Timer();
        timer.start({ countdown: true, startValues: { minutes: diff.getMinutes(), seconds: diff.getSeconds() } });

        $('#countdownExample .values').html(timer.getTimeValues().toString());

        timer.addEventListener('secondsUpdated', function (e) {
            $('#countdownExample .values').html(timer.getTimeValues().toString());
            if (timer.getTimeValues().minutes === 1 && timer.getTimeValues().seconds === 0) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Waktu tersisa 1 menit untuk section ini!',
                    timer: 5000,
                });
            }
        });

        timer.addEventListener('targetAchieved', async function (e) {
            try {
                // Kirim request untuk menghapus session dan TUNGGU (await) hingga selesai
                const response = await fetch('{{ route("psikotes-paid.attempt.times-up") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': @json(csrf_token()),
                    },
                });
            } catch (error) {
                console.error('Fetch to times-up failed:', error);
            } finally {
                localStorage.removeItem('target-time');
                localStorage.removeItem('section-order');
                localStorage.removeItem('checkpoint_deadline');
                window.location.href = @json(route("psikotes-paid.attempt.complete"));
            }
        });

        // Mereset input  ketika back menggunakan browser
        window.addEventListener('pageshow', function (event) {
            if (event.persisted || performance.getEntriesByType('navigation')[0].type === 'back_forward') {
                document.querySelectorAll('input, textarea, select').forEach((el) => {
                    if (el.type === 'radio' || el.type === 'checkbox') {
                        el.checked = false;
                    } else if (el.tagName.toLowerCase() === 'select') {
                        el.selectedIndex = 0;
                    } else {
                        el.value = '';
                    }
                });
            }
        });

        // ---===[ LOGIKA CHECKPOINT BARU (CLIENT-SIDE) ]===---
        const CHECKPOINT_INTERVAL_MS = 10 * 60 * 1000; // 10 menit
        const CHECKPOINT_DEADLINE_KEY = 'checkpoint_deadline';

        // Inisialisasi deadline jika belum ada
        if (!localStorage.getItem(CHECKPOINT_DEADLINE_KEY)) {
            localStorage.setItem(CHECKPOINT_DEADLINE_KEY, new Date().getTime() + CHECKPOINT_INTERVAL_MS);
        }

        // Ambil semua elemen yang dibutuhkan
        const mainForm = document.getElementById('question-form');
        const nextButton = document.getElementById('next-button');
        const checkpointModal = document.getElementById('checkpoint-modal');

        // Fungsi untuk menampilkan modal
        async function showCheckpointModal() {
            try {
                // 1. Ambil soal dari server
                const response = await fetch('{{ route("psikotes-paid.attempt.get-checkpoint-question") }}');
                if (!response.ok) throw new Error('Failed to fetch question');
                const question = await response.json();

                // 2. Isi konten modal dengan data dari server
                document.getElementById('checkpoint-text').textContent = question.text;
                const answersContainer = document.getElementById('checkpoint-answers');
                answersContainer.innerHTML = ''; // Kosongkan dulu

                // Buat input tersembunyi untuk ID
                const idInput = `<input type="hidden" name="checkpoint_question_id" value="${question.id}">`;
                answersContainer.insertAdjacentHTML('beforeend', idInput);

                // Buat pilihan jawaban
                if (question.type === 'multiple_choice') {
                    const ul = document.createElement('ul');
                    ul.className = 'flex !list-none gap-4 !pl-0';
                    question.options.forEach((option) => {
                        ul.innerHTML += `
                        <li>
                            <label class="flex h-10 min-w-10 items-center justify-center rounded-lg border bg-white px-4 text-black has-[input:checked]:bg-[#E5A639] has-[input:checked]:text-white">
                                <input type="radio" name="checkpoint_answer" value="${option.key}" class="hidden" required />
                                <span>${option.text}</span>
                            </label>
                        </li>
                    `;
                    });
                    answersContainer.appendChild(ul);
                } else {
                    answersContainer.innerHTML += `<input type="text" class="w-full rounded-lg border-primary" name="checkpoint_answer" placeholder="Ketik jawaban Anda..." required />`;
                }

                // 3. Tampilkan modal
                checkpointModal.classList.remove('hidden');
            } catch (error) {
                console.error('Could not show checkpoint modal:', error);
                // Jika gagal memuat modal, kirim saja formnya agar user tidak stuck.
                mainForm.submit();
            }
        }

        // Listener untuk tombol "Selanjutnya" UTAMA
        nextButton.addEventListener('click', () => {
            const deadline = localStorage.getItem(CHECKPOINT_DEADLINE_KEY);
            const now = new Date().getTime();

            if (deadline && now >= parseInt(deadline)) {
                // WAKTUNYA CHECKPOINT: Tampilkan modal, JANGAN submit form
                showCheckpointModal();
            } else {
                // BUKAN WAKTUNYA CHECKPOINT: Langsung submit form
                mainForm.submit();
            }
        });

        // Listener untuk tombol "Selanjutnya" DI DALAM MODAL (DENGAN PERBAIKAN)
        document.getElementById('checkpoint-submit-button').addEventListener('click', () => {
            // Ambil form utama
            const mainForm = document.getElementById('question-form');

            // 1. Ambil input jawaban dari modal
            const answer = document.querySelector('[name="checkpoint_answer"]:checked, [name="checkpoint_answer"][type="text"]');

            // ---===[ PERBAIKAN 1: Tambahkan baris ini untuk mencari input ID ]===---
            // 2. Ambil input ID pertanyaan yang tersembunyi dari modal
            const questionIdInput = document.querySelector('[name="checkpoint_question_id"]');

            // Validasi sederhana
            if (!answer || !answer.value) {
                alert('Silakan pilih atau isi jawaban terlebih dahulu.');
                return;
            }

            // Buat elemen <input> baru untuk jawaban checkpoint
            const hiddenAnswer = document.createElement('input');
            hiddenAnswer.type = 'hidden';
            hiddenAnswer.name = 'checkpoint_answer';
            // ---===[ PERBAIKAN 2: Gunakan variabel 'answer' yang benar ]===---
            hiddenAnswer.value = answer.value;

            // Buat elemen <input> baru untuk ID pertanyaan checkpoint
            const hiddenId = document.createElement('input');
            hiddenId.type = 'hidden';
            hiddenId.name = 'checkpoint_question_id';
            // ---===[ PERBAIKAN 3: Gunakan variabel 'questionIdInput' yang baru kita ambil ]===---
            hiddenId.value = questionIdInput.value;

            // Masukkan (inject) kedua elemen baru tersebut ke dalam form utama
            mainForm.appendChild(hiddenAnswer);
            mainForm.appendChild(hiddenId);

            // Reset deadline untuk siklus 10 menit berikutnya
            localStorage.setItem(CHECKPOINT_DEADLINE_KEY, new Date().getTime() + CHECKPOINT_INTERVAL_MS);

            // Submit form utama yang SEKARANG sudah berisi data checkpoint
            mainForm.submit();
        });
    </script>
@endpush
