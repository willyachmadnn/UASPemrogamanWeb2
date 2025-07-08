<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Diagram Pie Data Perangkat</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header text-center bg-primary text-white">
                    <b>Diagram Pie Total Perangkat/Kategori</b>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <small class="text-muted">Menampilkan proporsi perangkat berdasarkan kategori
                            <b>Router</b>.</small>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="min-height:400px">
                        <canvas id="pieChart"
                            style="max-width:650px; max-height:650px; width:100%; height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var categories = <?= json_encode(array_column($pieData ?? [], 'category_name')) ?>;
var totals = <?= json_encode(array_column($pieData ?? [], 'total')) ?>;

var ctx = document.getElementById('pieChart').getContext('2d');
var pieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: categories,
        datasets: [{
            data: totals,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'right',
                align: 'center',
                labels: {
                    boxWidth: 20,
                    padding: 15,
                    font: {
                        size: 14
                    }
                }
            }
        }
    }
});
</script>
<?= $this->endSection() ?>