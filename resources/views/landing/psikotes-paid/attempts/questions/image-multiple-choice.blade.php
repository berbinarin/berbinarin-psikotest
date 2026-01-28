<label for="answer" class="flex justify-center">
    <img src="{{ asset($question["text"]) }}" alt="" srcset="" class="w-auto h-[100px] justify-center" />
</label>

<div class="flex gap-4 mt-8 justify-center">
    @foreach ($question->options as $option)
        <label class="flex cursor-pointer flex-col items-center">
            <input type="radio" name="answer" value="{{ $option["key"] }}" class="peer hidden" required />
            <img src="{{ asset($option["text"]) }}" alt="Option {{ $option["key"] }}" class="h-24 w-24 rounded-lg object-contain transition peer-checked:border-[#3986A3] peer-checked:ring-4 peer-checked:ring-[#3986A3]" />
        </label>
    @endforeach
</div>
