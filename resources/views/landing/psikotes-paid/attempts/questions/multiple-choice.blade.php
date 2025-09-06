@foreach ($question->options as $option)
    <label class="relative flex h-[62.67px] w-[520.33px] cursor-pointer items-center">
        <input type="radio" name="answer" value="{{ $option['key'] }}" class="peer absolute h-full w-full opacity-0" required />
        <div class="flex h-full w-full items-center justify-start rounded-[13px] border-[1.33px] border-[#9E9E9E] font-plusJakartaSans text-[13.33px] font-semibold text-black transition-colors duration-200 peer-checked:bg-[#3986A3] peer-checked:text-white">
            <div class="ml-4 mr-4 h-5 w-5 rounded-full border-2 border-[#9E9E9E] bg-white peer-checked:border-4 peer-checked:border-white peer-checked:bg-[#3986A3]"></div>
            {{ $option['text'] }}
        </div>
    </label>
@endforeach
