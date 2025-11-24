@extends('dashboard.layouts.psikotes-tool', [
    'title' => 'Pertanyaan ' . $tool->name,
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="w-full">
                <div class="py-4 md:pb-7 md:pt-5">
                    <div>
                        <div class="mb-2 flex items-center gap-2">
                            <a href="{{ url()->previous() }}">
                                <img src="{{ asset('assets/dashboard/images/back-btn.webp') }}" alt="Back Button" />
                            </a>
                            <p tabindex="0"
                                class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">
                                Detail Soal untuk {{ $tool->name }}</p>
                        </div>
                        <p class="text-gray-500 pb-2">Dashboard ini menampilkan daftar pertanyaan untuk alat tes
                            {{ $tool->name }}.</p>
                    </div>
                </div>
                <div class="rounded-md bg-white shadow mb-7 px-4 py-4 md:px-8 md:py-7 xl:px-10">

                    <style>
                        table.dataTable th,
                        table.dataTable td {
                            vertical-align: top;
                            white-space: normal !important;
                            word-break: break-word;
                        }
                    </style>

                    <div class="mt-4 overflow-x-auto">
                        <table id="table" class="display w-full whitespace-normal" style="overflow-x: scroll">
                            {{-- Header tabel yang bersih dan informatif --}}
                            <thead>
                                <tr>
                                    <th class="w-16">No</th>
                                    <th>Pertanyaan / Pernyataan</th>
                                    <th class="w-48">Tipe Soal</th>
                                    <th class="w-56">Format Jawaban</th>
                                    <th class="w-32">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($section->questions as $question)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>

                                        {{-- Kolom Pertanyaan Utama --}}
                                        <td>
                                            @if ($question->type === 'multiple_choice' && empty($question->text))
                                                {{-- Render semua opsi --}}
                                                @foreach ($question->options as $opt)
                                                    <span class="font-semibold">{{ $opt['key'] }}:</span>
                                                    {{ $opt['text'] ?? 'N/A' }} <br>
                                                @endforeach
                                            @else
                                                {!! $question->text ?? '<span class="text-red-500">Teks pertanyaan tidak ada.</span>' !!}
                                            @endif
                                        </td>

                                        {{-- Kolom Tipe Soal --}}
                                        <td class="text-center">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">
                                                {{ Str::title(str_replace('_', ' ', $question->type)) }}
                                            </span>
                                        </td>

                                        {{-- Kolom Format Jawaban (LOGIKA UTAMA YANG DIPERBARUI) --}}
                                        <td class="text-center">
                                            @php
                                                $formatJawaban = '';
                                                switch ($question->type) {
                                                    case 'likert':
                                                        $count = count($question->options);
                                                        $formatJawaban = "Skala Likert (1-{$count})";
                                                        break;
                                                    case 'binary_choice':
                                                        $formatJawaban = 'Pilihan Ya / Tidak';
                                                        break;
                                                    case 'multiple_choice':
                                                        $count = count($question->options ?? []);
                                                        $formatJawaban = "Pilihan Ganda ({$count} Opsi)";
                                                        break;
                                                    case 'ordering':
                                                        $count = count($question->options['variants']['male'] ?? []);
                                                        $formatJawaban = "Mengurutkan {$count} Pilihan";
                                                        break;
                                                    default:
                                                        $formatJawaban = 'Jawaban Teks';
                                                        break;
                                                }
                                            @endphp
                                            <span class="text-gray-600">{{ $formatJawaban }}</span>
                                        </td>

                                        {{-- Kolom Aksi --}}
                                        <td class="whitespace-no-wrap px-6 py-4 text-center">
                                            <a href="javascript:void(0)"
                                                class="btnViewDetail inline-flex items-center justify-center rounded p-2 text-white bg-blue-500 hover:bg-blue-700"
                                                data-question="{{ json_encode($question) }}">
                                                <i class="bx bx-show"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-10">
                                            <p class="text-lg font-semibold text-gray-500">Belum ada soal untuk bagian ini.
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal untuk menampilkan detail --}}
    <div id="modalDetail" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-lg w-1/2 max-w-2xl p-8 relative max-h-[90vh] overflow-y-auto">
            <button id="btnCloseModal"
                class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>
            <h2 class="text-2xl font-bold mb-4">Detail Soal</h2>
            <div id="modalContent" class="prose max-w-none">
                {{-- Konten akan diisi oleh JavaScript --}}
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                scrollX: true,
                autoWidth: false,
                deferRender: true,
                columns: [
                    { width: '60px' },
                    null,
                    { width: '150px' },
                    { width: '200px' },
                    { width: '80px' }
                ],
                columnDefs: [
                    { targets: [0,2,3,4], className: 'dt-center' }
                ],
            });

            $('#table').on('click', '.btnViewDetail', function() {
                const question = $(this).data('question');
                let modalHtml = '';

                if (question.type === 'multiple_choice' && !question.text) {
                    modalHtml += `<h4 class="font-bold">Pernyataan:</h4>`;
                    modalHtml += `<ul class="list-disc pl-5">`;
                    question.options.forEach(opt => {
                        modalHtml += `<li><strong>${opt.key}:</strong> ${opt.text}</li>`;
                    });
                    modalHtml += `</ul><hr class="my-4">`;
                }

                if (question.options) {
                    modalHtml += `<h4 class="font-bold">Pilihan Jawaban:</h4>`;
                    switch (question.type) {
                        case 'likert':
                        case 'binary_choice':
                        case 'multiple_choice':
                            if (question.text) {
                                modalHtml += '<ul class="list-disc pl-5">';
                                question.options.forEach(opt => {
                                    modalHtml +=
                                        `<li><strong>${opt.value ?? opt.key}:</strong> ${opt.text}</li>`;
                                });
                                modalHtml += '</ul>';
                            }
                            break;

                        case 'ordering':
                            if (question.options.variants) {
                                modalHtml += '<div class="font-semibold mt-2">Pilihan Pria:</div>';
                                modalHtml += '<ul class="list-decimal pl-5">';
                                question.options.variants.male.forEach(opt => {
                                    modalHtml += `<li>${opt.text}</li>`;
                                });
                                modalHtml += '</ul>';

                                modalHtml += '<div class="font-semibold mt-4">Pilihan Wanita:</div>';
                                modalHtml += '<ul class="list-decimal pl-5">';
                                question.options.variants.female.forEach(opt => {
                                    modalHtml += `<li>${opt.text}</li>`;
                                });
                                modalHtml += '</ul>';
                            }
                            break;
                    }
                } else {
                    modalHtml +=
                        '<p class="text-gray-500 italic">Tidak ada pilihan jawaban untuk tipe soal ini.</p>';
                }

                $('#modalContent').html(modalHtml);
                $('#modalDetail').removeClass('hidden');
            });

            $('#btnCloseModal, #modalDetail').on('click', function(e) {
                if (e.target === this || $(e.target).closest('#btnCloseModal').length) {
                    $('#modalDetail').addClass('hidden');
                }
            });
        });
    </script>
@endpush
