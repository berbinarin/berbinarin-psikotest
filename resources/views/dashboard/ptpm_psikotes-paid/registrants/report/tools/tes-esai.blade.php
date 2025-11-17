<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pertanyaan Essay</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 40px;
                color: #333;
                line-height: 1.6;
            }

            h2 {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
            }

            .question-item{
                display: block;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 5px 16px;
                margin-bottom: 7px;
                page-break-inside: avoid;
            }

            .question {
                color: #555;
                font-size: 16px;
                font-weight: bold;
                margin-bottom: 6px;
            }

            .answer {
                color: #333;
                font-size: 14px;
                line-height: 1.5;
            }

            .section-title {
                font-size: 20px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Esai</h2>

        <?php $i = 1 ?>
        @foreach($attempt->responses as $answer)
            <div class="question-item">
                <p class="question">{{ $answer->question->text }}</p>
                <p class="answer">{{ $answer->answer['text'] }}</p>
            </div>
            <?php $i++ ?>
        @endforeach
    </body>
</html>
