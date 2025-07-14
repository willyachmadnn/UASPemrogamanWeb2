<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-black">Diagram Pie Data Perangkat</h2>
    <form method="get" class="mb-4 d-flex flex-wrap gap-2 align-items-center">
        <label for="status" class="mb-0 me-2 fw-semibold">Status</label>
        <select class="form-select border-black" id="status" name="status" style="max-width: 180px;"
            onchange="this.form.submit()">
            <option value="">Semua</option>
            <option value="Aktif" <?= (isset($_GET['status']) && $_GET['status'] == 'Aktif') ? 'selected' : '' ?>>Aktif
            </option>
            <option value="Tidak Aktif"
                <?= (isset($_GET['status']) && $_GET['status'] == 'Tidak Aktif') ? 'selected' : '' ?>>Tidak Aktif
            </option>
        </select>
    </form>

    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-11">
            <div class="card shadow mb-4 border-0">
                <div class="card-header text-center bg-primary text-white rounded-top-3">
                    <b>Diagram Pie Total Perangkat/Kategori</b>
                </div>
                <div class="card-body bg-light">
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