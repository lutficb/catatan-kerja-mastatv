<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Anggota</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="template/dist/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="template/dist/assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="template/dist/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="template/dist/assets/css/vertical-light-layout/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="template/dist/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <!-- <img src="template/dist/assets/images/logo-dark.svg"> -->
                                <img src="img/logo-mastatv.svg">
                            </div>
                            <h4>Ahlan wa sahlan...!</h4>
                            <h6 class="font-weight-light">Login untuk melanjutkan.</h6>

                            <?php if (session('error') !== null) : ?>
                                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                            <?php elseif (session('errors') !== null) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php if (is_array(session('errors'))) : ?>
                                        <?php foreach (session('errors') as $error) : ?>
                                            <?= $error ?>
                                            <br>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <?= session('errors') ?>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>

                            <?php if (session('message') !== null) : ?>
                                <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                            <?php endif ?>

                            <form action="<?= url_to('login') ?>" method="post" class="pt-3">
                                <?= csrf_field() ?>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn d-grid btn-success btn-lg font-weight-medium auth-form-btn"><?= lang('Auth.login') ?></button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <a href="#" class="auth-link text-black">Lupa password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="template/dist/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="template/dist/assets/js/off-canvas.js"></script>
    <script src="template/dist/assets/js/hoverable-collapse.js"></script>
    <script src="template/dist/assets/js/misc.js"></script>
    <script src="template/dist/assets/js/settings.js"></script>
    <script src="template/dist/assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>