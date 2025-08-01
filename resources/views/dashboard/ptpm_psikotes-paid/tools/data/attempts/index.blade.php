@extends(
    "dashboard.layouts.psikotes-tool",
    [
        "title" => "Pengumpulan " . $tool->name,
    ]
)

@section("content")
    @php
        // Determine the title based on tool name
        $title = "Data User"; // Default title
        if (in_array($tool->name, ['BAUM', 'DAP', 'HTP'])) {
            $title = "Database Jawaban Alat Tes " . $tool->name;
        } elseif (in_array($tool->name, ['VAK', 'SSCT'])) {
            $title = "Data Jawaban Alat Test " . $tool->name;
        }
    @endphp

    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="w-full">
                <div class="py-4 md:pb-7 md:pt-12">
                    <div>
                        <div class="mb-2 flex items-center gap-2">
                            <p tabindex="0" class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">{{ $title }}</p>
                        </div>
                        <p class="text-disabled py-2">Fitur ini menampilkan data responden seperti nama, status, tanggal, dan email yang telah mengisi Tes {{ $tool->name }} Berbinar.</p>
                    </div>
                </div>
                <div class="rounded-md bg-white px-4 py-4 md:px-8 md:py-7 xl:px-10">
                    <div class="mt-4 overflow-x-auto">
                        <table id="table" class="display w-full" style="overflow-x: scroll">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    @if($tool->name === 'Papi Kostick')
                                        <th>Time Start</th>
                                        <th>Time End</th>
                                        <th>Status</th>
                                    @endif
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attempts as $attempt)
                                    <tr class="data-consume">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $attempt->user->name }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($attempt->created_at)->format("Y-m-d") }}</td>
                                        @if($tool->name === 'Papi Kostick')
                                            <td class="text-center">10:00 AM</td>
                                            <td class="text-center">10:30 AM</td> 
                                            <td class="text-center">
                                                <div class="inline-flex items-center justify-center">
                                                    @if ($attempt->is_completed)
                                                        <span class="inline-flex items-center rounded-[5px] bg-[#04CA00] px-2.5 py-0.5 text-[15px] font-medium text-white">Finished</span>
                                                    @else
                                                        <span class="inline-flex items-center rounded-[5px] bg-[#75BADB] px-2.5 py-0.5 text-[15px] font-medium text-white">Progress</span>
                                                    @endif
                                                </div>
                                            </td>
                                        @endif
                                        <td class="whitespace-no-wrap px-6 py-4 text-center">
                                            <a href="{{ route("dashboard.tools.data.attempts.show", [$tool->id, $attempt->id]) }}" class="inline-flex items-center justify-center rounded bg-blue-500 p-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
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
