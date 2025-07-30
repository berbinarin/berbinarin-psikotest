<div class="container mx-auto">
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
                        <td class="py-2 px-4 border-b border-gray-300">{{ $answer->answer['text'] }}</td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
