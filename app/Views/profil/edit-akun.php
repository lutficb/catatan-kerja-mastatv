<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $subtitle; ?></h4>
                <p class="text-danger">Informasi akun yang dapat dirubah hanyalah "Nama"</p>

                <?php $errors = validation_errors(); ?>
                <?php if (! empty($errors)): ?>
                    <div class="alert alert-danger col-sm-7" role="alert">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <?php
                $action = 'profil/edit-akun';
                $hidden = [
                    'user_id' => strval(auth()->user()->id),
                ];
                echo form_open($action, 'class="sample-form"', $hidden);
                ?>
                <div class="form-group row">
                    <?= form_label('Username', 'username', ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-5">
                        <?php
                        $usernameData = [
                            'type'  => 'text',
                            'name'  => 'username',
                            'id'    => 'username',
                            'value' => auth()->user()->username,
                            'class' => 'form-control form-control',
                            'placeholder' => 'Username',
                            'readonly' => true,
                            'disabled' => true,
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
                            'value' => auth()->user()->email,
                            'class' => 'form-control form-control',
                            'readonly' => true,
                            'disabled' => true,
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
                            'value' => auth()->user()->name,
                            'class' => 'form-control form-control',
                            'placeholder' => 'Nama Lengkap'
                        ];
                        echo form_input($nameData);
                        ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-icon-text"><i class="icon-notebook btn-icon-prepend"></i> Simpan</button>
                <?= form_close(); ?>
            </div>
        </div>

        <?= $this->endSection(); ?>