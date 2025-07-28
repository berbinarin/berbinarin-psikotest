<div class="flex-col">
    <label for="answer" class="text-center">
        <p class="font-medium">{{ $question->text }}</p>
    </label>

    <div class="mt-8 flex justify-center">
        <textarea class="h-[350px] w-full resize-y rounded-2xl border-0 placeholder:font-bold placeholder:text-[#d3d3d3]" name="answer" id="answer" placeholder="Ketik disini..." autofocus required></textarea>
    </div>
</div>
