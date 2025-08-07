@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@section("content")
    <section class="flex w-full">
        <div class="w-full">
            <div class="pb-5 pt-2">
                <div class="flex flex-row">
                    <div class="">
                        <a href="{{ route("dashboard.registrants.index") }}">
                            <i class="bx bx-arrow-back mr-6 mt-3 text-left text-[35px] text-primary"></i>
                        </a>
                    </div>
                    <div class="">
                        <p tabindex="0" class="mb-2 text-4xl font-bold leading-normal text-gray-800 focus:outline-none">Detail Pendaftar Psikotes</p>
                        <p class="text-disabled">Fitur ini menampilkan data responden yang telah mendaftar Psikotes Berbinar.</p>

                        <a href="{{ route("dashboard.registrants.edit", $registrant->id) }}" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                            <p class="text-dark font-medium leading-none">Edit Data</p>
                        </a>
                        <button onclick="toggleDeleteModal({{ $registrant->id }})" type="button" class="mt-8 inline-flex items-start justify-start rounded bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                            <p class="text-dark font-medium leading-none">Delete Data</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="ml-14 w-[1000px] rounded-md bg-white px-5 py-4">
                <div class="flex w-full flex-row gap-5">
                    <div class="flex w-full flex-col">
                        <dl class="flex grow flex-col text-black">
                            <dt class="self-start font-bold">Username</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->user->username }}
                            </dd>
                        </dl>
                    </div>
                    <div class="ml-5 flex w-full flex-col">
                        <dl class="flex grow flex-col text-black">
                            <dt class="self-start font-bold">Password</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ \Illuminate\Support\Str::before($registrant->user->email, '@') }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="ml-14 w-[1000px] rounded-md bg-white px-5 py-4">
                <div class="flex w-full flex-row gap-5">
                    <div class="flex w-full flex-col">
                        <dl class="flex grow flex-col text-black">
                            <dt class="self-start font-bold">Nama</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->user->name }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Usia</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->age }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Email</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->user->email }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Layanan Psikotes</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->psikotes_service }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Harga</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ "Rp" . number_format($registrant->testType->price, 0, ",", ".") }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Tanggal Psikotes</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ \Carbon\Carbon::parse($registrant->schedule)->format("d-m-Y") }}
                            </dd>
                        </dl>
                    </div>
                    <div class="ml-5 flex w-full flex-col">
                        <dl class="flex grow flex-col text-black">
                            <dt class="self-start font-bold">Jenis Kelamin</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->gender }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Nomor Telepon</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->phone_number }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Domisili</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->domicile }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Kategori Psikotes</dt>
                            <dd class="mt-2.5 whitespace-nowrap rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->testType->testCategory->name }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Jenis Psikotes</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ $registrant->testType->name }}
                            </dd>
                            <dt class="mt-3.5 self-start font-bold">Waktu Psikotes</dt>
                            <dd class="mt-2.5 rounded-md bg-white px-2.5 py-2 text-black shadow-md max-md:pr-5">
                                {{ \Carbon\Carbon::parse($registrant->schedule)->format("H:i:s") }}
                            </dd>
                        </dl>
                    </div>
                </div>
                <h3 class="mt-3.5 self-center font-bold text-black">Alasan</h3>
                <p class="mr-28 mt-2.5 w-full max-w-full self-end rounded-md bg-white px-3 pb-14 pt-3 text-black shadow-md max-md:mr-2.5">
                    {{ $registrant->reason }}
                </p>
            </div>
        </div>
    </section>
@endsection

@section("script")
    <script>
        function toggleModal(modalId) {
            var modal = document.getElementById(modalId);
            if (modal.style.display === 'none' || modal.style.display === '') {
                modal.style.display = 'block';
            } else {
                modal.style.display = 'none';
            }
        }
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
        document.querySelectorAll('.delete-button').forEach((button) => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const formId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Hapus Pendaftar',
                    text: 'Apakah anda yakin menghapusnya?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm-' + formId).submit();
                    }
                });
            });
        });
    </script>
    <script>
        function toggleDeleteModal(id) {
            document.getElementById('delete-user-id').value = id;
            toggleModal('modal-delete');
        }
    </script>

    {{--
        <script>
        document.addEventListener("DOMContentLoaded", function() {
        const psikotestTypeSelect = document.getElementById("psikotest_type_id");
        const priceInput = document.getElementById("price");
        
        // Harga untuk masing-masing jenis psikotest
        const psikotestPrices = {
        @foreach ($psikotestTypes as $type)
        "{{ $type->id }}": "{{ $type->price }}",
        @endforeach
        };
        
        // Event listener untuk perubahan pada psikotest type
        psikotestTypeSelect.addEventListener("change", function() {
        const selectedType = psikotestTypeSelect.value;
        const price = psikotestPrices[selectedType] || "";
        priceInput.value = price;
        });
        
        // Set harga awal jika sudah ada pilihan sebelumnya
        const initialType = psikotestTypeSelect.value;
        if (initialType) {
        priceInput.value = psikotestPrices[initialType];
        }
        });
        </script>
    --}}
@endsection
