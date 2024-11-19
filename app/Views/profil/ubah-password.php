<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <!-- Card account information -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $subtitle1; ?></h4>

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
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <?= form_open('profil/ubah-password', 'class="sample-form"'); ?>
                <div class="form-group row">
                    <?= form_label('Password saat ini', 'old_password_label', ['class' => 'col-sm-4 col-form-label']); ?>
                    <div class="col-sm-5">
                        <?php
                        $oldPasswordData = [
                            'type'  => 'password',
                            'name'  => 'old_password',
                            'id'    => 'old_password',
                            'value' => old('old_password'),
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Password saat ini'
                        ];
                        echo form_input($oldPasswordData);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <?= form_label('Password baru', 'password_label', ['class' => 'col-sm-4 col-form-label']); ?>
                    <div class="col-sm-5">
                        <?php
                        $passwordData = [
                            'type'  => 'password',
                            'name'  => 'password',
                            'id'    => 'password',
                            'value' => old('password'),
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Password baru'
                        ];
                        echo form_input($passwordData);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <?= form_label('Konfirmasi password', 'confirm_password_label', ['class' => 'col-sm-4 col-form-label']); ?>
                    <div class="col-sm-5">
                        <?php
                        $confirmPasswordData = [
                            'type'  => 'password',
                            'name'  => 'confirm_password',
                            'id'    => 'confirm_password',
                            'value' => old('confirm_password'),
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Password baru'
                        ];
                        echo form_input($confirmPasswordData);
                        ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>