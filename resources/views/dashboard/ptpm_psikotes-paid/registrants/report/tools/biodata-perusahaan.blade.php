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
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 8px 4px;
            vertical-align: top;
        }

        .info-table td:first-child {
            width: 35%;
            font-weight: bold;
            color: #555;
            font-size: 15px;
        }

        .info-table td:last-child {
            font-size: 15px;
            color: #222;
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
            <h2 class="section-title">Biodata Perusahaan: {{ $section->text }}</h2>

            <table class="info-table">
                @foreach ($section['options'] as $option)

                    {{-- Jika repeatable --}}
                    @if ($option['repeatable'] && $data->responses->form->has($option['group']))

                        @foreach ($data->responses->form->get($option['group']) as $group)
                            @foreach ($option['inputs'] as $input)
                                <tr>
                                    <td>{{ $input['label'] }}</td>
                                    <td>{{ $group[$input['name']] ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endforeach

                    @else

                        {{-- Non-repeat --}}
                        @foreach ($option['inputs'] as $input)
                            <tr>
                                <td>{{ $input['label'] }}</td>

                                <td>
                                    @if ($input['type'] === 'select')
                                        @php
                                            $selectedValue = $data->responses->form->get($input['name']);
                                            $selectedText = collect($input['items'])
                                                ->firstWhere('value', $selectedValue)['text'] ?? '-';
                                        @endphp
                                        {{ $selectedText }}
                                    @else
                                        {{ $data->responses->form->get($input['name']) ?? '-' }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    @endif

                @endforeach
            </table>
        </div>
    @endforeach

    {{-- ====================== ESSAY SECTION ====================== --}}
    <div class="section">
        <h2 class="section-title">Biodata Perusahaan: Pertanyaan Essay</h2>

        @foreach ($data->questions->where('type', 'essay') as $index => $question)
            <div class="essay-item">
                <p class="essay-question">{{ $question->text }}</p>
                <p class="essay-answer">{!! $data->responses->essay[$index]['text'] ?? '-' !!}</p>
            </div>
        @endforeach

    </div>

</body>
</html>
