@if (session('alert'))
    <div x-data="{ open: true }" x-show="open" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">

        <div class="relative w-[560px] rounded-[20px] bg-white p-6 font-plusJakartaSans shadow-lg"
            style="
                background:
                    linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat,
                    white;
                border-radius: 20px;
                background-clip: padding-box, border-box;
            ">

            {{-- Alert Icon --}}
            <img src="{{ session('icon') }}" alt="icon" class="mx-auto h-[83px] w-[83px]" />

            {{-- Alert Title --}}
            <h2 class="mt-4 text-center text-2xl font-bold text-stone-900">
                {{ session('title') }}
            </h2>

            {{-- Alert Message --}}
            <p class="mt-2 text-center text-base font-medium text-black">
                {{ session('message') }}
            </p>

            {{-- Alert Button --}}
            <div class="mt-6 flex justify-center gap-4">
                @if (session('type') === 'confirm')
                    <button @click="open = false" class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">
                        Tidak
                    </button>

                    <form action="{{ session('confirm_action') ?? '#' }}" method="POST">
                        @csrf
                        @if (session('method') && session('method') !== 'POST')
                            @method(session('method'))
                        @endif
                        <button type="submit"
                            class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-6 py-2 font-medium text-white">
                            Ya
                        </button>
                    </form>
                @else
                    <button @click="open = false"
                        class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-10 py-2 font-medium text-white">
                        OK
                    </button>
                @endif
            </div>
        </div>
    </div>
@endif
