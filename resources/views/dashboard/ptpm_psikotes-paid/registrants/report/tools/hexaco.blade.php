<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            .bar4 {
                background: #549ff0;
                width: 100px;
                height: 45px;
                border-radius: 4px;
            }
            .bar5 {
                background: #ef4444;
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
                font-weight: bold;
                color: #75badb;
                display: inline-block;
                border-bottom: 3px solid #75badb;
                padding-bottom: 5px;
                margin-bottom: 15px;
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
                    <div class="bar">
                        <div class="bar4"></div>
                        <span>10</span>
                    </div>
                    <div class="bar">
                        <div class="bar5"></div>
                        <span>10</span>
                    </div>
                </div>
                <span>
                    Total poin pada Extraversion:
                    <b>32 poin</b>
                </span>
                <br />
                <span>
                    Rata-rata pada Extraversion:
                    <b>8 poin</b>
                </span>
                <br />
                <span>
                    Persentase:
                    <b>11 poin</b>
                </span>
            </div>

            <div class="chart-right">
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-swatch bar1"></div>
                        <div>1=Sangat tidak sesuai</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar2"></div>
                        <div>2=Tidak sesuai</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar3"></div>
                        <div>3=Ragu-ragu</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar4"></div>
                        <div>4=Sesuai</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar5"></div>
                        <div>5=Sangat sesuai</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail">
            <h3>Detail Jawaban HEXACO:</h3>

            <div class="subtest-container">
                <div class="subtest">
                    <h4>Extraversion</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Poin</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>1</td>
                                <td>Outdoor</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>2</td>
                                <td>Mechanical</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>3</td>
                                <td>Computational</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>4</td>
                                <td>Scientific</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>5</td>
                                <td>Personal Contact</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>6</td>
                                <td>Aesthetic</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Agreeableness</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Poin</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>1</td>
                                <td>Outdoor</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>2</td>
                                <td>Mechanical</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>3</td>
                                <td>Computational</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>4</td>
                                <td>Scientific</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>5</td>
                                <td>Personal Contact</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>6</td>
                                <td>Aesthetic</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Neuroticism</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Poin</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>1</td>
                                <td>Outdoor</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>2</td>
                                <td>Mechanical</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>3</td>
                                <td>Computational</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>4</td>
                                <td>Scientific</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>5</td>
                                <td>Personal Contact</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>6</td>
                                <td>Aesthetic</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Conscientiousness</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Poin</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>1</td>
                                <td>Outdoor</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>2</td>
                                <td>Mechanical</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>3</td>
                                <td>Computational</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>4</td>
                                <td>Scientific</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>5</td>
                                <td>Personal Contact</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>6</td>
                                <td>Aesthetic</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
