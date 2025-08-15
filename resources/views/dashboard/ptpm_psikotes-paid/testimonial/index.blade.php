@extends(
    "dashboard.layouts.app",
    [
        "title" => "Testimoni",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-5">
                <div>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Data Testimoni</p>
                    <p class="text-disabled py-2 text-gray-500">Fitur ini menampilkan data testimoni <span class="italic">user&nbsp;</span> yang telah melakukan Psikotes.</p>
                </div>
            </div>
            <div class="rounded-[24px] bg-white shadow px-10 py-7 mb-7">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center"><span class="italic">Username</span></th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center"><span class="italic">Action</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonial as $testimoni)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $testimoni->userPsikotesPaid ? $testimoni->userPsikotesPaid->name : 'User tidak ditemukan' }}</td>
                                    <td class="text-center">{{ $testimoni->userPsikotesPaid ? $testimoni->userPsikotesPaid->username : 'User tidak ditemukan' }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($testimoni->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{ route('dashboard.testimonial.show', $testimoni->id) }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                            <i class="bx bx-show text-white"></i>
                                        </a>
                                        <form id="deleteForm-{{ $testimoni->id }}" action="{{ route('dashboard.testimonial.destroy', [$testimoni->id]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" data-id="{{ $testimoni->id }}" class="delete-button inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444">
                                                <i class="bx bx-trash-alt text-white"></i>
                                            </button>
                                        </form>
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
