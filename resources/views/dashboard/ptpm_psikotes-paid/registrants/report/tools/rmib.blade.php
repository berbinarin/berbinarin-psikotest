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
        </style>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Psikologi</h2>
        <p>
            Berikut merupakan 3 peringkat kategori dengan nilai terendah, yaitu
            <b>Outdoor, Mechanical, Scientific</b>
            dan
            <b>Computational</b>
            .
        </p>
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
            </div>

            <div class="chart-right">
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-swatch bar1"></div>
                        <div>1=sangat tidak sesuai</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar2"></div>
                        <div>2=tidak sesuai</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar3"></div>
                        <div>3=ragu-ragu</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar4"></div>
                        <div>4=sesuai</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-swatch bar5"></div>
                        <div>5=sangat sesuai</div>
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
                                <th>Pernyataan</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>Outdoor</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>Mechanical</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>Computational</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>Scientific</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>Personal Contact</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>Aesthetic</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Subtest B</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Pernyataan</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>Outdoor</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>Mechanical</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>Computational</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>Scientific</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>Personal Contact</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>Aesthetic</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Subtest C</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Pernyataan</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>Outdoor</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>Mechanical</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>Computational</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>Scientific</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>Personal Contact</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>Aesthetic</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Subtest D</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Pernyataan</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>Outdoor</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>Mechanical</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>Computational</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>Scientific</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>Personal Contact</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>Aesthetic</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="subtest">
                    <h4>Subtest E</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Pernyataan</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>Outdoor</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>Mechanical</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>Computational</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>Scientific</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>Personal Contact</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>Aesthetic</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="subtest">
                    <h4>Subtest F</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Pernyataan</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Menyetir mobil antar-jemput dari satu tempat ke tempat lain bagi para anggota yang sibuk dengan urusan, dari satu tempat ke tempat lain.</td>
                                <td>Outdoor</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Mempelajari cara memperbaiki kerusakan-kerusakan ringan pada mesin mobil yang siap dipakai tim.</td>
                                <td>Mechanical</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Merencanakan anggaran belanja proyek perjalanan yang akan diajukan kepada sponsor.</td>
                                <td>Computational</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Membaca laporan-laporan penelitian KLH untuk memilih proyek KLH yang tepat.</td>
                                <td>Scientific</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Menghadapi sponsor untuk tawar-menawar dana di perusahaan "Supra Motor".</td>
                                <td>Personal Contact</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Memilih berbagai khazanah lagu–lagu yang tepat bagi kampanye Kelestarian Lingkungan Hidup.</td>
                                <td>Aesthetic</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
