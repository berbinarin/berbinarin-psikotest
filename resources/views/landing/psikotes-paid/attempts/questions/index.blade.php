@extends(
    "landing.layouts.test",
    [
        "title" => "Tes " . str_pad($question->tool->order, 2, "0", STR_PAD_LEFT),
    ]
)

@section("content")
    <div class="container mx-auto">
        <div class="fixed left-0 top-0 -z-10 h-screen w-screen bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset("assets/landing/images/psikotes-paid/psikotes-soal-bg.png") }})"></div>

        <form action="{{ route("psikotes-paid.attempt.submit") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="relative flex h-[85vh] flex-col justify-between">
                <div class="flex flex-col items-center justify-center gap-7">
                    <div class="mt-8 flex w-fit items-center gap-7 rounded-[70px] bg-white px-8 py-[10px]">
                        <img class="h-10 w-10" src="{{ asset("assets/landing/images/psikotes-paid/logo-berbinar.png") }}" alt="Logo Berbinar" />
                        <img class="h-11 w-11" src="{{ asset("assets/landing/images/psikotes-paid/logo-berbinar-psikotes.png") }}" alt="Logo Berbinar Psikotest" />
                    </div>
                    <div>
                        <h2 class="text-[28px] font-bold">Tes {{ str_pad($question->tool->order, 2, "0", STR_PAD_LEFT) }}</h2>
                    </div>
                </div>

                <div class="mb-4 mt-10 flex flex-1 flex-col justify-center">
                    @if ($question->type)
                        @include("landing.psikotes-paid.attempts.questions." . Str::slug($question->type))
                    @endif
                </div>

                <div class="flex gap-6 rounded-[10px] bg-white px-8 py-3 drop-shadow-[0_4px_4px_rgba(0,0,0,0.25)]">
                    <div class="relative flex h-full w-full flex-col justify-center">
                        <div class="h-[3px] w-full rounded-md bg-black">
                            <div class="relative h-[3px] rounded-md bg-[#232ACA]" style="width: {{ $progress }}%">
                                <span class="absolute right-0 block h-2 w-2 -translate-y-1/3 translate-x-1/2 rounded-full bg-[#232ACA]"></span>
                                <span class="absolute right-0 top-[150%] translate-x-[50%] text-[10px] font-bold">{{ $progress }}%</span>
                            </div>
                        </div>
                    </div>
                    <button class="rounded-md bg-[#232ACA] px-3 py-[6px] text-xs text-white transition-all duration-300 hover:opacity-85">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>

    <div id="countdownExample" class="absolute right-4 top-4">
        <div class="values rounded-full bg-blue-500 px-5 py-3 text-white">00:00:00</div>
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
    </script>
@endpush
