<div class="flex flex-wrap justify-center">
    {{ $question["text"] }}
</div>

<div class="flex flex-wrap justify-center gap-4">
    @foreach ($question->options as $option)
        <label class="relative h-[107.33px] w-[197.33px] cursor-pointer">
            <input type="radio" name="answer" value="{{ $option["value"] }}" class="peer absolute h-full w-full opacity-0" required />
            <div class="flex h-full w-full items-center justify-center rounded-[6.67px] border-[1.33px] border-[#555555] bg-white font-plusJakartaSans text-[13.33px] font-semibold text-black transition-colors duration-200 peer-checked:border-blue-700 peer-checked:bg-[#106681]/20">
                {{ $option["text"] }}
            </div>
            <img src="{{ asset("assets/landing/icons/centang.png") }}" class="absolute right-2 top-2 h-5 w-5 opacity-0 transition-opacity duration-200 peer-checked:opacity-100" alt="Checkmark" />
        </label>
    @endforeach
</div>
