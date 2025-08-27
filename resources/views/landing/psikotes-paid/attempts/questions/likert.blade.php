<p class="text-center font-medium">{{ $question->text }}</p>

<ul class="mx-auto mt-14 flex max-w-[1000px] justify-center gap-6">
    @foreach ($question->options as $option)
        <li class="flex flex-1 flex-col items-center gap-2">
            <label for="{{ $option["value"] }}" class="flex h-11 w-11 cursor-pointer select-none items-center justify-center rounded-full bg-white shadow-[0_0_20px_#3986A380] transition-shadow duration-200 hover:shadow-[0_0_28px_#3986A380] has-[input:checked]:bg-primary has-[input:checked]:text-white has-[input:checked]:shadow-[0_0_34px_#3986A380]">
                <input id="{{ $option["value"] }}" type="radio" name="answer" class="hidden" value="{{ $option["value"] }}" required />
                <span class="font-bold">{{ $option["value"] }}</span>
            </label>

            <p class="select-none text-center">{{ $option["text"] }}</p>
        </li>
    @endforeach
</ul>
