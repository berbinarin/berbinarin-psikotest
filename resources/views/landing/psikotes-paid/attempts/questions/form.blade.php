{{-- resources/views/components/attempt/question/form.blade.php --}}
<div class="max-h-[300px] overflow-y-auto rounded-xl bg-white p-10 drop-shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
    <h3 class="text-[22px] font-bold">{{ $question->text }}</h3>

    <div class="mt-6 flex flex-col gap-y-8">
        @foreach ($question->options as $option)
            @php
                $isPendidikan = Str::contains($question->text, "Pendidikan");
            @endphp

            <div @if ($option['repeatable']) x-data="{ items: [{}] }" @endif>
                @isset($option["title"])
                    <div class="mb-2 flex items-center justify-between">
                        <h4 class="text-lg font-bold text-primary">{{ $option["title"] }}</h4>
                        @if ($isPendidikan)
                            <span class="text-xs font-normal italic text-gray-400">* Kosongkan jika tidak ada</span>
                        @endif
                    </div>
                @endisset

                {{-- Jika option BISA di-repeat --}}
                @if ($option["repeatable"])
                    <div class="flex flex-col gap-y-5">
                        <template x-for="(item, index) in items" :key="index">
                            <div class="relative grid grid-cols-12 gap-x-4 gap-y-4 rounded-md">
                                <div class="col-span-12 grid grid-cols-12 gap-x-4 gap-y-4">
                                    @php
                                        $countInputs = count($option["inputs"]);
                                    @endphp

                                    @if ($isPendidikan && $countInputs === 3)
                                        <div class="col-span-12">
                                            <x-attempt.question.form.input :input="$option['inputs'][0]" :option="$option" :index="true" />
                                        </div>
                                        <div class="col-span-6">
                                            <x-attempt.question.form.input :input="$option['inputs'][1]" :option="$option" :index="true" />
                                        </div>
                                        <div class="col-span-6">
                                            <x-attempt.question.form.input :input="$option['inputs'][2]" :option="$option" :index="true" />
                                        </div>
                                    @elseif ($isPendidikan && $countInputs === 4)
                                        <div class="col-span-6">
                                            <x-attempt.question.form.input :input="$option['inputs'][0]" :option="$option" :index="true" />
                                        </div>
                                        <div class="col-span-6">
                                            <x-attempt.question.form.input :input="$option['inputs'][1]" :option="$option" :index="true" />
                                        </div>
                                        <div class="col-span-6">
                                            <x-attempt.question.form.input :input="$option['inputs'][2]" :option="$option" :index="true" />
                                        </div>
                                        <div class="col-span-6">
                                            <x-attempt.question.form.input :input="$option['inputs'][3]" :option="$option" :index="true" />
                                        </div>
                                    @else
                                        <div class="col-span-12 grid grid-cols-12 gap-x-4 gap-y-4">
                                            @foreach ($option["inputs"] as $input)
                                                <x-attempt.question.form.input :input="$input" :option="$option" :index="true" />
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- Tombol Hapus absolute kanan atas --}}
                                <button type="button" @click="items.splice(index, 1)" x-show="items.length > 1" class="absolute right-2 top-2 text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </template>

                        {{-- Tombol Tambah Input --}}
                        <div>
                            <button type="button" @click="items.push({})" class="mt-2 flex w-full items-center justify-center gap-2 rounded-lg border-2 border-dashed border-[#6083F2] bg-transparent px-4 py-4 text-sm font-semibold text-[#6083F2] hover:bg-primary/5">
                                <img src="{{ asset("assets/landing/icons/add.svg") }}" alt="Tambah" class="h-5 w-5" />
                                <span>Tambah {{ $option["title"] ?? "Input" }}</span>
                            </button>
                        </div>
                    </div>
                @else
                    {{-- Jika option TIDAK bisa di-repeat --}}
                    <div class="grid grid-cols-12 gap-x-4 gap-y-4">
                        @php
                            $countInputs = count($option["inputs"]);
                        @endphp

                        @if ($isPendidikan && $countInputs === 3)
                            <div class="col-span-12">
                                <x-attempt.question.form.input :input="$option['inputs'][0]" :option="$option" />
                            </div>
                            <div class="col-span-6">
                                <x-attempt.question.form.input :input="$option['inputs'][1]" :option="$option" />
                            </div>
                            <div class="col-span-6">
                                <x-attempt.question.form.input :input="$option['inputs'][2]" :option="$option" />
                            </div>
                        @elseif ($isPendidikan && $countInputs === 4)
                            <div class="col-span-6">
                                <x-attempt.question.form.input :input="$option['inputs'][0]" :option="$option" />
                            </div>
                            <div class="col-span-6">
                                <x-attempt.question.form.input :input="$option['inputs'][1]" :option="$option" />
                            </div>
                            <div class="col-span-6">
                                <x-attempt.question.form.input :input="$option['inputs'][2]" :option="$option" />
                            </div>
                            <div class="col-span-6">
                                <x-attempt.question.form.input :input="$option['inputs'][3]" :option="$option" />
                            </div>
                        @else
                            <div class="col-span-12 grid grid-cols-12 gap-x-4 gap-y-4">
                                @foreach ($option["inputs"] as $input)
                                    <x-attempt.question.form.input :input="$input" :option="$option" />
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
