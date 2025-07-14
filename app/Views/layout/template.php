<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyVent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" style="letter-spacing:1px;">
                NetVentory
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                    <li class="nav-item">
                        <a class="nav-link fw-bold <?= (isset($active) && $active == 'home' ? 'menu-active' : 'menu-inactive') ?>"
                            href="/home">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold <?= (isset($active) && $active == 'daftar' ? 'menu-active' : 'menu-inactive') ?>"
                            href="/daftar">
                            Daftar Perangkat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold <?= (isset($active) && $active == 'kategori' ? 'menu-active' : 'menu-inactive') ?>"
                            href="/kategori">
                            Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold <?= (isset($active) && $active == 'laporan' ? 'menu-active' : 'menu-inactive') ?>"
                            href="/laporan">
                            Statistik Perangkat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold <?= (isset($active) && $active == 'all' ? 'menu-active' : 'menu-inactive') ?>"
                            href="/list">
                            List Perangkat
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-2 d-flex align-items-center text-white me-4">
                        <i class="bi bi-person-circle fs-5"></i>
                        <span class="ms-1 fw-bold"><?= session('username'); ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger fw-bold px-3 ms-2" data-bs-toggle="modal" data-bs-target="#logoutModal"
                            href="#">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-rectangle">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-body text-center bg-white px-5 py-3 rounded-pill">
                    <div class="mb-2">
                        <i class="bi bi-box-arrow-right" style="font-size:2.5rem; color:#dc3545"></i>
                    </div>
                    <h5 class="fw-bold mb-3">APAKAH ANDA YAKIN INGIN KELUAR?</h5>
                    <div class="d-flex justify-content-center gap-2">
                        <form action="<?= base_url('logout'); ?>" method="post">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn btn-danger px-4 py-2 fw-bold rounded-pill">
                                Ya, Logout
                            </button>
                        </form>
                        <button type="button" class="btn btn-secondary px-4 py-2 fw-bold rounded-pill"
                            data-bs-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->renderSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script>
    function previewImg() {
        const sampul = document.querySelector('#sampul');
        const sampulLabel = document.querySelector('.input-group-text');
        const imgPreview = document.querySelector('.img-preview');

        sampulLabel.textContent = sampul.files[0].name;

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
    </script>
</body>

</html>