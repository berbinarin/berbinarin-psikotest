@extends('landing.layouts.test', [
'title' => 'Psikotes Berbinar',
])

@section('content')
<sections>
    <div class="max-h-screen flex justify-center items-center w-full">
        <div class="flex flex-col md:flex-row w-full md:max-w-[90%] md:mt-10 md:mb-8 justify-center md:shadow-xl md:bg-white rounded-3xl px-7 lg:pb-5 lg:pt-1 sm:p-10 relative" style="box-shadow: 0 0 5px 5px rgba(0, 0, 0, 0.1);">
            <div class="lg:w-[95%]">

                <div class="flex flex-row justify-between mb-8">

                </div>

                <h2 class="text-center h-auto z-50 text-2xl lg:text-4xl pb-1 font-bold mb-1 lg:mb-8 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent">Gimana Perasaan Kamu Setelah <br> Mengikuti Psikotes Ini?</h2>

                <form action="{{ route('psikotes-free.feedback.store') }}"
                    method="POST" class="rating">
                    @csrf

                    <div class="rating_list z-0 relative flex lg:w-[80%] flex-row mb-1 lg:mb-12 justify-self-center justify-between md:gap-4">
                        <div class="rating_item flex flex-col items-center">
                            <input class="hidden peer" id="rating-5-1" type="radio" value="5" name="rating" required>
                            <label for="rating-5-1" class="cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-gradient-to-b from-[#75BADB] to-[#F7B23B] rounded-full group hover:bg-gradient-to-b relative w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28 xl:w-32 xl:h-32 flex items-center justify-center">
                                <span class="block w-full h-full relative">
                                    <!-- Default image -->
                                    <img src="{{ asset('assets/landing/images/psikotes-free/feedback/1-wahoo.png') }}"
                                        alt="Sangat Senang"
                                        class="absolute inset-0 w-full h-full object-contain transition duration-200 scale-150" />
                                    <!-- Text -->
                                    <div class="text max-sm:block max-sm:pt-12 flex inset-8 max-sm:pb-[4px] w-full shadow-yellow-400/50 h-full justify-center items-end max-sm:items-center">
                                        <p class="bg-white max-sm:px-0 px-2 max-sm:w-[80%] justify-self-center text-center max-sm:text-[6px] text-xs md:text-[10px] xl:text-[15px] rounded-3xl max-sm:py-[1px] py-1 shadow-md shadow-yellow-400/50 font-bold text-[#F7B23B]">
                                            Sangat Senang
                                        </p>
                                    </div>
                                </span>
                            </label>
                        </div>

                        <div class="rating_item flex flex-col items-center">
                            <input class="hidden peer" id="rating-4-1" type="radio" value="4" name="rating">
                            <label for="rating-4-1" class="cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-gradient-to-b from-[#4CAF50] to-[#F7B23B] rounded-full group hover:bg-gradient-to-b relative w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28 xl:w-32 xl:h-32 flex items-center justify-center">
                                <span class="block w-full h-full relative">
                                    <!-- Default image -->
                                    <img src="{{ asset('assets/landing/images/psikotes-free/feedback/2-happy.png') }}"
                                        alt="Senang"
                                        class="absolute inset-0 w-full h-full object-contain transition duration-200 scale-150" />
                                    <!-- Text -->
                                    <div class="text max-sm:block max-sm:pt-12 flex inset-8 max-sm:pb-[4px] w-full shadow-yellow-400/50 h-full justify-center items-end max-sm:items-center">
                                        <p class="bg-white max-sm:px-0 px-2 max-sm:w-[80%] justify-self-center items-center text-center max-sm:text-[6px] text-xs md:text-[10px] xl:text-[15px] rounded-3xl max-sm:py-[1px] py-1 shadow-md shadow-yellow-400/50 font-bold text-[#F7B23B]">
                                            Senang
                                        </p>
                                    </div>
                                </span>
                            </label>
                        </div>

                        <div class="rating_item flex flex-col items-center">
                            <input class="hidden peer" id="rating-3-1" type="radio" value="3" name="rating">
                            <label for="rating-3-1" class="cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-gradient-to-b from-[#FFE500] to-[#F7B23B] rounded-full group hover:bg-gradient-to-b relative w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28 xl:w-32 xl:h-32 flex items-center justify-center">
                                <span class="block w-full h-full relative">
                                    <!-- Default image -->
                                    <img src="{{ asset('assets/landing/images/psikotes-free/feedback/3-neutral.png') }}"
                                        alt="Biasa Saja"
                                        class="absolute inset-0 w-full h-full object-contain transition duration-200 scale-150" />
                                    <!-- Text -->
                                    <div class="text max-sm:block max-sm:pt-12 flex inset-8 max-sm:pb-[4px] w-full shadow-yellow-400/50 h-full justify-center items-end max-sm:items-center">
                                        <p class="bg-white max-sm:px-0 px-2 max-sm:w-[80%] justify-self-center text-center max-sm:text-[6px] text-xs md:text-[10px] xl:text-[15px] rounded-3xl max-sm:py-[1px] py-1 shadow-md shadow-yellow-400/50 font-bold text-[#F7B23B]">
                                            Biasa Saja
                                        </p>
                                    </div>
                                </span>
                            </label>
                        </div>

                        <div class="rating_item flex flex-col items-center">
                            <input class="hidden peer" id="rating-2-1" type="radio" value="2" name="rating">
                            <label for="rating-2-1" class="cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-gradient-to-b from-[#FF543E] to-[#F7B23B] rounded-full group hover:bg-gradient-to-b relative w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28 xl:w-32 xl:h-32 flex items-center justify-center">
                                <span class="block w-full h-full relative">
                                    <!-- Default image -->
                                    <img src="{{ asset('assets/landing/images/psikotes-free/feedback/4-bummed.png') }}"
                                        alt="Bosan"
                                        class="absolute inset-0 w-full h-full object-contain transition duration-200 scale-150" />
                                    <!-- Text -->
                                    <div class="text max-sm:block max-sm:pt-12 flex inset-8 max-sm:pb-[4px] w-full shadow-yellow-400/50 h-full justify-center items-end max-sm:items-center">
                                        <p class="bg-white max-sm:px-0 px-2 max-sm:w-[80%] justify-self-center text-center max-sm:text-[6px] text-xs md:text-[10px] xl:text-[15px] rounded-3xl max-sm:py-[1px] py-1 shadow-md shadow-yellow-400/50 font-bold text-[#F7B23B]">
                                            Bosan
                                        </p>
                                    </div>
                                </span>
                            </label>
                        </div>

                        <div class="rating_item flex flex-col items-center">
                            <input class="hidden peer" id="rating-1-1" type="radio" value="1" name="rating">
                            <label for="rating-1-1" class="cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-gradient-to-b from-[#FF004F] to-[#F7B23B] rounded-full group hover:bg-gradient-to-b relative w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28 xl:w-32 xl:h-32 flex items-center justify-center">
                                <span class="block w-full h-full relative">
                                    <!-- Default image -->
                                    <img src="{{ asset('assets/landing/images/psikotes-free/feedback/5-pissed.png') }}"
                                        alt="Tidak Suka"
                                        class="absolute inset-0 w-full h-full object-contain transition duration-200 scale-150" />
                                    <!-- Text -->
                                    <div class="text max-sm:block max-sm:pt-12 flex inset-8 max-sm:pb-[4px] w-full shadow-yellow-400/50 h-full justify-center items-end max-sm:items-center">
                                        <p class="bg-white max-sm:px-0 px-2 max-sm:w-[80%] justify-self-center text-center max-sm:text-[6px] text-xs md:text-[10px] xl:text-[15px] rounded-3xl max-sm:py-[1px] py-1 shadow-md shadow-yellow-400/50 font-bold text-[#F7B23B]">
                                            Tidak Suka
                                        </p>
                                    </div>
                                </span>
                            </label>
                        </div>

                    </div>

                    <div class="feedback mt-3 mx-0 sm:mx-20 md:mx-30 lg:mx-0 justify-items-center">
                        <div class="w-full">
                            <p class="text-[#333333] text-base mt-2 lg:text-lg">Apakah ada yang ingin SobatBinar bagikan?</p>
                        </div>
                        <div class="text-center justify-items-center w-full">
                            <textarea placeholder="Ceritakan pengalaman SobatBinar ketika mengisi tes psikotes ini" id="experience" name="experience"
                                class="mt-1 block w-full md:w-full px-2.5 py-1.5 lg:py-3 bg-gray-50 border border-gray-100 rounded-md shadow-md focus:outline-none h-32 lg:h-44 focus:ring-primary focus:border-primary text-sm lg:text-lg"></textarea>
                        </div>

                        <div class="submit flex flex-col w-full md:flex-row gap-5 justify-center items-center pt-9">
                            <button type="submit" class="rounded-lg bg-gradient-to-r mb-5 lg:mx-2 from-[#3986A3] to-[#225062] px-10 w-full lg:w-1/3 py-1.5 font-medium text-white text-lg max-sm:text-[15px]">Kirim</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</sections>

<script>
$(document).ready(function () {
    // Disable tombol saat halaman pertama kali dibuka
    $('button.submit').prop('disabled', true);

    // Aktifkan tombol
    function enable_submit() {
        $('button.submit').prop('disabled', false);
        $('button.submit').addClass('not-disabled');
    }

    // Nonaktifkan tombol
    function disable_submit() {
        $('button.submit').prop('disabled', true);
        $('button.submit').removeClass('not-disabled');
    }

    // Saat user memilih rating
    $('.rating input[type=radio]').on('click', function () {
        var rating = parseInt($(this).val());
        $('.feedback').css('display', "block");
        feedback_validate(rating);
    });

    // Validasi jika user mengetik pengalaman
    $('textarea[name="experience"]').on('keyup', function () {
        if ($(this).val().length > 3) {
            enable_submit();
        }
    });

    // Validasi rating + logika enable/disable
    function feedback_validate(val) {
        if (val <= 3) {
            disable_submit();
        } else if (val > 3) {
            enable_submit();
        }
    }
});
</script>
@endsection
