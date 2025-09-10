<div class="w-full p-6 bg-gray-50 ">
    @forelse($data as $index => $item)
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-[#75BADB] mb-2">Name: {{ $item['user_name'] ?? 'Unknown User' }}</</h1>
        <div class="w-20 h-1 bg-blue-500 mt-2"></div>
    </div>

    <!-- Results Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div class="group bg-white w-[450px] rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">

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
                            <button
                                type="button"
                                class="w-full h-72 md:h-80 lg:h-96 bg-gray-100 rounded-lg overflow-hidden relative group/image p-0 border-0 openImageBtn"
                                aria-haspopup="dialog"
                                aria-label="Open full image"
                                data-image-url="{{ asset('/image/' . $imagePath) }}"
                                data-filename="{{ basename($imagePath) }}"
                            >
                                <img
                                    src="{{ asset('/image/' . $imagePath) }}"
                                    alt="HTP Drawing by {{ $item['user_name'] ?? 'User' }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover/image:scale-110 group-hover/image:brightness-50"
                                    loading="lazy"
                                >

                                <!-- hover overlay -->
                                <span class="absolute inset-0 flex items-center justify-center text-white text-sm font-medium opacity-0 group-hover/image:opacity-100 transition-opacity duration-300 bg-black/30">
                                    Lihat detail gambar
                                </span>
                            </button>
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

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 z-50 hidden flex items-center justify-center px-4 py-6" role="dialog" aria-modal="true" tabindex="-1">
    <!-- backdrop -->
    <div id="modalBackdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>

    <!-- modal container -->
    <div class="relative z-10 w-full max-w-[90vw] sm:max-w-4xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden transform transition-all" role="document">
        <!-- header with actions -->
        <div class="flex items-center justify-between p-3 border-b">
            <div class="text-sm text-gray-600">Detail Gambar</div>
            <div class="flex items-center gap-2">
                <a id="downloadBtn" href="#" download="Tes_HTP_{{ $item['user_name'] }}_{{ now()->format('Y-m-d') }}.{{ pathinfo($imagePath, PATHINFO_EXTENSION) }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary text-white rounded-md text-sm hover:bg-primary">
                    <i class="fas fa-download"></i>
                    <span>Download</span>
                </a>
                <button id="closeModalBtn" class="inline-flex items-center justify-center w-8 h-8 rounded-md text-gray-600 hover:bg-gray-100" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 8.586L15.95 2.636l1.414 1.414L11.414 10l5.95 5.95-1.414 1.414L10 11.414l-5.95 5.95-1.414-1.414L8.586 10 2.636 4.05 4.05 2.636 10 8.586z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- content: image contained inside modal container -->
        <div class="p-4 flex items-center justify-center">
            <img id="modalImage" src="#" alt="Full HTP Drawing by {{ $item['user_name'] }}" class="max-h-[80vh] w-full object-contain rounded-md" />
        </div>
    </div>
</div>

<script>
    (function(){
        const openBtns = document.querySelectorAll('.openImageBtn');
        const modal = document.getElementById('imageModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const closeBtn = document.getElementById('closeModalBtn');
        const modalImage = document.getElementById('modalImage');
        const downloadBtn = document.getElementById('downloadBtn');
        const modalContainer = modal?.querySelector('[role="document"]');

        if (!modal) return;

        const openModal = (src, filename) => {
            if (!src) return;
            modalImage.src = src;
            downloadBtn.href = src;
            try { downloadBtn.setAttribute('download', filename || 'image'); } catch(e){}
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            closeBtn?.focus();
        };

        const closeModal = () => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
            // modalImage.src = '#';
        };

        openBtns.forEach(btn => {
            btn.addEventListener('click', function(){
                const src = this.dataset.imageUrl || this.querySelector('img')?.src;
                const filename = `Tes_HTP_{{ $item['user_name'] }}_{{ now()->format('Y-m-d') }}.${src ? src.split('.').pop().split('?')[0] : 'jpg'}`;
                openModal(src, filename);
            });
        });

        closeBtn.addEventListener('click', closeModal);
        modalBackdrop.addEventListener('click', closeModal);

        document.addEventListener('keydown', function(e){
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
        });

        modalContainer?.addEventListener('click', function(e){
            e.stopPropagation();
        });
    })();
</script>

