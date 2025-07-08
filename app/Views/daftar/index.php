<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h2 class="mb-4 fw-bold">Daftar Perangkat</h2>
    <a href="<?= base_url('daftar/create') ?>" class="btn btn-primary mb-2 fw-semibold">Tambah Data</a>

    <div style="min-height: 34px;" class="mb-2">
        <?php if (!empty($message)): ?>
            <?php
            $msg = $message;
            $class = (stripos($msg, 'hapus') !== false || stripos($msg, 'dihapus') !== false) ? 'alert-danger' : 'alert-success';
            ?>
            <div class="alert <?= $class ?> small d-inline-block"
                style="font-size: 0.95rem; line-height:1.2; margin-bottom:2px; padding: 4px 12px; min-height: 28px;">
                <?= $msg ?>
            </div>
        <?php endif ?>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger small d-inline-block"
                style="font-size: 0.95rem; line-height:1.2; margin-bottom:2px; padding: 4px 12px; min-height: 28px;">
                <?= $error ?>
            </div>
        <?php endif ?>
    </div>

    <table class="table table-bordered table-striped align-middle text-center" style="margin-top:0;">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Category</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($perangkat as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="<?= base_url('uploads/' . $row['gambar']) ?>" width="70">
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif ?>
                    </td>
                    <td><?= esc($row['category_name']) ?></td>
                    <td><?= esc($row['total']) ?></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#hapusKategoriModal" data-category="<?= $row['category_id'] ?>"
                            data-categoryname="<?= esc($row['category_name']) ?>">
                            Hapus
                        </button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="hapusKategoriModal" tabindex="-1" aria-labelledby="hapusKategoriModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusKategoriModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <form method="post" action="<?= base_url('daftar/hapusKategori') ?>">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="modal-category-id">
                    <p>Yakin ingin <b>Menghapus semua perangkat</b> pada kategori: <span id="modal-category-name"
                            class="fw-bold text-danger"></span>?</p>
                    <div class="alert alert-warning mb-0">Data jika dihapus tidak bisa dikembalikan!</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light">Hapus Semua</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var hapusModal = document.getElementById('hapusKategoriModal');
        hapusModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var categoryId = button.getAttribute('data-category');
            var categoryName = button.getAttribute('data-categoryname');
            hapusModal.querySelector('#modal-category-id').value = categoryId;
            hapusModal.querySelector('#modal-category-name').innerText = categoryName;
        });
    });
</script>
<?= $this->endSection() ?>