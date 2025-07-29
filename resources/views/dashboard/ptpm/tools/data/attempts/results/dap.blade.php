<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-center">Test Results</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow text-center">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 border-b border-gray-300">No</th>
                    <th class="py-2 px-4 bg-gray-200 border-b border-gray-300">Question</th>
                    <th class="py-2 px-4 bg-gray-200 border-b border-gray-300">Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($attempt->responses as $answer)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $i }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $answer->question->text }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            @if($answer->question->type === 'image_upload' && isset($answer->answer['file_path']))
                                <button onclick="openModal('{{ asset('storage/' . $answer->answer['file_path']) }}')">
                                    <img src="{{ asset('storage/' . $answer->answer['file_path']) }}" alt="Answer Image" class="w-32 h-auto mx-auto rounded hover:opacity-80 transition">
                                </button>
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-70 hidden">
    <div class="relative bg-white rounded-lg shadow-lg max-w-3xl w-full p-4">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black">
            &larr; Back
        </button>
        <img id="modalImage" src="" alt="Preview Image" class="mx-auto max-h-[80vh] object-contain">
    </div>
</div>

<!-- Script -->
<script>
    function openModal(imageUrl) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl;
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modal.classList.add('hidden');
        modalImage.src = '';
    }
</script>
