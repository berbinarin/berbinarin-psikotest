@extends(
    "dashboard.layouts.app",
    [
        "title" => "Testimoni",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-12">
                <div>
                    <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Data Testimoni</p>
                    <p class="text-disabled py-2">Fitur ini menampilkan informasi testimoni dari pengguna Psikotes Berbinar</p>
                </div>
            </div>
            <div class="rounded-[24px] bg-white px-10 py-7">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">User</th>
                                <th style="text-align: center">Date</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonies as $testimony)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $testimony->user->name }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($testimony->date)->format("d-m-Y H:i:s") }}</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{ route('dashboard.testimoni.show', $testimony->id) }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
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
    </section>
@endsection

@section("script")
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection