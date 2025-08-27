<div class="flex max-h-[360px] flex-col overflow-y-auto rounded-xl bg-white p-10 drop-shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
    <h3 class="text-center text-lg font-bold uppercase text-[#EF5350]">{{ $question->section->title }}</h3>
    <p class="text-justify">{{ $question->text }}</p>

    <hr class="mt-5" />

    {{-- Daftar yang bisa diurutkan --}}
    <ul id="sortable-list" class="mt-6 flex flex-1 flex-col gap-6 pl-0">
        @foreach ($question->options["variants"]["male"] as $option)
            <li class="drag-item flex cursor-move items-center gap-4 rounded-md border p-2">
                <div class="flex w-[40px] flex-shrink-0 justify-center">
                    <span class="flex h-10 w-10 items-center justify-center rounded-md border bg-gray-200 font-semibold text-blue-500">
                        {{ $loop->iteration }}
                    </span>
                </div>
                <div class="flex-grow text-justify">{{ $option["text"] }}</div>
                <input type="hidden" name="answer[]" value="{{ $option["id"] }}" />
            </li>
        @endforeach
    </ul>

    <div class="mt-6 flex justify-center">
        <button type="submit" class="h-[43.67px] w-full rounded-[6.67px] bg-[#106681] font-plusJakartaSans text-[13.33px] font-bold text-white">Selanjutnya</button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const listElement = document.getElementById('sortable-list');

        function updateNumbering() {
            const listItems = listElement.children;
            for (let i = 0; i < listItems.length; i++) {
                const numberSpan = listItems[i].querySelector('span');
                if (numberSpan) {
                    numberSpan.textContent = i + 1;
                }
            }
        }

        const sortable = Sortable.create(listElement, {
            animation: 150,
            handle: '.drag-item',
            onEnd: function () {
                updateNumbering();
            },
        });
    });
</script>
