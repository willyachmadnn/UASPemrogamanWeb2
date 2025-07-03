<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FiberAsset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-4">
            <form method="post" action="<?= base_url('login/auth') ?>"
                class="bg-white p-4 p-md-5 rounded-5 shadow-lg d-flex flex-column gap-3">

                <div class="text-center mb-2">
                    <div class="mb-1" style="font-size: 4.5rem; line-height:1;">
                        <i class="bi bi-cloud text-primary"></i>
                    </div>
                    <h1 class="h3 fw-bold mb-0 pb-1 border-bottom border-2 d-inline-block px-1 text-black">
                        NetVentory
                    </h1>
                </div>

                <div class="row mb-2" style="min-height: 36px;">
                    <div class="col">
                        <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger text-center py-1 mb-0">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="position-relative">
                        <input type="text" class="form-control form-control-lg rounded-pill border-2 border-black ps-5 "
                            placeholder="Username" name="username" required>
                        <span class="position-absolute top-50 translate-middle-y ms-3" style="z-index:2;">
                            <i class="bi bi-person-fill text-black"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="position-relative">
                        <input type="password"
                            class="form-control form-control-lg rounded-pill border-2 border-black ps-5"
                            placeholder="Password" name="password" required>
                        <span class="position-absolute top-50 translate-middle-y ms-3" style="z-index:2;">
                            <i class="bi bi-lock-fill text-black"></i>
                        </span>
                    </div>
                </div>
                <button class="btn btn-black rounded-pill w-100 fw-bold py-3 fs-5 text-white" type="submit">
                    Login
                </button>
            </form>
        </div>
    </div>
</body>

</html>