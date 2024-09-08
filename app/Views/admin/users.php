<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Dafar Pengguna App</h4>
                <button type="button" class="btn btn-success btn-sm mb-2 btn-icon-text" data-bs-toggle="modal" data-bs-target="#newUserModal"><i class="icon-plus btn-icon-prepend"></i> Pengguna Baru</button>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Role</th>
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
                    <img class="img-sm rounded-circle" src="<?= base_url(); ?>/template/dist/assets/images/faces/face3.jpg" alt="profile image">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Mobile Apps Redesign</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">10:07PM</small>
                </div>
                <div class="d-flex py-3 border-bottom">
                    <img class="img-sm rounded-circle" src="<?= base_url(); ?>/template/dist/assets/images/faces/face2.jpg">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Inviting Join Apps Cont...</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">01:07AM</small>
                </div>
                <div class="d-flex py-3 border-bottom">
                    <img class="img-sm rounded-circle" src="<?= base_url(); ?>/template/dist/assets/images/faces/face4.jpg" alt="profile image">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Website Redesign</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">04:42AM</small>
                </div>
                <div class="d-flex py-3  border-bottom">
                    <img class="img-sm rounded-circle" src="<?= base_url(); ?>/template/dist/assets/images/faces/face8.jpg">
                    <div class="wrapper ms-2">
                        <p class="mb-1 font-weight-medium">Analytics Dashboard</p>
                        <small class="text-muted">+23 since last year</small>
                    </div>
                    <small class="text-muted ms-auto">07:44PM</small>
                </div>
                <div class="d-flex pt-3">
                    <img class="img-sm rounded-circle" src="<?= base_url(); ?>/template/dist/assets/images/faces/face7.jpg">
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

<!-- Modal -->
<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url(); ?>/admin/addNewUserAction" method="post" class="forms-sample">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newUserModalLabel">Tambah User Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-icon-text" data-bs-dismiss="modal"><i class="icon-close btn-icon-prepend"></i>Tutup</button>
                    <button type="submit" class="btn btn-success btn-icon-text"><i class="icon-doc btn-icon-prepend"></i>Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- <script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script> -->
<?= $this->endSection(); ?>