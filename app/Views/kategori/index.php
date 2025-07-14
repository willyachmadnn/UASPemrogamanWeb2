<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-4 fw-bold">Data Category</h2>
        <button class="btn btn-primary fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#addRouterModal">+
            Add</button>
    </div>
    <div style="min-height: 34px;" class="mb-2">
        <?php if (!empty($message)): ?>
        <?php
            $msg = $message;
            $class = (stripos($msg, 'hapus') !== false || stripos($msg, 'dihapus') !== false) ? 'alert-danger' : 'alert-success';
            ?>
        <div class="alert <?= $class ?> small mb-0 d-inline-block"
            style="font-size: 0.95rem; line-height:1.2; margin-bottom: 0; padding: 4px 12px; min-height: 28px;">
            <?= $msg ?>
        </div>
        <?php endif ?>
        <?php if (!empty($error)): ?>
        <div class="alert alert-danger small mb-0 d-inline-block"
            style="font-size: 0.95rem; line-height:1.2; margin-bottom: 0; padding: 4px 12px; min-height: 28px;">
            <?= $error ?>
        </div>
        <?php endif ?>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered border-black align-middle mb-0">
            <thead class="table-bordered border-black">
                <tr>
                    <th style="width:60px; text-align:center;">No</th>
                    <th style="width:220px;">Jenis Router</th>
                    <th style="width:180px; text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($jenis_router as $row): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= esc($row['jenis_router']) ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-sm btn-edit" data-id="<?= $row['id'] ?>"
                            data-jenis_router="<?= esc($row['jenis_router']) ?>" data-bs-toggle="modal"
                            data-bs-target="#editRouterModal">
                            Edit
                        </button>
                        <a href="#" class="btn btn-danger btn-sm btn-delete"
                            data-delete-url="<?= base_url('kategori/delete/' . $row['id']) ?>">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="addRouterModal" tabindex="-1" aria-labelledby="addRouterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mt-1">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-body text-center bg-white px-5 py-3 rounded-pill">
                <form method="post" action="<?= base_url('kategori/store') ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRouterModalLabel">Add Jenis Router</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenis_router" class="form-label">Jenis Router</label>
                            <input type="text" name="jenis_router" id="jenis_router" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editRouterModal" tabindex="-1" aria-labelledby="editRouterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mt-1">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <form method="post" id="form-edit" action="">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="editRouterModalLabel">Edit Jenis Router</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label for="edit_jenis_router" class="form-label">Jenis Router</label>
                        <input type="text" name="jenis_router" id="edit_jenis_router" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-0 fs-5">Yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Batal</button>
                <a id="btn-delete" href="#" class="btn btn-light px-4">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    var btnDelete = document.getElementById('btn-delete');

    document.querySelectorAll('.btn-delete').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            var url = this.getAttribute('data-delete-url');
            btnDelete.setAttribute('href', url);
            deleteModal.show();
        });
    });

    var formEdit = document.getElementById('form-edit');
    var inputId = document.getElementById('edit_id');
    var inputJenisRouter = document.getElementById('edit_jenis_router');

    document.querySelectorAll('.btn-edit').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var jenis_router = this.getAttribute('data-jenis_router');
            formEdit.setAttribute('action', "<?= base_url('kategori/update/') ?>" + id);
            inputId.value = id;
            inputJenisRouter.value = jenis_router;
        });
    });
});
</script>

<?= $this->endSection() ?>