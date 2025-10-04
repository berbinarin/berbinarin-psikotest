@if (true)
    <div id="custom-alert" x-data="{
            open: false,
            icon: '{{ session('icon', '') }}',
            title: '{{ session('title', '') }}',
            message: '{{ session('message', '') }}',
            type: '{{ session('type', '') }}',
            confirm_action: '{{ session('confirm_action', '') }}',
            method: '{{ session('method', 'POST') }}'
        }"
        x-show="open" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
        x-init="
            // Tampilkan awal jika server meng-set session('alert')
            @if(session('alert'))
                open = true;
            @endif

            // Handler JS untuk menampilkan alert via window.dispatchEvent(new CustomEvent('show-alert', { detail: {...} }))
            window.addEventListener('show-alert', event => {
                const d = event.detail || {};
                if (d.icon !== undefined) icon = d.icon;
                if (d.title !== undefined) title = d.title;
                if (d.message !== undefined) message = d.message;
                if (d.type !== undefined) type = d.type;
                if (d.confirm_action !== undefined) confirm_action = d.confirm_action;
                if (d.method !== undefined) method = d.method;
                open = true;
            });
        ">
        <div class="relative w-[560px] rounded-[20px] bg-white p-6 font-plusJakartaSans shadow-lg"
            style="
                background:
                    linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat,
                    white;
                border-radius: 20px;
                background-clip: padding-box, border-box;
            ">

            {{-- Alert Icon --}}
            <template x-if="icon">
                <img :src="icon" alt="icon" class="mx-auto h-[83px] w-[83px]" />
            </template>

            {{-- Alert Title --}}
            <h2 class="mt-4 text-center text-2xl font-bold text-stone-900" x-text="title"></h2>

            {{-- Alert Message --}}
            <p class="mt-2 text-center text-base font-medium text-black" x-text="message"></p>

            {{-- Alert Button(s) --}}
            <div class="mt-6 flex justify-center gap-4">
                <template x-if="type === 'confirm'">
                    <div class="flex gap-4">
                        <button @click="open = false" class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">
                            Tidak
                        </button>

                        <button @click="$dispatch('alert-confirm'); open = false" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-6 py-2 font-medium text-white">
                            Ya
                        </button>
                    </div>
                </template>

                <template x-if="type !== 'confirm'">
                    <button @click="open = false" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-10 py-2 font-medium text-white">
                        OK
                    </button>
                </template>
            </div>
        </div>
    </div>
@endif
