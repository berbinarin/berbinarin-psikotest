@extends(
    "dashboard.layouts.psikotes-tool",
    [
        "title" => "Jawaban" . $tool->name,
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="w-full">
                <div class="py-4 md:pb-7 md:pt-5">
                    <div>
                        <div class="mb-2 flex items-center gap-2">
                            <a href="{{ url()->previous() }}">
                                <img src="{{ asset("assets/dashboard/images/back-btn.png") }}" alt="Back Button" />
                            </a>
                            <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Detail Soal</p>
                        </div>
                        <p class="text-gray-500 pb-2">Dashboard ini menampilkan informasi terkait soal tes pilihan ganda dan tanggal tes papi kostick.</p>
                    </div>
                </div>
                <div class="rounded-md bg-white shadow mb-7 px-4 py-4 md:px-8 md:py-7 xl:px-10">
                    <div class="mt-4 overflow-x-auto">
                        <table id="table" class="display w-full" style="overflow-x: scroll">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pilihan 1</th>
                                    <th>Pilihan 2</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($section->questions as $question)
                                    @php
                                        $options = $question->options ?? collect([]);

                                        $getOptionText = function ($option) {
                                            if (is_array($option)) {
                                                return $option["text"] ?? "Tidak ada teks";
                                            } elseif (is_object($option)) {
                                                return $option->text ?? "Tidak ada teks";
                                            }
                                            return $option;
                                        };

                                        $option1 = $getOptionText(is_array($options) ? $options[0] ?? null : $options->get(0) ?? null);
                                        $option2 = $getOptionText(is_array($options) ? $options[1] ?? null : $options->get(1) ?? null);
                                    @endphp

                                    <tr class="data-consume">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $option1 }}</td>
                                        <td>{{ $option2 }}</td>
                                        <td class="text-center">{{ $question->created_at->format("d-m-Y") }}</td>
                                        <td class="whitespace-no-wrap px-6 py-4 text-center">
                                            <a href="javascript:void(0)"
                                               class="btnEdit inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                               style="background-color: #3B82F6"
                                               data-id="{{ $question->id }}"
                                               data-option1="{{ $option1 }}"
                                               data-option2="{{ $option2 }}">
                                                <i class="bx bx-show text-white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="modalTambahData" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div
            class="bg-white rounded-lg shadow-lg w-[50%] p-8 relative flex flex-col justify-center"
        >
            <button id="btnCloseModal" class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>
            <div class="flex items-center justify-start mb-8">
                <div id="stepNumber" class="w-8 h-8 rounded-full bg-[#75BADB] flex items-center justify-center text-white font-bold text-lg">
                    {{ $section->questions->count() + 1 }}
                </div>
                <input type="hidden" id="questionId">
                <p class="ml-2">Detail Soal</p>
            </div>
            <form id="questionForm">
                <div class="mt-2">
                    <label class="block font-semibold mb-2">A</label>
                    <input type="text" id="option1Input" class="w-full rounded border border-gray-300 px-4 py-2 mb-4" placeholder="Ketik Disini..." />
                </div>
                <div>
                    <label class="block font-semibold mb-2">B</label>
                    <input type="text" id="option2Input" class="w-full rounded border border-gray-300 px-4 py-2 mb-8" placeholder="Ketik Disini..." />
                </div>
            </form>
        </div>
    </div>
@endsection

@push("script")
    <script>
        $(document).ready(function () {
            $('#table').DataTable();

            // Modal
            $('#btnTambahData').on('click', function() {
                $('#questionForm')[0].reset();
                $('#questionId').val('');
                $('#stepNumber').text({{ $section->questions->count() + 1 }});
                $('#modalTambahData').removeClass('hidden');
            });

            $('#table').on('click', '.btnEdit', function() {
                const id = $(this).data('id');
                const option1 = $(this).data('option1');
                const option2 = $(this).data('option2');
                const rowIndex = $(this).closest('tr').find('td:first').text();

                $('#questionId').val(id);
                $('#option1Input').val(option1);
                $('#option2Input').val(option2);
                $('#stepNumber').text(rowIndex);

                $('#modalTambahData').removeClass('hidden');
            });

            $('#btnCloseModal').on('click', function() {
                $('#modalTambahData').addClass('hidden');
            });

            $('#modalTambahData').on('click', function(e) {
                if (e.target === this) {
                    $(this).addClass('hidden');
                }
            });
        });
    </script>
@endpush
