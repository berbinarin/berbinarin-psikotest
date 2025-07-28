{{-- resources/views/components/attempt/question/form/input.blade.php --}}
@props([
    'input',
    'option',
    'index' => false, // Default value adalah false
])

{{-- ... kode @props di atasnya tetap sama ... --}}

@php
    $label = $input['label'];
    $type = $input['type'];
    $span = $input['span'];
    $required = $input['required'] ?? false;
    $placeholder = $input['placeholder'] ?? '';

    // --- AWAL PERUBAHAN ---

    // Nama default jika tidak ada group
    $staticName = $input['name'];
    // Inisialisasi nama dinamis
    $dynamicName = '';

    // Hanya proses penamaan group jika key 'group' ada
    if (isset($option['group'])) {
        // Buat nama statis untuk form non-repeatable
        $staticName = $option['group'] . '[' . $input['name'] . ']';

        // Buat template nama dinamis untuk form repeatable (AlpineJS)
        $dynamicName = '`' . $option['group'] . '[${index}][' . $input['name'] . ']`';
    }

    // --- AKHIR PERUBAHAN ---
@endphp

{{-- ... sisa kode di bawahnya (switch-case) tetap sama ... --}}

@switch($type)
    @case('select')
        <div class="col-span-{{ $span }} flex flex-col gap-y-1">
            <label for="{{ $input['name'] }}_{{ $option['group'] ?? '' }}" class="font-semibold text-[#3F3F3F]">{{ $label }}</label>
            <select
                id="{{ $input['name'] }}_{{ $option['group'] ?? '' }}"
                class="w-full rounded-lg border border-[#cccccc] drop-shadow-[0_2px_4px_rgba(0,0,0,0.08)] placeholder:text-[#9e9e9e] focus:border-primary focus:outline-none focus:ring-primary"
                @if ($index)
                    :name="{{ $dynamicName }}"
                @else
                    name="{{ $staticName }}"
                @endif
                {{ $required ? 'required' : '' }}
            >
                <option value="" selected disabled>Pilih {{ $label }}</option>
                @foreach ($input['items'] as $item)
                    <option value="{{ $item['value'] }}">{{ $item['text'] }}</option>
                @endforeach
            </select>
        </div>
        @break

    @default
        <div class="col-span-{{ $span }} flex flex-col gap-y-1">
            <label for="{{ $input['name'] }}_{{ $option['group'] ?? '' }}_{{ $index ? 'index' : '' }}" class="font-semibold text-[#3F3F3F]">{{ $label }}</label>
            <input
                type="{{ $type }}"
                {{-- ID harus unik. Kita gunakan index dari Alpine untuk membuatnya unik. --}}
                @if ($index)
                    :id="`{{ $input['name'] }}_{{ $option['group'] ?? '' }}_${index}`"
                    :name="{{ $dynamicName }}"
                @else
                    id="{{ $input['name'] }}_{{ $option['group'] ?? '' }}"
                    name="{{ $staticName }}"
                @endif
                class="w-full rounded-lg border border-[#cccccc] drop-shadow-[0_2px_4px_rgba(0,0,0,0.08)] placeholder:text-[#9e9e9e] focus:border-primary focus:outline-none focus:ring-primary"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
            />
        </div>
@endswitch