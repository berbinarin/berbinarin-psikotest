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

@include("components.alert")
@section("content")
    <section>
        <div class="relative flex h-screen w-screen items-center justify-center overflow-hidden bg-cover bg-center md:bg-cover md:bg-center" style="background-image: url('{{ asset("assets/auth/images/Login.webp") }}')">
            <div class="flex h-[550px] w-[1227.33px] flex-col rounded-[20px] border-[1.33px] border-sky-100 bg-white/40 backdrop-blur-[6.67px]">
                <div class="relative flex flex-row items-center px-[55.33px] pt-[23.33px]">
                    <div class="flex flex-row gap-4 rounded-[50px] bg-gradient-to-b from-[#F7B23B] to-[#916823] p-[1px]">
                        <div class="flex flex-row items-center justify-center gap-4 rounded-[50px] bg-white px-[19.92px] py-[7.47px]">
                            <img src="{{ asset("assets/auth/images/logo-berbinar.webp") }}" class="h-[34.36px] w-[33.36px]" />
                            <img src="{{ asset("assets/auth/images/psikotest.webp") }}" class="h-[34.36px] w-[33.36px]" />
                        </div>
                    </div>

                    <h1 class="absolute left-1/2 top-[65%] -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans text-[26.67px] font-bold text-transparent">Tes {{ str_pad($question->tool->order, 2, "0", STR_PAD_LEFT) }}</h1>
                </div>

                <form id="question-form" class="flex-1" action="{{ route("psikotes-paid.attempt.submit") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}" />
                    {{-- action digunakan backend untuk membedakan alur next vs back --}}
                    <input type="hidden" name="action" id="form-action" value="next" />
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
                            @if ($question->tool->name === "CFIT" && Str::startsWith($question->section->title ?? "", "Contoh"))
                                <p class="text-center font-plusJakartaSans text-sm font-semibold text-[#106681]">
                                    {{ $question->section->title }}
                                </p>
                            @endif
                            @if ($question->type)
                                @include("landing.psikotes-paid.attempts.questions." . Str::slug($question->type))
                            @endif
                        </div>

                        @if ($question->tool->name == "D4 Bagian 1" || $question->tool->name == "D4 Bagian 2")
                            <div class="mb-6 mt-2 flex justify-center gap-4">
                                @if (!empty($canGoBack))
                                    {{-- Tombol back hanya tampil untuk tool yang masuk allowlist di AttemptService::canGoBack --}}
                                    <button type="submit" name="action" value="back" formnovalidate id="back-button" class="mb-6 mt-2 h-[43.67px] w-[136px] rounded-[6.67px] border border-[#106681] bg-white font-plusJakartaSans text-[13.33px] font-bold text-[#106681]">Sebelumnya</button>
                                @endif
                                <button type="button" id="submit-button" class="mb-6 mt-2 h-[43.67px] w-[136px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selesai</button>
                                <button type="button" id="next-button" class="mb-6 mt-2 h-[43.67px] w-[136px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selanjutnya</button>
                            </div>
                        @elseif ($question->type !== "ordering")
                            <div class="mb-6 mt-2 flex justify-center gap-4">
                                @if (!empty($canGoBack))
                                    {{-- Tombol back hanya tampil untuk tool yang masuk allowlist di AttemptService::canGoBack --}}
                                    <button type="submit" name="action" value="back" formnovalidate id="back-button" class="h-[43.67px] w-[136px] rounded-[6.67px] border border-[#106681] bg-white font-plusJakartaSans text-[13.33px] font-bold text-[#106681]">Sebelumnya</button>
                                @endif
                                <button type="button" id="next-button" class="h-[43.67px] w-[136px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selanjutnya</button>
                            </div>
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

    <!-- Modal Konfirmasi Selesai -->
    <div id="confirm-finish-modal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
        <div
            class="relative w-[560px] rounded-[20px] bg-white p-6 font-plusJakartaSans shadow-lg"
            style="
                background:
                    linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat,
                    white;
                border-radius: 20px;
                background-clip: padding-box, border-box;
            "
        >
            <!-- Warning Icon -->
            <img src="{{ asset("/assets/dashboard/images/warning.webp") }}" alt="Warning Icon" class="mx-auto h-[83px] w-[83px]" />

            <!-- Title -->
            <h2 class="mt-4 text-center font-plusJakartaSans text-2xl font-bold text-stone-900">Selesaikan Tes?</h2>

            <!-- Message -->
            <p class="mt-2 text-center text-base font-medium text-black">Apakah Anda yakin ingin mengakhiri tes ini sekarang?</p>

            <!-- Actions -->
            <div class="mt-6 flex justify-center gap-3">
                <button type="button" id="cancel-finish-btn" class="rounded-lg border border-stone-300 px-[62px] py-[6px] text-stone-700">Tidak</button>
                <button type="button" id="confirm-finish-btn" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-[62px] py-[6px] font-medium text-white">Ya</button>
            </div>
        </div>
    </div>
@endsection

