@extends(
    "landing.layouts.test",
    [
        "title" => "Testimoni",
    ]
)

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
                    <h1 class="absolute left-1/2 top-[65%] -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text font-plusJakartaSans text-[26.67px] font-bold text-transparent">Testimoni</h1>
                </div>
                <div class="mx-auto flex h-full w-[565.33px] flex-col items-center gap-8 px-6 pt-7">
                    <div class="mx-auto flex w-full flex-1 flex-col gap-4">
                        <div class="flex h-full items-center justify-center">
                            <div id="testimoni-container" class="flex h-full w-full flex-col">
                                <div class="my-7 flex w-full items-center justify-center">
                                    <h1 id="question" class="w-[395px] text-center text-base font-bold" style="font-family: 'Plus Jakarta Sans', sans-serif"></h1>
                                </div>

                                <div class="flex h-full items-start justify-center rounded-xl pt-10">
                                    <form method="POST" action="{{ route("psikotes-paid.testimonial.store") }}" id="testimoni-form" class="flex h-full flex-col justify-between px-6 pb-6">
                                        @csrf

                                        <div class="flex-1">
                                            {{-- Tipe Esai --}}
                                            <div id="essay-container" class="hidden h-full">
                                                <textarea name="essay" rows="6" class="rounded w-[520px] border-0 shadow-inner bg-slate-100 focus:ring-slate-200" placeholder="Tulis disini..."></textarea>
                                            </div>

                                            {{-- Tipe Pilihan Ganda --}}

                                            <div id="multiple-choice-container" class="flex hidden flex-wrap justify-center gap-4">
                                                {{-- <label class="relative h-[107.33px] w-[197.33px] cursor-pointer">
                                                    <input type="radio" name="multiple_choice" value="Ya" class="peer absolute h-full w-full opacity-0 cursor-pointer" />
                                                    <div class="flex h-full w-full items-center justify-center rounded-[6.67px] border-[1.33px] border-[#555555] bg-white font-plusJakartaSans text-[13.33px] font-semibold text-black transition-colors duration-200 peer-checked:border-blue-700 peer-checked:bg-[#106681]/20">Ya</div>
                                                    <img src="{{ asset("assets/landing/icons/centang.png") }}" class="absolute right-2 top-2 h-5 w-5 opacity-0 transition-opacity duration-200 peer-checked:opacity-100" alt="Checkmark" />
                                                </label>
                                                <label class="relative h-[107.33px] w-[197.33px] cursor-pointer">
                                                    <input type="radio" name="multiple_choice" value="Mungkin" class="peer absolute h-full w-full opacity-0 cursor-pointer" />
                                                    <div class="flex h-full w-full items-center justify-center rounded-[6.67px] border-[1.33px] border-[#555555] bg-white font-plusJakartaSans text-[13.33px] font-semibold text-black transition-colors duration-200 peer-checked:border-blue-700 peer-checked:bg-[#106681]/20">Mungkin</div>
                                                    <img src="{{ asset("assets/landing/icons/centang.png") }}" class="absolute right-2 top-2 h-5 w-5 opacity-0 transition-opacity duration-200 peer-checked:opacity-100" alt="Checkmark" />
                                                </label>
                                                <label class="relative h-[107.33px] w-[197.33px] cursor-pointer">
                                                    <input type="radio" name="multiple_choice" value="Tidak" class="peer absolute h-full w-full opacity-0 cursor-pointer" />
                                                    <div class="flex h-full w-full items-center justify-center rounded-[6.67px] border-[1.33px] border-[#555555] bg-white font-plusJakartaSans text-[13.33px] font-semibold text-black transition-colors duration-200 peer-checked:border-blue-700 peer-checked:bg-[#106681]/20">Tidak</div>
                                                    <img src="{{ asset("assets/landing/icons/centang.png") }}" class="absolute right-2 top-2 h-5 w-5 opacity-0 transition-opacity duration-200 peer-checked:opacity-100" alt="Checkmark" />
                                                </label> --}}
                                                <label class="relative flex h-[62.67px] w-[520.33px] cursor-pointer items-center">
                                                    <input type="radio" name="multiple_choice" value="Ya" class="peer absolute h-full w-full opacity-0" />
                                                    <div class="flex h-full w-full items-center justify-start rounded-[13px] border-[1.33px] border-[#9E9E9E] font-plusJakartaSans text-[13.33px] font-semibold text-black transition-colors duration-200 peer-checked:bg-[#3986A3] peer-checked:text-white">
                                                        <div class="ml-4 mr-4 h-5 w-5 rounded-full border-2 border-[#9E9E9E] bg-white peer-checked:border-4 peer-checked:border-white peer-checked:bg-[#3986A3]"></div>
                                                        Ya
                                                    </div>
                                                </label>
                                                <label class="relative flex h-[62.67px] w-[520.33px] cursor-pointer items-center">
                                                    <input type="radio" name="multiple_choice" value="Mungkin" class="peer absolute h-full w-full opacity-0" />
                                                    <div class="flex h-full w-full items-center justify-start rounded-[13px] border-[1.33px] border-[#9E9E9E] font-plusJakartaSans text-[13.33px] font-semibold text-black transition-colors duration-200 peer-checked:bg-[#3986A3] peer-checked:text-white">
                                                        <div class="ml-4 mr-4 h-5 w-5 rounded-full border-2 border-[#9E9E9E] bg-white peer-checked:border-4 peer-checked:border-white peer-checked:bg-[#3986A3]"></div>
                                                        Mungkin
                                                    </div>
                                                </label>
                                                <label class="relative flex h-[62.67px] w-[520.33px] cursor-pointer items-center">
                                                    <input type="radio" name="multiple_choice" value="Tidak" class="peer absolute h-full w-full opacity-0" />
                                                    <div class="flex h-full w-full items-center justify-start rounded-[13px] border-[1.33px] border-[#9E9E9E] font-plusJakartaSans text-[13.33px] font-semibold text-black transition-colors duration-200 peer-checked:bg-[#3986A3] peer-checked:text-white">
                                                        <div class="ml-4 mr-4 h-5 w-5 rounded-full border-2 border-[#9E9E9E] bg-white peer-checked:border-4 peer-checked:border-white peer-checked:bg-[#3986A3]"></div>
                                                        Tidak
                                                    </div>
                                                </label>
                                            </div>

                                            {{-- Tipe Skala Likert --}}
                                            <div id="likert-container" class="flex hidden h-full w-full flex-col items-center text-center">
                                                <div class="mt-4 flex w-[600px] justify-around">
                                                    <label class="flex flex-1 cursor-pointer flex-col items-center gap-4" for="likert-1">
                                                        <input type="radio" id="likert-1" name="likert_scale" value="1" class="h-10 w-10 text-[#106681] focus:ring-0" />
                                                        <span id="likert-left-label" class="font-semibold"></span>
                                                    </label>
                                                    <label class="flex-1 cursor-pointer" for="likert-2"><input type="radio" id="likert-2" name="likert_scale" value="2" class="h-10 w-10 text-[#106681] focus:ring-0" /></label>
                                                    <label class="flex-1 cursor-pointer" for="likert-3"><input type="radio" id="likert-3" name="likert_scale" value="3" class="h-10 w-10 text-[#106681] focus:ring-0" /></label>
                                                    <label class="flex-1 cursor-pointer" for="likert-4"><input type="radio" id="likert-4" name="likert_scale" value="4" class="h-10 w-10 text-[#106681] focus:ring-0" /></label>
                                                    <label class="flex flex-1 cursor-pointer flex-col items-center gap-4" for="likert-5">
                                                        <input type="radio" id="likert-5" name="likert_scale" value="5" class="h-10 w-10 text-[#106681] focus:ring-0" />
                                                        <span id="likert-right-label"  class="font-semibold"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-center">
                                            <button type="button" id="next-button" class="mb-6 mt-2 h-[43.67px] w-[136px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selanjutnya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div id="thanks-section" class="hidden flex gap-4 flex-col items-center justify-center px-6 text-center">
                                <img src="{{ asset("assets/landing/images/psikotes-paid/congrats.png") }}" alt="Congrats" class="h-auto w-[638px] -mt-" />
                                <h1 class="mb-6 text-m font-semibold text-black">
                                    Terima kasih atas testimoni yang Anda diberikan!
                                    <br />
                                    Masukanmu sangat berarti bagi kami untuk terus berkembang.
                                </h1>
                                <a href="{{ route("psikotes-paid.tools.index", ["testimoni" => "selesai"]) }}" class="flex justify-center items-center mb-6 mt-2 h-[43.67px] w-[160px] rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Kembali ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("script")
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Daftar pertanyaan dan tipenya
            const questions = [
                { text: 'Apakah instruksi yang dituliskan sudah cukup jelas?', type: 'likert', options:['Kurang Jelas', 'Sangat Jelas'] },
                { text: 'Apakah daftar tugas yang diberikan mudah untuk dipahami?', type: 'likert', options:['Sulit Dipahami', 'Sangat Mudah Dipahami'] },
                { text: 'Apakah Anda merasa kesulitan dalam menjawab pernyataan yang diberikan?', type: 'multiple_choice' },
                { text: 'Apakah terdapat kata-kata yang membingungkan?', type: 'multiple_choice' },
                { text: 'Pada bagian pertanyaan manakah terdapat kata-kata/kalimat yang membingungkan/kurang jelas?', type: 'essay' },
                { text: 'Jika Anda merasa kesulitan silakan tuliskan alasannya dibawah ini (Jika tidak, berikan tanda "-")', type: 'essay' },
                { text: 'Berapa rating yang diberikan secara keseluruhan untuk Tes yang telah dilaksanakan? (1-5)', type: 'likert', options:['Kurang Baik', 'Sangat Baik'] },
                { text: 'Masukan atau saran untuk Tes yang telah dilaksanakan (Jika tidak ada, berikan tanda "-")', type: 'essay' },
            ];

            let currentQuestionIndex = 0;
            const answers = []; // Array untuk menyimpan semua jawaban

            // Seleksi semua elemen DOM yang dibutuhkan
            const form = document.getElementById('testimoni-form');
            const questionEl = document.getElementById('question');
            const nextButton = document.getElementById('next-button');

            const essayContainer = document.getElementById('essay-container');
            const multipleChoiceContainer = document.getElementById('multiple-choice-container');
            const likertContainer = document.getElementById('likert-container');

            const essayInput = essayContainer.querySelector('textarea');
            const mcInputs = multipleChoiceContainer.querySelectorAll('input[type="radio"]');
            const likertInputs = likertContainer.querySelectorAll('input[type="radio"]');

            /**
             * Menampilkan pertanyaan saat ini berdasarkan index.
             * Mengatur input field yang sesuai dan teks tombol.
             */
            function displayQuestion() {
                // Jika semua pertanyaan sudah dijawab, kirim form
                if (currentQuestionIndex >= questions.length) {
                    submitForm();
                    return;
                }

                const currentQuestion = questions[currentQuestionIndex];
                questionEl.innerText = currentQuestion.text;

                // Sembunyikan semua container input terlebih dahulu
                essayContainer.classList.add('hidden');
                multipleChoiceContainer.classList.add('hidden');
                likertContainer.classList.add('hidden');

                // Reset nilai input dari sesi sebelumnya
                essayInput.value = '';
                mcInputs.forEach((input) => (input.checked = false));
                likertInputs.forEach((input) => (input.checked = false));

                // Tampilkan container input yang sesuai dengan tipe pertanyaan
                if (currentQuestion.type === 'essay') {
                    essayContainer.classList.remove('hidden');
                } else if (currentQuestion.type === 'multiple_choice') {
                    multipleChoiceContainer.classList.remove('hidden');
                } else if (currentQuestion.type === 'likert') {
                    likertContainer.classList.remove('hidden');

                    document.getElementById('likert-left-label').innerText = currentQuestion.options[0] ?? '';
                    document.getElementById('likert-right-label').innerText = currentQuestion.options[1] ?? '';
                }

                // Ubah teks tombol menjadi 'Selesai' jika ini adalah pertanyaan terakhir
                if (currentQuestionIndex === questions.length - 1) {
                    nextButton.innerText = 'Selesai';
                } else {
                    nextButton.innerText = 'Selanjutnya';
                }
            }

            /**
             * Mengambil dan menyimpan jawaban dari input yang aktif.
             * Memastikan jawaban tidak kosong.
             */
            function saveAnswer() {
                const currentQuestion = questions[currentQuestionIndex];
                let value = null;

                // Ambil nilai berdasarkan tipe pertanyaan
                if (currentQuestion.type === 'essay') {
                    value = essayInput.value.trim();
                } else if (currentQuestion.type === 'multiple_choice') {
                    const selected = document.querySelector('input[name="multiple_choice"]:checked');
                    if (selected) value = selected.value;
                } else if (currentQuestion.type === 'likert') {
                    const selected = document.querySelector('input[name="likert_scale"]:checked');
                    if (selected) value = selected.value;
                }

                // Validasi: pastikan ada jawaban yang diisi
                if (!value) {
                    alert('Harap isi jawaban terlebih dahulu.');
                    return false;
                }

                // Simpan jawaban dalam format yang sesuai dengan ekspektasi backend
                answers[currentQuestionIndex] = {
                    question: currentQuestion.text, // Kunci 'question'
                    type: currentQuestion.type,
                    value: value,
                };
                return true;
            }

            /**
             * Mengirim semua data jawaban ke server.
             * Menangani respons sukses dan error.
             */
            async function submitForm() {
                nextButton.disabled = true;
                nextButton.innerText = 'Mengirim...';

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            Accept: 'application/json',
                        },
                        // Bungkus array 'answers' dalam objek dengan kunci 'answer'
                        body: JSON.stringify({ answer: answers }),
                    });
                    console.log(response);

                    // Jika respons server tidak OK (bukan status 2xx), lemparkan error
                    if (!response.ok) {
                        throw new Error('Gagal mengirim data ke server.');
                    }

                    const result = await response.json();
                    console.log('Server response:', result);

                    // Jika berhasil, tampilkan ucapan terima kasih
                    document.getElementById('testimoni-container').classList.add('hidden');
                    const thanksSection = document.getElementById('thanks-section');
                    thanksSection.classList.remove('hidden');
                    thanksSection.classList.add('flex');
                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengirim testimoni. Silakan coba lagi.');

                    // Aktifkan kembali tombol jika terjadi error
                    nextButton.disabled = false;
                    nextButton.innerText = 'Selesai';
                }
            }

            // Event listener untuk tombol 'Selanjutnya' / 'Selesai'
            nextButton.addEventListener('click', () => {
                if (saveAnswer()) {
                    currentQuestionIndex++;
                    displayQuestion();
                }
            });

            // Memulai testimoni dengan menampilkan pertanyaan pertama
            displayQuestion();
        });
    </script>
@endpush
