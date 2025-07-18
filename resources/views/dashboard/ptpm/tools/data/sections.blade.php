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
                                    <th>Title</th>
                                    <th>Order</th>
                                    <th>Duration</th>
                                    <th>Total Question</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tool->sections as $section)
                                    <tr class="data-consume">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $section->title }}</td>
                                        <td class="text-center">{{ $section->order }}</td>
                                        <td class="text-center">{{ $section->duration }}</td>
                                        <td class="text-center">{{ $section->questions->count() }}</td>
                                        <td class="whitespace-no-wrap px-6 py-4 text-center">
                                            <a href="{{ route("dashboard.tools.data.sections.questions", [$tool->id, $section->id]) }}" class="mt-4 inline-flex items-start justify-start rounded bg-blue-500 p-3 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0">
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

@section('script')
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection
