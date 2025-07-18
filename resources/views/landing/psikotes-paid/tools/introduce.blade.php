@extends(
    "landing.layouts.test",
    [
        "title" => "Tes " . str_pad($tool->order, 2, "0", STR_PAD_LEFT),
    ]
)

@section("content")
    <div class="container mx-auto">
        <div class="fixed left-0 top-0 -z-10 h-screen w-screen bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset("/assets/landing/images/psikotes-paid/psikotes-soal-bg.png") }})"></div>

        <div class="relative flex h-[85vh] flex-col justify-between">
            <div class="flex flex-col items-center justify-center gap-7">
                <div class="mt-8 flex w-fit items-center gap-7 rounded-[70px] bg-white px-8 py-[10px]">
                    <img class="h-10 w-10" src="{{ asset("/assets/landing/images/psikotes-paid/logo-berbinar.png") }}" alt="Logo Berbinar" />
                    <img class="h-11 w-11" src="{{ asset("/assets/landing/images/psikotes-paid/logo-berbinar-psikotes.png") }}" alt="Logo Berbinar Psikotest" />
                </div>
                <div>
                    <h2 class="text-[28px] font-bold">Tes {{ str_pad($tool->order, 2, "0", STR_PAD_LEFT) }}</h2>
                </div>
            </div>

            <div class="mb-4 mt-10 flex flex-1">
                <div class="mx-auto max-w-[871px] rounded-xl bg-white p-10 drop-shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                    <div class="prose font-medium">
                        @php
                            $user_gender = auth()->user()->profile->gender ?? null;
                            $gender_text = match ($user_gender) {
                                "male" => "PRIA",
                                "female" => "WANITA",
                                default => "(PRIA/WANITA)",
                            };
                            $introduce_text = str_replace("(PRIA/WANITA)", $gender_text, $tool->introduce);
                        @endphp

                        {!! $introduce_text !!}
                    </div>

                    <div class="mt-8 flex justify-center">
                        <a href="/psikotes-paid/tools/{{ $tool->id }}/question" class="rounded-full bg-[#6083F2] px-8 py-2 font-extrabold text-white">Selanjutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