@push("script")
    <script type="module">
        const tool = @json($tool);
        const question = @json($question->load("section"));
        const attemptId = {{ $attemptId }};
        const currentSectionOrder = String(question.section.order);
        const targetTimeKey = `target-time_${attemptId}_${currentSectionOrder}`;
        const checkpointDeadlineKey = `checkpoint_deadline_${attemptId}`;
        const duration = question.section.duration * 60000;
        const timerKeyPrefix = `target-time_${attemptId}_`;

        function clearAttemptTimerKeys() {
            Object.keys(localStorage).forEach((key) => {
                if (key.startsWith(timerKeyPrefix)) {
                    localStorage.removeItem(key);
                }
            });
        }

        // Simpan deadline timer per section agar refresh tidak mereset waktu.
        const startAtOrder = 4;
        const targetToolName = "D4 Bagian 1";
        let shouldInitTimer = true;

        if (tool.name === targetToolName) {
            if (question.order >= startAtOrder) {
                if (!localStorage.getItem(targetTimeKey)) {
                    localStorage.setItem(targetTimeKey, new Date().getTime() + duration);
                }
            } else {
                localStorage.removeItem(targetTimeKey);
                $('#countdownExample .values').html('00:00');
                shouldInitTimer = false;
            }
        } else {
            if (!localStorage.getItem(targetTimeKey)) {
                localStorage.setItem(targetTimeKey, new Date().getTime() + duration);
            }
        }

        if (shouldInitTimer) {
            const target = Number(localStorage.getItem(targetTimeKey) || 0);
            const diff = new Date(target - new Date().getTime());

            const timer = new Timer();
            timer.start({
                countdown: true,
                startValues: {
                    minutes: diff.getMinutes(),
                    seconds: diff.getSeconds(),
                },
            });

            $('#countdownExample .values').html(timer.getTimeValues().toString());

            timer.addEventListener('secondsUpdated', function (e) {
                $('#countdownExample .values').html(timer.getTimeValues().toString());
                if (timer.getTimeValues().minutes === 1 && timer.getTimeValues().seconds === 0) {
                    window.dispatchEvent(
                        new CustomEvent('show-alert', {
                            detail: {
                                icon: @json(asset("assets/dashboard/images/warning.webp")),
                                title: 'Waktu tersisa 1 menit untuk bagian ini!',
                                message: '',
                                type: 'info',
                            },
                        }),
                    );
                }
            });

            timer.addEventListener('targetAchieved', async function (e) {
                let shouldRedirectQuestion = false;

                try {
                    const extendableTests = ['BAUM', 'HTP', 'DAP'];

                    if (extendableTests.includes(tool.name)) {
                        const result = await Swal.fire({
                            title: 'Waktu Habis!',
                            text: 'Apakah Anda ingin melanjutkan tes?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Lanjutkan',
                            cancelButtonText: 'Selesai',
                            reverseButtons: true,
                        });

                        if (result.isConfirmed) {
                            window.dispatchEvent(
                                new CustomEvent('show-alert', {
                                    detail: {
                                        icon: @json(asset("assets/dashboard/images/success.webp")),
                                        title: 'Waktu pengerjaan tes telah ditambahkan!',
                                        message: '',
                                        type: 'info',
                                    },
                                }),
                            );

                            return; // jangan lanjut ke complete
                        }
                    }

                    // Backend menentukan apakah harus pindah section (lanjut soal)
                    // atau benar-benar selesai.
                    const response = await fetch('{{ route("psikotes-paid.attempt.times-up") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            Accept: 'application/json',
                            'X-CSRF-TOKEN': @json(csrf_token()),
                        },
                    });

                    const payload = await response.json().catch(() => ({}));
                    shouldRedirectQuestion = Boolean(payload?.should_redirect_question);
                } catch (error) {
                    console.error('Fetch to times-up failed:', error);
                } finally {
                    localStorage.removeItem(targetTimeKey);
                    localStorage.removeItem(checkpointDeadlineKey);
                    if (!shouldRedirectQuestion) {
                        clearAttemptTimerKeys();
                    }
                    window.location.href = shouldRedirectQuestion
                        ? @json(route("psikotes-paid.attempt.question"))
                        : @json(route("psikotes-paid.attempt.complete"));
                }
            });
        }

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

        // ---===[ LOGIKA UNTUK TOMBOL "SELESAI" ]===---
        const submitButton = document.getElementById('submit-button');
        const confirmFinishModal = document.getElementById('confirm-finish-modal');
        const confirmFinishBtn = document.getElementById('confirm-finish-btn');
        const cancelFinishBtn = document.getElementById('cancel-finish-btn');

        if (submitButton) {
            submitButton.addEventListener('click', (e) => {
                e.preventDefault();
                confirmFinishModal.classList.remove('hidden');
            });
        }

        if (cancelFinishBtn) {
            cancelFinishBtn.addEventListener('click', () => {
                confirmFinishModal.classList.add('hidden');
            });
        }

        if (confirmFinishBtn) {
            confirmFinishBtn.addEventListener('click', async () => {
                try {
                    await fetch('{{ route("psikotes-paid.attempt.times-up") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            Accept: 'application/json',
                            'X-CSRF-TOKEN': @json(csrf_token()),
                        },
                    });
                } catch (error) {
                    console.error('Error finishing test:', error);
                } finally {
                    clearAttemptTimerKeys();
                    localStorage.removeItem(checkpointDeadlineKey);
                    window.location.href = @json(route("psikotes-paid.attempt.complete"));
                }
            });
        }

        // ---===[ LOGIKA CHECKPOINT BARU (CLIENT-SIDE) ]===---
        const CHECKPOINT_INTERVAL_MS = 5 * 60 * 1000; // 5 menit
        const CHECKPOINT_DEADLINE_KEY = checkpointDeadlineKey;

        // Inisialisasi deadline jika belum ada
        if (!localStorage.getItem(CHECKPOINT_DEADLINE_KEY)) {
            localStorage.setItem(CHECKPOINT_DEADLINE_KEY, new Date().getTime() + CHECKPOINT_INTERVAL_MS);
        }

        // Ambil semua elemen yang dibutuhkan
        const mainForm = document.getElementById('question-form');
        const formAction = document.getElementById('form-action');
        const nextButton = document.getElementById('next-button');
        const checkpointModal = document.getElementById('checkpoint-modal');
        const backButton = document.getElementById('back-button');
        const checkpointSubmitButton = document.getElementById('checkpoint-submit-button');
        let isSubmitting = false;

        function lockAndSubmitMainForm() {
            if (!mainForm || isSubmitting) {
                return;
            }

            isSubmitting = true;
            [nextButton, backButton, submitButton, checkpointSubmitButton].forEach((button) => {
                if (button) {
                    button.disabled = true;
                }
            });

            mainForm.submit();
        }

        if (mainForm) {
            mainForm.addEventListener('submit', (event) => {
                if (isSubmitting) {
                    event.preventDefault();
                    return;
                }

                isSubmitting = true;
                [nextButton, backButton, submitButton, checkpointSubmitButton].forEach((button) => {
                    if (button) {
                        button.disabled = true;
                    }
                });
            });
        }

        // Enter di form selalu dianggap aksi "next", bukan "back".
        // Khusus textarea tetap default agar user bisa membuat baris baru.
        if (mainForm) {
            mainForm.addEventListener('keydown', (event) => {
                if (event.key !== 'Enter') {
                    return;
                }

                const target = event.target;
                const tagName = target?.tagName?.toLowerCase();
                if (tagName === 'textarea') {
                    return;
                }

                event.preventDefault();
                formAction.value = 'next';

                if (nextButton) {
                    nextButton.click();
                    return;
                }

                lockAndSubmitMainForm();
            });
        }

        // Fungsi untuk menampilkan modal
        async function showCheckpointModal() {
            try {
                // 1. Ambil soal dari server
                const response = await fetch('{{ route("psikotes-paid.attempt.get-checkpoint-question") }}');
                if (!response.ok) throw new Error('Failed to fetch question');
                const checkpointQuestion = await response.json();

                // 2. Isi konten modal dengan data dari server
                document.getElementById('checkpoint-text').textContent = checkpointQuestion.text;
                const answersContainer = document.getElementById('checkpoint-answers');
                answersContainer.innerHTML = ''; // Kosongkan dulu

                // Buat input tersembunyi untuk ID
                const idInput = `<input type="hidden" name="checkpoint_question_id" value="${checkpointQuestion.id}">`;
                answersContainer.insertAdjacentHTML('beforeend', idInput);

                // Buat pilihan jawaban
                if (checkpointQuestion.type === 'multiple_choice') {
                    const ul = document.createElement('ul');
                    ul.className = 'flex !list-none gap-4 !pl-0';
                    checkpointQuestion.options.forEach((option) => {
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
                lockAndSubmitMainForm();
            }
        }

        // Listener untuk tombol "Selanjutnya" UTAMA
        if (nextButton) {
            nextButton.addEventListener('click', (e) => {
                e.preventDefault();
                formAction.value = 'next';
                nextButton.disabled = true;

                const deadline = localStorage.getItem(CHECKPOINT_DEADLINE_KEY);
                const now = new Date().getTime();

                if (deadline && now >= parseInt(deadline)) {
                    // WAKTUNYA CHECKPOINT: Tampilkan modal, JANGAN submit form
                    showCheckpointModal().finally(() => {
                        if (!isSubmitting) {
                            nextButton.disabled = false;
                        }
                    });
                } else {
                    // BUKAN WAKTUNYA CHECKPOINT: Langsung submit form
                    lockAndSubmitMainForm();
                }
            });
        }

        // Listener untuk tombol "Selanjutnya" DI DALAM MODAL (DENGAN PERBAIKAN)
        checkpointSubmitButton.addEventListener('click', () => {
            // Ambil form utama
            const mainForm = document.getElementById('question-form');
            formAction.value = 'next';

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
            lockAndSubmitMainForm();
        });
    </script>
@endpush
