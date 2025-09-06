<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laporan Pendaftar</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                color: #333;
                line-height: 1.6;
                background: #f5f6fa;
            }

            .section {
                margin-bottom: 5px;
            }

            .section-title {
                font-size: 28px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: -5px;
            }

            .info-grid1 {
                display: flex;
                justify-content: space-between;
            }
            .info-grid1 .left-section {
                width: 45%;
            }
            .info-grid1 .right-section {
                width: 100%;
                padding-left: 40px;
            }

            .info-grid2 {
                display: flex;
                justify-content: space-between;
            }
            .info-grid2 .left-section,
            .info-grid2 .middle-section,
            .info-grid2 .right-section {
                width: 32%;
            }
            .info-grid2 .middle-section {
                padding: 0 20px;
            }

            .info-item {
                display: flex;
                flex-direction: column;
                padding: 8px 0;
                margin: 0 0 12px;
                break-inside: avoid;
                -webkit-column-break-inside: avoid;
                page-break-inside: avoid;
            }

            .label {
                color: #555;
                font-size: 16px;
                font-weight: bold;
                margin: 0 0 4px 0;
            }

            .value {
                color: #333;
                font-size: 16px;
                margin: 0;
            }

            @media (max-width: 768px) {
                .info-grid1,
                .info-grid2 {
                    flex-direction: column;
                }
                .info-grid1 .left-section,
                .info-grid1 .right-section,
                .info-grid2 .left-section,
                .info-grid2 .middle-section,
                .info-grid2 .right-section {
                    width: 100%;
                    padding-left: 0;
                }
            }

            .question {
                font-size: 16px;

                color: #7f8c8d;
                margin-top: 20px;
                margin-bottom: 6px;
            }

            .answer {
                font-size: 16px;
                color: black;
                margin-bottom: 10px;
                font-weight: bold;
            }

        </style>
    </head>
    <body>

    
        <!-- Section lama (2 kolom) -->
        <div class="section">
            <h2 class="section-title">Data Diri</h2>
            <div class="info-grid1">
                <div class="left-section">
                    <div class="info-item">
                        <p class="label">Nama Lengkap</p>
                        <p class="value">Wayan Risha Larasati</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Tempat Lahir</p>
                        <p class="value">Buleleng, Bali</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Jenis Kelamin</p>
                        <p class="value">Perempuan</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Telpon/HP</p>
                        <p class="value">0883123123323123</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Alamat Email</p>
                        <p class="value">testing@gmail.com</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Jabatan Saat ini</p>
                        <p class="value">CEO</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Akun Instagram</p>
                        <p class="value">instagram.not</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Akun X</p>
                        <p class="value">x.not</p>
                    </div>
                </div>

                <div class="right-section">
                    <div class="info-item">
                        <p class="label">No. KTP</p>
                        <p class="value">13131231231231</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Tanggal Lahir</p>
                        <p class="value">07/03/2008</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Status Pernikahan</p>
                        <p class="value">Belum Menikah</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Alamat</p>
                        <p class="value">Jalan I Gusti Ngurah Rai</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Unit Kerja</p>
                        <p class="value">Departemen SDM</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Jabatan yang Diinginkan</p>
                        <p class="value">CEO</p>
                    </div>
                    <div class="info-item">
                        <p class="label">Akun Facebook</p>
                        <p class="value">facebook.nom</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section (2 kolom) -->
        <div class="section">
            <h2 class="section-title">Riwayat Pendidikan</h2>
            <div class="info-grid1">
                <div class="left-section">
                    <div class="info-item">
                        <p class="label">TK</p>
                        <p class="label">Nama Sekolah</p>
                        <p class="value">TK Tadika Mesra</p>
                    </div>
                    <div class="info-item">
                        <p class="label">SD</p>
                        <p class="label">Nama Sekolah</p>
                        <p class="value">SDN Kalimulya 4</p>
                    </div>
                    <div class="info-item">
                        <p class="label">SMP</p>
                        <p class="label">Nama Sekolah</p>
                        <p class="value">SMP PGRI 1 Cibinong</p>
                    </div>
                    <div class="info-item">
                        <p class="label">SMA</p>
                        <p class="label">Nama Sekolah</p>
                        <p class="value">SMKN 1 Cibinong</p>
                    </div>
                </div>

                <div class="right-section">
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Tahun</p>
                        <p class="value">2012</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Tahun</p>
                        <p class="value">2019</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Tahun</p>
                        <p class="value">2022</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Tahun</p>
                        <p class="value">2026</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section(3 kolom) -->
        <div class="section">
            <div class="info-grid2">
                <div class="left-section">
                    <div class="info-item">
                        <p class="label">D1/D2/D3</p>
                        <p class="label">Nama Perguruan Tinggi</p>
                        <p class="value">Politeknik Negeri Jakarta</p>
                    </div>
                    <div class="info-item">
                        <p class="label">D4/S1</p>
                        <p class="label">Nama Perguruan Tinggi</p>
                        <p class="value">Institut Teknologi Bandung</p>
                    </div>
                    <div class="info-item">
                        <p class="label">S2</p>
                        <p class="label">Nama Perguruan Tinggi</p>
                        <p class="value">Universitas Indonesia</p>
                    </div>
                    <div class="info-item">
                        <p class="label">S3</p>
                        <p class="label">Nama Perguruan Tinggi</p>
                        <p class="value">Havard University</p>
                    </div>
                </div>

                <div class="middle-section">
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Jurusan</p>
                        <p class="value">Teknik Informatika</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Jurusan</p>
                        <p class="value">Teknik Informatika</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Jurusan</p>
                        <p class="value">Teknik Informatika</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Jurusan</p>
                        <p class="value">Teknik Informatika</p>
                    </div>
                </div>

                <div class="right-section">
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Tahun</p>
                        <p class="value">2030</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Tahun</p>
                        <p class="value">2030</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Tahun</p>
                        <p class="value">2030</p>
                    </div>
                    <div class="info-item">
                        <p class="label"><br /></p>
                        <p class="label">Tahun</p>
                        <p class="value">2045</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Pertanyaan Essay</h2>

            <div class="qa-item">
                <p class="question">Lorem ipsum dolor sit amet consectetur?</p>
                <p class="answer">Lorem ipsum dolor sit amet consectetur. Facilisis lobortis neque augue pellentesque sem id scelerisque tristique. Aenean massa augue euismod ante blandit viverra lectus nisi facilisis. Egestas fermentum tincidunt integer eget amet nam ut maecenas. Neque vulputate parturient adipiscing ultrices vehicula.</p>
            </div>

            <div class="qa-item">
                <p class="question">Lorem ipsum dolor sit amet consectetur?</p>
                <p class="answer">Lorem ipsum dolor sit amet consectetur. Facilisis lobortis neque augue pellentesque sem id scelerisque tristique. Aenean massa augue euismod ante blandit viverra lectus nisi facilisis. Egestas fermentum tincidunt integer eget amet nam ut maecenas. Neque vulputate parturient adipiscing ultrices vehicula.</p>
            </div>

            <div class="qa-item">
                <p class="question">Lorem ipsum dolor sit amet consectetur?</p>
                <p class="answer">Lorem ipsum dolor sit amet consectetur. Facilisis lobortis neque augue pellentesque sem id scelerisque tristique. Aenean massa augue euismod ante blandit viverra lectus nisi facilisis. Egestas fermentum tincidunt integer eget amet nam ut maecenas. Neque vulputate parturient adipiscing ultrices vehicula.</p>
            </div>

            <div class="qa-item">
                <p class="question">Lorem ipsum dolor sit amet consectetur?</p>
                <p class="answer">Lorem ipsum dolor sit amet consectetur. Facilisis lobortis neque augue pellentesque sem id scelerisque tristique. Aenean massa augue euismod ante blandit viverra lectus nisi facilisis. Egestas fermentum tincidunt integer eget amet nam ut maecenas. Neque vulputate parturient adipiscing ultrices vehicula.</p>
            </div>
        </div>
    </body>
</html>
