<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hasil Tes Psikologi</title>
        <style>
            .section-title {
                font-size: 28px;
                font-weight: bold;
                color: #75badb;
                padding-bottom: 5px;
                margin-bottom: 15px;
                margin-top: 40px;
            }
            #chart {
                max-width: 350px;
                margin: 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            table th,
            table td {
                border-bottom: 1px solid #ddd;
                padding: 10px;
                text-align: left;
                vertical-align: top;
            }

            table th {
                color: #9e9e9e;
                font-weight: bold;
            }
            table td {
                color: ##000000;
            }

            .td-pertama {
                width: 20%;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    <body>
        <h2 class="section-title">Hasil Tes Psikologi</h2>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni et tempora alias qui, quaerat delectus sapiente esse! Et sunt tenetur repudiandae mollitia ipsam sed odio porro! Provident mollitia esse laboriosam voluptatem natus temporibus nulla voluptates, at quam. Reiciendis ex itaque commodi sequi, perspiciatis nesciunt impedit quam culpa quasi ab? Repellat magnam pariatur repellendus corporis modi minima voluptatum, expedita, quibusdam perferendis velit sunt rem dolore quis iure ut adipisci ad similique quaerat earum? Doloribus nobis eos dolores quae in ratione itaque quod odit dolorum quaerat magni, pariatur veritatis. Enim, aspernatur nesciunt? Molestiae, optio. Impedit asperiores tenetur, odit velit et harum nostrum!</p>

        <div id="chart"></div>

        <h2 class="section-title">Rincian Jawaban</h2>
        <div>
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
                        <td class="td-pertama">X (Expedieency)</td>
                        <td class="td-kedua">1</td>
                        <td>Kebutuhan untuk menyelesaikan tugas yang dimulai, menunjukkan ketekunan.</td>
                    </tr>
                    <tr>
                        <td>O (Openness)</td>
                        <td>2</td>
                        <td>Kebutuhan untuk mencapai prestasi tinggi dan sukses dalam tugas.</td>
                    </tr>
                    <tr>
                        <td>B (Balance)</td>
                        <td>3</td>
                        <td>Kebutuhan untuk memimpin dan mengarahkan orang lain (kepemimpinan).</td>
                    </tr>
                    <tr>
                        <td>S (Stability)</td>
                        <td>4</td>
                        <td>Kebutuhan untuk mematuhi aturan, norma, dan harapan sosial.</td>
                    </tr>
                </tbody>
            </table>

            <h2 class="section-title">Rincian Jawaban</h2>
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
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>11.</td>
                        <td>Bahagia</td>
                    </tr>
                    <tr>
                        <td>12.</td>
                        <td>Bahagia</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
    <script>
        // Data Dummy
        const categories = ['A', 'L', 'P', 'I', 'T', 'V', 'O', 'B', 'S', 'X', 'C', 'D', 'R', 'Z', 'E', 'K', 'F', 'W', 'N', 'G'];
        const scores = [7, 7, 7, 7, 3, 4, 3, 5, 5, 4, 3, 6, 5, 5, 5, 3, 2, 7, 6, 2];

        var options = {
            chart: {
                type: 'radar',
                height: 400,
                toolbar: { show: false },
            },
            xaxis: {
                categories: categories,
                tooltip: { enabled: false },
            },
            yaxis: {
                min: 0,
                max: 8,
                tickAmount: 4,
                show: false,
            },
            series: [
                {
                    name: 'Score',
                    data: scores,
                },
            ],
            dataLabels: {
                enabled: true,
                style: {
                    colors: ['#236A7B'],
                    fontWeight: 600,
                    fontSize: '14px',
                },
                background: { enabled: false },
            },
            plotOptions: {
                radar: {
                    size: 150,
                    polygons: {
                        strokeColors: 'gray',
                        connectorColors: 'gray',
                        fill: { colors: ['#DFE1E8', '#e9f7fb'] },
                    },
                },
            },
            fill: {
                opacity: 0.6,
                colors: ['#75BADB'],
                type: 'solid',
            },
            stroke: {
                width: 2,
                colors: ['#75BADB'],
            },
            markers: {
                size: 5,
                colors: ['#75BADB'],
                strokeWidth: 0,
                hover: { size: 6 },
            },
        };

        var chart = new ApexCharts(document.querySelector('#chart'), options);
        chart.render();
    </script>
</html>
