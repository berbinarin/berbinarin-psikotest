<p>{{ $question->text }}</p>

<label for="file-upload" class="flex mt-8 h-48 w-full cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-blue-500 bg-blue-50 transition-colors duration-200 hover:bg-blue-100">
    <svg class="mb-2 h-12 w-12 text-blue-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v-1.75a2.75 2.75 0 012.75-2.75h3.75A2.75 2.75 0 0112 12.75v1.75h-4.5a1.25 1.25 0 000 2.5h4.5v1.75a2.75 2.75 0 01-2.75 2.75H5.75A2.75 2.75 0 013 19.25v-1.75zm18 1.75v-1.75a2.75 2.75 0 00-2.75-2.75h-3.75A2.75 2.75 0 0012 16.5v1.75h4.5a1.25 1.25 0 010 2.5H12v1.75a2.75 2.75 0 002.75 2.75h3.75A2.75 2.75 0 0021 22.25v-1.75z" />
    </svg>

    <span id="uploadText" class="font-semibold text-blue-600 underline">Click to Upload or Drag & Drop</span>
    <span class="text-xs text-gray-400">Max. File Size: 15MB</span>

    <input id="file-upload" name="answer" type="file" class="hidden" onchange="showFilename()" />
</label>

<script>
    function showFilename() {
        const input = document.getElementById('file-upload');
        const uploadText = document.getElementById('uploadText');

        if (input.files && input.files.length > 0) {
            uploadText.textContent = input.files[0].name;
        } else {
            uploadText.textContent = 'Click to Upload or Drag & Drop';
        }
    }
</script>
