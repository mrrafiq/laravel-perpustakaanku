<div class="row">
    <div class="col md-auto p-4">
        <div class="card mb-4 bg-light">
            <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><p class="fs-4 fw-bold">Grafik Perbandingan Berdasarkan Status</p></div>
                <div class="panel-body">
                    <canvas id="barChart" class="p-5"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col md-auto p-4">
        <div class="card mb-4 bg-light">
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><p class="fs-4 fw-bold">Grafik Performa Peminjaman bulan Ini</p></div>
                    <div class="panel-body">
                        <canvas id="chartPerformance" class="p-5"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $.get( "/api/chart", function(data) {
        console.log(data);
        var ctx = document.getElementById("barChart");
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Belum Dikembalikan", "Sudah Dikembalikan"],
            datasets: [{
                label: '',
                data:data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
        });
    });
</script>

<script>
    $.get( "/api/chart2", function(data) {
        console.log(data);
        var ctx = document.getElementById("chartPerformance");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.label,
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: data.total,
                    borderColor: [
                        'rgb(75, 192, 192)',
                    ],
                    tension: 0.1,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>
