@extends(
    "landing.layouts.test",
    [
        "title" => "Psikotes Berbinar",
    ]
)

@section("content")
    <section class="h-screen lg:overflow-hidden">
        <div class="relative flex justify-center rounded-3xl max-sm:p-5 lg:mb-20 lg:mt-10">
            <div class="items-left flex flex-row justify-center overflow-hidden rounded-3xl lg:shadow-2xl" style="box-shadow: 0 0 25px rgba(0, 0, 0, 0.25)">
                <div class="items-left flex w-full flex-col md:flex-row">
                    <div class="t-container z-38 z-10 rounded-3xl bg-white px-4 max-sm:w-[95vw] max-sm:max-w-3xl max-sm:pr-10 lg:w-2/3 lg:max-w-3xl lg:px-14">
                        <!-- Tambahkan fixed width di sini -->
                        <div class="progress my-10 h-3 w-full overflow-hidden rounded-full bg-gray-200">
                            <div class="progress-bar ml-[1px] h-3 w-[20px] rounded-full bg-gradient-to-r from-[#3B88A4] to-[#72A9BE] text-end text-[13px] md:ml-0" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"><span class="ml-1 mr-2 font-semibold text-white"></span></div>
                        </div>

                        <form action="{{ route("psikotes-free.submit") }}" method="POST" class="flex flex-col">
                            @csrf
                            <div class="question mt-4 whitespace-normal lg:h-[72px] break-words text-lg font-bold text-[#333333] md:text-2xl lg:mt-6" style="max-width: 800px; word-wrap: break-word">
                                {{ $question->text }}
                            </div>

                            <p class="question mt-4 text-lg text-[#70787D] md:text-2xl lg:mb-10 lg:mt-6">Pilih satu jawaban :</p>

                            <div class="flex flex-row md:flex-col">
                                <div class="radio inline-box mt-6 flex w-full flex-col justify-between gap-5 md:flex-row md:gap-10 lg:flex-row">
                                    @foreach ($question->options as $option)
                                        <div class="flex flex-col items-center max-sm:flex-row lg:w-1/6">
                                            <label class="cursor-pointer" for="{{ $option["value"] }}">
                                                <input id="{{ $option["value"] }}" type="radio" name="answer" value="{{ $option["value"] }}" class="peer hidden" required />
                                                <div class="peer-checked:border-primary-alt flex h-14 w-14 items-center justify-center rounded-full border border-gray-300 font-bold shadow-[0_0_10px_0_#3986A380] transition peer-checked:bg-primary peer-checked:text-white lg:h-16 lg:w-16 lg:text-2xl">
                                                    {{ $option["value"] }}
                                                </div>
                                            </label>
                                            <span class="mt-2 text-center text-sm font-medium max-sm:ml-3 lg:text-base">
                                                {{ $option["text"] }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="button-test mt-10 flex flex-col-reverse justify-center md:flex-row lg:mb-10">
                                <!-- <button class="rounded-xl border-primary border-3 mb-5 lg:mx-2 bg-gradient-to-tr from-[#3986A3] to-[#225062] bg-clip-text text-transparent px-10 lg:px-14 py-1.5 font-medium text-lg max-sm:text-[15px]">Kembali</button> -->
                                <button type="submit" class="mb-5 rounded-xl bg-gradient-to-r from-[#3986A3] to-[#225062] px-10 py-1.5 text-lg font-medium text-white max-sm:text-[15px] lg:mx-2 lg:px-14">Selanjutnya</button>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                    <div class="1/3 lg:flex">
                        <div class="bg-white">
                            {{-- HERO IMG DESKTOP --}}
                            <div class="absolute right-[14%] top-[45%] -translate-y-1/2 max-sm:hidden" style="width: 300px; height: 300px; border-radius: 50%; background: #a2d7f0cc; filter: blur(60px); opacity: 1; z-index: 0"></div>

                            @if ($progress < 16.66)
                                <img src="{{ asset("assets/landing/images/psikotes-free/progress1.png") }}" alt="Ilustrasi-Tes" class="mt-10 hidden h-[600px] w-[600px] scale-75 lg:block" data-aos="fade-left" data-aos-duration="1500" />
                            @elseif ($progress < 33.33)
                                <img src="{{ asset("assets/landing/images/psikotes-free/progress2.png") }}" alt="Ilustrasi-Tes" class="mt-10 hidden h-[600px] w-[600px] scale-75 lg:block" data-aos="fade-left" data-aos-duration="1500" />
                            @elseif ($progress < 50)
                                <img src="{{ asset("assets/landing/images/psikotes-free/progress3.png") }}" alt="Ilustrasi-Tes" class="mt-10 hidden h-[600px] w-[600px] scale-75 lg:block" data-aos="fade-left" data-aos-duration="1500" />
                            @elseif ($progress < 66.66)
                                <img src="{{ asset("assets/landing/images/psikotes-free/progress4.png") }}" alt="Ilustrasi-Tes" class="mt-10 hidden h-[600px] w-[600px] scale-75 lg:block" data-aos="fade-left" data-aos-duration="1500" />
                            @elseif ($progress < 83.33)
                                <img src="{{ asset("assets/landing/images/psikotes-free/progress5.png") }}" alt="Ilustrasi-Tes" class="mt-10 hidden h-[600px] w-[600px] scale-75 lg:block" data-aos="fade-left" data-aos-duration="1500" />
                            @elseif ($progress < 100)
                                <img src="{{ asset("assets/landing/images/psikotes-free/progress6.png") }}" alt="Ilustrasi-Tes" class="mt-10 hidden h-[600px] w-[600px] scale-75 lg:block" data-aos="fade-left" data-aos-duration="1500" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--
            <div id="countdownExample" class="absolute right-4 top-4">
            <div class="values rounded-full bg-blue-500 px-5 py-3 text-white">00:00:00</div>
            </div>
        --}}
    </section>
@endsection

@push("script")
    <script>
        document.querySelectorAll('input[name="answer"]').forEach((radio) => {
            radio.addEventListener('change', function () {
                // Reset semua label warna
                document.querySelectorAll('.radio-label').forEach((p) => {
                    p.classList.remove('text-primary');
                });

                // Cari SEMUA label dengan data-value sesuai value radio yang dipilih
                document.querySelectorAll('.radio-label[data-value="' + this.value + '"]').forEach(function (label) {
                    label.classList.add('text-primary');
                });
            });
        });
    </script>

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
            console.log(timer.getSeconds);
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
                const response = await fetch('{{ route("psikotes-free.attempt.times-up") }}', {
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
                window.location.href = @json(route("psikotes-free.feedback.show"));
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
@endpush
