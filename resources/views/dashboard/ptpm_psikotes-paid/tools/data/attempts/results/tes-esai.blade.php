<div class="container mx-auto">
    <div class="overflow-x-auto">
        <div class="max-h-[500px] overflow-y-auto border border-gray-200 rounded-lg"> <!-- Scroll vertikal + border -->
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-gray-50 sticky top-0">
                    <tr>
                        <th class="w-[50px] py-3 px-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="min-w-[200px] max-w-[300px] py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Question</th>
                        <th class="min-w-[200px] max-w-[400px] py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Answer</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $i = 1 ?>
                    @foreach($attempt->responses as $answer)
                        <tr>
                            <td class="py-3 px-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $i }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900 break-words min-w-[200px] max-w-[300px]"> <!-- Wrapping Question -->
                                {{ $answer->question->text }}
                            </td>
                            <td class="py-3 px-4 text-sm text-gray-900 break-words min-w-[200px] max-w-[400px]"> <!-- Wrapping Answer -->
                                {{ $answer->answer['text'] }}
                            </td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>