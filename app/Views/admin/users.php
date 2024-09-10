<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New User</h4>
                <div>
                    <?= validation_list_errors() ?>

                    <?= form_open('admin/users', 'class="sample-form"') ?>
                    <div class="form-group row">
                        <?= form_label('Username', 'username', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-5">
                            <?php
                            $usernameData = [
                                'type'  => 'text',
                                'name'  => 'username',
                                'id'    => 'username',
                                'value' => old('username'),
                                'class' => 'form-control form-control-sm',
                                'placeholder' => 'Username'
                            ];
                            echo form_input($usernameData);
                            ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?= form_label('Nama', 'name', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-5">
                            <?php
                            $nameData = [
                                'type'  => 'text',
                                'name'  => 'name',
                                'id'    => 'name',
                                'value' => old('name'),
                                'class' => 'form-control form-control-sm',
                                'placeholder' => 'Nama Lengkap'
                            ];
                            echo form_input($nameData);
                            ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?= form_label('Password', 'password', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-5">
                            <?php
                            $passwordData = [
                                'type'  => 'password',
                                'name'  => 'password',
                                'id'    => 'password',
                                'value' => old('password'),
                                'class' => 'form-control form-control-sm',
                                'placeholder' => 'Password Minimal 8 karakter'
                            ];
                            echo form_input($passwordData);
                            ?>
                        </div>
                    </div>
                    <?= form_submit('adduser', 'Save', ['class' => 'btn btn-success me-2 btn-sm']); ?>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">List Of Users</h4>
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

<!-- <script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script> -->
<?= $this->endSection(); ?>