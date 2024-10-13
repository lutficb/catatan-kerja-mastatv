<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $leftsubtitle1; ?></h4>
                <div class="row">
                    <div class="col-md-3">
                        <p>Nama Anggota</p>
                        <p>Jobdes</p>
                        <p>Tanggal Catatan</p>
                    </div>
                    <div class="col-md-1 text-end">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-md-5">
                        <p><?= $catatan['userName']; ?></p>
                        <p><?= $catatan['jobdes']; ?></p>
                        <p><?= formatHariIndonesia(date('D', strtotime($catatan['waktu_catatan']))); ?>, <?= formatTanggalIndo($catatan['waktu_catatan']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $rightsubtitle; ?></h4>
                <?php
                $hidden = [
                    'id' => $catatan['catatanId'],
                ];
                echo form_open('verificator/periksa-catatan', 'class="sample-form"', $hidden);
                ?>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn <?= $state['color'][$catatan['status_catatan']]; ?>" <?= $state['button'][$catatan['status_catatan']]; ?>><i class="fa fa-check-square-o"></i> <?= $state['status'][$catatan['status_catatan']]; ?></button>
                    <button onclick="window.history.go(-1); return false;" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i> Halaman sebelumnya</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $leftsubtitle2; ?></h4>
                <div>
                    <p class="text-light bg-dark ps-1">Deskripsi Pekerjaan</p>
                    <div>
                        <?= $catatan['deskripsi_catatan']; ?>
                    </div>
                    <p class="text-light bg-dark ps-1">Permasalahan</p>
                    <div>
                        <?= $catatan['deskripsi_permasalahan']; ?>
                    </div>
                    <p class="text-light bg-dark ps-1">Solusi</p>
                    <div>
                        <?= $catatan['deskripsi_solusi']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>