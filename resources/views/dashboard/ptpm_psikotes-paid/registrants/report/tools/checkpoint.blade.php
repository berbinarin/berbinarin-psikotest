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
        <div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama tes</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-kedua">1.</td>
                        <td>Tes Covid</td>
                        <td class="td-pertama">Siapa nama kepala sekolah SMKN 1 Cibinong?</td>
                        <td>Donianto</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Tes Kejiwaan</td>
                        <td>Kenapa kamu gila?</td>
                        <td>Karena saya SIJA</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Tes narkoba</td>
                        <td>apa nama tembakau yang ada hewannya?</td>
                        <td>tembakau gorila</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Tes</td>
                        <td>saya tidak tahu?</td>
                        <td>sesuai banget</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
