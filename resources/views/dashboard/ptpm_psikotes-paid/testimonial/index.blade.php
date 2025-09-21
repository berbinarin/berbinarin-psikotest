@extends(
    "dashboard.layouts.app",
    [
        "title" => "Testimoni",
    ]
)

@section("content")
@include('components.confirm', ['type' => 'delete'])
    <section class="flex w-full">
        <div class="w-full">
            <div class="py-4 md:pb-7 md:pt-5">
                <div>
                    <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-3xl">Data Testimoni</p>
                    <p class="text-disabled py-2 text-gray-500">Fitur ini menampilkan data testimoni pengguna yang telah melakukan Psikotes.</p>
                </div>
            </div>
            <div class="mb-7 rounded-[24px] bg-white px-10 py-7 shadow">
                <div class="mt-4 overflow-x-auto">
                    <table id="table" class="display gap-3" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Nama Pengguna</th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->username }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($user->testimonials[0]->created_at)->format("d-m-Y H:i:s") }}</td>
                                    <td class="flex items-center justify-center gap-2">
                                        <a href="{{ route("dashboard.testimonial.show", $user->id) }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                            <i class="bx bx-show text-white"></i>
                                        </a>
                                        <form id="deleteForm-{{ $user->id }}" action="{{ route("dashboard.testimonial.destroy", [$user->id]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" data-id="{{ $user->id }}" class="delete-alert inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444">
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

@push("script")
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>

    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
            document.getElementById(modalID + '-backdrop').classList.toggle('hidden');
            document.getElementById(modalID).classList.toggle('flex');
            document.getElementById(modalID + '-backdrop').classList.toggle('flex');
        }
    </script>

    <script>
        let deleteFormId = null;

        document.querySelectorAll('.delete-alert').forEach((btn) => {
            btn.addEventListener('click', function () {
                deleteFormId = this.dataset.id;
                document.getElementById('deleteModal').classList.remove('hidden');
            });
        });

        document.getElementById('cancelDelete').addEventListener('click', function () {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteFormId = null;
        });

        document.getElementById('confirmDelete').addEventListener('click', function () {
            if (deleteFormId) {
                document.getElementById('deleteForm-' + deleteFormId).submit();
            }
        });
    </script>
@endpush
