@extends(
    "dashboard.layouts.psikotes-tool",
    [
        "title" => "Pengumpulan " . $tool->name,
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="w-full">
                <div class="py-4 md:pb-7 md:pt-12">
                    <div>
                        <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Data Jawaban Alat Test {{ $tool->name }}</p>
                        <p class="text-disabled w-2/4">Halaman dashboard ini menampilkan jawaban yang telah dikumpulkan dari pengguna.</p>
                    </div>
                </div>
                <div class="rounded-md bg-white px-4 py-4 md:px-8 md:py-7 xl:px-10">
                    <div class="mt-4 overflow-x-auto">
                        <table id="example" class="display w-full" style="overflow-x: scroll">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sessions as $session)
                                    <tr class="data-consume">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $session->user->name }}</td>
                                        <td class="text-center">{{ $session->user->email }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($session->created_at)->format("Y-m-d") }}</td>
                                        <td class="whitespace-no-wrap px-6 py-4 text-center">
                                            <a href="{{ route("dashboard.tools.data.data.detail", [$tool->id, $session->id]) }}" class="mt-4 inline-flex items-start justify-start rounded bg-blue-500 p-3 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0">
                                                <p class="font-medium leading-none text-white">Lihat Jawaban</p>
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
            $('#example').DataTable();
        });
    </script>
@endsection
