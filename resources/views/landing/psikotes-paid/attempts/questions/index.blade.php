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

                <form class="flex-1" action="{{ route("psikotes-paid.attempt.submit") }}" method="post" enctype="multipart/form-data">
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
    <div id="quick-question-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="w-[400px] rounded-xl bg-white p-6 shadow-lg">
            <!-- Header -->
            <h2 class="mb-4 text-lg font-bold">Pertanyaan Cepat!</h2>

            <!-- Isi pertanyaan -->
            <p id="question-text" class="mb-4 text-center"></p>

            <!-- Pilihan jawaban -->
            <div id="answers" class="mb-6 flex justify-center gap-4"></div>

            <!-- Tombol lanjut -->
            <div class="flex justify-center">
                <button id="next-btn" class="rounded-lg bg-[#106681] px-6 py-2 font-bold text-white">Selanjutnya</button>
            </div>
        </div>
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
    </script>

    <script type="module">
        // generate soal
        function generateQuestion() {
            const a = Math.floor(Math.random() * 10) + 1;
            const b = Math.floor(Math.random() * 10) + 1;
            const correctAnswer = a + b;

            document.getElementById('question-text').innerText = `Berapa hasil dari ${a} + ${b}?`;

            // buat pilihan jawaban
            let options = new Set([correctAnswer]);
            while (options.size < 4) {
                let fake = Math.floor(Math.random() * 20) + 1;
                if (fake !== correctAnswer) options.add(fake);
            }

            // acak urutan
            const shuffled = Array.from(options).sort(() => Math.random() - 0.5);

            const answersDiv = document.getElementById('answers');
            answersDiv.innerHTML = '';
            shuffled.forEach((num) => {
                const btn = document.createElement('button');
                btn.innerText = num;
                btn.className = 'answer h-[40px] w-[40px] rounded-lg border bg-white text-black';
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.answer').forEach((b) => {
                        b.classList.remove('bg-[#E5A639]', 'text-white');
                        b.classList.add('bg-white', 'text-black');
                    });
                    btn.classList.remove('bg-white', 'text-black');
                    btn.classList.add('bg-[#E5A639]', 'text-white');
                });
                answersDiv.appendChild(btn);
            });

            return correctAnswer;
        }

        let correctAnswer = generateQuestion();

        // selanjutnya
        document.getElementById('next-btn').addEventListener('click', () => {
            // Cek jawaban
            const selected = document.querySelector('.answer.bg-\\[\\#E5A639\\]');
            // if (!selected) {
            //     alert('Pilih salah satu jawaban');
            //     return;
            // }
            // if (parseInt(selected.innerText) === correctAnswer) {
            //     alert('Benar');
            // } else {
            //     alert('Salah');
            // }

            // Tutup modal
            document.getElementById('quick-question-modal').classList.add('hidden');
        });
    </script>
@endpush
