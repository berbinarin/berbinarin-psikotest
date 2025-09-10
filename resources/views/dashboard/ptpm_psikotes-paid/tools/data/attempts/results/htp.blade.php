<div class="w-full p-6 bg-gray-50 ">
    @forelse($data as $index => $item)
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $item['user_name'] ?? 'Unknown User' }}</h1>
        <p class="text-gray-600">Submissions Tes HTP</p>
        <div class="w-20 h-1 bg-blue-500 mt-2"></div>
    </div>

    <!-- Results Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">

                <!-- Image Section -->
                <div class="p-4">
                    @php
                        $imagePath = null;
                        if (!empty($item['image'])) {
                            if (is_string($item['image']) && str_starts_with($item['image'], '{')) {
                                $imgData = json_decode($item['image'], true);
                                $imagePath = $imgData['file_path'] ?? null;
                            } else {
                                $imagePath = $item['image'];
                            }
                        }
                    @endphp

                    <div class="relative mb-4">
                        @if($imagePath)
                            <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden relative group/image">
                                <img
                                    src="{{ asset('/image/' . $imagePath) }}"
                                    alt="HTP Drawing by {{ $item['user_name'] ?? 'User' }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover/image:scale-110"
                                    loading="lazy"
                                >
                            </div>
                        @else
                            <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex flex-col items-center justify-center text-gray-500 border-2 border-dashed border-gray-300">
                                <i class="fas fa-image text-4xl mb-3 opacity-50"></i>
                                <p class="text-sm font-medium mb-1">No Image Available</p>
                                <p class="text-xs opacity-75 text-center px-4">This submission doesn't contain an image</p>

                                <!-- Status Badge for No Image -->
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
        @empty
            <!-- Empty State -->
            <div class="col-span-full">
                <div class="text-center py-16">
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Detail Data Jawaban Tidak ada</h3>
                </div>
            </div>
        </div>
    @endforelse
</div>

