<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container py-4 mt-4" style="max-width: 900px;">
    <h2 class="mb-4 fw-bold">Tambah Data Perangkat</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif ?>

    <form action="<?= base_url('daftar/store') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">Pilih Category</option>
                <?php foreach ($kategori as $kat): ?>
                    <option value="<?= $kat['id'] ?>" <?= old('category_id') == $kat['id'] ? 'selected' : '' ?>>
                        <?= esc($kat['jenis_router']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Mac Address</label>
            <input type="text" name="mac_address" class="form-control" value="<?= old('mac_address') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="">Pilih Status</option>
                <option value="Aktif" <?= old('status') == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Tidak Aktif" <?= old('status') == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?= old('deskripsi') ?>" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="<?= base_url('daftar') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>