@extends("landing.layouts.test", ["title" => "Testimoni"])

@section("content")
<div class="h-screen overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset("assets/landing/images/psikotes-paid/psikotes-soal-bg.png") }}')">

    <!-- Logo Start -->
    <section>
        <div class="mt-4 flex w-full flex-row items-center justify-center">
            <div class="flex items-center justify-center gap-4 rounded-full bg-white px-8 py-2 drop-shadow-lg">
                <img class="h-10 w-10" src="{{ asset("assets/landing/images/psikotes-paid/logo-berbinar.png") }}" alt="Logo Berbinar" />
                <img class="h-11 w-11" src="{{ asset("assets/landing/images/psikotes-paid/logo-berbinar-psikotes.png") }}" alt="Logo Berbinar Psikotes" />
            </div>
        </div>
    </section>
    <!-- Logo End -->

    <!-- Judul -->
    <div class="my-7 flex w-full items-center justify-center">
        <h1 id="judul-testimoni" class="text-[28px] font-bold" style="font-family: 'Plus Jakarta Sans', sans-serif">Testimoni Psikotes</h1>
    </div>

    <!-- Pertanyaan -->
    <div class="my-7 flex w-full items-center justify-center">
        <h1 id="soal-text" class="w-[395px] text-center text-base font-bold" style="font-family: 'Plus Jakarta Sans', sans-serif"></h1>
    </div>

    <div class="flex items-center justify-center">
        <!-- Form Testimoni -->
        <div class="flex h-[405px] w-[486px] items-start justify-center rounded-xl bg-white pt-10 shadow-md">
            <form method="POST" action="{{ route('psikotes-paid.testimonial.store') }}" id="testimoni-form" class="flex h-full w-full flex-col justify-between px-6 pb-6">
                @csrf

                <textarea id="testimoni" rows="6" class="h-[278px] w-full resize-none border-none bg-none px-3 py-2 text-base text-black outline-none placeholder:font-medium placeholder:text-[#D1D1D1]" placeholder="Tulis disini..."></textarea>

                <div id="radio-group" class="ml-[31px] hidden w-full flex-col items-start space-y-4 text-base text-black">
                    <label class="flex cursor-pointer items-center gap-3">
                        <input type="radio" name="setuju" value="Ya" class="h-5 w-5 appearance-none rounded-full border-2 border-black checked:border-blue-600 checked:bg-[#6083F2]" />
                        <span class="text-base font-medium">Setuju</span>
                    </label>
                    <label class="flex cursor-pointer items-center gap-3">
                        <input type="radio" name="setuju" value="Tidak" class="h-5 w-5 appearance-none rounded-full border-2 border-black checked:border-blue-800 checked:bg-[#6083F2]" />
                        <span class="text-[15px] font-medium">Tidak Setuju</span>
                    </label>
                </div>

                <button type="button" id="next-button" class="mx-auto mt-4 w-fit rounded-[20px] bg-[#6083F2] px-5 py-[10px] text-base font-bold text-white transition hover:bg-blue-600">Selanjutnya</button>
            </form>
        </div>

        <!-- Ucapan Terima Kasih -->
        <div id="thanks-section" class="hidden flex-col items-center justify-center px-6 text-center">
            <img src="{{ asset('assets/landing/images/psikotes-paid/congrats.png') }}" alt="" class="h-[307px] w-[638px]" />
            <h1 class="mb-6 text-3xl font-bold text-black">
                Terima kasih SobatBinar atas testimoni yang diberikan!
                <br />Masukanmu sangat berarti bagi kami untuk terus berkembang.
            </h1>
            <a href="{{ route('psikotes-paid.tools.index', ['testimoni' => 'selesai']) }}" class="mx-auto w-fit rounded-[20px] bg-[#6083F2] px-5 py-[10px] text-base font-bold text-white transition hover:bg-blue-600">
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        const soal = [
            'Ceritakan pengalaman SobatBinar dalam mengikuti kegiatan psikotes di Berbinar!',
            'Bagaimana pendapat SobatBinar mengenai kegiatan psikotes yang telah terlaksana?',
            'Apakah SobatBinar memiliki masukan atau saran mengenai pelaksanaan psikotes di Berbinar?',
            'Apa SobatBinar setuju jika Berbinar membagikan testimoni SobatBinar melalui media sosial kami?'
        ];

        let index = 0;
        let answers = {
            experience: '',
            opinion: '',
            suggestion: '',
            testimonial: ''
        };

        const soalText = document.getElementById('soal-text');
        const form = document.getElementById('testimoni-form');
        const textarea = document.getElementById('testimoni');
        const button = document.getElementById('next-button');
        const radioGroup = document.getElementById('radio-group');
        const thanksSection = document.getElementById('thanks-section');

        soalText.innerText = soal[index];

        button.addEventListener('click', function () {
            // Simpan jawaban
            if (index === 0) {
                answers.experience = textarea.value;
            } else if (index === 1) {
                answers.opinion = textarea.value;
            } else if (index === 2) {
                answers.suggestion = textarea.value;
            } else if (index === 3) {
                const selected = document.querySelector('input[name="setuju"]:checked');
                if (!selected) {
                    alert("Pilih salah satu opsi terlebih dahulu.");
                    return;
                }
                answers.testimonial = selected.value;
            }

            index++;

            if (index < soal.length) {
                soalText.innerText = soal[index];
                if (index === 3) {
                    textarea.classList.add('hidden');
                    radioGroup.classList.remove('hidden');
                    button.innerText = 'Selesai';
                } else {
                    textarea.classList.remove('hidden');
                    radioGroup.classList.add('hidden');
                    button.innerText = 'Selanjutnya';
                }
                textarea.value = '';
                form.querySelectorAll('input[name="setuju"]').forEach(r => r.checked = false);
            } else {
                // Kirim data via AJAX
                // button.disabled = true;
                // button.innerText = "Mengirim...";

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    },
                    body: JSON.stringify({
                        sharing_experience: answers.experience,
                        opinion_psikotes: answers.opinion,
                        criticism_suggestion: answers.suggestion,
                        sharing_testimonial: answers.testimonial,
                    })
                })
                .then(res => {
                    if (res.ok) {
                        // Sembunyikan elemen yang tidak diperlukan
                        soalText.parentElement.classList.add('hidden');
                        form.parentElement.classList.add('hidden');
                        document.getElementById("judul-testimoni").classList.add("hidden");

                        // Tampilkan thanks section dengan animasi slide
                        thanksSection.style.display = 'flex';
                        thanksSection.style.opacity = '0';
                        thanksSection.classList.remove('hidden');

                        // Animate
                        setTimeout(() => {
                            thanksSection.style.transition = 'opacity 0.5s ease-in-out';
                            thanksSection.style.opacity = '1';
                        }, 100);

                        // Scroll ke thanks section
                        thanksSection.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal mengirim testimoni',
                            text: 'Mohon coba lagi',
                            confirmButtonColor: '#6083F2',
                        });
                    }
                })
                .catch(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan',
                        text: 'Mohon coba lagi nanti',
                        confirmButtonColor: '#6083F2',
                    });
                    button.disabled = false;
                    button.innerText = "Selesai";
                });
            }
        });
    </script>
</div>
@endsection
