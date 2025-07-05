<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <h1>Laporan/Grafik</h1>
    <p>Selamat datang <b><?= session('username') ?></b>!</p>
</div>
<?= $this->endSection() ?>