<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hasil Tes VAK</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 40px;
                color: #333;
            }
            h2 {
                font-size: 20px;
                margin-bottom: 10px;
            }

            .chart-container {
                display: flex;
                align-items: flex-start;
                margin: 20px 0;
            }

            .chart-left p {
                max-width: 500px;
            }

            .chart-right {
                width: 220px;
                min-width: 160px;
            }

            .chart {
                margin: 0;
                max-width: 80%;
            }

            .bar {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
            .bar span {
                margin-left: 10px;
                font-weight: bold;
            }
            .bar1 {
                background: #3986a3;
                width: 200px;
                height: 45px;
                border-radius: 4px;
            }
            .bar2 {
                background: #e9b306;
                width: 400px;
                height: 45px;
                border-radius: 4px;
            }
            .bar3 {
                background: #c893fd;
                width: 100px;
                height: 45px;
                border-radius: 4px;
            }

            .legend {
                margin-top: 6px;
            }
            .legend-item {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 10px;
                font-size: 14px;
            }
            .legend-swatch {
                width: 14px;
                height: 14px;
                border-radius: 50%;
                flex-shrink: 0;
                border: 1px solid rgba(0, 0, 0, 0.08);
            }

            .desc {
                margin: 20px 0 0 0;
                line-height: 1.6;
            }
            .detail {
                margin-top: 20px;
            }
            .detail h3 {
                margin-bottom: -10px;
                font-size: 18px;
            }
            .subtest-container {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                margin-right: -40px;
            }

            .subtest {
                flex: 0 0 calc(50% - 30px);
                max-width: calc(50% - 30px);
                box-sizing: border-box;
            }

            @media (max-width: 900px) {
                .subtest {
                    flex: 0 0 100%;
                    max-width: 100%;
                }
            }

            .subtest h4 {
                color: #3993d2;
                margin-bottom: 10px;
                font-size: 16px;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th,
            td {
                border-bottom: 1px solid #ddd;
                text-align: left;
                padding: 6px 10px;
                font-size: 14px;
            }
            th {
                color: #555;
            }

            @media (max-width: 700px) {
                .chart-container {
                    flex-direction: column;
                }
                .chart-right {
                    width: 100%;
                }
            }

            .section-title {
                font-size: 28px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }

            .subtest h4 {
                color: #75badb; /* warna sesuai contoh gambar */
                font-size: 20px;
                font-weight: bold;
                display: inline-block;
                border-bottom: 4px solid #75badb; /* underline */
                padding-bottom: 2px; /* jarak antara teks dan garis */
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Psikologi</h2>

        <div class="chart-container">
            <div class="chart-left">
                <div class="chart">
                    <div class="bar">
                        <div class="bar1"></div>
                        <span>20</span>
                    </div>
                    <div class="bar">
                        <div class="bar2"></div>
                        <span>40</span>
                    </div>
                    <div class="bar">
                        <div class="bar3"></div>
                        <span>10</span>
                    </div>
                </div>
                <p class="">Kecenderungan siswa untuk menerima informasi dalam belajar dengan menggunakan indera penglihatan. Gaya belajar ini mengakses citra visual seperti warna, gambar dan video.</p>
            </div>

            <div class="chart-right">
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-swatch bar1"></div>
                        <div>Visual</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar2"></div>
                        <div>Auditori</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar3"></div>
                        <div>Kinestetik</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail">
            <h3>Detail Jawaban:</h3>

            <div class="subtest-container">
                <div class="subtest">
                    <h4>Subtest A</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Subtest B</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Subtest C</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>A. Saya bukan seorang pemurung</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
