<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <h1>Barang masuk dan keluar</h1>
    <p>Selamat datang <b><?= session('username') ?></b>!</p>
</div>
<?= $this->endSection() ?>