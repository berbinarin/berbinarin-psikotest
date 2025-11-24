@extends(
    "dashboard.layouts.app",
    [
        "title" => "Psikotes Free",
    ]
)

@section("content")
    <section class="flex">
        <div class="flex flex-col">
            <div class="w-fit">
                <div class="py-5">
                    <div class="flex flex-row items-center">
                        <div>
                            <a href="{{ route("dashboard.free-profiles.data.show") }}">
                                <i class="bx bx-arrow-back mr-6 text-left text-[30px] text-primary"></i>
                            </a>
                        </div>
                        <div>
                            <p class="mb-2 text-lg font-bold leading-normal text-gray-800 md:text-3xl">Detail Responden</p>
                        </div>
                    </div>
                </div>
                <div class="relative w-[1240px] flex-auto rounded-[24px] bg-white px-10 py-7 shadow">
                    <div class="flex gap-10">
                        <div class="w-2/5">
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-col">
                                    <div class="col-span-2 font-bold">Nama</div>
                                    <div class="col-span-3">{{ $attempt->profile->name }}</div>
                                </div>

                                <div class="flex flex-col">
                                    <div class="col-span-5 font-bold">Jenis Kelamin</div>
                                    <div class="col-span-7">{{ $attempt->profile->gender == "male" ? "Laki-laki" : "Perempuan" }}</div>
                                </div>

                                <div class="flex flex-col">
                                    <div class="col-span-5 font-bold">Tanggal Lahir</div>
                                    <div class="col-span-7">{{ \Carbon\Carbon::parse($attempt->profile->date_of_birth)->format("Y-m-d") }}</div>
                                </div>

                                <div class="flex flex-col">
                                    <div class="col-span-5 font-bold">Email</div>
                                    <div class="col-span-7">{{ $attempt->profile->email }}</div>
                                </div>

                                <div class="flex flex-col">
                                    <div class="col-span-5 font-bold">Tanggal Tes</div>
                                    <div class="col-span-7">{{ \Carbon\Carbon::parse($attempt->profile->test_date)->format("Y-m-d") }}</div>
                                </div>

                                <div class="flex flex-col">
                                    <span class="col-span-5 font-bold">Umpan Balik</span>
                                    <span class="">
                                        @php
                                            $rating = optional(value: optional($attempt->profile)->feedback)->rating;
                                            $feedbackData = [5 => ["image" => "1-wahoo2.webp", "alt" => "Sangat Puas"], 4 => ["image" => "2-happy2.webp", "alt" => "Puas"], 3 => ["image" => "3-neutral2.webp", "alt" => "Cukup"], 2 => ["image" => "4-bummed2.webp", "alt" => "Kurang Puas"], 1 => ["image" => "4-pissed2.webp", "alt" => "Sangat Tidak Puas"]];
                                        @endphp

                                        @if (isset($feedbackData[$rating]))
                                            <img src="{{ asset("assets/landing/images/psikotes-free/feedback/" . $feedbackData[$rating]["image"]) }}" alt="{{ $feedbackData[$rating]["alt"] }}" class="mr-2 inline-block h-auto w-16 align-middle" />
                                            <span class="font-semibold">{{ $rating }} ,</span>
                                            <span class="ml-2">{{ optional(optional($attempt->profile)->feedback)->experience }}</span>
                                        @else
                                            <span class="">tidak ada 😭</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="w-3/5">
                            <table class="table-striped table-hover table w-full">
                                <tr>
                                    <td class="py-2 font-semibold">
                                        @if ($data)
                                            <div class="grid grid-cols-12 gap-y-7">
                                                @foreach ($percentages as $key => $value)
                                                    <div class="col-span-4">
                                                        <span class="font-bold">{{ Str::title($key) }}</span>
                                                    </div>
                                                    <div class="col-span-8 flex w-full gap-4">
                                                        <span>:</span>
                                                        <div class="flex items-center rounded-full min-w-14 bg-primary pl-4 text-[13px] text-white" style="width: {{ $value }}%">
                                                            <span>{{ round($value) }}%</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="card-text">Tidak ada hasil yang tersedia</p>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="flex flex-col overflow-x-auto">
                        <div class="inline-block min-w-full py-2">
                            <div class="overflow-x relative">
                                <table class="table-striped table-hover table w-full text-left text-sm rtl:text-right">
                                    <tr>
                                        <td class="py-3 font-semibold">
                                            <table class="w-full rounded-lg bg-slate-300">
                                                <thead class="border-0">
                                                    <tr class="">
                                                        <th class="rounded-lg border border-slate-100 px-4 py-3">Nomor Soal</th>
                                                        @foreach ($attempt->tool->sections[0]->questions as $question)
                                                            <th class="border border-slate-100 px-4 py-3">
                                                                {{ $question->order }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="border border-slate-100 px-4 py-3">Jawaban</td>
                                                        @foreach ($attempt->tool->sections[0]->questions as $question)
                                                            <td class="border border-slate-100 px-4 py-3">
                                                                {{ $attempt->responses->where("question_id", $question->id)->first()->answer["value"] ?? 0 }}
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
