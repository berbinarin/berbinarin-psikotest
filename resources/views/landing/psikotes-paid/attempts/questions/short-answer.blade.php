<div>
    <label for="answer" class="text-left">
        <p class="font-medium">{{ $question->text }}</p>
    </label>

    <div class="mt-8 flex justify-center">
        <input type="text" name="answer" placeholder="Ketik disini..."
            class="w-[620px] rounded-[13.33px] border border-slate-300 py-4 text-start
                    placeholder:text-[#d3d3d3] focus:border-primary focus:ring-2 focus:ring-primary"
            autofocus />
    </div>
</div>

