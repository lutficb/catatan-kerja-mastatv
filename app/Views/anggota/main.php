<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex mb-4 align-items-center">
                    <h4 class="card-title mb-0">Profil Saya</h4>
                </div>
                <div class="d-flex py-3 border-bottom">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Catatan Kerja</h4>
                <a href="" class="btn btn-block btn-sm btn-success mb-3 mt-2"><i class="fa fa-pencil-square-o"></i> Catatan Baru</a>
                <?php if (session('message') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                <?php endif ?>
                <div class="table-responsive">
                    <table id="catatanTable" class="table table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>#</th>
                                <th>Hari/Tanggal</th>
                                <th>Deskripsi Pekerjaan</th>
                                <th>Status Pekerjaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS for datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css">

<!-- JS Plugin for datatable -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
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
<?php $this->endSection(); ?>