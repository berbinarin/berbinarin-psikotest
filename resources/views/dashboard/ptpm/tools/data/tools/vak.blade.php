<div class="flex gap-6 w-full">
    <!-- Left Side - Visual Chart -->
    <div class="relative bg-white shadow-lg p-8 rounded-lg w-1/2">
        <div class="mb-6">
            <h2 class="font-semibold text-2xl mb-5">
                {{ $session->user->name ?? 'User Tidak Diketahui' }}
            </h2>
            <p class="text-base text-gray-500">Visual: {{ $data['scores']['visual'] ?? '-' }}</p>
            <p class="text-base text-gray-500">Auditori: {{ $data['scores']['auditori'] ?? '-' }}</p>
            <p class="text-base text-gray-500">Kinestetik: {{ $data['scores']['kinestetik'] ?? '-' }}</p>
        </div>

        @if(
            empty($data['scores']['visual']) &&
            empty($data['scores']['auditori']) &&
            empty($data['scores']['kinestetik'])
        )
            <div class="text-center py-12 text-gray-400">
                <i class="fas fa-info-circle text-3xl mb-3"></i>
                <p>Data skor VAK tidak tersedia.</p>
            </div>
        @else
            <div class="space-y-4 mb-6 relative" style="padding-left: 0;">
                <div class="bg-blue-400 h-10 rounded-r-md ml-1" style="width: {{ ($data['scores']['visual'] ?? 0) * 10 }}px;"></div>
                <div class="bg-purple-500 h-10 rounded-r-md ml-1" style="width: {{ ($data['scores']['auditori'] ?? 0) * 10 }}px;"></div>
                <div class="bg-pink-300 h-10 rounded-r-md ml-1" style="width: {{ ($data['scores']['kinestetik'] ?? 0) * 10 }}px;"></div>
                <div class="absolute left-0 bottom-0 h-40 w-1 bg-gray-300"></div>
                <div class="absolute left-0 bottom-0 w-full h-1 bg-gray-300"></div>
            </div>
            <div class="flex">
                <div class="w-1/3">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-4 h-4 rounded-full bg-blue-400"></div>
                        <p class="text-base text-gray-700">Subtes 1</p>
                    </div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-4 h-4 rounded-full bg-purple-500"></div>
                        <p class="text-base text-gray-700">Subtes 2</p>
                    </div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-4 h-4 rounded-full bg-pink-300"></div>
                        <p class="text-base text-gray-700">Subtes 3</p>
                    </div>
                </div>
    
                <div class="w-2/3">
                    <p class="text-base text-gray-700 mb-4">
                        {{ $data['description'] ?? 'Deskripsi tidak tersedia.' }}
                    </p>
                </div>
            </div>
        @endif

    </div>
    
    <!-- Right Side - Detail Jawaban -->
    <div class="bg-white rounded-lg shadow-md p-10 w-1/2">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Detail Jawaban</h2>
        
        <!-- Filter Tabs -->
        <div class="flex justify-evenly items-center gap-2 mb-6 w-full">
            <button onclick="showCategory('visual')" id="tab-visual" class="px-4 py-2 bg-[#75BADB] text-white rounded-full text-sm tab-button">Subtes 1</button>
            <button onclick="showCategory('auditori')" id="tab-auditori" class="px-4 py-2  text-[#75BADB] rounded-full border-2 border-[#75BADB] text-sm tab-button">Subtes 2</button>
            <button onclick="showCategory('kinestetik')" id="tab-kinestetik" class="px-4 py-2  text-[#75BADB] rounded-full border-2 border-[#75BADB] text-sm tab-button">Subtes 3</button>
        </div>
        
        <!-- Content for each category -->
        <div id="content-visual" class="category-content">
            @if(empty($data['responses_by_category']['visual']))
                <div class="text-center py-8 text-gray-400">
                    <i class="fas fa-info-circle text-2xl mb-2"></i>
                    <p>Jawaban Subtes 1 tidak tersedia.</p>
                </div>
            @else
                <div class="table-responsive overflow-hidden">
                    <table class="table table-bordered table-hover mb-0 w-full">
                        <thead>
                            <tr>
                                <th width="20%" class="text-center py-3 px-4 font-bold border-b text-gray-500">No</th>
                                <th width="80%" class="text-start py-3 px-4 font-bold border-b text-gray-500">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $questionNumber = 1; @endphp
                            @foreach($data['responses_by_category']['visual'] as $response)
                                <tr class="hover:bg-blue-50 transition-all duration-200 hover:shadow-sm border-b">
                                    <td class="text-center font-medium py-3 px-4">{{ $questionNumber }}</td>
                                    <td class="text-left py-3 px-4">
                                        @php
                                            $answerValue = $response->answer['value'];
                                            $optionLabel = collect($response->question->options ?? [])->firstWhere('value', (string)$answerValue)['text'] ?? $answerValue;
                                        @endphp
                                        <span class="text-gray-800">{{ $optionLabel }}</span>
                                    </td>
                                </tr>
                                @php $questionNumber++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <div id="content-auditori" class="category-content hidden">
            @if(empty($data['responses_by_category']['auditori']))
                <div class="text-center py-8 text-gray-400">
                    <i class="fas fa-info-circle text-2xl mb-2"></i>
                    <p>Jawaban Subtes 2 tidak tersedia.</p>
                </div>
            @else
                <div class="table-responsive overflow-hidden">
                    <table class="table table-bordered table-hover mb-0 w-full">
                        <thead>
                            <tr>
                                <th width="20%" class="text-center py-3 px-4 font-bold border-b text-gray-500">No</th>
                                <th width="80%" class="text-start py-3 px-4 font-bold border-b text-gray-500">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $questionNumber = 1; @endphp
                            @foreach($data['responses_by_category']['auditori'] as $response)
                                <tr class="hover:bg-blue-50 transition-all duration-200 hover:shadow-sm border-b">
                                    <td class="text-center font-medium py-3 px-4">{{ $questionNumber }}</td>
                                    <td class="text-left py-3 px-4">
                                        @php
                                            $answerValue = $response->answer['value'];
                                            $optionLabel = collect($response->question->options ?? [])->firstWhere('value', (string)$answerValue)['text'] ?? $answerValue;
                                        @endphp
                                        <span class="text-gray-800">{{ $optionLabel }}</span>
                                    </td>
                                </tr>
                                @php $questionNumber++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <div id="content-kinestetik" class="category-content hidden">
            @if(empty($data['responses_by_category']['kinestetik']))
                <div class="text-center py-8 text-gray-400">
                    <i class="fas fa-info-circle text-2xl mb-2"></i>
                    <p>Jawaban Subtes 3 tidak tersedia.</p>
                </div>
            @else
                <div class="table-responsive overflow-hidden">
                    <table class="table table-bordered table-hover mb-0 w-full">
                        <thead>
                            <tr>
                                <th width="20%" class="text-center py-3 px-4 font-bold border-b text-gray-500">No</th>
                                <th width="80%" class="text-start py-3 px-4 font-bold border-b text-gray-500">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $questionNumber = 1; @endphp
                            @foreach($data['responses_by_category']['kinestetik'] as $response)
                                <tr class="hover:bg-blue-50 transition-all duration-200 hover:shadow-sm border-b">
                                    <td class="text-center font-medium py-3 px-4">{{ $questionNumber }}</td>
                                    <td class="text-left py-3 px-4">
                                        @php
                                            $answerValue = $response->answer['value'];
                                            $optionLabel = collect($response->question->options ?? [])->firstWhere('value', (string)$answerValue)['text'] ?? $answerValue;
                                        @endphp
                                        <span class="text-gray-800">{{ $optionLabel }}</span>
                                    </td>
                                </tr>
                                @php $questionNumber++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
function showCategory(category) {
    // Hide all content
    document.querySelectorAll('.category-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Remove active class from all tabs
    document.querySelectorAll('.tab-button').forEach(tab => {
        tab.classList.remove('bg-[#75BADB]', 'text-white');
        tab.classList.add('bg-white', 'text-[#75BADB]', 'border-2','border-[#75BADB]');
    });
    
    // Show selected content
    document.getElementById('content-' + category).classList.remove('hidden');
    
    // Add active class to selected tab
    const activeTab = document.getElementById('tab-' + category);
    activeTab.classList.remove('bg-white', 'text-gray-700', 'border-2', 'border-[#75BADB]');
    activeTab.classList.add('bg-[#75BADB]', 'text-white',  'border-2', 'border-[#75BADB]');
}
</script>