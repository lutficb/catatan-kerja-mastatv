<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <!-- Card account information -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $subtitle1; ?></h4>

                <?php if (session('akun-success') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('akun-success') ?></div>
                <?php endif ?>

                <?php if (session('akun-fail') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('akun-fail') ?></div>
                <?php endif ?>

                <div>
                    <table class="table">
                        <tr>
                            <td><span class="font-weight-bold">Username</span></td>
                            <td>:</td>
                            <td><?= auth()->getUser()->username; ?></td>
                        </tr>
                        <tr>
                            <td><span class="font-weight-bold">Email</span></td>
                            <td>:</td>
                            <td><?= auth()->getUser()->email; ?></td>
                        </tr>
                        <tr>
                            <td><span class="font-weight-bold">Nama</span></td>
                            <td>:</td>
                            <td><?= auth()->getUser()->name; ?></td>
                        </tr>
                        <tr>
                            <td><span class="font-weight-bold">Jobdes</span></td>
                            <td>:</td>
                            <td><?= (!$jobdes) ? '-' : $jobdes['jobdes']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-12">
                        <a href="<?= base_url(); ?>profil/edit-akun" class="btn btn-success btn-sm btn-icon-text"><i class="icon-pencil btn-icon-prepend"></i> Edit Akun</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card detail user information -->
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $subtitle2; ?></h4>

                <?php if (session('pribadi-success') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('pribadi-success') ?></div>
                <?php endif ?>

                <?php if (session('pribadi-fail') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('pribadi-fail') ?></div>
                <?php endif ?>

                <?php if (!$user): ?>
                    <p>Informasi pribadi belum ada, klik tombol berikut untuk menambah informasi pribadi</p>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 d-grid gap-2">
                            <a href="<?= base_url(); ?>profil/tambah-informasi-pribadi" class="btn btn-warning btn-rounded btn-rounded btn-icon-text"><i class="icon-plus btn-icon-prepend"></i> Tambah Informasi Pribadi</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td><span class="font-weight-bold">Tanggal Lahir</span></td>
                                <td>:</td>
                                <td><?= formatTanggalIndo($user['tanggal_lahir']); ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold">Kota/ Kabupaten Lahir</span></td>
                                <td>:</td>
                                <td><?= $user['tempat_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold">Alamat Domisili</span></td>
                                <td>:</td>
                                <td><?= $user['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold">No. HP Aktif</span></td>
                                <td>:</td>
                                <td><?= $user['no_hp']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xl-12">
                            <a href="<?= base_url(); ?>profil/edit-pribadi" class="btn btn-success btn-sm btn-icon-text"><i class="icon-pencil btn-icon-prepend"></i> Edit Info Pribadi</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Card password change -->
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $subtitle3; ?></h4>
                <p>Klik tombol di bawah ini untuk mengganti password akun :</p>

                <div class="row justify-content-center">
                    <div class="col-xl-4 d-grid gap-2">
                        <a href="" class="btn btn-danger btn-rounded btn-icon-text"><i class="icon-compass btn-icon-prepend"></i> Ganti Password</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>