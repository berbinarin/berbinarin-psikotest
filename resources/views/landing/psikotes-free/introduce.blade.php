@extends('landing.layouts.app', [
'title' => 'Psikotes Berbinar',
'active' => 'Intro',
'page' => 'Tes Kepribadian Gratis',
])

@section('content')
<section class="">
    <h2 class=" md:w-full text-center text-[#333333] font-bold text-5xl max-sm:text-3xl mt-24 lg:mt-36 my-7 max-sm:mb-4 leading-tight ">
        Tes Kepribadian <br> <span class="bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent">Gratis</span>
    </h2>
    <div class="max-w-6xl mx-auto my-0 md:mb-2 p-4 h-fit flex flex-col relative items-center">
        <div class="flex relative h-fit">
            <div class="flex relative bg-white max-sm:rounded-3xl rounded-[30px] items-center max-sm:mt-0 mt-2 lg:pt-10 lg:pb-10 shadow-2xl" style="box-shadow: 0 0 25px rgba(0,0,0,0.25);">
                <div class="relative flex flex-col items-center">
                    <p class="intro_description md:w-[85%] w-[85%] max-sm:text-sm/7 lg:text-lg/8 text-[#515151] font-normal m-4 text-justify leading-loose">
                        Tes ini merupakan model dari Tes Kepribadian Lima Dimensi yang dapat mengungkapkan
                        potensi karir yang sesuai dengan kepribadian SobatBinar.
                        Tes Kepribadian Lima Dimensi secara luas dianggap sebagai cara paling kuat untuk menggambarkan
                        perbedaan kepribadian yang SobatBinar miliki.
                        <br><br>
                        Tes Kepribadian Lima Dimensi adalah salah satu alat tes untuk mengungkap kepribadian berdasarkan
                        teori
                        <span class="italic">Big
                            Five
                            Personality </span> yang dikemukakan oleh seorang psikolog terkenal, yaitu Lewis Goldberg.
                        Dalam teori
                        sifat
                        kepribadian <span class="italic"> "The Big Five Personality Traits Model" </span> tersebut
                        terdiri dari lima dimensi kunci
                        diantaranya
                        seperti, <span class="italic">Openness (O), Conscientiousness (C), Extraversion (E),
                            Agreeableness (A)</span> dan
                        <span class="italic">Neuroticism
                            (N)</span>.
                    </p>
                    <div class="flex flex-col w-full md:flex-row gap-4 my-5 justify-center px-5 items-center">
                        <button class="rounded-md bg-gradient-to-r from-[#3986A3] to-[#225062] w-full lg:w-1/3 lg:px-28 py-1.5 font-medium text-white max-sm:text-[15px] showModal">
                            Mulai Tes
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <img src="{{ asset('assets/landing/images/psikotes-free/singa1.png') }}" alt="Ilustrasi Singa" title="Ilustrasi Singa" class="w-48 h-48 absolute hidden lg:block -top-12 -left-12 z-20 -translate-y-6" data-aos="fade-up" data-aos-duration="1500">
        <img src="{{ asset('assets/landing/images/psikotes-free/singa2.png') }}" alt="Ilustrasi Singa" title="Ilustrasi Singa" class="w-48 h-48 absolute hidden lg:block -bottom-12 left-12 z-30 translate-y-6" data-aos="fade-up" data-aos-duration="1500">
        <img src="{{ asset('assets/landing/images/psikotes-free/singa3.png') }}" alt="Ilustrasi Singa" title="Ilustrasi Singa" class="w-56 h-56 absolute hidden lg:block -bottom-12 -right-12 z-50 -mr-5" data-aos="fade-up" data-aos-duration="1500">
    </div>
</section>

<!--========== POP UP ==========-->
<section class="relative flex">
    <div class="modal fixed bg-black/35 max-sm:max-w-[100vw] max-sm:px-2 size-full start-0 overflow-x-hidden overflow-y-auto top-0 left-0 right-0 z-50 hidden justify-center items-center">
        <div class="modal-dialog max-sm:justify-self-center max-sm:max-w-md m-7 mt-20 lg:w-[60%] mx-2 sm:mx-auto p-4 max-sm:pb-[22px] lg:pt-8 bg-white rounded-xl shadow-lg">
            <!-- <div class="text-right p-3 closeModal">
                <i class='bx bxs-x-circle text-[48px] text-[#F34949]'></i>
            </div> -->
            <div>
                <div class="text-center">
                    <h1 class="bg-gradient-to-r from-[#F3AF3A] to-[#966C24] bg-clip-text text-transparent items-start font-semibold text-center max-sm:text-xl text-3xl">Instruksi Pengisian</h1>
                </div>
                <div class="lg:px-8 pt-5 max-sm:pt-2 lg:pt-7 pb-5">
                    <p class="text-justify text-[13px]/6 lg:text-lg/7 text-[#333333]">Pada tes ini, setiap nomor berisikan satu pernyataan beserta lima pilihan
                        skor jawaban. Tugas SobatBinar adalah menentukan <span class="">skor kesesuaian</span>
                        setiap
                        pernyataan dengan keadaan diri SobatBinar yang sebenarnya. Tiap pilihan skor kesesuaian yang
                        SobatBinar
                        pilih memiliki kriterianya masing-masing.</p>
                    <p class="text-[13px]/6 lg:text-lg/7 text-[#333333]"><br>Keterangan Skor:</p>
                    <ul class="pl-3 text-[13px]/6 lg:text-lg/7 text-[#333333]">
                        <li>1=Sangat tidak sesuai</li>
                        <li>2=Tidak sesuai</li>
                        <li>3=Ragu-ragu</li>
                        <li>4=Sesuai</li>
                        <li>5=Sangat sesuai</li>
                    </ul>
                </div>
            </div>
            <form action="{{ route('psikotes-free.attempt')}}" method="POST">
                @csrf
                <div class="flex flex-col justify-center justify-self-center items-center w-full lg:p-5">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="rounded-md bg-gradient-to-r from-[#3986A3] to-[#225062] w-full text-xl lg:w-1/3 py-1.5 font-medium text-white max-sm:text-[15px]">
                        Mulai Tes
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    const modal = document.querySelector('.modal');
    const showModal = document.querySelector('.showModal');
    const closeModal = document.querySelector('.closeModal');

    showModal.addEventListener('click', function() {
        modal.classList.remove('hidden')
    });

    closeModal.addEventListener('click', function() {
        modal.classList.add('hidden')
    });
</script>

@endsection
