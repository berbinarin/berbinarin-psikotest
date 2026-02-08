<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hasil Tes MSDT</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 40px;
            }

            .info-section p {
                margin: 0;
            }

            .info-section p + p {
                margin-top: 4px;
            }

            .info-label {
                font-weight: 600;
            }

            .info-value {
                font-weight: 700;
                margin-left: 4px;
            }

            .section-title {
                font-size: 16px;
                font-weight: 600;
                color: #75badb;
                margin: 20px 0 8px 0;
            }

            .content-text {
                margin: 0 0 8px 0;
                line-height: 1.5;
            }

            .content-list-item {
                margin-bottom: 16px;
            }

            .content-list-title {
                font-weight: 600;
                margin-bottom: 4px;
            }

            .content-list ul {
                margin: 4px 0 0 0;
                padding-left: 20px;
                list-style-type: lower-alpha;
            }

            .content-list ul li {
                margin-bottom: 4px;
                line-height: 1.5;
            }

            .table-header {
                width: 100%;
                margin-top: 20px;
                margin-bottom: 0;
                table-layout: fixed;
            }

            .table-header th {
                padding: 8px;
                text-align: center;
                font-weight: 400;
            }

            .table-header th:first-child {
                width: 6%;
            }

            .table-header th:nth-child(2) {
                width: 74%;
            }

            .table-header th:last-child {
                width: 20%;
            }

            .detail-table {
                width: 100%;
                margin-bottom: 6px;
                table-layout: fixed;
            }

            .detail-table td {
                border: 1px solid gray;
                padding: 8px;
            }

            .detail-table td:first-child {
                width: 6%;
            }

            .detail-table td:nth-child(2) {
                width: 74%;
            }

            .detail-table td:last-child {
                width: 20%;
            }

            .center-text {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h2 class="section-title">Hasil Tes Psikologi</h2>
        <div class="info-section">
            <p>
                <span>Kategori:</span>
                <span class="info-value">Bureaucrat</span>
            </p>
            <p>
                <span>Status:</span>
                <span class="info-value">Lebih Efektif</span>
            </p>
        </div>

        {{-- Rincian Jawaban --}}
        <div class="content-section">
            <h3>Rincian Jawaban:</h3>
            <p class="content-text">Ditampilkan oleh pemimpin yang menggunakan TO rendah RO rendah. Dalam situasi yang sesuai sehingga ia dapat bertindak efektif ia merupakan pemimpin yang menekankan pada aturan dan prosedur untuk kepentingan dirinya serta menjalankan pengaturan dan pengawasan dengan caranya sendiri. Ia termasuk pemimpin yang hati-hati dalam bertindak.</p>
            <p class="content-text">Pemimpin yang bertipe bureaucrat adalah tipe pemimpin yang hanya berorientasi pada keefektifan saja. Pemimpin tipe ini memiliki sifat-sifat sebagai berikut:</p>

            <div class="content-list">
                <div class="content-list-item">
                    <p class="content-list-title">1) Selalu berorientasi pada keefektifan. Hal ini tampak pada sifat-sifatnya sebagai berikut:</p>
                    <ul>
                        <li>Bekerja sesuai dengan prosedur yang benar dan peraturan yang berlaku.</li>
                        <li>Taat pada peraturan organisasi serta taat pada perintah secara tepat.</li>
                        <li>Memelihara kepentingan lingkungan dengan selalu mengikuti aturan-aturan manajerial.</li>
                    </ul>
                </div>

                <div class="content-list-item">
                    <p class="content-list-title">2) Tidak atau kurang berorientasi pada tugas. Hal ini tampak pada sifat-sifatnya antara lain:</p>
                    <ul>
                        <li>Tidak menyukai tugas yang diserahkan kepadanya.</li>
                        <li>Ide-idenya tidak atau kurang mendorong untuk meningkatkan produksi.</li>
                    </ul>
                </div>

                <div class="content-list-item">
                    <p class="content-list-title">3) Tidak atau kurang berorientasi pada hubungan dengan orang lain. Hal ini tampak pada sifat-sifatnya antara lain:</p>
                    <ul>
                        <li>Tidak atau kurang menyukai masyarakat.</li>
                        <li>Tidak atau kurang mengembangkan hubungan dengan bawahannya.</li>
                        <li>Sangat percaya bahwa hubungan baik dengan orang lain adalah sulit untuk dicapai.</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- tabel detail jawaban --}}
        <div class="content-section">
            <h3>Detail Jawaban</h3>
            <table class="table-header">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pernyataan</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
            </table>
            @for ($i = 1; $i <= 8; $i++)
                <table class="detail-table">
                    <tr>
                        <td rowspan="2" class="center-text">{{ $i }}.</td>
                        <td>
                            <span>A.</span>
                            Saya tidak akan menegur pelanggar-pelanggar peraturan bila saya merasa pasti bahwa tidak ada satu orang pun yang mengetahui tentang pelanggar-pelanggar tersebut.
                        </td>
                        <td rowspan="2" class="center-text" style="font-weight: bold">A</td>
                    </tr>
                    <tr>
                        <td>
                            <span>B.</span>
                            Bila saya mengumumkan suatu keputusan yang kurang menyenangkan, saya akan menjelaskan kepada bawahan saya bahwa keputusan ini dibuat oleh direktur.
                        </td>
                    </tr>
                </table>
            @endfor
        </div>
    </body>
</html>