@extends(
    "dashboard.layouts.app",
    [
        "title" => "Jenis Test",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-12">
                <div>
                    <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">
                        {{ $category->name }}
                    </p>
                    <p class="text-disabled py-2">
                        Di halaman dashboard ini, anda dapat melihat berbagai layanan alat tes dan harga yang termasuk dalam kategori <b>{{ $category->name }}</b>.
                    </p>
                    <a href="{{ route('dashboard.test-types.create', $category->id) }}" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                        <span class="leading-none">Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="rounded-[24px] bg-white px-10 py-7">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Jenis Test</th>
                                <th style="text-align: center">Harga</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testTypes as $type)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $type->name }}</td>
                                    <td class="text-center">Rp {{ number_format($type->price, 0, ',', '.') }}</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{ route('dashboard.test-types.edit', [$category->id, $type->id]) }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #e9b306">
                                            <i class="bx bx-edit-alt text-black"></i>
                                        </a>
                                        <form action="{{ route('dashboard.test-types.destroy', [$category->id, $type->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444">
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