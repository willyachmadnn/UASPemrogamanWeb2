<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container py-4 mt-4" style="max-width: 900px;">
    <h2 class="mb-4 fw-bold">Edit Data Perangkat</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif ?>

    <form action="<?= base_url('daftar/update/' . $perangkat['id']) . $queryString ?>" method="post"
        enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">Pilih Category</option>
                <?php foreach ($kategori as $kat): ?>
                    <option value="<?= $kat['id'] ?>" <?= $kat['id'] == old('category_id', $perangkat['category_id']) ? 'selected' : '' ?>>
                        <?= esc($kat['jenis_router']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Mac Address</label>
            <input type="text" name="mac_address" class="form-control"
                value="<?= old('mac_address', $perangkat['mac_address']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="">Pilih Status</option>
                <option value="Aktif" <?= old('status', $perangkat['status']) == 'Aktif' ? 'selected' : '' ?>>Aktif
                </option>
                <option value="Tidak Aktif" <?= old('status', $perangkat['status']) == 'Tidak Aktif' ? 'selected' : '' ?>>
                    Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control"
                value="<?= old('deskripsi', $perangkat['deskripsi']) ?>" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Edit Data</button>
        <a href="<?= base_url('list') . $queryString ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>