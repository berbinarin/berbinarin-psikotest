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
                <div class="py-4 md:pb-7 md:pt-12">
                    <div>
                        <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Daftar Section Alat Test {{ $tool->name }}</p>
                        <p class="text-disabled w-2/4">Menampilkan Semua Section Alat Test</p>
                    </div>
                </div>
                <div class="rounded-md bg-white px-4 py-4 md:px-8 md:py-7 xl:px-10">
                    <div class="mt-4 overflow-x-auto">
                        <table id="table" class="display w-full" style="overflow-x: scroll">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order</th>
                                    <th>Text</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($section->questions as $question)
                                    <tr class="data-consume">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $question->order }}</td>
                                        <td>{{ $question->text? $question->text : "Soal tidak memiliki text" }}</td>
                                        <td class="text-center">{{ $question->image_path ? "" : "Tidak ada Data gambar" }}</td>
                                        <td class="text-center">{{ $question->type }}</td>
                                        <td class="whitespace-no-wrap px-6 py-4 text-center">
                                            <a class="mt-4 inline-flex items-start justify-start rounded bg-blue-500 p-3 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0">
                                                <p class="font-medium leading-none text-white">Detail</p>
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
@endsection

@section("script")
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection
