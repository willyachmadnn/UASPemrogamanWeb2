<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container py-4 mt-5">
    <div class="row mb-4">
        <!-- Total Perangkat -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow border-0 rounded-4" style="background: #f55142;">
                <div class="card-body text-white text-center">
                    <div style="font-size:2.5rem;">
                        <i class="bi bi-hdd-stack-fill"></i>
                    </div>
                    <h3 class="fw-bold mb-0"><?= esc($total_perangkat) ?></h3>
                    <div>TOTAL PERANGKAT</div>
                </div>
            </div>
        </div>
        <!-- Perangkat Aktif -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow border-0 rounded-4" style="background: #1688fa;">
                <div class="card-body text-white text-center">
                    <div style="font-size:2.5rem;">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h3 class="fw-bold mb-0"><?= esc($perangkat_aktif) ?></h3>
                    <div>PERANGKAT AKTIF</div>
                </div>
            </div>
        </div>
        <!-- Perangkat Tidak Aktif -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow border-0 rounded-4" style="background: #fcb900;">
                <div class="card-body text-white text-center">
                    <div style="font-size:2.5rem;">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <h3 class="fw-bold mb-0"><?= esc($perangkat_tidak_aktif) ?></h3>
                    <div>PERANGKAT TIDAK AKTIF</div>
                </div>
            </div>
        </div>
        <!-- Masuk/Keluar (Transaksi/Riwayat) -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow border-0 rounded-4" style="background: #15bd88;">
                <div class="card-body text-white text-center">
                    <div style="font-size:2.5rem;">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <h3 class="fw-bold mb-0"><?= esc($total_riwayat) ?></h3>
                    <div>MASUK/KELUAR</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>