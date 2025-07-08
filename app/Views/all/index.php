<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container" style="padding-top: 10px; padding-bottom: 8px;">
    <h2 class="fw-bold mb-2">List Perangkat</h2>
    <div style="min-height:26px; margin-bottom:9px;">
        <?php if (session()->getFlashdata('message')): ?>
            <?php
            $msg = session()->getFlashdata('message');
            $class = (stripos($msg, 'dihapus') !== false) ? 'alert-danger' : 'alert-success';
            ?>
            <div class="alert <?= $class ?> small mb-0 px-3 py-1"
                style="font-size: 0.95rem; line-height:1.2; margin-bottom: 0; min-height: 24px; display:inline-block;">
                <?= $msg ?>
            </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger small mb-0 px-3 py-1"
                style="font-size: 0.95rem; line-height:1.2; margin-bottom: 0; min-height: 24px; display:inline-block;">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif ?>
    </div>

    <form class="row g-2 mb-2" method="get" action="<?= base_url('list') ?>">
        <div class="col-md-6 col-sm-12">
            <input type="text" name="q" class="form-control" placeholder="Masukkan kata kunci"
                value="<?= esc($_GET['q'] ?? '') ?>">
        </div>
        <div class="col-md-3 col-sm-6">
            <select class="form-select" name="status">
                <option value="">Semua Status</option>
                <option value="Aktif" <?= (isset($_GET['status']) && $_GET['status'] == 'Aktif') ? 'selected' : '' ?>>
                    Aktif
                </option>
                <option value="Tidak Aktif" <?= (isset($_GET['status']) && $_GET['status'] == 'Tidak Aktif') ? 'selected' : '' ?>>Tidak Aktif
                </option>
            </select>
        </div>
        <div class="col-md-2 col-sm-6">
            <button class="btn btn-primary w-100" type="submit">Search</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Mac Address</th>
                    <th>Status</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $perPage = 10;
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
                $startNo = ($page - 1) * $perPage + 1;
                $no = $startNo;
                $queryString = $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '';
                ?>
                <?php foreach ($perangkat as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($row['category_name']) ?></td>
                        <td><?= esc($row['mac_address']) ?></td>
                        <td>
                            <?php if ($row['status'] == 'Aktif'): ?>
                                <span class="badge bg-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            <?php endif ?>
                        </td>
                        <td><?= esc($row['deskripsi']) ?></td>
                        <td>
                            <a href="<?= base_url('daftar/edit/' . $row['id']) . $queryString ?>"
                                class="btn btn-warning btn-sm fw-bold">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm fw-bold btn-hapus"
                                data-id="<?= $row['id'] ?>" data-query="<?= $queryString ?>">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($pager)): ?>
        <div class="mt-4 d-flex justify-content-center">
            <?= $pager->links('default', 'custom_bootstrap') ?>
        </div>
    <?php endif; ?>
</div>
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-0 fs-5">Yakin ingin menghapus perangkat ini?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="formHapus" method="get">
                    <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light px-4">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('modalHapus'));
        var form = document.getElementById('formHapus');
        document.querySelectorAll('.btn-hapus').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var id = this.getAttribute('data-id');
                var query = this.getAttribute('data-query') || '';
                form.setAttribute('action', '<?= base_url('daftar/delete/') ?>' + id + query);
                modal.show();
            });
        });
    });
</script>
<?= $this->endSection() ?>