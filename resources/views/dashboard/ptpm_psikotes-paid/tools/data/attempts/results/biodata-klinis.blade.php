<div class="flex w-full flex-col gap-12 rounded-lg bg-white p-8 shadow-lg">
    @foreach ($data->questions->where("type", "form") as $question)
        <div class="flex flex-col gap-2">
            <h2 class="text-[28px] font-bold text-primary">{{ $question->text }}</h2>
            <div class="grid grid-cols-12 gap-y-4">
                @foreach ($question["options"] as $option)
                    @if ($option["repeatable"] && $data->responses->has($option["group"]))
                        @foreach ($data->responses->get($option["group"]) as $group)
                            @foreach ($option["inputs"] as $input)
                                <div class="col-span-{{ $input["span"] ?? 4 }} flex-col gap-1">
                                    <h4 class="font-semibold text-[#9e9e9e]">{{ $input["label"] }}</h4>
                                    <span class="font-semibold">{{ $group[$input["name"]] ?? "-" }}</span>
                                </div>
                            @endforeach
                        @endforeach
                    @else
                        @foreach ($option["inputs"] as $input)
                            <div class="col-span-6 flex-col gap-1">
                                <h4 class="font-semibold text-[#9e9e9e]">{{ $input["label"] }}</h4>

                                @if (isset($option["group"]) && isset($data->responses->get($option["group"])[$input["name"]]))
                                    <span class="font-semibold">{{ $data->responses->get($option["group"])[$input["name"]] }}</span>
                                @else
                                    <span class="font-semibold">{{ $data->responses->get($input["name"]) ?? "-" }}</span>
                                @endif
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>
