<div class="flex-1 rounded-xl bg-white p-10 drop-shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
    <div class="text-justify text-sm max-h-[220px] overflow-y-auto">{!! $question->text !!}</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script>
    const v = document.querySelector("video");
    v.addEventListener("play", () => {
        v.controls = false;
        v.addEventListener("pause", () => v.pause());
    });
</script>
