<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('style'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $subtitle2; ?></h4>
                <?php if (session('success') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('success') ?></div>
                <?php endif ?>
                <div class="table-responsive">
                    <table id="catatanTable" class="table table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Hari/ Tanggal</th>
                                <th class="text-center">Nama Anggota/ Jobdes</th>
                                <th class="text-center">Status Pekerjaan</th>
                                <th class="text-center">Action</th>
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
                                    <td><?= $item['userName']; ?>/ <span class="font-weight-bold"><?= $item['jobdes']; ?></span></td>
                                    <td class="text-center">
                                        <div class="badge p-2 <?= $status['badge'][$item['status_catatan']]; ?>">
                                            <?= $status['pekerjaan'][$item['status_catatan']]; ?>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="edit-user" style="display: inline;">
                                            <a href="<?= base_url(); ?>verificator/periksa-catatan/<?= $item['catatanId']; ?>" class="btn btn-sm btn-info" title="Periksa catatan"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="edit-user" style="display: inline;">
                                            <a href="<?= base_url(); ?>verificator/delete-catatan/<?= $item['catatanId']; ?>" class="btn btn-sm btn-danger" title="Hapus catatan"><i class="fa fa-trash"></i></a>
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