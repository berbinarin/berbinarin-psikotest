@php
    use Illuminate\Support\Str;

    $categories = ["Extraversion", "Agreeableness", "Neuroticism", "Conscientiousness", "Openness"];
@endphp

@extends('landing.layouts.app', [
'title' => 'Psikotest Berbinar',
'active' => 'Test',
'page' => 'Hasil Tes',
])
@section('content')
<sections>
    <div class="flex justify-center">
        <div class="flex flex-col mt-28 lg:mt-36 items-center justify-center t-container z-38 w-full p-[22px]">
            <div class="quest-container w-full lg:w-[95%] shadow-xl bg-white justify-center rounded-3xl mb-6 lg:mb-12 p-5 lg:px-16">
                <div class="flex flex-row justify-center items-center">
                    {{-- HERO IMG DESKTOP --}}
                    <!-- <img src="{{ asset('assets/images/psikotes/result.png') }}" alt="Ilustrasi-Test" class="w-[335px] h-[335px] hidden lg:block -
                    mt-5" data-aos="fade-left" data-aos-duration="1500"> -->

                    <div class="bg-white rounded-3xl p-5 mx-5">
                        <!-- Judul "Hasil Psikotes" -->
                        <h2 class="text-center text-4xl bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent font-bold mb-1">Hasil Test</h2>
                        <!-- Paragraf -->
                    </div>
                </div>

                <div>
                    <p class="text-black font-semibold text-base lg:text-lg mt-3 mb-4 lg:mb-6">
                        Hasil tes dibawah ini berdasarkan jawaban dari pernyataan yang telah SobatBinar jawab
                    </p>
                    <hr class="mb-6">
                    <div class="w-full h-full mb-5 gap-5">
                            <!-- Container untuk diagram -->
                            <!-- <canvas id="chart" style="width:100%;max-width:700px"></canvas> -->

                                <div class="progress mb-1 flex flex-col">
                                    <div class="lg:text-lg w-48"><span class="italic">{{ $categories[0] }}</span></div>
                                    <div class="flex flex-row">
                                        <div class="progress-bar w-[20px] h-5 my-3 bg-[#163641] rounded-full text-[13px] text-end" role="progressbar" style="width: {{ $extraversionPresentage }}%;" aria-valuenow="{{$extraversionPresentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        <p class="mt-2 ml-10 lg:text-lg"> {{ round( $extraversionPresentage) }}%</p>
                                    </div>
                                </div>
                            <div class="progress mb-1 flex flex-col">
                                <div class="lg:text-lg w-48"><span class="italic">{{ $categories[1] }}</span></div>
                                <div class="flex flex-row">
                                    <div class="progress-bar w-[20px] h-5 my-3 bg-[#225062] rounded-full text-[13px] text-end" role="progressbar" style="width: {{ $agreeablenessPresentage }}%;" aria-valuenow="{{ $agreeablenessPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="mt-2 ml-10 lg:text-lg"> {{ round($agreeablenessPresentage) }}%</p>
                                </div>
                            </div>
                            <div class="progress mb-1 flex flex-col">
                                <div class="lg:text-lg w-48"><span class="italic">{{ $categories[2] }}</span></div>
                                <div class="flex flex-row">
                                    <div div class="progress-bar w-[20px] h-5 my-3 bg-[#3986A3] rounded-full text-[13px] text-end" role="progressbar" style="width: {{ $neuroticismPresentage }}%;" aria-valuenow="{{ $neuroticismPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="mt-2 ml-10 lg:text-lg"> {{ round($neuroticismPresentage) }}%</p>
                                </div>
                            </div>
                            <div class="progress mb-1 flex flex-col">
                                <div class="lg:text-lg w-48"><span class="italic">{{ $categories[3] }}</span></div>
                                <div class="flex flex-row">
                                    <div class="progress-bar w-[20px] h-5 my-3 bg-[#76BBD5] rounded-full text-[13px] text-end" role="progressbar" style="width: {{ $conscientiousnessPresentage }}%;" aria-valuenow="{{ $conscientiousnessPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="mt-2 ml-10 lg:text-lg"> {{ round($conscientiousnessPresentage) }}%</p>
                                </div>
                            </div>
                            <div class="progress mb-1 flex flex-col">
                                <div class="lg:text-lg w-48"><span class="italic">{{ $categories[4] }}</span></div>
                                <div class="flex flex-row">
                                    <div class="progress-bar w-[20px] h-5 my-3 bg-[#97CBDF] rounded-full text-[13px] text-end" role="progressbar" style="width: {{ $opennessPresentage }}%;" aria-valuenow="{{ $opennessPresentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <p class="mt-2 ml-10 lg:text-lg"> {{ round($opennessPresentage) }}%</p>
                                </div>
                            </div>
                    </div>




                </div>
            </div>


            {{-- Tampilan Desktop --}}
            <div class="w-[95%] flex justify-between gap-[3%] mb-12 max-sm:hidden">

                <div class="bg-white rounded-3xl shadow-xl px-8 pb-8">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-8 mb-1"><span class="italic">Extraversion </span></p>
                    <p class="text-center text-[#333333] mb-2">Ekstraversi</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-base lg:text-lg leading-relaxed mt-4">
                        Dimensi Kepribadian Openness to Experience ini mengkategorikan individu
                        berdasarkan ketertarikannya terhadap hal-hal baru dan keinginan
                        untuk mengetahui serta mempelajari sesuatu yang baru.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl px-8 pb-8">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-8 mb-1"><span class="italic">Conscientiousness </span></p>
                    <p class="text-center text-[#333333] mb-2">Terbuka Terhadap Hal-hal Baru</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-base lg:text-lg leading-relaxed mt-4">
                        Dimensi Kepribadian Openness to Experience ini mengkategorikan individu
                        berdasarkan ketertarikannya terhadap hal-hal baru dan keinginan
                        untuk mengetahui serta mempelajari sesuatu yang baru.
                    </p>
                </div>

            </div>


            <div class="w-[95%] flex justify-between gap-[3%] mb-12 max-sm:hidden">

                <div class="bg-white rounded-3xl shadow-xl px-8 pb-8">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-8 mb-1"><span class="italic">Agreeableness </span></p>
                    <p class="text-center text-[#333333] mb-2">Terbuka Terhadap Hal-hal Baru</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-base lg:text-lg leading-relaxed mt-4">
                        Individu yang berdimensi <span class="italic">Agreeableness</span> ini cenderung lebih patuh dengan individu lainnya dan memiliki kepribadian yang ingin menghindari konflik.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl px-8 pb-8">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-8 mb-1"><span class="italic">Openness </span></p>
                    <p class="text-center text-[#333333] mb-2">Terbuka Terhadap Hal-hal Baru</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-base lg:text-lg leading-relaxed mt-4">
                        Dimensi Kepribadian Openness to Experience ini mengkategorikan individu
                        berdasarkan ketertarikannya terhadap hal-hal baru dan keinginan
                        untuk mengetahui serta mempelajari sesuatu yang baru.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl px-8 pb-8">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-8 mb-1"><span class="italic">Neuroticism </span></p>
                    <p class="text-center text-[#333333] mb-2">Terbuka Terhadap Hal-hal Baru</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-base lg:text-lg leading-relaxed mt-4">
                        Dimensi Kepribadian Openness to Experience ini mengkategorikan individu
                        berdasarkan ketertarikannya terhadap hal-hal baru dan keinginan
                        untuk mengetahui serta mempelajari sesuatu yang baru.
                    </p>
                </div>

            </div>
            {{-- /Tampilan Desktop --}}

            {{-- Tampilan Mobile --}}
            <div class="w-[95%] hidden justify-between gap-[3%] mb-12 max-sm:flex max-sm:flex-col">
                <div class="bg-white rounded-3xl shadow-xl px-5 pb-5 mb-5">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-3 mb-1"><span class="italic">Extraversion </span></p>
                    <p class="text-center text-[#333333] mb-2">Ekstraversi</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-sm/tight lg:text-lg leading-relaxed mt-4">
                        Dimensi kepribadian <span class="italic">Extraversion</span> ini berkaitan dengan
                                    tingkat kenyamanan seseorang dalam berinteraksi
                                    dengan orang lain.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl px-5 pb-5 mb-5">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-3 mb-1"><span class="italic">Conscientiousness </span></p>
                    <p class="text-center text-[#333333] mb-2">Sifat Berhati-hati</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-sm/tight lg:text-lg leading-relaxed mt-4">
                        Dimensi kepribadian <span class="italic">Conscientiousness</span> cenderung lebih
                                    berhati-hati dalam melakukan suatu tindakan
                                    ataupun penuh pertimbangan dalam mengambil sebuah keputusan, mereka juga memiliki
                                    disiplin diri yang tinggi dan dapat dipercaya.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl px-5 pb-5 mb-5">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-3 mb-1"><span class="italic">Agreeableness </span></p>
                    <p class="text-center text-[#333333] mb-2">Mudah Akur atau Mudah Bersepakat</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-sm/tight lg:text-lg leading-relaxed mt-4">
                        Individu yang berdimensi <span class="italic">Agreeableness</span> ini cenderung
                                    lebih patuh dengan individu lainnya dan memiliki
                                    kepribadian yang ingin menghindari konflik.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl px-5 pb-5 mb-5">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-3 mb-1"><span class="italic">Openness </span></p>
                    <p class="text-center text-[#333333] mb-2">Terbuka Terhadap Hal-hal Baru</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-sm/tight lg:text-lg leading-relaxed mt-4">
                        Dimensi kepribadian <span class="italic">Openness to Experience</span> ini
                                    mengkategorikan individu berdasarkan ketertarikannya
                                    terhadap hal-hal baru dan keinginan untuk mengetahui serta mempelajari sesuatu
                                    yang baru.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl px-5 pb-5 mb-5">
                    <p class="text-center text-base lg:text-2xl font-semibold mt-3 mb-1"><span class="italic">Neuroticism </span></p>
                    <p class="text-center text-[#333333] mb-2">Neurotisme</p>
                    <hr class="w-full justify-self-center">
                    <p class="text-justify text-sm/tight lg:text-lg leading-relaxed mt-4">
                        <span class="italic">Neuroticism</span> adalah dimensi kepribadian yang menilai
                                    kemampuan seseorang dalam menahan tekanan atau
                                    stress.
                    </p>
                </div>
            </div>
            {{-- /Tampilan Mobile --}}

            <div class="flex flex-col w-full md:flex-row gap-5 justify-center items-center">
                <form action="{{ route('psikotes-free.finish') }}" method="GET">
                    @csrf
                    <button type="submit" class="mr-3 md:mr-5 text-xl text-white bg-primary rounded-full font-semibold border-3 border-white hover:border-amber-300 hover:bg-amber-300 hover:text-primary hover:font-semibold duration-500 px-10 py-2.5 w-fit">
                        Beranda
                    </button>
                </form>
            </div>
        </div>
    </div>
</sections>

@endsection
