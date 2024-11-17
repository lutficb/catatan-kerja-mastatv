<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $leftsubtitle1; ?></h4>
                <div class="row">
                    <div class="col-md-3">
                        <p>Tanggal Catatan</p>
                        <p>Status Catatan</p>
                    </div>
                    <div class="col-md-1 text-end">
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-md-5">
                        <p><?= formatHariIndonesia(date('D', strtotime($catatan['waktu_catatan']))); ?>, <?= formatTanggalIndo($catatan['waktu_catatan']); ?></p>
                        <p><label class="badge <?= $status['badge'][$catatan['status']]; ?>"><?= $status['title'][$catatan['status']]; ?></label></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $rightsubtitle; ?></h4>
                <div class="d-grid gap-2">
                    <a href="<?= base_url(); ?>anggota/edit-catatan/<?= $catatan['slug']; ?>" class="btn btn-info <?= ($catatan['status'] == 'checked') ? 'disabled' : ''; ?>" title="Edit catatan"><i class="fa fa-edit"> Edit Catatan</i></a>
                    <button onclick="window.history.go(-1); return false;" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button>
                </div>
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