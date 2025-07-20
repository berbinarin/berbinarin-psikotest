<p class="text-center font-medium">{{ $question->text }}</p>

<ul class="mx-auto mt-14 flex max-w-[1000px] justify-center gap-6">
    @foreach ($question->options as $option)
        <li class="flex flex-1 flex-col items-center gap-2">
            <label for="{{ $option['value'] }}" class="flex h-11 w-11 cursor-pointer select-none items-center justify-center rounded-full border border-slate-700 bg-slate-200 transition-colors duration-200 has-[input:checked]:bg-primary has-[input:checked]:text-white">
                <input id="{{ $option['value'] }}" type="radio" name="answer" class="hidden" value="{{ $option['value'] }}" required />
                <span>{{ $option['value'] }}</span>
            </label>
            <p class="select-none text-center">{{ $option['text'] }}</p>
        </li>
    @endforeach
</ul>
