@php
    $options = $question->options ?? [];
    $optionCount = is_countable($options) ? count($options) : 0;
    $isCompact = $optionCount > 4;
@endphp

<div class="mx-auto w-full max-w-[860px]">
    <div class="mx-auto grid w-fit grid-cols-1 gap-5 justify-center sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($options as $option)
        <label for="{{ $option["key"] }}" class="card relative flex {{ $isCompact ? "h-[140px] w-[160px]" : "h-[180px] w-[330px]" }} select-none flex-col items-center justify-center gap-3 rounded-xl px-6 transition-all duration-[200ms] hover:scale-[1.03] hover:shadow-[0_8px_16px_rgba(16,24,40,0.12)]">
            <input class="peer hidden" type="checkbox" value="{{ $option["key"] }}" id="{{ $option["key"] }}" name="answer[]" {{ $loop->first ? "required" : "" }} />
            <div class="absolute inset-0 rounded-xl border border-[#D0D5DD] bg-white transition peer-checked:border-[#3A86A3] peer-checked:bg-[#3A86A3] peer-checked:shadow-[0_10px_18px_rgba(16,24,40,0.18)]"></div>
            <img src="{{ asset($option["text"]) }}" alt="Option {{ $option["key"] }}" class="{{ $isCompact ? "h-20 w-20" : "h-24 w-24" }} relative z-10 rounded-lg border border-[#D0D5DD] bg-white object-contain transition peer-checked:border-white peer-checked:ring-4 peer-checked:ring-[#2F6F86]" />
            @if (!empty($option["label"]))
                <span class="relative z-10 text-center {{ $isCompact ? "text-xs" : "text-sm" }} font-semibold text-[#101828] peer-checked:text-white">{{ $option["label"] }}</span>
            @endif
            <div class="absolute bottom-4 right-4 z-10 flex h-[18px] w-[18px] items-center justify-center rounded border border-[#BFC5D2] bg-white">
                <svg class="hidden scale-110" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 0C4.03725 0 0 4.03725 0 9C0 13.9628 4.03725 18 9 18C13.9628 18 18 13.9628 18 9C18 4.03725 13.9628 0 9 0ZM8.93175 11.5642C8.6415 11.8545 8.25975 11.9993 7.8765 11.9993C7.49325 11.9993 7.10775 11.853 6.8145 11.5605L4.728 9.5385L5.77275 8.46075L7.8675 10.491L12.2243 6.21525L13.2773 7.284L8.93175 11.5642Z" fill="#3A86A3" />
                </svg>
            </div>
        </label>
    @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mengambil semua input checkbox dengan nama 'answer'
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="answer[]"]');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
                const selectedCard = checkbox.closest('.card');
                const selectedSvg = selectedCard.querySelector('svg');

                // Toggle Checkbox
                if (checkbox.checked) {
                    selectedSvg.classList.remove('hidden');
                } else {
                    selectedSvg.classList.add('hidden');
                }

                // Minimal 1 pilihan: required hanya aktif jika tidak ada yang terpilih
                const anyChecked = Array.from(checkboxes).some((item) => item.checked);
                checkboxes.forEach((item, index) => {
                    item.required = !anyChecked && index === 0;
                });
            });
        });
    });
</script>
