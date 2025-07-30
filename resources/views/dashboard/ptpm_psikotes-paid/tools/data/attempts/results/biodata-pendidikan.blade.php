<div class="flex w-full flex-col gap-12 rounded-lg bg-white p-8 shadow-lg">
    {{-- Data Form --}}
    @foreach ($data->questions->where("type", "form") as $question)
        <div class="flex flex-col gap-2">
            <h2 class="text-[28px] font-bold text-primary">{{ $question->text }}</h2>
            <div class="grid grid-cols-12 gap-y-4">
                @foreach ($question["options"] as $option)
                    @if ($option["repeatable"] && $data->responses->form->has($option["group"]))
                        @foreach ($data->responses->form->get($option["group"]) as $group)
                            @foreach ($option["inputs"] as $input)
                                <div class="col-span-{{ $input["span"] }} flex-col gap-1">
                                    <h4 class="font-semibold text-[#9e9e9e]">{{ $input["label"] }}</h4>
                                    <span class="font-semibold">{{ $group[$input["name"]] ?? "-" }}</span>
                                </div>
                            @endforeach
                        @endforeach
                    @else
                        @foreach ($option["inputs"] as $input)
                            <div class="col-span-{{ $input["span"] }} flex-col gap-1">
                                <h4 class="font-semibold text-[#9e9e9e]">{{ $input["label"] }}</h4>

                                @if (isset($option["group"]) && isset($data->responses->form->get($option["group"])[$input["name"]]))
                                    <span class="font-semibold">{{ $data->responses->form->get($option["group"])[$input["name"]] }}</span>
                                @else
                                    @if ($input["type"] === "select")
                                        @foreach ($input["items"] as $item)
                                            <span class="font-semibold">{{ $item["value"] === $data->responses->form->get($input["name"]) ? $item["text"] : "" }}</span>
                                        @endforeach
                                    @else
                                        <span class="font-semibold">{{ $data->responses->form->get($input["name"]) ?? "-" }}</span>
                                    @endif
                                @endif
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach

    {{-- Data Essay --}}
    <div>
        <h2 class="text-[28px] font-bold text-primary">Pertanyaan Essay</h2>

        <div class="flex flex-col gap-6">
            @foreach ($data->questions->where("type", "essay") as $question)
                <div class="col-span-{{ $input["span"] }} flex-col gap-2">
                    <h4 class="font-semibold text-[#9e9e9e]">{{ $question->text }}</h4>
                    <p class="font-semibold whitespace-pre-wrap leading-[21px]">{!! $data->responses->essay[$question->order - 1]["text"] !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>



{{-- Alternatif jika ingin setiap data digabung jika nama sectionnya sama --}}
{{-- <div class="flex w-full flex-col gap-12 rounded-lg bg-white p-8 shadow-lg">
    @php
        $groupedQuestions = $data->questions->where("type", "form")->groupBy("text");
    @endphp

    @foreach ($groupedQuestions as $sectionText => $questionsInSection)
        <div class="flex flex-col gap-2">
            <h2 class="text-[28px] font-bold text-primary">{{ $sectionText }}</h2>

            <div class="grid grid-cols-12 gap-y-4">
                @foreach ($questionsInSection as $question)
                    @foreach ($question["options"] as $option)
                        @if ($option["repeatable"] && $data->responses->form->has($option["group"]))
                            @foreach ($data->responses->form->get($option["group"]) as $group)
                                @foreach ($option["inputs"] as $input)
                                    <div class="col-span-{{ $input["span"] }} flex-col gap-1">
                                        <h4 class="font-semibold text-[#9e9e9e]">{{ $input["label"] }}</h4>
                                        <span class="font-semibold">{{ $group[$input["name"]] ?? "-" }}</span>
                                    </div>
                                @endforeach
                            @endforeach
                        @else
                            @foreach ($option["inputs"] as $input)
                                <div class="col-span-{{ $input["span"] }} flex-col gap-1">
                                    <h4 class="font-semibold text-[#9e9e9e]">{{ $input["label"] }}</h4>

                                    @if (isset($option["group"]) && isset($data->responses->form->get($option["group"])[$input["name"]]))
                                        <span class="font-semibold">{{ $data->responses->form->get($option["group"])[$input["name"]] }}</span>
                                    @else
                                        @if ($input["type"] === "select")
                                            @foreach ($input["items"] as $item)
                                                <span class="font-semibold">{{ $item["value"] === $data->responses->form->get($input["name"]) ? $item["text"] : "" }}</span>
                                            @endforeach
                                        @else
                                            <span class="font-semibold">{{ $data->responses->form->get($input["name"]) ?? "-" }}</span>
                                        @endif
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach

    <div>
        <h2 class="text-[28px] font-bold text-primary">Pertanyaan Essay</h2>

        <div class="flex flex-col gap-6">
            @foreach ($data->questions->where("type", "essay") as $question)
                <div class="col-span-{{ $input["span"] }} flex-col gap-2">
                    <h4 class="font-semibold text-[#9e9e9e]">{{ $question->text }}</h4>
                    <p class="whitespace-pre-wrap font-semibold leading-[21px]">{!! $data->responses->essay[$question->order - 1]["text"] !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}
