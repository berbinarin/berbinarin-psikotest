<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            .section-title {
                font-size: 28px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }

            .image-container {
                display: flex;
                flex-wrap: wrap;
                gap: 16px;
                margin-top: 10px;
            }

            .image-box {
                width: 410px;
                height: 276px;
                border: 2px solid #333;
                border-radius: 8px;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #f5f5f5;
            }

            .image-box img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .missing {
                color: #888;
                font-style: italic;
            }
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes BAUM</h2>

        <div class="image-container">
            @foreach ($data as $baum)
                @php
                    $path = storage_path('app/public/' . $baum['image']);
                    $base64 = null;

                    if (file_exists($path)) {
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    }
                @endphp

                <div class="image-box">
                    @if ($base64)
                        <img src="{{ $base64 }}" alt="Gambar BAUM oleh {{ $attempt->user->name }}" />
                    @else
                        <div class="missing">Gambar tidak ditemukan</div>
                    @endif
                </div>
            @endforeach
        </div>
    </body>
</html>
