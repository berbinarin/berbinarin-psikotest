@extends(
    "landing.layouts.test",
    [
        "title" => "Tes " . str_pad($question->tool->order, 2, "0", STR_PAD_LEFT),
    ]
)

@section("content")
    <div class="container mx-auto">
        <div class="fixed left-0 top-0 -z-10 h-screen w-screen bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset("assets/images/psikotes-paid/psikotes-soal-bg.png") }})"></div>

        <form action="/psikotes-paid/tools/{{ $question->tool->id }}/question" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="relative flex h-[85vh] flex-col justify-between">
                <div class="flex flex-col items-center justify-center gap-7">
                    <div class="mt-8 flex w-fit items-center gap-7 rounded-[70px] bg-white px-8 py-[10px]">
                        <img class="h-10 w-10" src="{{ asset("assets/images/psikotes-paid/logo-berbinar.png") }}" alt="Logo Berbinar" />
                        <img class="h-11 w-11" src="{{ asset("assets/images/psikotes-paid/logo-berbinar-psikotes.png") }}" alt="Logo Berbinar Psikotest" />
                    </div>
                    <div>
                        <h2 class="text-[28px] font-bold">Tes {{ str_pad($question->tool->order, 2, "0", STR_PAD_LEFT) }}</h2>
                    </div>
                </div>

                <div class="flex-1 mt-10 mb-4 flex flex-col justify-center">
                    @if ($question->type)
                        @include("landing.psikotes-paid.tools.types." . Str::slug($question->type))
                    @endif
                </div>

                <div class="flex gap-6 rounded-[10px] bg-white px-8 py-3 drop-shadow-[0_4px_4px_rgba(0,0,0,0.25)]">
                    <div class="relative flex h-full w-full flex-col justify-center">
                        <div class="h-[3px] w-full rounded-md bg-black">
                            <div class="relative h-[3px] rounded-md bg-[#232ACA]" style="width: {{ $progress }}%">
                                <span class="absolute right-0 block h-2 w-2 -translate-y-1/3 translate-x-1/2 rounded-full bg-[#232ACA]"></span>
                                <span class="absolute right-0 top-[150%] translate-x-[50%] text-[10px] font-bold">{{ $progress }}%</span>
                            </div>
                        </div>
                    </div>
                    <button class="rounded-md bg-[#232ACA] px-3 py-[6px] text-xs text-white transition-all duration-300 hover:opacity-85">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>
@endsection

