@extends('landing.layouts.app', [
'title' => 'Psikotest Berbinar',
'active' => 'Test',
'page' => 'Tes',
])

@section('content')
<section>
    <div class="rounded-3xl justify-center flex relative max-sm:p-5 lg:mt-20 lg:mb-20">
        <div class="rounded-3xl overflow-hidden flex flex-row justify-center items-left lg:shadow-2xl" style="box-shadow: 0 0 25px rgba(0,0,0,0.25);">

            <div class="flex flex-col md:flex-row w-full items-left">
                <div class="t-container bg-white px-4 lg:px-14 z-38 lg:w-2/3 max-sm:max-w-3xl rounded-3xl z-10">
                    <div class="progress w-full h-3 my-10 bg-gray-200 rounded-full overflow-hidden">
                        <div class="progress-bar w-[20px] h-3 bg-gradient-to-r from-[#3B88A4] to-[#72A9BE] ml-[1px] md:ml-0 rounded-full text-[13px] text-end" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"><span class="font-semibold ml-1 mr-2 text-white"></span>
                        </div>
                    </div>
                    <!-- <div class="quest-container w-full bg-white rounded-3xl p-10"> -->

                        <form action="{{ route('psikotes-free.submit') }}" method="POST" class="flex flex-col">
                            @csrf
                            <!-- <p class="question text-lg md:text-2xl text-[#70787D]">
                                Pertanyaan 02
                            </p> -->

                            <p class="question text-lg md:text-2xl mt-4 lg:mt-6 font-bold text-[#333333]">
                                {{ $question->text }}
                            </p>

                            <p class="question text-lg md:text-2xl mt-4 lg:mt-6 lg:mb-10 text-[#70787D]">
                                Pilih satu jawaban :
                            </p>

                            <div class="flex flex-row md:flex-col">
                                <div class="radio flex flex-col lg:flex-row md:flex-row w-full justify-between inline-box gap-5 md:gap-10 mt-6">
                                    @foreach ($question->options as $option)
                                        <div class="flex flex-col items-center">
                                            <label class="cursor-pointer" for="{{ $option['value'] }}">
                                                <input id="{{ $option['value'] }}" type="radio" name="answer" value="{{ $option['value'] }}" class="peer hidden" required />
                                                <div class="w-14 h-14 lg:w-16 lg:h-16 rounded-full border border-gray-300
                                                    peer-checked:bg-primary peer-checked:text-white peer-checked:border-primary-alt
                                                    transition flex items-center justify-center font-bold lg:text-2xl
                                                    shadow-[0_0_10px_0_#3986A380]">
                                                    {{ $option['value'] }}
                                                </div>
                                            </label>
                                            <span class="mt-2 text-center text-sm lg:text-base font-medium">
                                                {{ $option['text'] }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="button-test flex flex-col-reverse md:flex-row justify-center mt-10 lg:mb-10">
                                <!-- <button class="rounded-xl border-primary border-3 mb-5 lg:mx-2 bg-gradient-to-tr from-[#3986A3] to-[#225062] bg-clip-text text-transparent px-10 lg:px-14 py-1.5 font-medium text-lg max-sm:text-[15px]">Kembali</button> -->
                                <button type="submit" class="rounded-xl bg-gradient-to-r mb-5 lg:mx-2 from-[#3986A3] to-[#225062] px-10 lg:px-14 py-1.5 font-medium text-white text-lg max-sm:text-[15px]">Selanjutnya</button>
                            </div>
                        </form>
                    <!-- </div> -->
                </div>
                <div class="1/3 lg:flex">
                    <div class="bg-white">
                        {{-- HERO IMG DESKTOP --}}
                        <div
                            class="absolute right-44 top-1/2 -translate-y-1/2 max-sm:hidden"
                            style="width: 300px; height: 300px; border-radius: 50%; background: #A2D7F0CC; filter: blur(60px); opacity: 1; z-index: 0;"
                        ></div>
                        <img src="{{ asset('assets/landing/images/psikotes-free/progress4.png') }}" alt="Ilustrasi-Test" class="w-[500px] h-[400px] hidden lg:block mt-24 scale-75" data-aos="fade-left" data-aos-duration="1500">
                        {{--  @if ($progress < 14) <img src="{{ asset('assets/images/psikotes/progress1.png') }}" alt="Ilustrasi-Test" class="w-[500px] h-[400px] hidden lg:block mt-24 scale-50" data-aos="fade-left" data-aos-duration="1500">
                            @elseif ($progress >= 14 && $progress < 34) <img src="{{ asset('assets/images/psikotes/progress2.png') }}" alt="Ilustrasi-Test" class="w-[500px] h-[400px] hidden lg:block mt-24 scale-50" data-aos="fade-left" data-aos-duration="1500">
                                @elseif ($progress >= 34 && $progress < 55) <img src="{{ asset('assets/images/psikotes/progress3.png') }}" alt="Ilustrasi-Test" class="w-[500px] h-[400px] hidden lg:block mt-24 scale-50" data-aos="fade-left" data-aos-duration="1500">
                                    @elseif ($progress >= 55 && $progress < 77) <img src="{{ asset('assets/images/psikotes/progress4.png') }}" alt="Ilustrasi-Test" class="w-[500px] h-[400px] hidden lg:block mt-24 scale-50" data-aos="fade-left" data-aos-duration="1500">
                                        @elseif ($progress >= 77 && $progress < 100) <img src="{{ asset('assets/images/psikotes/progress5.png') }}" alt="Ilustrasi-Test" class="w-[500px] h-[400px] hidden lg:block mt-24 scale-50" data-aos="fade-left" data-aos-duration="1500">
                                            @else
                                            <img src="{{ asset('assets/images/psikotes/progress6.png') }}" alt="Ilustrasi-Test" class="w-[500px] h-[400px] hidden lg:block mt-24 scale-50" data-aos="fade-left" data-aos-duration="1500">
                                            @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="countdownExample" class="absolute right-4 top-4 hidden">
        <div class="values rounded-full bg-blue-500 px-5 py-3 text-white">00:00:00</div>
    </div>
</section>

<script>
document.querySelectorAll('input[name="answer"]').forEach(radio => {
    radio.addEventListener('change', function() {
        // Reset semua label warna
        document.querySelectorAll('.radio-label').forEach(p => {
            p.classList.remove('text-primary');
        });

        // Cari SEMUA label dengan data-value sesuai value radio yang dipilih
        document.querySelectorAll('.radio-label[data-value="' + this.value + '"]').forEach(function(label) {
            label.classList.add('text-primary');
        });
    });
});
</script>

@section("script")
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
                window.location.href = @json(route("psikotes-paid.attempt.complete"));
            }
        });
    </script>
@endsection
