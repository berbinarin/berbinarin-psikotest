<label for="answer" class="justify-center">
    <img src="{{ asset($question["text"]) }}" alt="" srcset="" class="w-[150px] h-[100px] justify-center" />
</label>

@if (count($question->options) >= 5)
    <div class="mb-1 mt-2 grid grid-cols-3 gap-4">
        @foreach ($question->options->slice(0, 3) as $option)
            <label class="flex cursor-pointer flex-col items-center">
                <input type="radio" name="answer" value="{{ $option["key"] }}" class="peer hidden" required />
                <img src="{{ asset($option["text"]) }}" alt="Option {{ $option["key"] }}" class="h-20 w-20 rounded-lg border-2 border-gray-300 object-contain transition peer-checked:border-[#3986A3] peer-checked:ring-2 peer-checked:ring-[#3986A3]" />
            </label>
        @endforeach
    </div>
    <div class="grid grid-cols-2 gap-4">
        @foreach ($question->options->slice(3, 2) as $option)
            <label class="flex cursor-pointer flex-col items-center">
                <input type="radio" name="answer" value="{{ $option["key"] }}" class="peer hidden" required />
                <img src="{{ asset($option["text"]) }}" alt="Option {{ $option["key"] }}" class="h-20 w-20 rounded-lg border-2 border-gray-300 object-contain transition peer-checked:border-[#3986A3] peer-checked:ring-2 peer-checked:ring-[#3986A3]" />
            </label>
        @endforeach
    </div>
@else
    <div class="flex gap-4">
        @foreach ($question->options as $option)
            <label class="flex cursor-pointer flex-col items-center">
                <input type="radio" name="answer" value="{{ $option["key"] }}" class="peer hidden" required />
                <img src="{{ asset($option["text"]) }}" alt="Option {{ $option["key"] }}" class="h-24 w-24 rounded-lg border-2 border-gray-300 object-contain transition peer-checked:border-[#3986A3] peer-checked:ring-2 peer-checked:ring-[#3986A3]" />
            </label>
        @endforeach
    </div>
@endif
