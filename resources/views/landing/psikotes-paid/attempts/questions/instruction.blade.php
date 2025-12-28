@php
    use Illuminate\Support\Str;
    $videoHtml = '';
    $hasVideo = false;

    if (Str::contains($question->text, '<video')) {
        preg_match('/<video.*?<\/video>/is', $question->text, $matches);
        $videoHtml = $matches[0] ?? '';
        $hasVideo = !empty($videoHtml);
    }
@endphp

<div class="relative flex-1 rounded-xl bg-white p-10 drop-shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
    @if($hasVideo)
        <div class="absolute inset-0 z-10 flex items-center justify-center w-[450px] h-[220px] mx-auto top-10 left-0 right-0">
            {!! $videoHtml !!}
        </div>
    @endif
    <div class="text-justify text-sm max-h-[220px] overflow-y-auto {{ $hasVideo ? 'blur-sm pointer-events-none' : '' }}">
        {!! Str::replaceFirst($videoHtml, '', $question->text) !!}
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script>
    const v = document.querySelector("video");
    if (v) {
        v.addEventListener("play", () => {
            v.controls = false;
            v.addEventListener("pause", () => v.pause());
        });
    }
</script>