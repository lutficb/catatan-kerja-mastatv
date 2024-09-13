<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New User</h4>
                <div>
                    <?php $errors = validation_errors(); ?>
                    <?php if (! empty($errors)): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <?php if (session('success') !== null) : ?>
                        <div class="alert alert-success" role="alert"><?= session('success') ?></div>
                    <?php endif ?>

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
                        <?= form_label('Email', 'email', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-5">
                            <?php
                            $emailData = [
                                'type'  => 'email',
                                'name'  => 'email',
                                'id'    => 'email',
                                'value' => old('email'),
                                'class' => 'form-control form-control-sm',
                                'placeholder' => 'Ex: fulan@gmail.com'
                            ];
                            echo form_input($emailData);
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
                        <?= form_label('Group', 'group', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-5">
                            <?php
                            $options = [
                                'admin' => 'Admin',
                                'verificator' => 'Verificator',
                                'anggota' => 'Anggota',
                            ];

                            $groupData = [
                                'name'  => 'group',
                                'id'    => 'group',
                                'class' => 'form-select form-select-sm'
                            ];
                            echo form_dropdown('group', $options, 'anggota', $groupData);
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Add User</button>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">List Of Users</h4>
                <?php if (session('message') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                <?php endif ?>
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
                                    <td>
                                        <div class="badge p-2 <?= $badge[$user['group']]; ?>">
                                            <?= ucfirst($user['group']); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge p-2 <?= ($user['active'] == 1 ? 'badge-info' : 'badge-secondary'); ?>"><?= ($user['active'] == 1 ? 'Aktif' : 'Non-Aktif'); ?></div>
                                    </td>
                                    <td>
                                        <div class="edit-user" style="display: inline;">
                                            <a href="" class="btn btn-sm btn-primary" title="Edit data pengguna"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="delete-user" style="display: inline;">
                                            <a href="<?= base_url(); ?>admin/deleteUser/<?= $user['userId']; ?>" class="btn btn-sm btn-danger" title="Hapus pengguna"><i class="fa fa-trash-o"></i></a>
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
                <div class="d-sm-flex mb-4 align-items-center">
                    <h4 class="card-title mb-0">Latest Activity</h4>
                </div>
                <div class="d-flex py-3 border-bottom">
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