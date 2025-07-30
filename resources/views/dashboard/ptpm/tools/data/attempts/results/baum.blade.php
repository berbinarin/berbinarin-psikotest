<div class="w-full p-6 bg-gray-50">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-[#75BADB] mb-2">Name: {{ $attempt->user->name }}</h1>
        <h2 class="text-xl font-semibold text-gray-700 mb-1">Desc: {{ $attempt->user->description }}</h2>
        <p class="text-gray-600">Berikut adalah rincian jawaban dan kepribadian berdasarkan tes {{ $tool->name }}.</p>
        <div class="w-20 h-1 bg-blue-500 mt-2"></div>
    </div>

    <!-- Results Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <div class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">
            <div class="p-4">
                @php
                    $imagePath = $data->answer["file_path"] ?? null;
                @endphp

                <div class="relative mb-4">
                    @if($imagePath)
                        <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden relative group/image">
                            <img 
                                src="{{ asset('storage/' . $imagePath) }}" 
                                alt="Baum Drawing by {{ $attempt->user->name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover/image:scale-110"
                                loading="lazy"
                            >
                        </div>
                    @else
                        <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex flex-col items-center justify-center text-gray-500 border-2 border-dashed     border-gray-300">
                            <i class="fas fa-image text-4xl mb-3 opacity-50"></i>
                            <p class="text-sm font-medium mb-1">No Image Available</p>
                            <p class="text-xs opacity-75 text-center px-4">This submission doesn't contain an image</p>
                            <div class="absolute top-2 right-2">
                                <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded-full font-medium">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>Incomplete
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


