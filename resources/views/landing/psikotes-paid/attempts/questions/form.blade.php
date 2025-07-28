{{-- resources/views/components/attempt/question/form.blade.php --}}
<div class="rounded-xl bg-white p-10 drop-shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
    <h3 class="text-[22px] font-bold">{{ $question->text }}</h3>

    <div class="mt-6 flex flex-col gap-y-8">
        @foreach ($question->options as $option)
            {{--
                Gunakan x-data untuk mengelola state dari repeatable group.
                Inisialisasi dengan satu item kosong untuk baris pertama.
            --}}
            <div @if ($option['repeatable']) x-data="{ items: [{}] }" @endif>

                @isset($option["title"])
                    <h4 class="mb-2 text-lg font-bold text-primary">{{ $option["title"] }}</h4>
                @endisset

                {{-- Jika option BISA di-repeat --}}
                @if ($option['repeatable'])
                    <div class="flex flex-col gap-y-5">
                        {{-- Gunakan <template> dan x-for untuk loop data dari AlpineJS --}}
                        <template x-for="(item, index) in items" :key="index">
                            <div class="grid grid-cols-12 rounded-md border p-4">
                                {{-- Input fields --}}
                                <div class="col-span-11 grid grid-cols-12 gap-x-4 gap-y-4">
                                    @foreach ($option["inputs"] as $input)
                                        {{-- Kirim "index" ke component input --}}
                                        <x-attempt.question.form.input :input="$input" :option="$option" :index="true" />
                                    @endforeach
                                </div>

                                {{-- Tombol Hapus --}}
                                <div class="col-span-1 flex items-start justify-end">
                                    {{-- Tampilkan tombol hapus hanya jika item lebih dari satu --}}
                                    <button type="button" @click="items.splice(index, 1)" x-show="items.length > 1" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>

                        {{-- Tombol Tambah Input --}}
                        <div>
                            <button type="button" @click="items.push({})" class="mt-2 rounded-lg border border-primary bg-primary/10 px-5 py-2 text-sm font-semibold text-primary hover:bg-primary/20">
                                + Tambah {{ $option['title'] ?? 'Input' }}
                            </button>
                        </div>
                    </div>
                @else
                    {{-- Jika option TIDAK bisa di-repeat (logika lama) --}}
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 grid grid-cols-12 gap-x-4 gap-y-4">
                            @foreach ($option["inputs"] as $input)
                                <x-attempt.question.form.input :input="$input" :option="$option" />
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>