@extends(
    "landing.layouts.app",
    [
        "title" => "Soal RMIB",
        "active" => "one psikotest",
    ]
)

@section("content")
    <div class="h-11/12 relative flex flex-col items-center justify-center bg-gray-100 md:min-h-screen">
        <!-- Mulai form/div -->
        <form>
            @csrf

            <input type="hidden" name="timeout" id="timeout" value="false" />
            <input type="hidden" name="current_question_number" id="timeout" value="{{ session("current_question_number") }}" />

            <!-- Background Image -->
            <img src="{{ asset("assets/images/psikotes/paid/psikotest-soal-bg.png") }}" alt="Latar Belakang Berbinar" class="absolute inset-0 z-0 hidden object-cover md:block md:h-full md:w-full" />

            <!-- Container for Icons above Card -->
            <div class="absolute left-0 right-0 top-0 z-10 mt-8 flex items-center justify-center">
                <div class="flex h-[50px] items-center rounded-full bg-white px-4 py-2">
                    <img src="{{ asset("assets/images/psikotes/paid/logo-berbinar.png") }}" alt="Ikon" class="h-8 w-8 rounded-full" />
                    <img src="{{ asset("assets/images/psikotes/paid/logo-berbinar-psikotest.png") }}" alt="Ikon" class="ml-2 h-8 w-8 rounded-full" />
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="w-3xl relative z-10 mx-auto p-6" style="width: 1100px">
                <div class="rounded-lg bg-white bg-opacity-50 px-6 py-10 shadow-lg">
                    <h1 class="text-center text-lg font-bold text-red-500">INSTRUKSI</h1>
                    <p class="mt-5">
                        {{ $psikotesTool->sections[0]->questions[0]->text }}
                    </p>

                    <div class="mt-4 grid grid-cols-2 gap-2" style="max-height: 200px; overflow: auto; padding: 8px; grid-template-columns: 5% 90%">
                        <!-- Kolom kiri: Nomor statis -->
                        <div class="flex flex-col gap-3">
                            @foreach ($psikotesTool->sections[0]->questions[0]->["male"] as $item)
                                <div class="flex h-10 items-center justify-center rounded-md border bg-gray-200 text-blue-400">
                                    {{ $loop->iteration }}
                                </div>
                            @endforeach
                        </div>
                        <!-- Kolom kanan: Daftar tugas yang bisa di-drag -->
                        <div id="sortable-list" class="flex flex-col gap-3">
                            @foreach ($psikotesTool->sections[0]->questions[0]->["male"] as $key => $item)
                                <div class="drag-item flex h-10 cursor-move items-center rounded-md bg-white px-2" data-id="">
                                    {{ $item }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="ordered_statements" id="ordered_statements" />
                    <input type="hidden" name="question_rmib_id" value="" />

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const el = document.getElementById('sortable-list');
                            const orderedStatements = document.getElementById('ordered_statements');

                            const sortable = Sortable.create(el, {
                                animation: 150,
                                handle: '.drag-item',
                                dataIdAttr: 'data-id',
                                onEnd: function () {
                                    const order = sortable.toArray();
                                    orderedStatements.value = JSON.stringify(order);
                                },
                            });

                            const initialOrder = sortable.toArray();
                            orderedStatements.value = JSON.stringify(initialOrder);

                            const form = el.closest('form');
                            form.addEventListener('submit', function () {
                                if (!orderedStatements.value || orderedStatements.value === '[]') {
                                    const currentOrder = sortable.toArray();
                                    orderedStatements.value = JSON.stringify(currentOrder);
                                }
                            });
                        });
                    </script>
                </div>
                <div class="mt-10 flex items-center justify-between rounded-md bg-white" style="height: 40px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)">
                    <div class="ml-6 flex items-center" style="height: 3px; width: 860px; position: relative">
                        <!-- Black background line -->
                        <div class="rounded-full bg-black" style="height: 3px; width: 100%"></div>
                        <!-- Blue percentage line -->
                        <div class="rounded-full bg-blue-500" style="height: 3px; position: absolute; top: 0; left: 0"></div>
                        <!-- Small circle at the end of the blue line -->
                        <div class="rounded-full bg-blue-500" style="height: 10px; width: 10px; position: absolute; top: -4px; transform: translateX(-50%)"></div>
                        <!-- Percentage text -->
                        <span class="text-sm text-black" style="position: absolute; top: 1px; transform: translateX(-50%); font-size: 8px">1%</span>
                    </div>
                    <button type="submit" type="button" class="mr-2 rounded-lg bg-blue-500 px-4 py-1 text-sm text-white hover:bg-blue-600">
                        {{ session("current_question_number") >= 8 ? "Selesai" : "Soal Berikutnya" }}
                    </button>
                </div>

                <!-- Konten utama di sini -->
            </div>
            <!-- Percentage Line and Next Button -->
        </form>
    </div>
@endsection
