<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Dafar Pengguna App</h4>
                <a href="" class="btn btn-success btn-sm mb-2"><i class="fa fa-plus"></i> Pengguna baru</a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>isActive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user): ?>
                                <tr class="text-center">
                                    <td><?= $i++; ?></td>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['group']; ?></td>
                                    <td><?= $user['active']; ?></td>
                                    <td>
                                        <div class="edit-user" style="display: inline;">
                                            <a href="" class="btn btn-sm btn-primary" title="Edit data pengguna" target="_blank"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="delete-user" style="display: inline;">
                                            <a href="" class="btn btn-sm btn-danger" title="Hapus pengguna" target="_blank"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center">
                    <h4 class="card-title mb-0">Latest Activity</h4>
                    <a href="#" class="btn btn-outline-info border-0 font-weight-semibold ms-auto p-0 btn-no-hover-bg">View more</a>
                </div>
                <div class="d-flex mt-4 py-3 border-bottom">
                    <img class="img-sm rounded-circle" src="assets/images/faces/face3.jpg" alt="profile image">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Mobile Apps Redesign</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">10:07PM</small>
                </div>
                <div class="d-flex py-3 border-bottom">
                    <img class="img-sm rounded-circle" src="assets/images/faces/face2.jpg">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Inviting Join Apps Cont...</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">01:07AM</small>
                </div>
                <div class="d-flex py-3 border-bottom">
                    <img class="img-sm rounded-circle" src="assets/images/faces/face4.jpg" alt="profile image">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Website Redesign</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">04:42AM</small>
                </div>
                <div class="d-flex py-3  border-bottom">
                    <img class="img-sm rounded-circle" src="assets/images/faces/face8.jpg">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Analytics Dashboard</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">07:44PM</small>
                </div>
                <div class="d-flex pt-3">
                    <img class="img-sm rounded-circle" src="assets/images/faces/face7.jpg">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Great Logo Design</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">10:49AM</small>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>