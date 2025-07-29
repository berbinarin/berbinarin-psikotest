<div class="container-fluid w-full">
    <div class="card">
        <div class="card-body p-6">

            @if(empty($data) || $data->isEmpty())
                <div class="text-center py-8 text-gray-400">
                    <i class="fas fa-info-circle text-2xl mb-2"></i>
                    <p>Jawaban Subtes SSCT  Tidak Ada</p>
                </div>
            @else
                <div class="table-responsive rounded-lg shadow-md overflow-hidden">
                    <table class="table table-bordered table-hover mb-0 w-full">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center py-3 px-4 font-bold border-b text-gray-500">No</th>
                                <th width="50%" class="py-3 px-4 font-bold border-b text-start text-gray-500">Kalimat Pertanyaan</th>
                                <th width="45%" class="text-center py-3 px-4 text-start font-bold border-b text-gray-500">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $item)
                                <tr class="hover:bg-blue-50 transition-all duration-200 hover:shadow-sm border-b">
                                    <td class="text-center font-bold bg-gray-50 py-3 px-4">{{ $item['order'] }}</td>
                                    <td class="py-3 px-4">{{ $item['question'] }}</td>
                                    <td class="text-left py-3 px-4 bg-gray-50">
                                        @if(empty($item['answer']))
                                            <div class="text-center py-8 text-gray-400">
                                                <i class="fas fa-info-circle text-2xl mb-2"></i>
                                                <p>Jawaban Subtes SSCT  Tidak Ada</p>
                                            </div>                                        
                                            @else
                                            <span class="text-gray-800">{{ $item['answer'] }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</div>
