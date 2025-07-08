<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<style>
    .card-dashboard {
        border-radius: 18px;
        box-shadow: none !important;
        padding: 24px 18px 18px 24px;
        color: #fff;
        min-height: 170px;
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-bottom: 16px;
        background: #333;
    }

    .card-dashboard .icon-box {
        font-size: 3.1rem;
        opacity: 0.25;
        margin-left: auto;
        margin-right: 0;
        line-height: 1;
    }

    .card-dashboard .number {
        font-size: 2.7rem;
        font-weight: 800;
        margin-bottom: 0;
        line-height: 1.1;
    }

    .card-dashboard .label {
        font-size: 1.1rem;
        font-weight: 500;
        opacity: 0.95;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .bg-flat-red {
        background: #f55142;
    }

    .bg-flat-blue {
        background: #1688fa;
    }

    .bg-flat-yellow {
        background: #fcb900;
    }

    .bg-flat-green {
        background: #15bd88;
    }

    @media (max-width: 991px) {
        .card-dashboard {
            min-height: 120px;
            padding: 18px 12px 14px 18px;
        }

        .card-dashboard .number {
            font-size: 2rem;
        }

        .card-dashboard .icon-box {
            font-size: 2.2rem;
        }
    }
</style>

<div class="container py-4 mt-5">
    <div class="row g-3">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card-dashboard bg-flat-red">
                <div>
                    <div class="number"><?= esc($total_perangkat) ?></div>
                    <div class="label">TOTAL PERANGKAT</div>
                </div>
                <div class="icon-box">
                    <i class="bi bi-hdd-stack-fill"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card-dashboard bg-flat-blue">
                <div>
                    <div class="number"><?= esc($perangkat_aktif) ?></div>
                    <div class="label">PERANGKAT AKTIF</div>
                </div>
                <div class="icon-box">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card-dashboard bg-flat-yellow">
                <div>
                    <div class="number"><?= esc($perangkat_tidak_aktif) ?></div>
                    <div class="label">PERANGKAT TIDAK AKTIF</div>
                </div>
                <div class="icon-box">
                    <i class="bi bi-x-circle-fill"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card-dashboard bg-flat-green">
                <div>
                    <div class="number"><?= esc($kategori) ?></div>
                    <div class="label">Category</div>
                </div>
                <div class="icon-box">
                    <i class="bi bi-list-ul"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>