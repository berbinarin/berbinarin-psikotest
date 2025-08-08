@php
    use Illuminate\Support\Str;

    $categories = ["Extraversion", "Agreeableness", "Neuroticism", "Conscientiousness", "Openness"];
@endphp

@extends(
    "landing.layouts.app",
    [
        "title" => "Psikotes Berbinar",
    ]
)
@section("content")
    <sections>
        <div class="flex justify-center">
            <div class="t-container z-38 mt-28 flex w-full flex-col items-center justify-center p-[22px] lg:mt-36">
                <div class="quest-container z-20 mb-6 w-full justify-center rounded-3xl bg-white p-5 shadow-xl lg:mb-12 lg:w-[95%] lg:px-16" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                    <div class="flex flex-row items-center justify-center">
                        {{-- HERO IMG DESKTOP --}}
                        <!-- <img src="{{ asset("assets/images/psikotes/result.png") }}" alt="Ilustrasi-Tes" class="w-[335px] h-[335px] hidden lg:block -
                    mt-5" data-aos="fade-left" data-aos-duration="1500"> -->

                        <div class="mx-5 rounded-3xl bg-white p-5">
                            <!-- Judul "Hasil Psikotes" -->
                            <h2 class="mb-1 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-center text-4xl font-bold text-transparent">Hasil Tes</h2>
                            <!-- Paragraf -->
                        </div>
                    </div>

                    <div>
                        <p class="mb-4 mt-3 text-base font-semibold text-black lg:mb-6 lg:text-lg">Hasil tes dibawah ini berdasarkan jawaban dari pernyataan yang telah SobatBinar jawab</p>
                        <hr class="mb-6" />
                        <div class="mb-5 h-full w-full gap-5">
                            <!-- Container untuk diagram -->
                            <!-- <canvas id="chart" style="width:100%;max-width:700px"></canvas> -->

                            <div class="progress mb-1 flex flex-col">
                                <div class="w-48 lg:text-lg"><span class="italic">{{ $categories[0] }}</span></div>
                                <div class="flex flex-row">
                                    <div class="progress-bar my-3 h-5 w-[20px] rounded-full bg-[#163641] text-end text-[13px]" role="progressbar" style="width: {{ $extraversionPresentage }}%" aria-valuenow="{{ $extraversionPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="ml-10 mt-2 lg:text-lg">{{ round($extraversionPresentage) }}%</p>
                                </div>
                            </div>
                            <div class="progress mb-1 flex flex-col">
                                <div class="w-48 lg:text-lg"><span class="italic">{{ $categories[1] }}</span></div>
                                <div class="flex flex-row">
                                    <div class="progress-bar my-3 h-5 w-[20px] rounded-full bg-[#225062] text-end text-[13px]" role="progressbar" style="width: {{ $agreeablenessPresentage }}%" aria-valuenow="{{ $agreeablenessPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="ml-10 mt-2 lg:text-lg">{{ round($agreeablenessPresentage) }}%</p>
                                </div>
                            </div>
                            <div class="progress mb-1 flex flex-col">
                                <div class="w-48 lg:text-lg"><span class="italic">{{ $categories[2] }}</span></div>
                                <div class="flex flex-row">
                                    <div div class="progress-bar my-3 h-5 w-[20px] rounded-full bg-[#3986A3] text-end text-[13px]" role="progressbar" style="width: {{ $neuroticismPresentage }}%" aria-valuenow="{{ $neuroticismPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="ml-10 mt-2 lg:text-lg">{{ round($neuroticismPresentage) }}%</p>
                                </div>
                            </div>
                            <div class="progress mb-1 flex flex-col">
                                <div class="w-48 lg:text-lg"><span class="italic">{{ $categories[3] }}</span></div>
                                <div class="flex flex-row">
                                    <div class="progress-bar my-3 h-5 w-[20px] rounded-full bg-[#76BBD5] text-end text-[13px]" role="progressbar" style="width: {{ $conscientiousnessPresentage }}%" aria-valuenow="{{ $conscientiousnessPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="ml-10 mt-2 lg:text-lg">{{ round($conscientiousnessPresentage) }}%</p>
                                </div>
                            </div>
                            <div class="progress mb-1 flex flex-col">
                                <div class="w-48 lg:text-lg"><span class="italic">{{ $categories[4] }}</span></div>
                                <div class="flex flex-row">
                                    <div class="progress-bar my-3 h-5 w-[20px] rounded-full bg-[#97CBDF] text-end text-[13px]" role="progressbar" style="width: {{ $opennessPresentage }}%" aria-valuenow="{{ $opennessPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="ml-10 mt-2 lg:text-lg">{{ round($opennessPresentage) }}%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tampilan Desktop --}}
                <div class="mb-12 flex w-[95%] justify-between gap-[3%] max-sm:hidden">
                    <div class="z-20 rounded-3xl bg-white px-8 pb-8 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-8 text-center text-base font-semibold lg:text-2xl"><span class="italic">Extraversion</span></p>
                        <p class="mb-2 text-center text-[#333333]">Ekstraversi</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-base leading-relaxed lg:text-lg">
                            Dimensi kepribadian
                            <span class="italic">Extraversion</span>
                            ini berkaitan dengan tingkat kenyamanan seseorang dalam berinteraksi dengan orang lain.
                        </p>
                    </div>

                    <div class="z-20 rounded-3xl bg-white px-8 pb-8 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-8 text-center text-base font-semibold lg:text-2xl"><span class="italic">Conscientiousness</span></p>
                        <p class="mb-2 text-center text-[#333333]">Sifat Berhati-hati</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-base leading-relaxed lg:text-lg">
                            Dimensi kepribadian
                            <span class="italic">Conscientiousness</span>
                            cenderung lebih berhati-hati dalam melakukan suatu tindakan ataupun penuh pertimbangan dalam mengambil sebuah keputusan, mereka juga memiliki disiplin diri yang tinggi dan dapat dipercaya.
                        </p>
                    </div>
                </div>

                <div class="mb-12 flex w-[95%] justify-between gap-[3%] max-sm:hidden">
                    <div class="z-20 rounded-3xl bg-white px-8 pb-8 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-8 text-center text-base font-semibold lg:text-2xl"><span class="italic">Agreeableness</span></p>
                        <p class="mb-2 text-center text-[#333333]">Mudah Akur atau Mudah Bersepakat</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-base leading-relaxed lg:text-lg">
                            Individu yang berdimensi
                            <span class="italic">Agreeableness</span>
                            ini cenderung lebih patuh dengan individu lainnya dan memiliki kepribadian yang ingin menghindari konflik.
                        </p>
                    </div>

                    <div class="z-20 rounded-3xl bg-white px-8 pb-8 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-8 text-center text-base font-semibold lg:text-2xl"><span class="italic">Openness</span></p>
                        <p class="mb-2 text-center text-[#333333]">Terbuka Terhadap Hal-hal Baru</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-base leading-relaxed lg:text-lg">
                            Dimensi kepribadian
                            <span class="italic">Openness to Experience</span>
                            ini mengkategorikan individu berdasarkan ketertarikannya terhadap hal-hal baru dan keinginan untuk mengetahui serta mempelajari sesuatu yang baru.
                        </p>
                    </div>

                    <div class="z-20 rounded-3xl bg-white px-8 pb-8 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-8 text-center text-base font-semibold lg:text-2xl"><span class="italic">Neuroticism</span></p>
                        <p class="mb-2 text-center text-[#333333]">Neurotisme</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-base leading-relaxed lg:text-lg">
                            <span class="italic">Neuroticism</span>
                            adalah dimensi kepribadian yang menilai kemampuan seseorang dalam menahan tekanan atau stress.
                        </p>
                    </div>
                </div>
                {{-- /Tampilan Desktop --}}

                {{-- Tampilan Mobile --}}
                <div class="mb-12 hidden w-[95%] justify-between gap-[3%] max-sm:flex max-sm:flex-col">
                    <div class="z-20 mb-5 rounded-3xl bg-white px-5 pb-5 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-3 text-center text-base font-semibold lg:text-2xl"><span class="italic">Extraversion</span></p>
                        <p class="mb-2 text-center text-[#333333]">Ekstraversi</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-sm/tight leading-relaxed lg:text-lg">
                            Dimensi kepribadian
                            <span class="italic">Extraversion</span>
                            ini berkaitan dengan tingkat kenyamanan seseorang dalam berinteraksi dengan orang lain.
                        </p>
                    </div>

                    <div class="z-20 mb-5 rounded-3xl bg-white px-5 pb-5 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-3 text-center text-base font-semibold lg:text-2xl"><span class="italic">Conscientiousness</span></p>
                        <p class="mb-2 text-center text-[#333333]">Sifat Berhati-hati</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-sm/tight leading-relaxed lg:text-lg">
                            Dimensi kepribadian
                            <span class="italic">Conscientiousness</span>
                            cenderung lebih berhati-hati dalam melakukan suatu tindakan ataupun penuh pertimbangan dalam mengambil sebuah keputusan, mereka juga memiliki disiplin diri yang tinggi dan dapat dipercaya.
                        </p>
                    </div>

                    <div class="z-20 mb-5 rounded-3xl bg-white px-5 pb-5 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-3 text-center text-base font-semibold lg:text-2xl"><span class="italic">Agreeableness</span></p>
                        <p class="mb-2 text-center text-[#333333]">Mudah Akur atau Mudah Bersepakat</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-sm/tight leading-relaxed lg:text-lg">
                            Individu yang berdimensi
                            <span class="italic">Agreeableness</span>
                            ini cenderung lebih patuh dengan individu lainnya dan memiliki kepribadian yang ingin menghindari konflik.
                        </p>
                    </div>

                    <div class="z-20 mb-5 rounded-3xl bg-white px-5 pb-5 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-3 text-center text-base font-semibold lg:text-2xl"><span class="italic">Openness</span></p>
                        <p class="mb-2 text-center text-[#333333]">Terbuka Terhadap Hal-hal Baru</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-sm/tight leading-relaxed lg:text-lg">
                            Dimensi kepribadian
                            <span class="italic">Openness to Experience</span>
                            ini mengkategorikan individu berdasarkan ketertarikannya terhadap hal-hal baru dan keinginan untuk mengetahui serta mempelajari sesuatu yang baru.
                        </p>
                    </div>

                    <div class="z-20 mb-5 rounded-3xl bg-white px-5 pb-5 shadow-xl" style="box-shadow: 0 0 30px 5px rgba(0, 0, 0, 0.075)">
                        <p class="mb-1 mt-3 text-center text-base font-semibold lg:text-2xl"><span class="italic">Neuroticism</span></p>
                        <p class="mb-2 text-center text-[#333333]">Neurotisme</p>
                        <hr class="w-full justify-self-center" />
                        <p class="mt-4 text-justify text-sm/tight leading-relaxed lg:text-lg">
                            <span class="italic">Neuroticism</span>
                            adalah dimensi kepribadian yang menilai kemampuan seseorang dalam menahan tekanan atau stress.
                        </p>
                    </div>
                </div>
                {{-- /Tampilan Mobile --}}

                <div class="flex items-center justify-center pt-2">
                    <a href="{{ route("psikotes-free.finish") }}" class="flex w-full justify-center">
                        <button class="text-md w-full rounded-xl bg-gradient-to-r from-[#3986A3] to-[#225062] px-24 py-2 text-white max-sm:text-[15px] sm:w-auto">Beranda</button>
                    </a>
                </div>
            </div>
        </div>
    </sections>
@endsection
