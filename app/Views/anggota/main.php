<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('style'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $leftsubtitle; ?></h4>
                <table class="table">
                    <tr>
                        <td><span class="font-weight-bold">Nama</span></td>
                        <td>:</td>
                        <td><?= auth()->getUser()->name; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Jobdes</span></td>
                        <td>:</td>
                        <td><?= $jobdes['jobname']; ?></td>
                    </tr>
                    <tr>
                        <td><label class="badge badge-danger">Total Pekerjaan</label></td>
                        <td>:</td>
                        <td><?= $total; ?></td>
                    </tr>
                    <tr>
                        <td><label class=" badge badge-success">Sudah Diperiksa</label></td>
                        <td>:</td>
                        <td><?= $checked; ?></td>
                    </tr>
                    <tr>
                        <td><label class="badge badge-warning">Belum Diperiksa</label></td>
                        <td>:</td>
                        <td><?= $unchecked; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $rightsubtitle; ?></h4>
                <a href="<?= base_url(); ?>anggota/tambah-catatan-baru" class="btn btn-block btn-sm btn-success mb-3 mt-2"><i class="fa fa-pencil-square-o"></i> Catatan Baru</a>
                <?php if (session('success') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('success') ?></div>
                <?php endif ?>
                <div class="table-responsive">
                    <table id="catatanTable" class="table table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Hari/Tanggal</th>
                                <th class="text-center">Deskripsi Pekerjaan</th>
                                <th class="text-center">Status Pekerjaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($catatan as $item): ?>
                                <tr>
                                    <td class="text-center"><?= $i; ?></td>
                                    <td class="text-center">
                                        <div class="font-weight-bold mb-1">
                                            <?= formatHariIndonesia(date('D', strtotime($item['waktu_catatan']))); ?>,
                                        </div>
                                        <div>
                                            <?= formatTanggalIndo($item['waktu_catatan']); ?>
                                        </div>
                                    </td>
                                    <td><?= ringkasKalimat($item['deskripsi_catatan'], 5) . '...'; ?></td>
                                    <td class="text-center">
                                        <div class="badge p-2 <?= $status['badge'][$item['status']]; ?>">
                                            <?= $status['pekerjaan'][$item['status']]; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="edit-user" style="display: inline;">
                                            <a href="<?= base_url(); ?>anggota/detail-catatan/<?= $item['slug']; ?>" class="btn btn-sm btn-info" title="Detail catatan"><i class="fa fa-folder-open-o"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- JS Plugin for datatable -->
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>
<!-- JS function for tabale that using datatable plugin -->
<script type="text/javascript">
    $('#catatanTable').DataTable({
        language: {
            search: 'Pencarian :',
            searchPlaceholder: 'Cari catatan',
            emptyTable: 'Belum ada catatan kerja',
            info: 'Menampilkan _START_ to _END_ of _TOTAL_ _ENTRIES-TOTAL_',
            entries: {
                _: 'catatan',
                1: 'catatan'
            }
        }
    });
</script>
<?= $this->endSection(); ?>