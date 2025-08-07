@php
    $colors = ["#3fa2f6", "#fbb03b", "#406c9b", "#6a3d00"];
@endphp

<p class="text-center text-lg font-medium">{{ $question->text }}</p>

<div class="mx-auto mt-12 flex w-[700px] flex-wrap items-center justify-center gap-x-5 gap-y-6">
    @foreach ($question->options as $option)
        <label for="{{ $option["key"] }}" class="card relative flex h-[180px] w-[330px] select-none items-center justify-center rounded-[10px] bg-[{{ $colors[$loop->index] }}] px-6 transition-all duration-[200ms] hover:scale-[1.03] hover:shadow-[0_8px_16px_rgba(0,0,0,0.25)]">
            <input class="hidden" type="radio" value="{{ $option["key"] }}" id="{{ $option["key"] }}" name="answer" value="{{ $option["key"] }}" required />
            <span class="text-center text-sm font-semibold text-white">{{ $option["text"] }}</span>
            <div class="absolute bottom-4 right-4 flex h-[18px] w-[18px] items-center justify-center rounded-full border border-white">
                <svg class="hidden scale-110" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 0C4.03725 0 0 4.03725 0 9C0 13.9628 4.03725 18 9 18C13.9628 18 18 13.9628 18 9C18 4.03725 13.9628 0 9 0ZM8.93175 11.5642C8.6415 11.8545 8.25975 11.9993 7.8765 11.9993C7.49325 11.9993 7.10775 11.853 6.8145 11.5605L4.728 9.5385L5.77275 8.46075L7.8675 10.491L12.2243 6.21525L13.2773 7.284L8.93175 11.5642Z" fill="white" />
                </svg>
            </div>
        </label>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const radioButtons = document.querySelectorAll('input[type="radio"][name="answer"]');

        radioButtons.forEach((radio) => {
            radio.addEventListener('change', () => {
                // Sembunyikan semua SVG dulu
                document.querySelectorAll('.card svg').forEach((svg) => {
                    svg.classList.add('hidden');
                });

                // Tampilkan SVG milik radio yang dicentang
                const selectedCard = radio.closest('.card');
                const selectedSvg = selectedCard.querySelector('svg');
                if (selectedSvg) {
                    selectedSvg.classList.remove('hidden');
                }
            });
        });
    });
</script>
