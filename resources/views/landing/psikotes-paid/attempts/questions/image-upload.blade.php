<p class="text-justify text-sm">{{ $question->text }}</p>

<!-- Container luar -->
<div class="mt-1 w-[full] rounded-xl border border-gray-300 bg-white py-6 px-6  mb-[-35px]">
    <!-- Container upload -->
    <label for="file-upload" class="flex h-[180px] w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-blue-500 bg-blue-50 p-8 transition-colors duration-200 hover:bg-blue-100 mb-0">
        <!-- Icon -->
        <img src="{{ asset("assets/landing/icons/upload.svg") }}" alt="Upload Icon" class="mb-4 h-12 w-12 text-blue-500" />

        <!-- Teks upload -->
        <p class="text-center">
            <span id="uploadText" class="font-semibold text-blue-600 underline">Click To Upload</span>
            <span class="ml-1 font-medium text-gray-700">or Drag and Drop</span>
        </p>

        <!-- Sub teks -->
        <span class="mt-2 text-sm text-gray-400">Max. File Size: 15MB</span>

        <!-- Input file dibungkus -->
        <div class="hidden">
            <input id="file-upload" name="answer" type="file" onchange="showFilename()" />
        </div>
    </label>
</div>

<script>
    function showFilename() {
        const input = document.getElementById('file-upload');
        const uploadText = document.getElementById('uploadText');

        if (input.files && input.files.length > 0) {
            uploadText.textContent = input.files[0].name;
        } else {
            uploadText.textContent = 'Click To Upload';
        }
    }
</script>
