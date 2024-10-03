<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('style'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex mb-4 align-items-center">
                    <h4 class="card-title mb-0"><?= $leftsubtitle; ?></h4>
                </div>
                <div class="d-flex py-3 border-bottom">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 grid-margin stretch-card">
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
                                        <div class="badge p-2 <?= $badge[$item['status']]; ?>">
                                            <?= $status[$item['status']]; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="edit-user" style="display: inline;">
                                            <a href="" class="btn btn-sm btn-info" title="Edit catatan"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="delete-user" style="display: inline;">
                                            <a href="" class="btn btn-sm btn-danger" title="Hapus catatan"><i class="fa fa-trash-o"></i></a>
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