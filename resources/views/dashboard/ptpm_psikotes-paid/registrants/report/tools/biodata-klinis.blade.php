<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Biodata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
            background: #f5f6fa;
        }

        .section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #75badb;
            border-bottom: 3px solid #75badb;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            vertical-align: top;
            padding: 8px 12px;
            width: 50%;
        }

        .label {
            font-weight: bold;
            color: #555;
            font-size: 15px;
            margin-bottom: 3px;
        }

        .value {
            font-size: 15px;
            color: #222;
            padding-bottom: 8px;
        }

        .essay-item {
            margin-bottom: 25px;
        }

        .essay-question {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 6px;
        }

        .essay-answer {
            font-size: 16px;
            color: #000;
            font-weight: bold;
            white-space: pre-wrap;
            line-height: 1.6;
        }
    </style>
</head>
<body>

    {{-- ====================== DATA FORM ====================== --}}
    @foreach ($data->questions->where('type', 'form') as $section)
        <div class="section">
            <h2 class="section-title">Biodata Klinis: {{ $section->text }}</h2>

            <table class="info-table">
                @php $counter = 0; @endphp
                <tr>

                @foreach ($section['options'] as $option)
                    {{-- Jika REPEATABLE (repeat group data) --}}
                    @if ($option['repeatable'] && $data->responses->form->has($option['group']))

                        @foreach ($data->responses->form->get($option['group']) as $group)
                            @foreach ($option['inputs'] as $input)

                                @if ($counter % 2 == 0 && $counter != 0)
                                    </tr><tr>
                                @endif

                                <td>
                                    <p class="label">{{ $input['label'] }}</p>
                                    <p class="value">{{ $group[$input['name']] ?? '-' }}</p>
                                </td>

                                @php $counter++; @endphp
                            @endforeach
                        @endforeach

                    @else
                        {{-- Jika BUKAN repeatable --}}
                        @foreach ($option['inputs'] as $input)

                            @if ($counter % 2 == 0 && $counter != 0)
                                </tr><tr>
                            @endif

                            <td>
                                <p class="label">{{ $input['label'] }}</p>

                                {{-- Jika tipe SELECT --}}
                                @if ($input['type'] === 'select')
                                    @php
                                        $selectedValue = $data->responses->form->get($input['name']);
                                        $selectedText = collect($input['items'])->firstWhere('value', $selectedValue)['text'] ?? '-';
                                    @endphp
                                    <p class="value">{{ $selectedText }}</p>
                                @else
                                    <p class="value">{{ $data->responses->form->get($input['name']) ?? '-' }}</p>
                                @endif
                            </td>

                            @php $counter++; @endphp
                        @endforeach
                    @endif
                @endforeach

                </tr>
            </table>
        </div>
    @endforeach

    {{-- ====================== ESSAY SECTION ====================== --}}
    <div class="section">
        <h2 class="section-title">Biodata Klinis: Pertanyaan Essay</h2>

        @foreach ($data->questions->where('type', 'essay') as $index => $question)
            <div class="essay-item">
                <p class="essay-question">{{ $question->text }}</p>
                <p class="essay-answer">{!! $data->responses->essay[$index]['text'] ?? '-' !!}</p>
            </div>
        @endforeach
    </div>

</body>
</html>
