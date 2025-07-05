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
                <!-- More Info -->
                <a href="<?= base_url('list') ?>"
                    class="card-footer d-flex justify-content-between align-items-center text-white text-decoration-none fw-bold bg-transparent border-0"
                    style="background:rgba(0,0,0,0.05)">
                    <span>More Info</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
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
                <a href="<?= base_url('laporan') ?>"
                    class="card-footer d-flex justify-content-between align-items-center text-white text-decoration-none fw-bold bg-transparent border-0"
                    style="background:rgba(0,0,0,0.05)">
                    <span>More Info</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
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
                <a href="<?= base_url('laporan') ?>"
                    class="card-footer d-flex justify-content-between align-items-center text-white text-decoration-none fw-bold bg-transparent border-0"
                    style="background:rgba(0,0,0,0.05)">
                    <span>More Info</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
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
                <a href="<?= base_url('riwayat') ?>"
                    class="card-footer d-flex justify-content-between align-items-center text-white text-decoration-none fw-bold bg-transparent border-0"
                    style="background:rgba(0,0,0,0.05)">
                    <span>More Info</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>